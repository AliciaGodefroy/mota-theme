<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/scss/main.css' );
}

function theme_enqueue_scripts() {
    wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

function register_my_menus() {
    register_nav_menus( array(
        'header-menu' => 'Menu de navigation du header',
        'footer-menu'=> 'Menu de navigation du footer',
    ) );
}
add_action( 'after_setup_theme', 'register_my_menus' );