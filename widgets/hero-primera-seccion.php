<?php
namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 
use \Elementor\Utils;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Boton_Principal_Con_Linea
 *
 * Elementor widget for Boton_Principal_Con_Linea
 *
 * @since 1.0.0
 */
class Hero_Primera_Seccion extends Widget_Base {

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
		return 'hero-primera-seccion';
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
		return __( 'Hero primera sección', 'hero-primera-seccion' );
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
		return 'eicon-site-title';
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
				'label' => __( 'Contenido', 'hero-primera-seccion' ),
			]
        );
        $this->add_control(
			'title',
			[
				'label' => __( 'Titulo', 'hero-primera-seccion' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Escriba el titulo aquí', 'hero-primera-seccion' ),
			]
        );
        $this->add_control(
			'image',
			[
				'label' => __( 'Escoge una imagen', 'hero-primera-seccion' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        
        
		$this->end_controls_section();
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'aviso-temporal' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'image_background',
			[
				'label' => __( 'Escoge una imagen de fondo', 'hero-primera-seccion' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://pattern.uao.edu.co/images/bg-desktop-light-red.jpg',
				],
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
          
        

        echo '<section class="hero-section" style="background: url('.$settings['image_background']['url'].') no-repeat;background-size: cover;">';
        echo '<div class="hhs-container with-temporary-notice">';
        echo '<div class="hhsc-left">';
        echo '<h1>'.$settings['title'].'</h1>';
        echo '</div>';
        echo '<div class="hhsc-right">';
        echo '<figure>';
        echo ' <img src="'.$settings['image']['url'].'" alt="UAO">';
        echo ' </figure>';
        echo ' </div>';
        echo ' </div>';
        echo ' </section>';
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
	protected function _content_template() {
		?>

        <section class="hero-section" style="background: url({{ settings.image_background.url }}) no-repeat;background-size: cover;">
		<div class="hhs-container with-temporary-notice">
        <div class="hhs-container ">
            <div class="hhsc-left">
                <h1>{{{ settings.title }}}</h1>
            </div>
            <div class="hhsc-right">
            <figure>
                <img src="{{ settings.image.url }}" alt="UAO">
            </figure>
            </div>
        </div>
        </section>


		<?php
	}
}
