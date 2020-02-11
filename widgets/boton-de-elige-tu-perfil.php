<?php
namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Boton_Principal_Con_Linea
 *
 * Elementor widget for Boton_Principal_Con_Linea
 *
 * @since 1.0.0
 */
class Boton_De_Elige_Tu_Perfil extends Widget_Base {

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
		return 'Boton-De-Elige-Tu-Perfil';
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
		return __( 'Botón de elige tu perfil', 'Boton-De-Elige-Tu-Perfil' );
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
		return 'eicon-user-circle-o';
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
				'label' => __( 'Contenido', 'boton-de-elige-tu-perfil' ),
			]
		);
        $this->add_control(
			'icon_list',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'text' => __( 'List Item #1', 'boton-de-elige-tu-perfil' ),
					],
					[
						'text' => __( 'List Item #2', 'boton-de-elige-tu-perfil' ),
					],
					[
						'text' => __( 'List Item #3', 'boton-de-elige-tu-perfil' ),
					],
				],
				'fields' => [
					[
						'name' => 'text',
						'label' => __( 'Text', 'boton-de-elige-tu-perfil' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'List Item', 'boton-de-elige-tu-perfil' ),
						'default' => __( 'List Item', 'boton-de-elige-tu-perfil' ),
                    ],
                    [
						
						'name' => 'icon',
						'label' => __( 'Icon', 'elementor' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-check',
					],
					[
						'name' => 'link',
						'label' => __( 'Link', 'boton-de-elige-tu-perfil' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'http://your-link.com', 'boton-de-elige-tu-perfil' ),
					],
				],
				'title_field' => '<i class="eicon-editor-link" aria-hidden="true"></i> {{{ text }}}',
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
          
        

        echo '<button class="profile-btn ">';
        echo '<div class="pb-circle">';
        echo '<div>';
        echo '<span class="icon icon-hand-point-up"></span>';
        echo '</div>';
        echo '</div>';
        echo '<div class="pb-rectangle">Elige tu perfil</div>';
        echo '</button>';
        
        echo '<div id="hmd-profile-dropdown">';
        echo '<div class="hmdpd-wrap">';
        echo '<a id="hmdpdw-close" href="">';
        echo '    <div class="circle-icon">';
        echo '<span class="icon icon-close"></span>';
        echo '</div>';
        echo '</a>';
        echo '<div class="hmdpdw-container">';
        echo '    <h1>Elige tu perfil</h1>';
        echo '    <span>Selecciona uno de los perfiles y encuentra información de tu interés.</span>';
        echo '    <ul>';
        echo '    <a href="">';
        echo '        <li>';
        echo '        <div class="circle-icon">';
        echo '<span class="icon icon-user-plus"></span>';
        echo '</div>';
        echo '        <p>Aspirante</p>';
        echo '        </li>';
        echo '    </a>';
        echo '    <a href="">';
        echo '        <li>';
        echo '        <div class="circle-icon">';
        echo '<span class="icon icon-users"></span>';
        echo '</div>';
        echo '        <p>Estudiante</p>';
        echo '        </li>';
        echo '    </a>';
        echo '    <a href="">';
        echo '        <li>';
        echo '        <div class="circle-icon">';
        echo '<span class="icon icon-graduation-cap"></span>';
        echo '</div>';
        echo '        <p>Egresado</p>';
        echo '        </li>';
        echo '    </a>';
        echo '    <a href="">';
        echo '        <li>';
        echo '        <div class="circle-icon">';
        echo '<span class="icon icon-book"></span>';
        echo '</div>';
        echo '        <p>Docente</p>';
        echo '        </li>';
        echo '    </a>';
        echo '    <a href="">';
        echo '        <li>';
        echo '        <div class="circle-icon">';
        echo '<span class="icon icon-address-card"></span>';
        echo '</div>';
        echo '        <p>Colaborador</p>';
        echo '        </li>';
        echo '    </a>';
        echo '    <a href="">';
        echo '        <li>';
        echo '        <div class="circle-icon">';
        echo '<span class="icon icon-university"></span>';
        echo '</div>';
        echo '         <p>Entidad</p>';
        echo '        </li>';
        echo '      </a>';
        echo '     </ul>';
        echo ' </div>';
        echo '  </div>';
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

                <button class="profile-btn ">
                <div class="pb-circle">
                    <div>
                    <span class="icon icon-hand-point-up"></span>
                    </div>
                </div>
                <div class="pb-rectangle">Elige tu perfil</div>
                </button>
                
                <div id="hmd-profile-dropdown" class="active">
    <div class="hmdpd-wrap">
      <a id="hmdpdw-close" href="">
        <div class="circle-icon">
  <span class="icon icon-close"></span>
</div>
      </a>
      <div class="hmdpdw-container">
        <h1>Elige tu perfil</h1>
        <span>Selecciona uno de los perfiles y encuentra información de tu interés.</span>
        <ul>
          <a href="">
            <li>
              <div class="circle-icon">
  <span class="icon icon-user-plus"></span>
</div>
              <p>Aspirante</p>
            </li>
          </a>
          <a href="">
            <li>
              <div class="circle-icon">
  <span class="icon icon-users"></span>
</div>
              <p>Estudiante</p>
            </li>
          </a>
          <a href="">
            <li>
              <div class="circle-icon">
  <span class="icon icon-graduation-cap"></span>
</div>
              <p>Egresado</p>
            </li>
          </a>
          <a href="">
            <li>
              <div class="circle-icon">
  <span class="icon icon-book"></span>
</div>
              <p>Docente</p>
            </li>
          </a>
          <a href="">
            <li>
              <div class="circle-icon">
  <span class="icon icon-address-card"></span>
</div>
              <p>Colaborador</p>
            </li>
          </a>
          <a href="">
            <li>
              <div class="circle-icon">
  <span class="icon icon-university"></span>
</div>
              <p>Entidad</p>
            </li>
          </a>
        </ul>
      </div>
    </div>
  </div>



		<?php
	}
}
