<?php
/**
 * MK GLAMZ Asset Loading
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mk_glamz_enqueue_scripts() {
    wp_enqueue_style( 'mk-glamz-style', get_stylesheet_uri() );
    wp_enqueue_style( 'mk-glamz-variables', get_template_directory_uri() . '/assets/css/variables.css', array(), '1.0.0' );
    wp_enqueue_style( 'mk-glamz-main', get_template_directory_uri() . '/assets/css/main.css', array('mk-glamz-variables'), '1.0.0' );
    wp_enqueue_style( 'mk-glamz-components', get_template_directory_uri() . '/assets/css/components.css', array('mk-glamz-main'), '1.0.0' );

    // FontAwesome 6 icons CDN
    wp_enqueue_style( 'font-awesome-6', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), '6.6.0' );

    // Main JavaScript
    wp_enqueue_script( 'mk-glamz-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'mk_glamz_enqueue_scripts' );
