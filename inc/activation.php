<?php
/**
 * MK GLAMZ Setup Dashboard & Installer Routines
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Admin Menu Page Registration under Appearance
function mk_glamz_admin_menu() {
    add_theme_page(
        __( 'MK Glamz Setup', 'mk-glamz' ),
        __( 'MK Glamz Setup', 'mk-glamz' ),
        'edit_theme_options',
        'mk-glamz-setup',
        'mk_glamz_setup_page_callback'
    );
}
add_action( 'admin_menu', 'mk_glamz_admin_menu' );

// 2. Transient Trigger on Theme Switch
function mk_glamz_after_switch_theme() {
    set_transient( 'mk_glamz_activation_notice', true, 30 );
}
add_action( 'after_switch_theme', 'mk_glamz_after_switch_theme' );

// 3. Admin Notice
function mk_glamz_admin_notices() {
    if ( get_transient( 'mk_glamz_activation_notice' ) ) {
        delete_transient( 'mk_glamz_activation_notice' );
        ?>
        <div class="notice notice-info is-dismissible">
            <p><?php echo sprintf( __( 'Thank you for activating MK Glamz! Please navigate to <a href="%s" style="font-weight:bold;">Appearance &rarr; MK Glamz Setup</a> to configure pages, menus, and theme settings.', 'mk-glamz' ), admin_url( 'themes.php?page=mk-glamz-setup' ) ); ?></p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'mk_glamz_admin_notices' );

// 4. Installer Action Routine
function mk_glamz_run_setup_routine() {
    // Idempotent Page Helper
    if ( ! function_exists( 'mk_glamz_create_page' ) ) {
        function mk_glamz_create_page( $title, $slug, $template = '', $content = '' ) {
            $existing = get_posts( array(
                'name'           => $slug,
                'post_type'      => 'page',
                'post_status'    => 'any',
                'posts_per_page' => 1,
            ) );

            if ( empty( $existing ) ) {
                $page_id = wp_insert_post( array(
                    'post_title'   => $title,
                    'post_name'    => $slug,
                    'post_content' => $content,
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                ) );

                if ( $page_id && ! is_wp_error( $page_id ) && ! empty( $template ) ) {
                    update_post_meta( $page_id, '_wp_page_template', $template );
                }
                return $page_id;
            }

            return $existing[0]->ID;
        }
    }

    // Create pages without forcing front-page.php as page template
    $home_id     = mk_glamz_create_page( 'Home', 'home', '', 'Prestige beauty and curated luxury for the modern lifestyle.' );
    $about_id    = mk_glamz_create_page( 'About MK Glamz', 'about-mk-glamz', 'template-about.php', 'Our mission is to redefine luxury through intentionality.' );
    $shop_id     = mk_glamz_create_page( 'Shop', 'shop', '', 'Prestige cosmetic lines. Discover a symphony of texture and light.' );
    $services_id = mk_glamz_create_page( 'Makeup Services', 'makeup-services', 'template-services.php', 'Couture artistry for editorial campaigns and event styling.' );
    $contact_id  = mk_glamz_create_page( 'Contact', 'contact', 'template-contact.php', 'Reach out for master consultations and professional booking slots.' );
    $faqs_id     = mk_glamz_create_page( 'FAQs', 'faqs', 'template-faq.php', 'Find answers about cosmetic formulations and bookings.' );
    $blog_id     = mk_glamz_create_page( 'Beauty Blog', 'beauty-blog', '', 'Editorial insights and styling tips from our lead artists.' );
    $privacy_id  = mk_glamz_create_page( 'Privacy Policy', 'privacy-policy', 'template-privacy.php', 'Your privacy is of utmost importance.' );
    $terms_id    = mk_glamz_create_page( 'Terms & Conditions', 'terms-conditions', 'template-terms.php', 'Please read our terms of use.' );

    // Configure Static Front Page & Posts Page
    if ( $home_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $home_id );
    }
    if ( $blog_id ) {
        update_option( 'page_for_posts', $blog_id );
    }

    // Pretty Permalinks
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
    flush_rewrite_rules( true );

    update_option( 'timezone_string', 'UTC' );
    update_option( 'default_comment_status', 'closed' );

    // Menu Setup Helper
    function mk_glamz_setup_menu( $menu_name, $items, $locations_to_assign ) {
        $menu_obj = wp_get_nav_menu_object( $menu_name );
        if ( ! $menu_obj ) {
            $menu_id = wp_create_nav_menu( $menu_name );
        } else {
            $menu_id = $menu_obj->term_id;
            $existing_items = wp_get_nav_menu_items( $menu_id );
            if ( $existing_items ) {
                foreach ( $existing_items as $item ) {
                    wp_delete_post( $item->ID, true );
                }
            }
        }

        if ( $menu_id && ! is_wp_error( $menu_id ) ) {
            foreach ( $items as $item ) {
                wp_update_nav_menu_item( $menu_id, 0, $item );
            }

            $locations = get_theme_mod( 'nav_menu_locations' );
            foreach ( $locations_to_assign as $loc ) {
                $locations[$loc] = $menu_id;
            }
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }

    $primary_items = array(
        array( 'menu-item-title' => 'Home', 'menu-item-url' => home_url( '/' ), 'menu-item-status' => 'publish' ),
        array( 'menu-item-title' => 'Shop', 'menu-item-object-id' => $shop_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ),
        array( 'menu-item-title' => 'About', 'menu-item-object-id' => $about_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ),
        array( 'menu-item-title' => 'Makeup Services', 'menu-item-object-id' => $services_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ),
        array( 'menu-item-title' => 'Blog', 'menu-item-object-id' => $blog_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ),
        array( 'menu-item-title' => 'Contact', 'menu-item-object-id' => $contact_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ),
    );

    $footer_items = array(
        array( 'menu-item-title' => 'Privacy Policy', 'menu-item-object-id' => $privacy_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ),
        array( 'menu-item-title' => 'Terms', 'menu-item-object-id' => $terms_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ),
        array( 'menu-item-title' => 'FAQs', 'menu-item-object-id' => $faqs_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ),
        array( 'menu-item-title' => 'Contact', 'menu-item-object-id' => $contact_id, 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ),
    );

    mk_glamz_setup_menu( 'Primary Menu', $primary_items, array( 'primary', 'mobile' ) );
    mk_glamz_setup_menu( 'Footer Menu', $footer_items, array( 'footer' ) );

    // Customizer Options
    set_theme_mod( 'brand_primary_color', '#0B1528' );
    set_theme_mod( 'brand_secondary_color', '#BD9A5F' );
    set_theme_mod( 'brand_font_family', 'Outfit' );
    set_theme_mod( 'container_width', 1440 );
    set_theme_mod( 'announcement_bar_text', 'Free Prestige Shipping on orders over $150' );

    update_option( 'mk_glamz_theme_setup_completed', 1 );
}

// 5. Developer Reset Routine
function mk_glamz_reset_starter_content() {
    $slugs = array( 'home', 'about-mk-glamz', 'shop', 'makeup-services', 'contact', 'faqs', 'beauty-blog', 'privacy-policy', 'terms-conditions' );
    foreach ( $slugs as $slug ) {
        $existing = get_posts( array( 'name' => $slug, 'post_type' => 'page', 'post_status' => 'any', 'posts_per_page' => 1 ) );
        if ( ! empty( $existing ) ) {
            wp_delete_post( $existing[0]->ID, true );
        }
    }

    $menus = array( 'Primary Menu', 'Footer Menu' );
    foreach ( $menus as $menu_name ) {
        $menu_obj = wp_get_nav_menu_object( $menu_name );
        if ( $menu_obj ) {
            wp_delete_nav_menu( $menu_obj->term_id );
        }
    }

    delete_option( 'mk_glamz_theme_setup_completed' );
    update_option( 'show_on_front', 'posts' );
}

// 6. Admin Page Callback
function mk_glamz_setup_page_callback() {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die( __( 'You do not have sufficient permissions to access this page.', 'mk-glamz' ) );
    }

    $setup_status = get_option( 'mk_glamz_theme_setup_completed' ) ? 'completed' : 'pending';

    if ( isset( $_POST['mk_glamz_setup_action'] ) ) {
        check_admin_referer( 'mk_glamz_setup_action_nonce' );

        if ( $_POST['mk_glamz_setup_action'] === 'run' ) {
            mk_glamz_run_setup_routine();
            echo '<div class="notice notice-success is-dismissible"><p>' . __( 'MK Glamz Setup completed! Pages, menus, and settings are configured.', 'mk-glamz' ) . '</p></div>';
            $setup_status = 'completed';
        } elseif ( $_POST['mk_glamz_setup_action'] === 'reset' ) {
            mk_glamz_reset_starter_content();
            echo '<div class="notice notice-warning is-dismissible"><p>' . __( 'MK Glamz Starter Content has been reset.', 'mk-glamz' ) . '</p></div>';
            $setup_status = 'pending';
        }
    }

    ?>
    <div class="wrap">
        <h1><?php _e( 'MK Glamz Setup Dashboard', 'mk-glamz' ); ?></h1>
        <p><?php _e( 'Configure core pages, menus, reading settings, and starter assets for MK Glamz.', 'mk-glamz' ); ?></p>
        <hr/>

        <div class="card" style="max-width:600px; margin-top:20px; padding:20px;">
            <h2><?php _e( 'Theme Installation Status', 'mk-glamz' ); ?></h2>
            <p>
                <strong><?php _e( 'Status:', 'mk-glamz' ); ?></strong>
                <?php if ( $setup_status === 'completed' ) : ?>
                    <span style="color:#46b450; font-weight:bold;"><?php _e( 'Active & Configured', 'mk-glamz' ); ?></span>
                <?php else : ?>
                    <span style="color:#dc3232; font-weight:bold;"><?php _e( 'Pending Setup', 'mk-glamz' ); ?></span>
                <?php endif; ?>
            </p>

            <form method="post" action="">
                <?php wp_nonce_field( 'mk_glamz_setup_action_nonce' ); ?>
                <div style="margin-top:20px;">
                    <input type="hidden" name="mk_glamz_setup_action" value="run" />
                    <button type="submit" class="button button-primary button-large">
                        <?php _e( 'Run MK Glamz Setup', 'mk-glamz' ); ?>
                    </button>
                </div>
            </form>
        </div>

        <div class="card" style="max-width:600px; margin-top:20px; padding:20px; border-left: 4px solid #ffb900;">
            <h3><?php _e( 'Developer Utilities', 'mk-glamz' ); ?></h3>
            <p><?php _e( 'Purge generated starter pages and navigation menus to perform a fresh setup run.', 'mk-glamz' ); ?></p>
            <form method="post" action="" onsubmit="return confirm('<?php _e( 'Delete starter content and reset theme options?', 'mk-glamz' ); ?>');">
                <?php wp_nonce_field( 'mk_glamz_setup_action_nonce' ); ?>
                <input type="hidden" name="mk_glamz_setup_action" value="reset" />
                <button type="submit" class="button button-secondary">
                    <?php _e( 'Reset MK Glamz Starter Content', 'mk-glamz' ); ?>
                </button>
            </form>
        </div>
    </div>
    <?php
}
