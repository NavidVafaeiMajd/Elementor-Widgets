<?php
/*
Plugin Name: ویجت المنتوری من
Description: یه ویجت ساده برای المنتور
Version: 1.0
Author: خودت
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // اگه مستقیم به فایل دسترسی پیدا کردن، خارج شو
}

// ثبت ویجت
function register_my_custom_widget( $widgets_manager ) {
    require_once( __DIR__ . '/widgets/widgets.php' );
    if(class_exists( '\My_Custom_Widget' ) ){
        $widgets_manager->register( new \My_Custom_Widget() );;
    }
}
add_action( 'elementor/widgets/register', 'register_my_custom_widget' );

function elementor_test_widgets_dependencies() {

	/* Scripts */
	wp_register_script( 'widget-script', plugins_url( 'asset/js/script.js', __FILE__ ) );
	/* Styles */
	wp_register_style( 'widget-style', plugins_url( 'asset/css/style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'elementor_test_widgets_dependencies' );
