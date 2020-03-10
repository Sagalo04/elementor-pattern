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
class Modulo_De_Perfil_Docente extends Widget_Base {

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
		return 'modulo_de_perfil_docente';
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
		return __( 'Modulo_De_Perfil_Docente', 'modulo_de_perfil_docente' );
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
				'label' => __( 'Contenido', 'modulo_de_perfil_docente' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Titulo', 'modulo_de_perfil_docente' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'category',
			[
				'label' => __( 'Categoria', 'modulo_de_perfil_docente' ),
                'type' => Controls_Manager::TEXT,              
			]
		);
        $this->add_control(
			'name',
			[
				'label' => __( 'Nombre', 'modulo_de_perfil_docente' ),
                'type' => Controls_Manager::TEXT,              
			]
        );
        $this->add_control(
			'charge',
			[
				'label' => __( 'Cargo', 'modulo_de_perfil_docente' ),
				'type' => Controls_Manager::TEXT,
			]
        );
        $this->add_control(
			'phone',
			[
				'label' => __( 'Telefono', 'modulo_de_perfil_docente' ),
				'type' => Controls_Manager::TEXT,
			]
        );
        $this->add_control(
			'mail',
			[
				'label' => __( 'Email', 'modulo_de_perfil_docente' ),
                'type' => Controls_Manager::TEXT,              
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
			'color_title',
			[
				'label' => __( 'Colores Principales', 'modulo_de_perfil_docente' ),
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
        
        echo '<div class="teacher-profile ">';
        echo '<div class="faculty">';
        echo '<p>{{{settings.title}}}</p>';
        echo '<p class="category-tag ">';
        echo 'Universidad Autónoma de Occidente';
        echo '</p>';
		echo '<p>{{{settings.category}}}</p>';
		echo '</div>';
		echo '<div class="teacher">';
		echo ' <div class="photo-info">';
		echo '<figure>';
		echo '<img src="../../../images/example-image.jpg" alt="UAO">';
		echo '</figure>';
		echo '<div class="info">';
		echo '<p class="name">{{{settings.name}}}</p>';
		echo '<p>{{{settings.charge}}}</p>';
		echo '<div class="phone">';
		echo '<div class="circle-icon">';
		echo '<span class="icon icon-phone"></span>';
		echo '</div>';
		echo '<p>{{{settings.phone}}}</p>';
		echo '</div>';
		echo '<div class="email">';
		echo '<div class="circle-icon">';
		echo '<span class="icon icon-envelope"></span>';
		echo '</div>';
		echo '<a href="">{{{settings.mail}}}</a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<a class="list-btn" href="{{settings.url}}">';
		echo '<div class="lb-text">';
		echo 'Visita la lista completa de Docentes de la Facultad';
		echo '</div>';
		echo '<div class="lb-arrow">';
		echo '<span class="icon icon-chevron-right"></span>';
		echo '</div>';
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

        <div class="teacher-profile ">
            <div class="faculty">
                <p>{{{settings.title}}}</p>
                <p class="category-tag ">
                 Universidad Autónoma de Occidente
                </p>
                <p>{{{settings.category}}}</p>
            </div>

            <div class="teacher">
                <div class="photo-info">
                    <figure>
                         <img src="../../../images/example-image.jpg" alt="UAO">
                    </figure>
                    <div class="info">
                         <p class="name">{{{settings.name}}}</p>
                         <p>{{{settings.charge}}}</p>
                        <div class="phone">
                            <div class="circle-icon">
                                <span class="icon icon-phone"></span>
                            </div>
                            <p>{{{settings.phone}}}</p>
                        </div>
                        <div class="email">
                            <div class="circle-icon">
                                <span class="icon icon-envelope"></span>
                            </div>
                            <a href="">{{{settings.mail}}}</a>
                        </div>
                    </div>
                </div>

                <a class="list-btn" href="{{settings.url}}">
                    <div class="lb-text">
                        Visita la lista completa de Docentes de la Facultad
                    </div>
                    <div class="lb-arrow">
                        <span class="icon icon-chevron-right"></span>
                    </div>
                </a>
            </div>
        </div>
         
		<?php
	}
}
