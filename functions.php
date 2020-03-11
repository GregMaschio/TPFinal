
<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'main_js',get_stylesheet_directory_uri() . '/js/main.js');
}

add_filter( 'excerpt_length', function($length) {
    return 20;
} );

function extraire_evenement( $query ) {

    if (!is_home() && $query->is_category('evenement'))
    {
       $query->set( 'posts_per_page', -1 );
       $query->set( 'orderby', 'date' );
       $query->set( 'order', 'asc' );
    }
 }
add_action( 'pre_get_posts', 'extraire_evenement' );