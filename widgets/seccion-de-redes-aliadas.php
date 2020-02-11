<?php
namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 
use Elementor\Utils; 
use Elementor\Repeater;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Boton_De_Lista_Compuesto
 *
 * Elementor widget for Boton_De_Lista_Compuesto
 *
 * @since 1.0.0
 */
class Seccion_De_Redes_Aliadas extends Widget_Base {

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
		return 'seccion-de-redes-aliadas';
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
		return __( 'Seccion de redes aliadas', 'seccion-de-redes-aliadas' );
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
		return 'eicon-slideshow';
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
				'label' => __( 'Contenido', 'seccion-de-redes-aliadas' ),
			]
        );
       
        $repeater = new Repeater();
        $repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		
        $repeater->add_control(
			'image',
			[
				'label' => __( 'Imagen', 'seccion-de-redes-aliadas' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'url',
			[
				'label' => __( 'url de la imágen', 'seccion-de-redes-aliadas' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'https://www.misite.com', 'seccion-de-redes-aliadas' ),                
			]
		);
		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'seccion-de-redes-aliadas' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Title #1', 'seccion-de-redes-aliadas' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'seccion-de-redes-aliadas' ),
					],
					[
						'list_title' => __( 'Title #2', 'seccion-de-redes-aliadas' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'seccion-de-redes-aliadas' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
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
        $item = [];
        if ( $settings['list'] ) {
            echo '<section class="allied-networks">';
                echo '<div class="allied-universities">';
            foreach ( $settings['list'] as $item ) {
                echo '<figure class="university">';
                echo '<a href="'.$item['url'].'">';
                echo '<img src="'.$item['image']['url'].'" alt="'.$item['list_title'].'">';
                echo '</a>';
                echo '</figure>';
            }
            echo '</div>';
            echo '</section>';
        }
        
                
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
		<# if ( settings.list.length ) { #>
            <section class="allied-networks">
                <div class="allied-universities">
			<# _.each( settings.list, function( item ) { #>
				<figure class="university">
                <a href="{{ item.url }}">
                <img src="{{ item.image.url }}" alt="{{ item.list_title }}">
                </a>
                </figure>
			<# }); #>
			</div>
            </section>
		<# } #>
		<?php
        
	}
}
