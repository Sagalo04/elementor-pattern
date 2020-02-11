<?php
namespace ElementorPatternUao\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils; 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Boton_Principal_Con_Linea
 *
 * Elementor widget for Boton_Principal_Con_Linea
 *
 * @since 1.0.0
 */
class Header extends Widget_Base {

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
		return 'Header';
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
		return __( 'Header', 'header' );
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
		return 'eicon-site-title';
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

    private function get_available_menus() {
		$menus = wp_get_nav_menus();

		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
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
				'label' => __( 'Contenido', 'header' ),
			]
        );
        
        $this->add_control(
			'image',
			[
				'label' => __( 'Logo', 'header' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        $menus = $this->get_available_menus();

		if ( ! empty( $menus ) ) {
			$this->add_control(
				'menu',
				[
					'label' => __( 'Menu', 'header' ),
					'type' => Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys( $menus )[0],
					'save_default' => true,
					'separator' => 'after',
					'description' => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'header' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		} else {
			$this->add_control(
				'menu',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . __( 'There are no menus in your site.', 'header' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'header' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' => 'after',
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}
		
        
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
      

        $args = [
			'echo' => true,
			'menu' => $settings['menu'],
            'menu_class' => '',
            'menu_id'=> 'list-menu',
		];
		$args1 = [
			'echo' => true,
			'menu' => $settings['menu'],
            'menu_class' => '',
            'menu_id'=> 'list-menu-mobile',
		];
		
		// General Menu.
		echo '<script>
		function myFunction() {
			var element = document.getElementById("list-menu");
			element.classList.add("li-elements");
		  }
		  ';
		echo '</script>';
		echo '<style onload="myFunction()">
		#header-menu-desktop #hmd-bottom #hmdb-logo-container #hmdb-logo{
			background:url("'.$settings['image']['url'].'") no-repeat;
			background-size: contain;
			margin: 1.625rem auto;
			width: auto;

		}
		#header-menu-desktop #hmd-bottom.scroll #hmdb-logo-container #hmdb-logo{
			background:url("'.$settings['image']['url'].'") no-repeat;
			background-size: contain;
			margin: 1.625rem auto;
			width: 5.4375rem;
		}
		#header-menu-desktop #hmd-bottom div > ul {
			-ms-flex-align: center;
			align-items: center;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: space-evenly;
			justify-content: space-evenly;
			list-style: none;
			position: initial;
			width: 100%;
		}
		.li-elements li{
			-ms-flex-align: center;
			align-items: center;
			display: -ms-flexbox;
			display: flex;
			height: 100%;
			padding: 0 .75rem;
		}
		.li-elements li .sub-menu li{
			z-index: -1;
			opacity: 0;
		}
		.li-elements li{
			font-size:1rem;
		}
		.sub-menu{
			display: flex;
			position: absolute;
			top: 6.25rem;
			left:0;
			transition: all .4s ease-in-out;
			width: 100%;
			z-index: -1;
		}
		.scroll .sub-menu{
			opacity: 0;
			top: 5.25rem;
			transition: none;
		}
		.li-elements li:hover>.sub-menu{
			transform: translateY(-.625rem);
			z-index: 1;
			background-color: #000;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			-ms-flex-pack: center;
			justify-content: center;
			left: 0;
			padding: 1.125rem 5rem .875rem;
			
		}
		.scroll .li-elements li:hover>.sub-menu{
			transform: translateY(-.625rem);
			transition: all .4s ease-in-out;
			opacity: 1;
			z-index: 1;
			background-color: #000;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-direction: column;
			flex-direction: column;
			-ms-flex-pack: center;
			justify-content: center;
			left: 0;
			padding: 1.125rem 5rem .875rem;
		}
		.scroll .li-elements li:hover>.sub-menu li{
			border-bottom: .0625rem solid #d1d1d1;
			opacity: 1;
		}
		.li-elements li:hover>.sub-menu li{
			border-bottom: .0625rem solid #d1d1d1;
			opacity: 1;
		}
		
		
		.menu-menu-1-container{
			width:100%;
			display:flex;
		}
		#header-menu-desktop #hmd-bottom div>ul li:nth-child(2n):hover{
			background-color: #666;
		}
		#header-menu-desktop #hmd-bottom div>ul li:hover{
			background-color: #000;
		}
		#header-menu-desktop #hmd-bottom div>ul li a{
			color: #000;
		}
		#header-menu-desktop #hmd-bottom div>ul li:nth-child(2n):hover a{
			color: #fff;
		}
		#header-menu-desktop #hmd-bottom div>ul li:hover a{
			color: #fff;
		}
		.fixed{
			position: fixed;
		}
		.scroll{
			height: 4.625rem;
		}
		
		
		';
		echo '</style>';
		/** style mobile */
		echo '<style>
		#header-menu-mobile #hmm-bottom .hmmb-principal {
			background-color: #f4f4f4;
			padding: .375rem 0 1.625rem;
			width: 100%;
		}
		#header-menu-mobile #hmm-top .hmmt-logo figure {
			width: 10rem;
		}
		#header-menu-mobile #hmm-bottom .hmmb-principal li{
			color: #363636;
			font-size: 1.0625rem;
			font-weight: 500;
			letter-spacing: normal;
			padding: 1rem .25rem .75rem 0;
			width: 100%;
			display:flex;
			border-bottom: .0625rem solid #d1d1d1;
    		margin-left: 1rem;
		}
		#header-menu-mobile #hmm-bottom .hmmb-principal li a{
			color: #363636;
			font-size: 1.0625rem;
			font-weight: 500;
			letter-spacing: normal;
			padding: .25rem;
			width: 100%;
		}
		#header-menu-mobile #hmm-top a{
			width:90%;
		}
		#header-menu-mobile #hmm-bottom .hmmb-principal li .hmmbpt-dropbtn {
			-ms-flex-align: center;
			align-items: center;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-pack: center;
			justify-content: center;
			width: 3.75rem;
			min-width: 3.75rem;
		}
		#header-menu-mobile #hmm-bottom .hmmb-principal li a.hmmbpt-dropbtn span {
			color: #9e0b0f;
			font-size: 1.5rem;
			transition: transform .6s ease;
		}
		
		';
		echo '</style>';

		/** Render menu desktop */
		echo '<Header id="header-menu-desktop">';
		 echo '<div id="hmd-bottom">';
			echo '<span class="hmdb-line-left"></span>';
			echo '<span class="hmdb-line-right"></span>';
			echo '<div id="hmdb-logo-container">';
			echo '<a id="hmdb-logo" href="'.get_site_url().'"></a>';
			echo '</div>';
		$menu_html = wp_nav_menu( $args );
		echo '</div>';
		echo '</Header>';
		echo '<script>
		window.addEventListener("scroll",()=>{
			var scroll = window.scrollY;
			if(scroll > 200){
				var element = document.getElementById("header-menu-desktop");
				var element1 = document.getElementById("hmd-bottom");
				element.classList.add("fixed");
				element1.classList.add("scroll");
			}
			else{
				var element = document.getElementById("header-menu-desktop");
				var element1 = document.getElementById("hmd-bottom");
				element.classList.remove("fixed");
				element1.classList.remove("scroll");
			}
		})
		
		  </script>';

		  /**Redender Menu mobile */
		  echo '<header id="header-menu-mobile" class="fixed">';
		  echo '<div id="hmm-top">';
			echo '<span class="hmmt-line"></span>';
			echo '<a href="#" id="hmmt-menu-icon" onclick="openMenu()" onload="arrow()">';
			  echo '<span class="icon icon-hamburguesa" ></span>';
			  echo '<p>Menú</p>';
			echo '</a>';
			echo '<a href="#" class="hmmt-logo">';
			  echo '<figure class="gf-figure-logo"">';
				echo '<img src="'.$settings['image']['url'].'" alt="UAO">';
			  echo '</figure>';
			echo '</a>';
			echo '<div id="hmm-bottom">';
			echo '<a href="#" id="hmmb-menu-icon-close" onclick="closeMenu()">';
			echo '<div class="circle-icon">';
			echo '<span class="icon icon-close"></span>';
			echo '</div>';
				echo '<p>Cerrar</p>';
			echo '</a>';
			$menu_html = wp_nav_menu( $args1 );
			echo '</div>';
			echo '</header>';

			echo '<script>
			function arrow(){
				var el = document.querySelectorAll(".hmmb-principal li");
			
				el.forEach(function(userItem) {
					userItem.innerHTML +="<a class="+"hmmbpt-dropbtn"+"><span class="+"icon-angle-right"+"></span></a>";
				  });
			}
		function openMenu() {
			if(screen.width < 1250){
				var element1 = document.getElementById("list-menu-mobile");
				element1.classList.add("hmmb-principal");
				var element1 = document.getElementById("hmm-bottom");
				element1.classList.add("hmm-open");
				
			}
			
		  }
		  function closeMenu() {
			if(screen.width < 1250){
				var element1 = document.getElementById("hmm-bottom");
				element1.classList.remove("hmm-open");
			}
		  }
		  ';
		echo '</script>';
		  
		  
        
	}

	/*
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 
	protected function _content_template() {
		?>
		<script>
		function myFunction() {
			var element = document.getElementById("list-menu");
			element.classList.add("li-elements");
		  }
		</script>;
       <!--<footer>
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
-->

		<?php
	}*/
}


