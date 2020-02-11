<?php
namespace ElementorPatternUao;

use Elementor\Elements_Manager; 


/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Category {

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
	 * Register category
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'pattern-uao',
			[
				'title' => __( 'Pattern UAO', 'elementor-pattern-uao' ),
				'icon' => 'fa fa-plug',
			]
		);
		
	
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

		add_action( 'elementor/elements/categories_registered', [ $this,'add_elementor_widget_categories'] );


		
	}

	
}

// Instantiate Plugin Class
Category::instance();
