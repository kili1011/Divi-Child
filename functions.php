<?php

// custom styles
function add_theme_scripts() {
    
    // load parent styles
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . 
        '/style.css');
        
    // load child-theme styles
    wp_enqueue_style('child-theme', 
        get_stylesheet_directory_uri() . '/css/child-theme.css', 
        array($parent_style),
        filemtime(get_stylesheet_directory() . '/css/child-theme.css') );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );



