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

add_theme_support( 'post-thumbnails' );

//---------- LOAD MORE BUTTON

function enqueue_jquery() {
    wp_enqueue_script('jquery');
    wp_localize_script('jquery', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_jquery');


function load_more() {
    $taxonomie = 'category'; // Remplacez par le nom de la taxonomie que vous souhaitez filtrer

    $args = array(
        'post_type' => 'photos',
        'posts_per_page' => 12,
        'paged' => 1,
    );

    $myQuery = new WP_Query($args);
    ?>
    <div class="section-photos_wrp">
        <?php foreach ($myQuery->posts as $post) : ?>
            <?php get_template_part('template_parts/photo-block', null, ['post'=>$post]); ?>
        <?php endforeach; ?>
    </div>
    <?php wp_reset_postdata();?>
    <?php
}

add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');