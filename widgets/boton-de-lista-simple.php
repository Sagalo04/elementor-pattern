<?php
namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Boton_De_Lista_Simple
 *
 * Elementor widget for Boton_De_Lista_Simple.
 *
 * @since 1.0.0
 */
class Boton_De_Lista_Simple extends Widget_Base {

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
		return 'Boton-De-Lista-Simple';
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
		return __( 'Botón De Lista Simple', 'Boton-De-Lista-Simple' );
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
		return 'eicon-bullet-list';
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
        
		$this->end_controls_section();
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'aviso-temporal' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'titleColor',
			[
				'label' => __( 'Color de fondo', 'aviso-temporal' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
				'default' => '#9e0b0f',
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
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
            
        echo '<a class="list-btn" href="'.$settings['url'].'">';
        echo '<div class="lb-text">';
        echo $settings['title'];
        echo '</div>';
        echo '<div class="lb-arrow" style="background-color:'.$settings['titleColor'].'">';
        echo '<span class="icon icon-chevron-right"></span>';
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

            <a class="list-btn" href="{{ settings.url }}">
            <div class="lb-text">
                {{{ settings.title }}}
            </div>
            <div class="lb-arrow" style="background-color: {{ settings.titleColor }}" >
                <span class="icon icon-chevron-right"></span>
            </div>
            </a>
		<?php
	}
}
