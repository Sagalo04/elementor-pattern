<?php

namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 
use Elementor\Utils; 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Boton_De_Lista_Compuesto
 *
 * Elementor widget for Boton_De_Lista_Compuesto
 *
 * @since 1.0.0
 */
class Tarjeta_De_Noticia_Destacada extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tarjeta-de-noticia-destacada';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Tarjeta De Noticia Destacada', 'tarjeta-de-noticia-destacada' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-call-to-action';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'pattern-uao' ];
	}

	public function get_cat() {
		$args = array(
			'taxonomy'	=> "category",
			'hide_empty' => 0,
			'parent' => 0,
		);
		
		$cat = array(
			'0'=> 'Todas',
		);
		
	
		$categories = get_categories($args);
			foreach( $categories as $category ) {				
					$cat [$category->term_id] = $category->name;
			}
			return $cat;			
	}

	public function get_catname() {
		$settings = $this->get_settings_for_display();
		$query_args = [
			'posts_type'=>'posts',
			'posts_per_page' => $settings['posts_per_page'],
			'paged' => 1,
			'cat' => $settings['category'],
		];
		
		return $query_args;
	}

	
	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'general_section',
			[
				'label' => __( 'Contenido', 'tarjeta-de-noticia-destacada' ),
			]
		);
		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columnas', 'ultimas-noticias' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				],
				'prefix_class' => 'elementor-grid%s-',
				'frontend_available' => true,
			]
		);	
		$this->add_control(
				'posts_per_page',
				[
					'label' => __( 'Noticias por página', 'ultimas-noticias' ),
					'type' => Controls_Manager::NUMBER,
					'min' => 0,
					'default' => 3,
				]
		);

		$this->add_control(
			
			'category',
			[
				'label' => __( 'Categoria', 'ultimas-noticias' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'all',
				'options' => $this->get_cat(),
				
			]
		);
		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	
	protected function render() {
		$settings = $this->get_settings_for_display();

		$args = $this->query_posts();
			
        /** @var \WP_Query $query */
		$query = new \WP_Query($args);

		if ( ! $query->found_posts ) {
			return;
		}
		echo '<div class = "elementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid elementor-has-item-ratio">';
		// It's the global `wp_query` it self. and the loop was started from the theme.
		if ( $query->in_the_loop ) {
		
			echo '<article class="featured-news-card">';
			echo '<a href="#">';
			echo '<figure>';
			echo get_the_post_thumbnail();
			echo '</figure>';
			echo '<div>';
			echo '<p class="category-tag ">';
			$cate = get_the_category();
				foreach ($cate as $cat){
				echo $cat->name;
			}
			echo '</p>';
			echo '</div>';
			echo '<p class="fnc-title">';
			echo get_the_title();
			echo '</p>';
			echo '<time class="date-text">'.get_the_date().'</time>';
			echo '</a>';
			echo '<p class="corner-dot-lines"><span></span><span></span></p>';
			echo '</article>';
		} else {
			while ( $query->have_posts() ) {
				$query->the_post();
				
				echo '<article class="featured-news-card">';
				echo '<a href="#">';
				echo '<figure>';
				echo get_the_post_thumbnail();
				echo '</figure>';
				echo '<div id="pattern-post-category-rednder">';
				$cate = get_the_category();
				foreach ($cate as $cat){
					echo '<p class="category-tag" style="margin-left:0.5rem">'.$cat->name.'</p>';
				}
				echo '</p>';
				echo '</div>';
				echo '<p class="fnc-title">';
				echo get_the_title();
				echo '</p>';
				echo '<time class="date-text">'.get_the_date().'</time>';
				echo '</a>';
				echo '<p class="corner-dot-lines"><span></span><span></span></p>';
				echo '</article>';
                
			}
		}

		wp_reset_postdata();
		echo '</div>';
	}

	public function query_posts() {
		$settings = $this->get_settings_for_display();
		$query_args = [
			'posts_type'=>'posts',
			'posts_per_page' => $settings['posts_per_page'],
			'paged' => 1,
			'cat' => $settings['category'],
		];
		
		return $query_args;
	}
	
	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */

}
