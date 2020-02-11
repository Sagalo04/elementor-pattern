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
class Boton_De_Lista_Compuesto extends Widget_Base {

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
		return 'Boton-De-Lista-Compuesto';
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
		return __( 'Botón De Lista Compuesto', 'Boton-De-Lista-Compuesto' );
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
		return 'eicon-editor-list-ol';
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
				'label' => __( 'Contenido', 'Boton-De-Lista-Compuesto' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Titulo', 'Boton-De-Lista-Compuesto' ),
				'type' => Controls_Manager::TEXT,
			]
        );
        $this->add_control(
			'url',
			[
				'label' => __( 'Enlace del boton', 'Boton-De-Lista-Compuesto' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'https://www.misite.com', 'Boton-De-Lista-Compuesto' ),                
			]
        );
        
		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'Boton-De-Lista-Compuesto' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color de fondo', 'Boton-De-Lista-Compuesto' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
				'default' => '#c4161c',
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
		echo '<style>
		a.list-btn.list-btn-line .lb-text:before{
			background-color: '.$settings['title_color'].';
		}
		a.list-btn.list-btn-line .lb-text:after{
			background-color:'.$settings['title_color'].';
		}
		</style>';
		
            
        echo '<a class="list-btn list-btn-line" href="'.$settings['url'].'">';
        echo '<div class="lb-text">';
        echo $settings['title'];
        echo '</div>';
        echo '<div class="lb-arrow" style="background-color: '.$settings['title_color'].'">';
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
		<style>
		a.list-btn.list-btn-line .lb-text:before{
			background-color: {{{ settings.title_color }}};
		}
		a.list-btn.list-btn-line .lb-text:after{
			background-color: {{{ settings.title_color }}};
		}
		</style>

            <a class="list-btn list-btn-line" href="{{ settings.url }}">
            <div class="lb-text">
                {{{ settings.title }}}
            </div>
            <div class="lb-arrow" style="background-color: {{ settings.title_color }}">
                <span class="icon icon-chevron-right"></span>
            </div>
            </a>
		<?php
	}
}
