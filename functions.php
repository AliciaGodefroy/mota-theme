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

function enqueue_aos() {
    wp_enqueue_script('aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js');
    wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css');
}

add_action('wp_enqueue_scripts', 'enqueue_aos');

//---------- LOAD MORE BUTTON

function enqueue_jquery() {
    wp_enqueue_script('jquery');
    wp_localize_script('jquery', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_jquery');


function load_more() {
    $page = $_POST['page'];
    $cat = $_POST['cat'];
    $format = $_POST['format'];
    $sort = $_POST['sort'] ?? 'DESC';

    $args = array(
        'post_type' => 'photos',
        'posts_per_page' => 12,
        'paged' => $page,
        'category_name' => $cat,
        'orderby' => 'publish_date',
        'order' => $sort,
    );
    if ($format) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'format',
                'field' => 'name',
                'terms' => $format,
            ),
        );
    }

    $myQuery = new WP_Query($args);
    ob_start();
    ?>
    <div class="section-photos_wrp">
        <?php foreach ($myQuery->posts as $post) : ?>
            <?php get_template_part('template_parts/photo-block', null, ['post'=>$post]); ?>
        <?php endforeach; ?>
    </div>
    <?php wp_reset_postdata();?>
    <?php 
    $content = ob_get_clean();
    wp_send_json_success( $content );
}


add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');

//---------- GESTION FILTRES

// function enqueue_custom_script() {
//     wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), null, true);

//     // Passer des données PHP à JavaScript si nécessaire
//     wp_localize_script('custom-script', 'customData', array(
//         'ajax_url' => admin_url('admin-ajax.php'),
//         'nonce' => wp_create_nonce('custom-nonce')
//     ));
// }

// // Fonction pour récupérer les catégories
// function get_categories() {
//     $terms_pic_category = get_terms(array(
//         'taxonomy' => 'votre_taxonomy', // Remplacez par le nom de votre taxonomie
//         'hide_empty' => false, // Inclure les termes vides si nécessaire
//     ));

//     if (!empty($terms_pic_category) && !is_wp_error($terms_pic_category)) {
//         foreach ($terms_pic_category as $individual_pic_cat) {
//             $option_value = $individual_pic_cat->slug;
//             $option_name = $individual_pic_cat->name;
//             echo '<option value="' . $option_value . '">' . $option_name . '</option>';
//         }
//     }

//     wp_die(); // Important pour arrêter la sortie
// }

// // Action pour les utilisateurs connectés et non connectés
// add_action('wp_ajax_get_categories', 'get_categories');
// add_action('wp_ajax_nopriv_get_categories', 'get_categories');
