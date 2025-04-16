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
    $widgets_manager->register( new \My_Custom_Widget() );
}
add_action( 'elementor/widgets/register', 'register_my_custom_widget' );