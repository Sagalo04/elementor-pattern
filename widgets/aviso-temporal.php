<?php
namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 

//fffff

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Boton_De_Enlace_Con_Imagen
 *
 * Elementor widget for Boton_De_Enlace_Con_Imagen.
 *
 * @since 1.0.0
 */
class Aviso_Temporal extends Widget_Base {

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
		return 'aviso-temporal';
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
		return __( 'Aviso temporal', 'aviso-temporal' );
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
		return 'eicon-posts-ticker';
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
				'label' => __( 'Contenido', 'aviso-temporal' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Titulo', 'aviso-temporal' ),
				'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Estamos en inscripciones de ...', 'aviso-temporal' ),                
			]
        );
        $this->add_control(
			'url',
			[
				'label' => __( 'Enlace del botón', 'aviso-temporal' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'https://www.misite.com', 'aviso-temporal' ),                
			]
        );
        
		$this->add_control(
			'body',
			[
				'label' => __( 'Texto del botón', 'aviso-temporal' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Inscríbete aquí', 'aviso-temporal' ),                
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
			'title_color',
			[
				'label' => __( 'Color de fondo', 'aviso-temporal' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
				'default' => '#c4161c',
			]
		);
		$this->add_control(
			'text_sup_color',
			[
				'label' => __( 'Color de texto superior', 'aviso-temporal' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
				'default' => '#363636',
			]
		);
		$this->add_control(
			'text_inf_color',
			[
				'label' => __( 'Color de texto inferior', 'aviso-temporal' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
				'default' => '#fff',
			]
		);
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);

		$this->add_control(
			'more_options_text',
			[
				'label' => __( 'Colores', 'boton-de-enlace-con-imagen' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'color_title',
			[
				'label' => __( 'Colores Principales', 'boton-de-enlace-con-imagen' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'Blanco',
				'options' => [
					'Rojo-principal-1'  => 'Rojo-principal-1',
					'Negro' => 'Negro',
					'Blanco' => 'Blanco',
					'Rojo-2'  => 'Rojo-2',
					'Rojo-3' => 'Rojo-3',
					'Rojo-4' => 'Rojo-4',
					'Rojo-5'  => 'Rojo-5',
					'Rojo-6' => 'Rojo-6',
					'Rojo-7' => 'Rojo-7',
					'Gris-1'  => 'Gris-1',
					'Gris-2' => 'Gris-2',
					'Gris-3' => 'Gris-3',
					'Gris-4' => 'Gris-4',
					'Gris-5' => 'Gris-5',
					'Rojizo-1'  => 'Rojizo-1',
					'Rojizo-2' => 'Rojizo-2',
					'Rojizo-3' => 'Rojizo-3',
					'Rojizo-4'  => 'Rojizo-4',
					'Morado-1'  => 'Morado-1',
					'Morado-2' => 'Morado-2',
					'Morado-3' => 'Morado-3',
					'Morado-4'  => 'Morado-4',
					'Azul-1'  => 'Azul-1',
					'Azul-2' => 'Azul-2',
					'Azul-3' => 'Azul-3',
					'Azul-4'  => 'Azul-4',
					'Verde-1'  => 'Verde-1',
					'Verde-2' => 'Verde-2',
					'Verde-3' => 'Verde-3',
					'Verde-4'  => 'Verde-4',
					'Naranja-1'  => 'Naranja-1',
					'Naranja-2' => 'Naranja-2',
					'Naranja-3' => 'Naranja-3',
					'Naranja-4'  => 'Naranja-4',
					'Verde-claro-1'  => 'Verde-claro-1',
					'Verde-claro-2' => 'Verde-claro-2',
					'Verde-claro-3' => 'Verde-claro-3',
					'Verde-claro-4'  => 'Verde-claro-4',
					'Amarillo-1'  => 'Amarillo-1',
					'Amarillo-2' => 'Amarillo-2',
					'Amarillo-3' => 'Amarillo-3',
					'Amarillo-4'  => 'Amarillo-4',
					'Naranja-sinapsis-1'  => 'Naranja-sinapsis-1',
					'Naranja-sinapsis-2' => 'Naranja-sinapsis-2',
					'Naranja-sinapsis-3' => 'Naranja-sinapsis-3',
					'Naranja-sinapsis-4'  => 'Naranja-sinapsis-4',
					'Purpura-sinapsis-1'  => 'Purpura-sinapsis-1',
					'Purpura-sinapsis-2' => 'Purpura-sinapsis-2',
					'Purpura-sinapsis-3' => 'Purpura-sinapsis-3',
					'Purpura-sinapsis-4'  => 'Purpura-sinapsis-4',
					'Gris-sinapsis-1'  => 'Gris-sinapsis-1',
					'Gris-sinapsis-2' => 'Gris-sinapsis-2',
					'Gris-sinapsis-3' => 'Gris-sinapsis-3',
					'Gris-sinapsis-4'  => 'Gris-sinapsis-4',
					
				],
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Color de linea', 'elementor' ),
			]
		);
		/* Colores principales */
		$this->add_control(
			'more_options',
			[
				'label' => __( 'Colores', 'boton-de-enlace-con-imagen' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'color1',
			[
				'label' => __( 'Colores Principales', 'boton-de-enlace-con-imagen' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '#ed1d24',
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
		
		echo '<style>
		.'.$settings['color_title'].':before{
			border: .0625rem solid'.$settings['color1'].';
		}
		.temporary-notice .'.$settings['color_title'].':before{
			background-color: '.$settings['color1'].';
		}
		.temporary-notice .'.$settings['color_title'].':after{
			background-color: '.$settings['color1'].';
		}
		a.secondary-btn.dark-background{
			color:'.$settings['text_inf_color'].';
		}
		</style>';
            
        echo '<div class="temporary-notice '.$settings['color_title'].'" style="background-color:transparent !important">';
        echo '<div class="tn-top '.$settings['color_title'].'" style="color:'.$settings['text_sup_color'].'">'.$settings['title'].'<span> </span></div>';
        echo '<div class="tn-bottom" style="background-color:'.$settings['title_color'].'">';
        echo '<a class="secondary-btn dark-background white-arrow" href="'.$settings['url'].'">';
        echo $settings['body'];
        echo '</a>';
        echo '</div>';
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
		<style>
		.{{{ settings.color_title }}}:before{
			border: .0625rem solid {{{settings.color1}}};
		}
		.temporary-notice .{{{ settings.color_title }}}:before{
			background-color: {{{settings.color1}}};
		}
		.temporary-notice .{{{ settings.color_title }}}:after{
			background-color: {{{settings.color1}}};
		}
		a.secondary-btn.dark-background{
			color:{{{settings.text_inf_color}}};
		}
		</style>
        <div class="temporary-notice {{ settings.color_title }}" style="background-color:transparent !important">
        <div class="tn-top {{ settings.color_title }}" style="color:{{settings.text_sup_color}}">{{{ settings.title }}}<span> </span></div>
        <div class="tn-bottom" style="background-color:{{settings.title_color}}">
        <a class="secondary-btn dark-background white-arrow" href="{{settings.url}}">
		{{{ settings.body }}}
        </a>
        </div>
        </div>
		
		<?php
	}
}
