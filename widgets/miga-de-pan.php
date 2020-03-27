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
            echo '<a href="#">'.dimox_breadcrumbs().'</a>';
			echo '</div>';

            echo '<div class="breadcrumb-mobile">';
            echo   '<a href="#">';
            echo '<span class="icon icon-angle-left"></span>';
            echo '<span>';
            
            echo         dimox_breadcrumbs();
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
  <a href="#"><?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?> </a>
</div>

<div class="breadcrumb-mobile">
  <a href="#">
    <span class="icon icon-angle-left"></span>
    <span>
	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?> 
    </span>
  </a>
</div>

		<?php
	}
}