<?php
namespace ElementorPatternUao;

//hola
/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {
	


	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}


	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/boton-de-enlace-con-imagen.php' );
		require_once( __DIR__ . '/widgets/boton-de-lista-simple.php' );
		require_once( __DIR__ . '/widgets/boton-de-lista-compuesto.php' );
		require_once( __DIR__ . '/widgets/boton-principal-con-linea.php' );
		require_once( __DIR__ . '/widgets/boton-de-elige-tu-perfil.php' );
		require_once( __DIR__ . '/widgets/hero-primera-seccion.php' );
		require_once( __DIR__ . '/widgets/aviso-temporal.php' );
		require_once( __DIR__ . '/widgets/boton-de-lista-compuesto-con-imagen.php' );
		require_once( __DIR__ . '/widgets/ultimas-noticias.php' );
		require_once( __DIR__ . '/widgets/seccion-de-redes-aliadas.php' );
		require_once( __DIR__ . '/widgets/tarjeta-de-directorio.php' );
		require_once( __DIR__ . '/widgets/boton-principal.php' );
		require_once( __DIR__ . '/widgets/boton-secundario.php' );
		require_once( __DIR__ . '/widgets/footer.php' );
		require_once( __DIR__ . '/widgets/contacto.php' );
		require_once( __DIR__ . '/widgets/header.php' );
		require_once( __DIR__ . '/widgets/modulo_de_perfil_docente.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Boton_Principal() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Boton_Secundario() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Boton_Principal_Con_Linea() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Boton_De_Enlace_Con_Imagen() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Boton_De_Lista_Simple() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Boton_De_Lista_Compuesto() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Boton_De_Elige_Tu_Perfil() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Boton_De_Lista_Compuesto_Con_Imagen() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Hero_Primera_Seccion() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Aviso_Temporal() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Ultimas_Noticias() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Seccion_De_Redes_Aliadas() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Tarjeta_De_Directorio() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Contacto() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Footer() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Header() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Modulo_De_Perfil_Docente() );
				
	}
	

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		//add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		

		
	}

	
}

// Instantiate Plugin Class
Plugin::instance();
