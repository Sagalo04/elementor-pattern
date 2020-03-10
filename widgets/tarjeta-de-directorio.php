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
class Tarjeta_De_Directorio extends Widget_Base {

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
		return 'tarjeta-de-directorio';
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
		return __( 'Tarjeta De Directorio', 'tarjeta-de-directorio' );
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
				'label' => __( 'Contenido', 'tarjeta-de-directorio' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Titulo', 'tarjeta-de-directorio' ),
				'type' => Controls_Manager::TEXT,
			]
        );
        $this->add_control(
			'director',
			[
				'label' => __( 'Director', 'tarjeta-de-directorio' ),
                'type' => Controls_Manager::TEXT,              
			]
		);
        $this->add_control(
			'phone',
			[
				'label' => __( 'Telefono', 'tarjeta-de-directorio' ),
				'type' => Controls_Manager::TEXT,
			]
        );
        $this->add_control(
			'mail',
			[
				'label' => __( 'Email', 'tarjeta-de-directorio' ),
                'type' => Controls_Manager::TEXT,              
			]
		);
		
        $this->add_control(
			'color_title',
			[
				'label' => __( 'Colores Principales', 'tarjeta-de-directorio' ),
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
        
        echo '<article class="directory-card" style="margin:0 auto">';
        echo '<header class="'.$settings['color_title'].'">';
        echo '<h1>'.$settings['title'].'</h1>';
        echo '</header>';
        echo '<p>';
        echo '<strong>Director</strong>';
        echo '<br>';
        echo  $settings['director'];
        echo '</p>';
        echo '<section class="set-icon">';
        echo '<div class="circle-icon">';
        echo '<span class="icon icon-phone"></span>';
        echo '</div>';
        echo $settings['phone'];
        echo '</section>';
        echo '<section class="set-icon">';
        echo '<div class="circle-icon">';
        echo '<span class="icon icon-envelope"></span>';
        echo '</div>';
        echo '<a href="mailto:'.$settings['mail'].'">'.$settings['mail'].'</a>';
        echo '</section>';
        echo '</article>';

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
		
        <article class="directory-card" style="margin:0 auto">
            <header class="{{settings.color_title}}">   
                <h1>{{{settings.title}}}</h1>
            </header>
            <p>
                <strong>Director</strong>
                <br>
                {{{settings.director}}}
            </p>
            <section class="set-icon">
                <div class="circle-icon">
            <span class="icon icon-phone"></span>
            </div>
            {{{settings.phone}}}
            </section>
            <section class="set-icon">
                <div class="circle-icon">
            <span class="icon icon-envelope"></span>
            </div>
                <a href="mailto:{{settings.mail}}">{{{settings.mail}}}</a>
            </section>
            </article>
              
		<?php
	}
}
