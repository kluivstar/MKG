<?php
/**
 * MK GLAMZ WooCommerce Wrapper Overrides
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'mk_glamz_woocommerce_wrapper_start' ) ) {
    function mk_glamz_woocommerce_wrapper_start() {
        echo '<main class="pt-32 pb-section-desktop max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop">';
    }
    add_action( 'woocommerce_before_main_content', 'mk_glamz_woocommerce_wrapper_start', 10 );
}

if ( ! function_exists( 'mk_glamz_woocommerce_wrapper_end' ) ) {
    function mk_glamz_woocommerce_wrapper_end() {
        echo '</main>';
    }
    add_action( 'woocommerce_after_main_content', 'mk_glamz_woocommerce_wrapper_end', 10 );
}
