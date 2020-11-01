<?php

// enqueue child theme styles
function add_theme_scripts() {

    $cssRelativeUrl = '/build/child-theme.css';
    $jsRelativeUrl = '/build/child-theme.js';
    
    // load parent styles
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . 
        '/style.css');
        
    // load child-theme styles
    wp_enqueue_style('child-theme', 
        get_stylesheet_directory_uri() . $cssRelativeUrl,
        array($parent_style),
        filemtime(get_stylesheet_directory() . $cssRelativeUrl) );

    // load child-theme scripts
    wp_enqueue_script( 'production', 
        get_stylesheet_directory_uri() . $jsRelativeUrl,
        array(), 
        filemtime(get_stylesheet_directory() . $jsRelativeUrl),
        true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

