<?php
namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils; 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Tarjeta de perfil
 *
 * Elementor widget for Tarjeta de perfil
 *
 * @since 1.0.0
 */
class Miga_De_Pan extends Widget_Base {

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
		return 'miga-de-pan';
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
		return __( 'miga de pan', 'miga-de-pan' );
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
		return 'eicon-arrow-right';
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
				'label' => __( 'Contenido', 'miga-de-pan' ),
			]
		);

		$this->add_control(
			'texto',
			[
				'label' => __( 'Texto', 'miga-de-pan' ),
				'type' => Controls_Manager::TEXT,
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
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'miga-de-pan' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Color de texto', 'miga-de-pan'),
				'type' => \Elementor\Controls_Manager::COLOR,
				
				'default' => '#fff',
			]
		);
		
		
		/* Colores principales */
		$this->add_control(
			'more_options',
			[
				'label' => __( 'Colores', 'miga-de-pan' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'color1',
			[
				'label' => __( 'Colores Principales', 'miga-de-pan' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'Rojo-principal-1',
				'options' => [
					'#ed1d24'=> 'Rojo-principal-1',
					'#000000'=> 'Negro',
					'#FFFFFF'=> 'Blanco',
					'#510608 '=> 'Rojo-2',
					'#8b0304'=> 'Rojo-3',
					'#9e0b0f'=> 'Rojo-4',
					'#c4161c'=> 'Rojo-5',
					'#f82e35'=> 'Rojo-6',
					'#fe6a6f'=> 'Rojo-7',
					'#363636'=> 'Gris-1',
					'#666666'=> 'Gris-2',
					'#9e9e9e'=> 'Gris-3',
					'#d1d1d1'=> 'Gris-4',
					'#f4f4f4'=> 'Gris-5',
					'#8f232f'=> 'Rojizo-1',
					'#741823'=> 'Rojizo-2',
					'#78313e'=> 'Rojizo-3',
					'#a6243a'=> 'Rojizo-4',
					'#5d4a9e'=> 'Morado-1',
					'#3e266e'=> 'Morado-2',
					'#8479a9'=> 'Morado-3',
					'#cec0fd'=> 'Morado-4',
					'#3564af'=> 'Azul-1',
					'#0b2164'=> 'Azul-2',
					'#4a6a9d'=> 'Azul-3',
					'#99bbf2'=> 'Azul-4',
					'#62bc50'=> 'Verde-1',
					'#2d7d2f'=> 'Verde-2',
					'#82b278'=> 'Verde-3',
					'#9feb90'=> 'Verde-4',
					'#f58233'=> 'Naranja-1',
					'#ab5610'=> 'Naranja-2',
					'#c07d4f'=> 'Naranja-3',
					'#ffb888'=> 'Naranja-4',
					'#b8c633'=> 'Verde-claro-1',
					'#94aa24'=> 'Verde-claro-2',
					'#8a9059'=> 'Verde-claro-3',
					'#e5ec9f'=> 'Verde-claro-4',
					'#fdb913'=> 'Amarillo-1',
					'#d09910'=> 'Amarillo-2',
					'#b29859'=> 'Amarillo-3',
					'#ffd97c'=> 'Amarillo-4',
					'#ED730C'=> 'Naranja-sinapsis-1',
					'#c96a23'=> 'Naranja-sinapsis-2',
					'#cf8451'=> 'Naranja-sinapsis-3',
					'#eabb9b'=> 'Naranja-sinapsis-4',
					'#9A68A8'=> 'Purpura-sinapsis-1',
					'#684675'=> 'Purpura-sinapsis-2',
					'#624e6b'=> 'Purpura-sinapsis-3',
					'#655f69'=> 'Purpura-sinapsis-4',
					'#70706F'=> 'Gris-sinapsis-1',
					'#8d8e8d'=> 'Gris-sinapsis-2',
					'#a5a4a3'=> 'Gris-sinapsis-3',
					'#d1d0d1'=> 'Gris-sinapsis-4',
					
				],
			]
		);
		
		$this->end_controls_tab();

		$this->end_controls_tabs();
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
	
            
            echo '<div class="breadcrumb-desktop">';
            echo '<a href="#"></a>';
            echo    '<span> > </span>';
            echo    '<a href="#">Nuestra Institución</a>';
            echo   '<span> > </span>';
            echo   '<a href="#">Información Institucional</a>';
            echo '</div>';

            echo '<div class="breadcrumb-mobile">';
            echo   '<a href="#">';
            echo '<span class="icon icon-angle-left"></span>';
            echo '<span>';
            
            echo         'Información Institucional';
            echo  '</span>';
            echo '</a>';
            echo '</div>';
	


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
	
<div class="breadcrumb-desktop">
  <a href="#"></a>
	  <span> > </span>
	  <a href="#">Nuestra Institución</a>
	  <span> > </span>
	  <a href="#">Información Institucional</a>
</div>

<div class="breadcrumb-mobile">
  <a href="#">
    <span class="icon icon-angle-left"></span>
    <span>

    		Información Institucional
    </span>
  </a>
</div>

		<?php
	}
}