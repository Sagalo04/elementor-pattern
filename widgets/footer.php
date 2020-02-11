<?php
namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 
use Elementor\Repeater;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Boton_Principal_Con_Linea
 *
 * Elementor widget for Boton_Principal_Con_Linea
 *
 * @since 1.0.0
 */
class Footer extends Widget_Base {

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
		return 'Footer';
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
		return __( 'Footer', 'footer' );
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
		return ' eicon-section';
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
				'label' => __( 'Contenido', 'footer' ),
			]
		);

		$repeater = new Repeater();
        $repeater->add_control(
			'list_title', [
				'label' => __( 'Titulo del enlace', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'url',
			[
				'label' => __( 'url del enlace', 'footer' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'https://www.misite.com', 'footer' ),                
			]
		);
		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'footer' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Title #1', 'footer' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'footer' ),
					],
					[
						'list_title' => __( 'Title #2', 'footer' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'footer' ),
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
        echo '<footer>';
        $item = [];
        if ( $settings['list'] ) {
        echo '<ul class="footer-links">';
        foreach ( $settings['list'] as $item ) {
        echo '<li>';
        echo '<a class="secondary-btn " href="'.$item['url'].'">';
        echo $item['list_title'];
        echo '</a>';
        echo '</li>';
        }
        echo '</ul>';
        }
        echo '<div class="end">';
        echo '<div class="logos">';
        echo '<figure class="gf-figure-logo">';
        echo '<img src="https://pattern.uao.edu.co/images/UAO-logo-acreditacion.png" alt="UAO">';
        echo '</figure>';
        echo '</div>';
        echo '<div class="end-text">';
        echo '<p>Personería jurídica, Res. No. 0618, de la Gobernación del Valle del Cauca, del 20 de febrero de 1970.<br>
        Universidad Autónoma de Occidente, Res. No. 2766, del Ministerio de Educación Nacional, del 13 de noviembre de 2003.<br>
        Acreditación Institucional de Alta Calidad, Res. No. 16740, del 24 de agosto de 2017, con vigencia hasta el 2021.<br>
        Universidad Vigilada MinEducación</p>';
        echo '<p>La Universidad Autónoma de Occidente está sujeta a inspección y vigilancia por el Ministerio de Educación Nacional - Artículo 39 del decreto 1295 de 2010</p>';
        echo '</div>';
        echo '</div>';
        echo '</footer>';
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
       <footer>
       <# if ( settings.list.length ) { #>
        <ul class="footer-links">
			<# _.each( settings.list, function( item ) { #>
				<li>
                <a class="secondary-btn " href="{{ item.url }}">
                {{{ item.list_title }}}
                </a>
                </li>
			<# }); #>
			</ul>
		<# } #>
        <div class="end">
    <div class="logos">
      <figure class="gf-figure-logo">
        <img src="https://pattern.uao.edu.co/images/UAO-logo-acreditacion.png" alt="UAO">
      </figure>
    </div>

    <div class="end-text">
      <p>Personería jurídica, Res. No. 0618, de la Gobernación del Valle del Cauca, del 20 de febrero de 1970.<br>
        Universidad Autónoma de Occidente, Res. No. 2766, del Ministerio de Educación Nacional, del 13 de noviembre de 2003.<br>
        Acreditación Institucional de Alta Calidad, Res. No. 16740, del 24 de agosto de 2017, con vigencia hasta el 2021.<br>
        Universidad Vigilada MinEducación</p>

      <p>La Universidad Autónoma de Occidente está sujeta a inspección y vigilancia por el Ministerio de Educación Nacional - Artículo 39 del decreto 1295 de 2010</p>
    </div>
  </div>
</footer>

		<?php
	}
}


