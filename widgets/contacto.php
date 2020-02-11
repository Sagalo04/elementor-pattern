<?php
namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 
use Elementor\Repeater;
use Elementor\Utils; 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Boton_De_Lista_Compuesto
 *
 * Elementor widget for Boton_De_Lista_Compuesto
 *
 * @since 1.0.0
 */
class Contacto extends Widget_Base {

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
		return 'contacto';
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
		return __( 'Contacto', 'contacto' );
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
		return 'eicon-form-horizontal';
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
				'label' => __( 'Contenido', 'contacto' ),
			]
		);

        $this->add_control(
			'director',
			[
				'label' => __( 'Director', 'contacto' ),
                'type' => Controls_Manager::TEXT,              
			]
		);
        $this->add_control(
			'phone',
			[
				'label' => __( 'Telefono', 'contacto' ),
				'type' => Controls_Manager::TEXT,
			]
        );
        $this->add_control(
			'mail',
			[
				'label' => __( 'Email', 'contacto' ),
                'type' => Controls_Manager::TEXT,              
			]
        );
        $this->add_control(
			'place',
			[
				'label' => __( 'Ubicación', 'contacto' ),
				'type' => Controls_Manager::TEXT,
			]
        );
        $this->add_control(
			'schedule',
			[
				'label' => __( 'Horario de atención', 'contacto' ),
				'type' => Controls_Manager::TEXT,
			]
        );
		
        $this->end_controls_section();
        $this->start_controls_section(
			'forms_options',
			[
				'label' => __( 'Formulario', 'contacto' ),
			]
        );
        $repeater = new Repeater();

		$field_types = [
			'text' => __( 'Text', 'elementor-pro' ),
			'email' => __( 'Email', 'elementor-pro' ),
			'textarea' => __( 'Textarea', 'elementor-pro' ),
			'url' => __( 'URL', 'elementor-pro' ),
			'tel' => __( 'Tel', 'elementor-pro' ),
			'radio' => __( 'Radio', 'elementor-pro' ),
			'select' => __( 'Select', 'elementor-pro' ),
			'checkbox' => __( 'Checkbox', 'elementor-pro' ),
			'acceptance' => __( 'Acceptance', 'elementor-pro' ),
			'number' => __( 'Number', 'elementor-pro' ),
			'date' => __( 'Date', 'elementor-pro' ),
			'time' => __( 'Time', 'elementor-pro' ),
			'upload' => __( 'File Upload', 'elementor-pro' ),
			'password' => __( 'Password', 'elementor-pro' ),
			'html' => __( 'HTML', 'elementor-pro' ),
			'hidden' => __( 'Hidden', 'elementor-pro' ),
		];

		/**
		 * Forms field types.
		 *
		 * Filters the list of field types displayed in the form `field_type` control.
		 *
		 * @since 1.0.0
		 *
		 * @param array $field_types Field types.
		 */
		$field_types = apply_filters( 'elementor_pro/forms/field_types', $field_types );

		$repeater->start_controls_tabs( 'form_fields_tabs' );

		$repeater->start_controls_tab( 'form_fields_content_tab', [
			'label' => __( 'Content', 'elementor-pro' ),
		] );

		$repeater->add_control(
			'field_type',
			[
				'label' => __( 'Type', 'elementor-pro' ),
				'type' => Controls_Manager::SELECT,
				'options' => $field_types,
				'default' => 'text',
			]
		);

		$repeater->add_control(
			'field_label',
			[
				'label' => __( 'Label', 'elementor-pro' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
			]
		);

		$repeater->add_control(
			'placeholder',
			[
				'label' => __( 'Placeholder', 'elementor-pro' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'conditions' => [
					'terms' => [
						[
							'name' => 'field_type',
							'operator' => 'in',
							'value' => [
								'tel',
								'text',
								'email',
								'textarea',
								'number',
								'url',
								'password',
							],
						],
					],
				],
			]
		);

		$repeater->add_control(
			'required',
			[
				'label' => __( 'Required', 'elementor-pro' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => '',
				'conditions' => [
					'terms' => [
						[
							'name' => 'field_type',
							'operator' => '!in',
							'value' => [
								'checkbox',
								'recaptcha',
								'recaptcha_v3',
								'hidden',
								'html',
							],
						],
					],
				],
			]
		);

		$repeater->add_control(
			'field_options',
			[
				'label' => __( 'Options', 'elementor-pro' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'description' => __( 'Enter each option in a separate line. To differentiate between label and value, separate them with a pipe char ("|"). For example: First Name|f_name', 'elementor-pro' ),
				'conditions' => [
					'terms' => [
						[
							'name' => 'field_type',
							'operator' => 'in',
							'value' => [
								'select',
								'checkbox',
								'radio',
							],
						],
					],
				],
			]
		);

		$repeater->add_control(
			'allow_multiple',
			[
				'label' => __( 'Multiple Selection', 'elementor-pro' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'conditions' => [
					'terms' => [
						[
							'name' => 'field_type',
							'value' => 'select',
						],
					],
				],
			]
		);

		$repeater->add_control(
			'select_size',
			[
				'label' => __( 'Rows', 'elementor-pro' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 2,
				'step' => 1,
				'conditions' => [
					'terms' => [
						[
							'name' => 'field_type',
							'value' => 'select',
						],
						[
							'name' => 'allow_multiple',
							'value' => 'true',
						],
					],
				],
			]
		);

		$repeater->add_control(
			'inline_list',
			[
				'label' => __( 'Inline List', 'elementor-pro' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'elementor-subgroup-inline',
				'default' => '',
				'conditions' => [
					'terms' => [
						[
							'name' => 'field_type',
							'operator' => 'in',
							'value' => [
								'checkbox',
								'radio',
							],
						],
					],
				],
			]
		);

		$repeater->add_control(
			'field_html',
			[
				'label' => __( 'HTML', 'elementor-pro' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'field_type',
							'value' => 'html',
						],
					],
				],
			]
		);

		$repeater->add_responsive_control(
			'width',
			[
				'label' => __( 'Column Width', 'elementor-pro' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Default', 'elementor-pro' ),
					'100' => '100%',
					'80' => '80%',
					'75' => '75%',
					'66' => '66%',
					'60' => '60%',
					'50' => '50%',
					'40' => '40%',
					'33' => '33%',
					'25' => '25%',
					'20' => '20%',
				],
				'default' => '100',
			]
		);

		$repeater->add_control(
			'rows',
			[
				'label' => __( 'Rows', 'elementor-pro' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 4,
				'conditions' => [
					'terms' => [
						[
							'name' => 'field_type',
							'value' => 'textarea',
						],
					],
				],
			]
		);

		$repeater->add_control(
			'css_classes',
			[
				'label' => __( 'CSS Classes', 'elementor-pro' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => '',
				'title' => __( 'Add your custom class WITHOUT the dot. e.g: my-class', 'elementor-pro' ),
			]
		);

		$repeater->end_controls_tab();
        $this->add_control(
			'form_name',
			[
				'label' => __( 'Form Name', 'elementor-pro' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'New Form', 'elementor-pro' ),
				'placeholder' => __( 'Form Name', 'elementor-pro' ),
			]
		);

		$this->add_control(
			'form_fields',
			[
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'custom_id' => 'name',
						'field_type' => 'text',
						'field_label' => __( 'Name', 'elementor-pro' ),
						'placeholder' => __( 'Name', 'elementor-pro' ),
						'width' => '100',
					],
					[
						'custom_id' => 'email',
						'field_type' => 'email',
						'required' => 'true',
						'field_label' => __( 'Email', 'elementor-pro' ),
						'placeholder' => __( 'Email', 'elementor-pro' ),
						'width' => '100',
					],
					[
						'custom_id' => 'message',
						'field_type' => 'textarea',
						'field_label' => __( 'Message', 'elementor-pro' ),
						'placeholder' => __( 'Message', 'elementor-pro' ),
						'width' => '100',
					],
				],
				'title_field' => '{{{ field_label }}}',
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
        
        echo '<section class="signature ">';
        echo '<div class="signature-wrap">';
        echo '<div class="sw-info ">';
        echo '<div class="signature-logo">';
        echo '<figure>';
        echo '<img src="https://pattern.uao.edu.co/images/UAO-logo-acreditacion.png" alt="UAO">';
        echo '</figure>';
        echo '</div>';
        echo '<div class="sw-title">Universidad Autónoma de Occidente</div>';
        echo '<ul>';
        echo '<li>';
        echo '<p>Director</p>';
        echo '<div>';
        echo '<div class="circle-icon">';
        echo '<span class="icon icon-user"></span>';
        echo '</div>';
        echo '<p>'.$settings['director'].'</p>';
        echo '</div>';
        echo '</li>';
        echo '<li>';
        echo '<p>Teléfono</p>';
        echo '<div>';        
        echo '<div class="circle-icon">';
        echo '<span class="icon icon-phone"></span>';
        echo '</div>';
        echo '<p>'.$settings['phone'].'</p>';
        echo '</div>';
        echo '</li>';
        echo '<li>';
        echo '<p>Correo electrónico</p>';
        echo '<div>';
        echo '<div class="circle-icon">';
        echo '<span class="icon icon-envelope"></span>';
        echo '</div>';
        echo '<p>';
        echo '<a href="mailto:'.$settings['mail'].'" target="_top">'.$settings['mail'].'</a>';
        echo '</p>';
        echo '</div>';
        echo '</li>';
        echo '<li>';
        echo '<p>Ubicación en Campus</p>';
        echo '<div>';
        echo '<div class="circle-icon">';
        echo '<span class="icon icon-map-marker-alt"></span>';
        echo '</div>';
        echo '<p>'.$settings['place'].'</p>';
        echo '</div>';
        echo '</li>';
        echo '<li>';
        echo '<p>Horario de Atención</p>';
        echo '<div>';
        echo '<div class="circle-icon">';
        echo '<span class="icon icon-clock"></span>';
        echo '</div>';
        echo '<p>'.$settings['schedule'].'</p>';
        echo '</div>';
        echo '</li>';
        echo '</ul>';
        echo '</div>';
        echo '<div class="sw-form">';
        echo '<h5>¿Tienes algo qué contarnos?</h5>';
        echo '<p>Cuéntanos completando el siguiente formulario.</p>';
        echo '</div>';
        echo '</div>';
        echo '</section>';

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
		
        <section class="signature ">
            <div class="signature-wrap">
                <div class="sw-info ">
                    <div class="signature-logo">
                    <figure>
                    <img src="https://pattern.uao.edu.co/images/UAO-logo-acreditacion.png" alt="UAO">
                    </figure>
                    </div>
                <div class="sw-title">Universidad Autónoma de Occidente</div>
                <ul>
                    <li>
                    <p>Director</p>
                    <div>
                        <div class="circle-icon">
                            <span class="icon icon-user"></span>
                        </div>
                        <p>{{{ settings.director }}}</p>
                    </div>
                    </li>
                    <li>
                    <p>Teléfono</p>
                    <div>
                        <div class="circle-icon">
                            <span class="icon icon-phone"></span>
                         </div>
                        <p>{{{ settings.phone }}}</p>
                    </div>
                    </li>
                    <li>
                    <p>Correo electrónico</p>
                    <div>
                        <div class="circle-icon">
                            <span class="icon icon-envelope"></span>
                        </div>
                        <p>
                        <a href="mailto:{{ settings.mail }}" target="_top">{{{ settings.mail }}}</a>
                        </p>
                    </div>
                    </li>
                    <li>
                    <p>Ubicación en Campus</p>
                    <div>
                        <div class="circle-icon">
            <span class="icon icon-map-marker-alt"></span>
            </div>
                        <p>{{{ settings.place }}}</p>
                    </div>
                    </li>
                    <li>
                    <p>Horario de Atención</p>
                    <div>
                        <div class="circle-icon">
            <span class="icon icon-clock"></span>
            </div>
                        <p>{{{ settings.schedule }}}</p>
                    </div>
                    </li>
                </ul>
                </div>
                <div class="sw-form">
                <h5>¿Tienes algo qué contarnos?</h5>
                <p>Cuéntanos completando el siguiente formulario.</p>

                </div>
            </div>
</section>
                    
		<?php
	}
}
