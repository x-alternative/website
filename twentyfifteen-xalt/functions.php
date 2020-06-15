<?php
 
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function xalt_body_class($classes) {
    if ( is_author() ) {
      $classes = array();
      $classes[] = 'custom-background';
      $classes[] = 'home';
      $classes[] = 'page';
    }

    return $classes;
}

add_filter('body_class', 'xalt_body_class');
