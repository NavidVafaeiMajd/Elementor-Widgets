<?php
/*
Plugin Name: My elementor widget
Description: a simple widget ☺
Version: 1.0
Author: youe self
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // if access to file ...
}



add_action( 'plugins_loaded', 'mew_check_elementor_dependency' );

function mew_check_elementor_dependency() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_init', function () {
            deactivate_plugins( plugin_basename( __FILE__ ) );
        });

        add_action( 'admin_notices', function () {
            echo '<div class="notice notice-error"><p><strong>The "My Elementor Widgets" plugin requires Elementor to be installed and activated.</strong></p></div>';
        });
        return;
    }


}
// reg widget
function register_my_custom_widget( $widgets_manager ) {
    require_once( __DIR__ . '/widgets/widgets.php' );
    require_once( __DIR__ . '/widgets/widget_carousel.php' );

    if(class_exists( '\My_Custom_Widget' & '\My_Custom_Widget_Carousel' ) ){
        $widgets_manager->register( new \My_Custom_Widget() );
        $widgets_manager->register( new \My_Custom_Widget_Carousel() );
    }
}




add_action( 'elementor/widgets/register', 'register_my_custom_widget' );

function elementor_test_widgets_dependencies() {

	/* Scripts */
    wp_register_script( 'gsap', 'https://unpkg.com/gsap@3/dist/gsap.min.js' , [] , null , true);
    wp_register_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true );
    wp_register_script( 'widget-script', plugins_url( '/asset/js/script.js',__FILE__) , ['gsap' , 'swiper-js'], null, true  );



	/* Styles */
	wp_register_style( 'widget-style', plugins_url( 'asset/css/style.css', __FILE__ ) );
    wp_register_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css' );


}
add_action( 'wp_enqueue_scripts', 'elementor_test_widgets_dependencies' );
