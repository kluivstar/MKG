<?php
/**
 * MK GLAMZ Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Load Modules from inc/
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/activation.php';
require_once get_template_directory() . '/inc/elementor.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/woocommerce.php';
require_once get_template_directory() . '/inc/helpers.php';

// Widgets Area Registration
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
