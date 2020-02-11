<?php
namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 
use Elementor\Utils; 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Boton_De_Enlace_Con_Imagen
 *
 * Elementor widget for Boton_De_Enlace_Con_Imagen.
 *
 * @since 1.0.0
 */
class Boton_De_Enlace_Con_Imagen extends Widget_Base {

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
		return 'boton-de-enlace-con-imagen';
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
		return __( 'Botón De Enlace Con Imagen', 'boton-de-enlace-con-imagen' );
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
		return 'eicon-button';
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
				'label' => __( 'Contenido', 'boton-de-enlace-con-imagen' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Titulo', 'boton-de-enlace-con-imagen' ),
				'type' => Controls_Manager::TEXT,
			]
        );
        $this->add_control(
			'url',
			[
				'label' => __( 'Enlace del boton', 'boton-de-enlace-con-imagen' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'https://www.misite.com', 'boton-de-enlace-con-imagen' ),                
			]
        );
        
		$this->add_control(
			'image',
			[
				'label' => __( 'Imagen', 'boton-de-enlace-con-imagen' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
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
            
        echo '<a class="link-image-button " href="'.$settings['url'].'">';
        echo '<figure>';
        echo    '<img src="'.$settings['image']['url'].'" alt="UAO">';
        echo '</figure>';
        echo '<div>';
        echo $settings['title'];
        echo '</div>';
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
		<a class="link-image-button " href="{{ settings.url }}">
            <figure>
                <img src="{{ settings.image.url }}" alt="UAO">
            </figure>
            <div>
                {{{ settings.title }}}
            </div>
        </a>
		<?php
	}
}
