<?php
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



/* add jQuery to head 
function hook_javascript() {
    ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://raumausstatter-schrenk/wp-content/themes/divi-child/js/jquery-3.4.1.min.js"></script>
    <?php
}
add_action('wp_head', 'hook_javascript'); */
