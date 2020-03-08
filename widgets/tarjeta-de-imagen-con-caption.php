<?php

namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 
use Elementor\Group_Control_Image_Size; 
use Elementor\Utils; 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Boton_De_Lista_Compuesto
 *
 * Elementor widget for Boton_De_Lista_Compuesto
 *
 * @since 1.0.0
 */
class Tarjeta_De_Imagen_Con_Caption extends Widget_Base {

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
		return 'tarjeta-de-imagen-con-caption';
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
		return __( 'Tarjeta De Imagen Con Caption', 'tarjeta-de-imagen-con-caption' );
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
				'label' => __( 'Contenido', 'tarjeta-de-imagen-con-caption' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Titulo', 'tarjeta-de-imagen-con-caption' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Escriba el titulo aquí', 'tarjeta-de-imagen-con-caption' ),
			]
        );

        $this->add_control(
			'image',
			[
				'label' => __( 'Escoge una imagen', 'tarjeta-de-imagen-con-caption' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default' => 'large',
				'exclude' => [ '1536x1536', '2048x2048', 'Full'],
				'include' => [],
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Enlace', 'tarjeta-de-imagen-con-caption' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'tarjeta-de-imagen-con-caption' ),
				'show_external' => true,
				'default' => [
					'urlL' => '',
					'is_external' => true,
					'nofollow' => false,
				],
			]
		);		

		$this->add_control(
			'alignment',
			[
				'label' => __( 'Alignment', 'tarjeta-de-imagen-con-caption' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'tarjeta-de-imagen-con-caption' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'tarjeta-de-imagen-con-caption' ),
						'icon' => 'fa fa-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'tarjeta-de-imagen-con-caption' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
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

		$target = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';		
	
		echo '<a href="'.$settings['link']['url'].'"'.$target . $nofollow.' class="figure-caption-card" style="display:flex;justify-content:'.$settings['alignment'].'">';
		echo '<figure>';
		//echo '<img src="'.$settings['image']['url'].'" alt="UAO">';
		echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
		echo '<figcaption>'.$settings['title'].'</figcaption>';
        echo '</figure>';
		echo '</a>';	
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
		<#
		
		var image = {
			id: settings.image.id,
			url: settings.image.url,
			size: settings.thumbnail_size,
			dimension: settings.thumbnail_custom_dimension,
			model: view.getEditModel()
		};
		var image_url = elementor.imagesManager.getImageUrl( image );
		#>

        <a href="{{ settings.link.url }}" class="figure-caption-card" style="display:flex;justify-content:{{ settings.alignment }}">
        <figure>
		<img src="{{{ image_url }}}" alt="UAO">
        <figcaption>{{{settings.title}}}</figcaption>
        </figure>
        </a>

		<?php
	}
}
