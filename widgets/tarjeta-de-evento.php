<?php
namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//hello
/**
 * Elementor Tarjeta_De_Evento
 *
 * Elementor widget for Tarjeta_De_Evento
 *
 * @since 1.0.0
 */
class Tarjeta_De_Evento extends Widget_Base {
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
		return 'Tarjeta_De_Evento';
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
		return __( 'Tarjeta_De_Evento', 'tarjeta_de_evento' );
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
				'label' => __( 'Contenido', 'tarjeta_de_evento' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Titulo', 'tarjeta_de_evento' ),
				'type' => Controls_Manager::TEXT,
			]
        );
        $this->add_control(
			'url',
			[
				'label' => __( 'Enlace del botón', 'tarjeta_de_evento' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'https://www.misite.com', 'tarjeta_de_evento' ),                
			]
        );
        $this->add_control(
			'phone',
			[
				'label' => __( 'Telefono', 'tarjeta_de_evento' ),
				'type' => Controls_Manager::TEXT,
			]
        );
		
        $this->add_control(
			'color_title',
			[
				'label' => __( 'Colores Principales', 'tarjeta_de_evento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'Rojo-principal-1',
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
        
        echo '<div class="event-card ">';
        echo '<a href="">';
        echo '<div class="shadowy-top">';
        echo '<div class="ec-top">';
        echo '<p>Martes - <span>14</span> -</p>';
        echo '<p>Octubre</p>';
        echo '<p>- 2019 -</p>';
        echo '</div>';
        echo '<p class="category-tag ">';
        echo 'Facultad de Humanidades y Artes';
        echo '</p>';
        echo '</div>';
        echo '<div class="ec-bottom ">';
        echo '<div class="circle-icon">';
        echo '<div class="ecb-end-date">Termina el 24 de Octubre</div>';
        echo '<div class="ecb-title">Exposición fotográfica 'Casi nada no es un autorretrato'</div>';
        echo '</div>';
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
		
		<div class="event-card ">
  			<a href="">
    			<div class="shadowy-top">
     				 <div class="ec-top">
        				<p>Martes - <span>14</span> -</p>
        				<p>Octubre</p>
       					<p>- 2019 -</p>
      				</div>
     				<p class="category-tag ">

 					Facultad de Humanidades y Artes
					</p>
    			</div>
    			<div class="ec-bottom ">
      			<div class="ecb-end-date">Termina el 24 de Octubre</div>
      			<div class="ecb-title">Exposición fotográfica 'Casi nada no es un autorretrato'</div>
    			</div>
  			</a>
		</div>
                    
		<?php
	}
}