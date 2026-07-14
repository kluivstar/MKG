<?php
/**
 * MK GLAMZ Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// 1. Theme Setup
function mk_glamz_theme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Enable Support for Title Tag.
    add_theme_support( 'title-tag' );

    // Enable Support for Post Thumbnails.
    add_theme_support( 'post-thumbnails' );

    // Enable Custom Logo Support.
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Support HTML5 markup.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register Menu Areas.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'mk-glamz' ),
        'footer'  => esc_html__( 'Footer Menu', 'mk-glamz' ),
        'mobile'  => esc_html__( 'Mobile Menu', 'mk-glamz' ),
    ) );

    // Declare WooCommerce support.
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'mk_glamz_theme_setup' );

// 2. Enqueue Scripts and Styles
function mk_glamz_enqueue_scripts() {
    // Theme stylesheet (headers)
    wp_enqueue_style( 'mk-glamz-style', get_stylesheet_uri() );

    // Custom CSS Variables
    wp_enqueue_style( 'mk-glamz-variables', get_template_directory_uri() . '/assets/css/variables.css', array(), '1.0.0' );

    // Main layout styles
    wp_enqueue_style( 'mk-glamz-main', get_template_directory_uri() . '/assets/css/main.css', array('mk-glamz-variables'), '1.0.0' );

    // Components styles
    wp_enqueue_style( 'mk-glamz-components', get_template_directory_uri() . '/assets/css/components.css', array('mk-glamz-main'), '1.0.0' );

    // Tailwind CSS via CDN (Only if Tailwind is needed globally)
    wp_enqueue_script( 'tailwind-cdn', 'https://cdn.tailwindcss.com?plugins=forms,container-queries', array(), null, false );

    // Main lightweight Javascript
    wp_enqueue_script( 'mk-glamz-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'mk_glamz_enqueue_scripts' );

// 3. Register Widget Areas
function mk_glamz_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'mk-glamz' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'mk-glamz' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-8">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="font-display text-lg uppercase tracking-widest text-primary mb-4">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Area', 'mk-glamz' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Widgets in the footer.', 'mk-glamz' ),
        'before_widget' => '<div class="space-y-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-label-md text-label-md uppercase tracking-widest text-primary mb-6">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'mk_glamz_widgets_init' );

// 4. WooCommerce Integration Helpers
// Remove default WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

function mk_glamz_woocommerce_wrapper_start() {
    echo '<main class="pt-32 pb-section-desktop max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop">';
}
add_action( 'woocommerce_before_main_content', 'mk_glamz_woocommerce_wrapper_start', 10 );

function mk_glamz_woocommerce_wrapper_end() {
    echo '</main>';
}
add_action( 'woocommerce_after_main_content', 'mk_glamz_woocommerce_wrapper_end', 10 );
