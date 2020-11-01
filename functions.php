<?php

// enqueue child theme styles
function addParentStyle($parentStyleSheet)
{
    // load parent styles
    wp_enqueue_style( $parentStyleSheet, get_template_directory_uri() .
        '/style.css');
}

function addChildThemeScript($jsRelativeUrl)
{
    wp_enqueue_script(
        'child-theme-js',
        get_stylesheet_directory_uri() . $jsRelativeUrl,
        array(),
        filemtime(get_stylesheet_directory() . $jsRelativeUrl),
        true);
}

function addChildThemeStyle($parentStyleSheet, $cssRelativeUrl)
{
    wp_enqueue_style('child-theme-css',
        get_stylesheet_directory_uri() . $cssRelativeUrl,
        array($parentStyleSheet),
        filemtime(get_stylesheet_directory() . $cssRelativeUrl) );
}

function add_theme_scripts() {

    $parentStyleSheet = 'parent-style';
    $jsRelativeUrl = '/build/child-theme.js';
    $cssRelativeUrl = '/build/child-theme.css';

    addParentStyle($parentStyleSheet);
    addChildThemeScript($jsRelativeUrl);
    addChildThemeStyle($parentStyleSheet, $cssRelativeUrl);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

