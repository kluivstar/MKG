<?php
/**
 * MK GLAMZ Core Capabilities & Setup
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'mk_glamz_theme_setup' ) ) {
    function mk_glamz_theme_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo', array(
            'height'      => 80,
            'width'       => 240,
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'mk-glamz' ),
            'footer'  => esc_html__( 'Footer Menu', 'mk-glamz' ),
            'mobile'  => esc_html__( 'Mobile Menu', 'mk-glamz' ),
        ) );

        // WooCommerce Theme Support
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
    add_action( 'after_setup_theme', 'mk_glamz_theme_setup' );
}
