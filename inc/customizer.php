<?php
/**
 * MK GLAMZ Customizer Settings
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'mk_glamz_customize_register' ) ) {
    function mk_glamz_customize_register( $wp_customize ) {
        $wp_customize->add_panel( 'mk_glamz_panel', array(
            'title'       => esc_html__( 'MK Glamz Settings', 'mk-glamz' ),
            'priority'    => 30,
        ) );

        $wp_customize->add_section( 'mk_glamz_colors_section', array(
            'title' => esc_html__( 'Brand Colors', 'mk-glamz' ),
            'panel' => 'mk_glamz_panel',
        ) );

        $wp_customize->add_setting( 'brand_primary_color', array(
            'default'           => '#0B1528',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_primary_color', array(
            'label'    => esc_html__( 'Primary Color', 'mk-glamz' ),
            'section'  => 'mk_glamz_colors_section',
            'settings' => 'brand_primary_color',
        ) ) );

        $wp_customize->add_setting( 'brand_secondary_color', array(
            'default'           => '#BD9A5F',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_secondary_color', array(
            'label'    => esc_html__( 'Champagne Gold Color', 'mk-glamz' ),
            'section'  => 'mk_glamz_colors_section',
            'settings' => 'brand_secondary_color',
        ) ) );
    }
    add_action( 'customize_register', 'mk_glamz_customize_register' );
}
