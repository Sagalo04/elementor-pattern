<?php
/**
 * Plugin Name: Elementor Pattern Uao
 * Description: Widget elementor with styles from pattern uao
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Heimer Humberto Martinez && Andrés Felipe Robin
 * Author URI:  https://elementor.com/
 * Text Domain: elementor-pattern-uao
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Elementor Pattern Uao Class
 *
 * The init class that runs the Hello World plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * You should only modify the constants to match your plugin's needs.
 *
 * Any custom code should go inside Plugin Class in the plugin.php file.
 * @since 1.2.0
 */
final class Elementor_Pattern_Uao{

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.2.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.2.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Load translation
		add_action( 'init', array( $this, 'i18n' ) );

		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 * Fired by `init` action hook.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'elementor-pattern-uao' );
	}

	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'plugin.php' );
		require_once( 'category.php' );		

	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elementor-pattern-uao' ),
			'<strong>' . esc_html__( 'Elementor Pattern Uao', 'elementor-pattern-uao' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-pattern-uao' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-pattern-uao' ),
			'<strong>' . esc_html__( 'Elementor Pattern World', 'elementor-pattern-uao' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-pattern-uao' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-pattern-uao' ),
			'<strong>' . esc_html__( 'Elementor Pattern Uao', 'elementor-pattern-uao' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'elementor-pattern-uao' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
}
function roboto_font(){
	echo '<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed%7CRoboto+Slab:300,400,700%7CRoboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">';
  }
  
  add_action( 'wp_head', 'roboto_font');

function pattern_styles() {
	wp_enqueue_style( 'pattern-styles-uao', plugins_url( '/assets/css/style.css', __FILE__) );
	wp_enqueue_style( 'pattern-styles-uao1', plugins_url( '/assets/css/style-ui.css', __FILE__) );
	wp_enqueue_style( 'pattern-styles-uao2', plugins_url( '/assets/css/style-pattern.css', __FILE__) );
	
	
	wp_enqueue_script('jquery3', plugins_url('/elementor-pattern-uao/assets/js/jquery-1.12.4.min.js'), array(), null, true); 
	wp_enqueue_script('jquery2', plugins_url('/elementor-pattern-uao/assets/js/jquery-ui.min.js'), array(), null, true); 
	wp_enqueue_script('jquery1', plugins_url('/elementor-pattern-uao/assets/js/form.js'), array(), null, true); 
	wp_enqueue_script('jquery', plugins_url('/elementor-pattern-uao/assets/js/scripts.min.js'), array(), null, true );

}
add_action( 'wp_enqueue_scripts', 'pattern_styles' );




// Instantiate Elementor_Hello_World.
new Elementor_Pattern_Uao();
