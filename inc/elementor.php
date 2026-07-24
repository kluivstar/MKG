<?php
/**
 * MK GLAMZ Elementor Integration & Theme Builder Support
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Declare Elementor Theme Builder Locations
if ( ! function_exists( 'mk_glamz_register_elementor_locations' ) ) {
    function mk_glamz_register_elementor_locations( $elementor_theme_manager ) {
        $elementor_theme_manager->register_location( 'header' );
        $elementor_theme_manager->register_location( 'footer' );
    }
    add_action( 'elementor/theme/register_locations', 'mk_glamz_register_elementor_locations' );
}

// 2. Enable JSON Mime Type & Unfiltered Template Uploads for Elementor
add_filter( 'upload_mimes', function( $mimes ) {
    $mimes['json'] = 'application/json';
    return $mimes;
} );

add_filter( 'elementor/files/allow_unfiltered_globally', '__return_true' );

// 3. Elementor Canvas & Page Support
add_action( 'after_setup_theme', function() {
    add_post_type_support( 'page', 'elementor' );
} );
