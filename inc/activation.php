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

// Helpers to generate Elementor widget & container nodes
function mk_glamz_el_container( $settings = array(), $elements = array() ) {
    return array(
        'id'       => substr( md5( uniqid( rand(), true ) ), 0, 7 ),
        'elType'   => 'container',
        'settings' => array_merge( array(
            'content_width'  => 'full',
            'container_type' => 'flex',
            'flex_direction' => 'column',
        ), $settings ),
        'elements' => $elements,
    );
}

function mk_glamz_el_widget( $widget_type, $settings = array() ) {
    return array(
        'id'         => substr( md5( uniqid( rand(), true ) ), 0, 7 ),
        'elType'     => 'widget',
        'widgetType' => $widget_type,
        'settings'   => $settings,
        'elements'   => array(),
    );
}

// 4. Installer Action Routine
function mk_glamz_run_setup_routine() {
    if ( ! function_exists( 'mk_glamz_create_page' ) ) {
        function mk_glamz_create_page( $title, $slug, $template = '', $content = '', $elementor_data = null ) {
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
            } else {
                $page_id = $existing[0]->ID;
            }

            if ( $page_id && ! is_wp_error( $page_id ) ) {
                update_post_meta( $page_id, '_wp_page_template', ! empty( $template ) ? $template : 'default' );
                if ( ! empty( $elementor_data ) ) {
                    update_post_meta( $page_id, '_elementor_data', wp_slash( json_encode( $elementor_data ) ) );
                    update_post_meta( $page_id, '_elementor_edit_mode', 'builder' );
                    update_post_meta( $page_id, '_elementor_template_type', 'wp-page' );
                    update_post_meta( $page_id, '_elementor_version', '3.4.0' );
                }
            }
            return $page_id;
        }
    }

    $img_hero   = 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=1920&q=80';
    $img_face   = 'https://images.unsplash.com/photo-1512496015851-a90fb38ba796?auto=format&fit=crop&w=1200&q=80';
    $img_lips   = 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&w=800&q=80';
    $img_eyes   = 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=800&q=80';
    $img_prod1  = 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=600&q=80';
    $img_prod2  = 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&w=600&q=80';
    $img_prod3  = 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=600&q=80';
    $img_prod4  = 'https://images.unsplash.com/photo-1512496015851-a90fb38ba796?auto=format&fit=crop&w=600&q=80';
    $img_artist = 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?auto=format&fit=crop&w=1000&q=80';
    $img_hair   = 'https://images.unsplash.com/photo-1560869713-7d0a29430803?auto=format&fit=crop&w=1920&q=80';

    // A. Complete Home Page Elementor Data (7 Full Sections)
    $home_elementor_data = array(
        // Section 1: Hero
        mk_glamz_el_container( array(
            'min_height'           => array( 'unit' => 'px', 'size' => 750 ),
            'flex_justify_content' => 'center',
            'background_background'=> 'classic',
            'background_image'     => array( 'url' => $img_hero ),
            'background_position'  => 'center center',
            'background_size'      => 'cover',
            'padding'              => array( 'unit' => 'px', 'top' => '120', 'right' => '60', 'bottom' => '120', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'heading', array(
                'title'       => 'THE INAUGURAL COLLECTION',
                'header_size' => 'h5',
                'title_color' => '#BD9A5F',
                'typography_typography'   => 'custom',
                'typography_font_family' => 'Outfit',
                'typography_font_size'   => array( 'unit' => 'px', 'size' => 14 ),
            ) ),
            mk_glamz_el_widget( 'heading', array(
                'title'       => 'The Art of Elegance',
                'header_size' => 'h1',
                'title_color' => '#FFFFFF',
                'typography_typography'   => 'custom',
                'typography_font_family' => 'Syne',
                'typography_font_size'   => array( 'unit' => 'px', 'size' => 72 ),
                'typography_font_weight' => '700',
            ) ),
            mk_glamz_el_widget( 'text-editor', array(
                'editor' => '<p style="color:#E2E8F0; font-family:Outfit; font-size:18px; max-width:560px;">Curating prestige beauty for the discerning individual. Discover a symphony of texture, light, and artistry in our limited release series.</p>',
            ) ),
            mk_glamz_el_container( array(
                'flex_direction' => 'row',
                'gap'            => array( 'unit' => 'px', 'size' => 20 ),
            ), array(
                mk_glamz_el_widget( 'button', array(
                    'text'             => 'SHOP NOW',
                    'background_color' => '#BD9A5F',
                    'text_color'       => '#0B1528',
                ) ),
                mk_glamz_el_widget( 'button', array(
                    'text'             => 'BOOK US',
                    'background_color' => 'transparent',
                    'text_color'       => '#FFFFFF',
                    'border_border'    => 'solid',
                    'border_color'     => '#FFFFFF',
                ) ),
            ) ),
        ) ),

        // Section 2: Signature Tones Bento Grid
        mk_glamz_el_container( array(
            'background_background' => 'classic',
            'background_color'      => '#FFFFFF',
            'padding'               => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'heading', array(
                'title'       => 'Signature Tones',
                'title_color' => '#0B1528',
                'typography_typography'   => 'custom',
                'typography_font_family' => 'Syne',
                'typography_font_size'   => array( 'unit' => 'px', 'size' => 48 ),
            ) ),
            mk_glamz_el_widget( 'text-editor', array(
                'editor' => '<p style="color:#64748B; font-family:Outfit; font-size:16px;">Meticulously developed formulas for professional-grade results at home.</p>',
            ) ),
            mk_glamz_el_container( array(
                'flex_direction' => 'row',
                'gap'            => array( 'unit' => 'px', 'size' => 30 ),
                'margin'         => array( 'unit' => 'px', 'top' => '40', 'right' => '0', 'bottom' => '0', 'left' => '0', 'isLinked' => false ),
            ), array(
                mk_glamz_el_container( array(
                    'width'               => array( 'unit' => '%', 'size' => 60 ),
                    'min_height'          => array( 'unit' => 'px', 'size' => 500 ),
                    'flex_justify_content'=> 'flex-end',
                    'background_background'=> 'classic',
                    'background_image'    => array( 'url' => $img_face ),
                    'background_position' => 'center center',
                    'background_size'     => 'cover',
                    'padding'             => array( 'unit' => 'px', 'top' => '40', 'right' => '40', 'bottom' => '40', 'left' => '40', 'isLinked' => true ),
                ), array(
                    mk_glamz_el_widget( 'heading', array( 'title' => 'Collection 01', 'title_color' => '#BD9A5F', 'typography_font_family' => 'Outfit' ) ),
                    mk_glamz_el_widget( 'heading', array( 'title' => 'Face', 'title_color' => '#FFFFFF', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 42 ) ) ),
                    mk_glamz_el_widget( 'button', array( 'text' => 'EXPLORE LINE', 'background_color' => 'transparent', 'text_color' => '#FFFFFF' ) ),
                ) ),
                mk_glamz_el_container( array(
                    'width' => array( 'unit' => '%', 'size' => 40 ),
                    'gap'   => array( 'unit' => 'px', 'size' => 30 ),
                ), array(
                    mk_glamz_el_container( array(
                        'min_height'          => array( 'unit' => 'px', 'size' => 235 ),
                        'flex_justify_content'=> 'flex-end',
                        'background_background'=> 'classic',
                        'background_image'    => array( 'url' => $img_lips ),
                        'background_position' => 'center center',
                        'background_size'     => 'cover',
                        'padding'             => array( 'unit' => 'px', 'top' => '24', 'right' => '24', 'bottom' => '24', 'left' => '24', 'isLinked' => true ),
                    ), array(
                        mk_glamz_el_widget( 'heading', array( 'title' => 'Lips', 'title_color' => '#FFFFFF', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 28 ) ) ),
                    ) ),
                    mk_glamz_el_container( array(
                        'min_height'          => array( 'unit' => 'px', 'size' => 235 ),
                        'flex_justify_content'=> 'flex-end',
                        'background_background'=> 'classic',
                        'background_image'    => array( 'url' => $img_eyes ),
                        'background_position' => 'center center',
                        'background_size'     => 'cover',
                        'padding'             => array( 'unit' => 'px', 'top' => '24', 'right' => '24', 'bottom' => '24', 'left' => '24', 'isLinked' => true ),
                    ), array(
                        mk_glamz_el_widget( 'heading', array( 'title' => 'Eyes', 'title_color' => '#FFFFFF', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 28 ) ) ),
                    ) ),
                ) ),
            ) ),
        ) ),

        // Section 3: Best Sellers Grid Section
        mk_glamz_el_container( array(
            'background_background' => 'classic',
            'background_color'      => '#F8FAFC',
            'padding'               => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'heading', array( 'title' => 'Best Sellers', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 48 ) ) ),
            mk_glamz_el_container( array(
                'flex_direction' => 'row',
                'gap'            => array( 'unit' => 'px', 'size' => 24 ),
                'margin'         => array( 'unit' => 'px', 'top' => '40', 'right' => '0', 'bottom' => '0', 'left' => '0', 'isLinked' => false ),
            ), array(
                mk_glamz_el_container( array( 'width' => array( 'unit' => '%', 'size' => 25 ), 'background_background' => 'classic', 'background_color' => '#FFFFFF', 'padding' => array( 'unit' => 'px', 'top' => '16', 'right' => '16', 'bottom' => '16', 'left' => '16', 'isLinked' => true ) ), array(
                    mk_glamz_el_widget( 'image', array( 'image' => array( 'url' => $img_prod1 ) ) ),
                    mk_glamz_el_widget( 'heading', array( 'title' => 'Velvet Skin Fluid', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 20 ) ) ),
                    mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#BD9A5F; font-weight:bold; font-family:Outfit;">$62.00</p>' ) ),
                    mk_glamz_el_widget( 'button', array( 'text' => 'QUICK SHOP', 'background_color' => '#0B1528', 'text_color' => '#FFFFFF' ) ),
                ) ),
                mk_glamz_el_container( array( 'width' => array( 'unit' => '%', 'size' => 25 ), 'background_background' => 'classic', 'background_color' => '#FFFFFF', 'padding' => array( 'unit' => 'px', 'top' => '16', 'right' => '16', 'bottom' => '16', 'left' => '16', 'isLinked' => true ) ), array(
                    mk_glamz_el_widget( 'image', array( 'image' => array( 'url' => $img_prod2 ) ) ),
                    mk_glamz_el_widget( 'heading', array( 'title' => 'Satin Petal Lipstick', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 20 ) ) ),
                    mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#BD9A5F; font-weight:bold; font-family:Outfit;">$38.00</p>' ) ),
                    mk_glamz_el_widget( 'button', array( 'text' => 'QUICK SHOP', 'background_color' => '#0B1528', 'text_color' => '#FFFFFF' ) ),
                ) ),
                mk_glamz_el_container( array( 'width' => array( 'unit' => '%', 'size' => 25 ), 'background_background' => 'classic', 'background_color' => '#FFFFFF', 'padding' => array( 'unit' => 'px', 'top' => '16', 'right' => '16', 'bottom' => '16', 'left' => '16', 'isLinked' => true ) ), array(
                    mk_glamz_el_widget( 'image', array( 'image' => array( 'url' => $img_prod3 ) ) ),
                    mk_glamz_el_widget( 'heading', array( 'title' => 'Luminous Glow Powder', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 20 ) ) ),
                    mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#BD9A5F; font-weight:bold; font-family:Outfit;">$54.00</p>' ) ),
                    mk_glamz_el_widget( 'button', array( 'text' => 'QUICK SHOP', 'background_color' => '#0B1528', 'text_color' => '#FFFFFF' ) ),
                ) ),
                mk_glamz_el_container( array( 'width' => array( 'unit' => '%', 'size' => 25 ), 'background_background' => 'classic', 'background_color' => '#FFFFFF', 'padding' => array( 'unit' => 'px', 'top' => '16', 'right' => '16', 'bottom' => '16', 'left' => '16', 'isLinked' => true ) ), array(
                    mk_glamz_el_widget( 'image', array( 'image' => array( 'url' => $img_prod4 ) ) ),
                    mk_glamz_el_widget( 'heading', array( 'title' => 'Obsidian Eye Palette', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 20 ) ) ),
                    mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#BD9A5F; font-weight:bold; font-family:Outfit;">$75.00</p>' ) ),
                    mk_glamz_el_widget( 'button', array( 'text' => 'QUICK SHOP', 'background_color' => '#0B1528', 'text_color' => '#FFFFFF' ) ),
                ) ),
            ) ),
        ) ),

        // Section 4: Master Artistry Booking
        mk_glamz_el_container( array(
            'background_background' => 'classic',
            'background_color'      => '#FFFFFF',
            'padding'               => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_container( array(
                'flex_direction' => 'row',
                'gap'            => array( 'unit' => 'px', 'size' => 60 ),
            ), array(
                mk_glamz_el_container( array( 'width' => array( 'unit' => '%', 'size' => 50 ) ), array(
                    mk_glamz_el_widget( 'image', array( 'image' => array( 'url' => $img_artist ) ) ),
                ) ),
                mk_glamz_el_container( array( 'width' => array( 'unit' => '%', 'size' => 50 ) ), array(
                    mk_glamz_el_widget( 'heading', array( 'title' => 'ARTISTRY & CONSULTATION', 'title_color' => '#BD9A5F', 'typography_font_family' => 'Outfit' ) ),
                    mk_glamz_el_widget( 'heading', array( 'title' => 'Mastering Your Unique Canvas', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 44 ) ) ),
                    mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#475569; font-family:Outfit; font-size:16px; line-height:1.8;">Our master artists provide bespoke beauty consultations and full-service makeup applications for your most significant moments. From bridal elegance to editorial avant-garde, we bring prestige artistry to life.</p>' ) ),
                    mk_glamz_el_widget( 'button', array( 'text' => 'BOOK A SESSION', 'background_color' => '#0B1528', 'text_color' => '#FFFFFF' ) ),
                ) ),
            ) ),
        ) ),

        // Section 5: Hair Collection Preview
        mk_glamz_el_container( array(
            'min_height'           => array( 'unit' => 'px', 'size' => 500 ),
            'flex_justify_content' => 'center',
            'background_background'=> 'classic',
            'background_image'     => array( 'url' => $img_hair ),
            'background_position'  => 'center center',
            'background_size'      => 'cover',
            'padding'              => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'button', array( 'text' => 'COMING SOON', 'background_color' => '#BD9A5F', 'text_color' => '#0B1528' ) ),
            mk_glamz_el_widget( 'heading', array( 'title' => 'The Hair Collection', 'title_color' => '#FFFFFF', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 52 ) ) ),
            mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#E2E8F0; font-family:Outfit; font-size:18px; max-width:600px;">Extending our philosophy of elegance to the crown. A curated system of care and styling, launching Winter 2026.</p>' ) ),
            mk_glamz_el_widget( 'button', array( 'text' => 'JOIN THE WAITLIST', 'background_color' => 'transparent', 'text_color' => '#FFFFFF', 'border_border' => 'solid', 'border_color' => '#FFFFFF' ) ),
        ) ),

        // Section 6: Beauty Journal Section
        mk_glamz_el_container( array(
            'background_background' => 'classic',
            'background_color'      => '#FFFFFF',
            'padding'               => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'heading', array( 'title' => 'The Beauty Journal', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 48 ) ) ),
            mk_glamz_el_container( array(
                'flex_direction' => 'row',
                'gap'            => array( 'unit' => 'px', 'size' => 30 ),
                'margin'         => array( 'unit' => 'px', 'top' => '40', 'right' => '0', 'bottom' => '0', 'left' => '0', 'isLinked' => false ),
            ), array(
                mk_glamz_el_container( array( 'width' => array( 'unit' => '%', 'size' => 50 ) ), array(
                    mk_glamz_el_widget( 'image', array( 'image' => array( 'url' => $img_hero ) ) ),
                    mk_glamz_el_widget( 'heading', array( 'title' => 'The 7 AM Ritual: Prepping the Canvas', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 24 ) ) ),
                    mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#64748B; font-family:Outfit; font-size:15px;">Discover the morning skincare and priming secrets used by our lead artists to ensure makeup longevity and that signature MK glow.</p>' ) ),
                    mk_glamz_el_widget( 'button', array( 'text' => 'READ ARTICLE', 'background_color' => 'transparent', 'text_color' => '#0B1528' ) ),
                ) ),
                mk_glamz_el_container( array( 'width' => array( 'unit' => '%', 'size' => 50 ) ), array(
                    mk_glamz_el_widget( 'image', array( 'image' => array( 'url' => $img_face ) ) ),
                    mk_glamz_el_widget( 'heading', array( 'title' => 'After Dark: Obsidian & Gold Accents', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 24 ) ) ),
                    mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#64748B; font-family:Outfit; font-size:15px;">Mastering the transition from daylight elegance to evening drama using the limited edition Obsidian palette.</p>' ) ),
                    mk_glamz_el_widget( 'button', array( 'text' => 'READ ARTICLE', 'background_color' => 'transparent', 'text_color' => '#0B1528' ) ),
                ) ),
            ) ),
        ) ),

        // Section 7: Newsletter Signup
        mk_glamz_el_container( array(
            'background_background' => 'classic',
            'background_color'      => '#0B1528',
            'padding'               => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'heading', array( 'title' => 'The Inner Circle', 'title_color' => '#FFFFFF', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 48 ) ) ),
            mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#94A3B8; font-family:Outfit; font-size:18px; max-width:600px;">Sign up to receive early access to new collections, exclusive artistry tutorials, and invitations to private boutique events.</p>' ) ),
            mk_glamz_el_widget( 'form', array( 'button_text' => 'JOIN NOW', 'button_background_color' => '#FFFFFF', 'button_text_color' => '#0B1528' ) ),
        ) ),
    );

    // B. Build About Page Elementor Data
    $about_elementor_data = array(
        mk_glamz_el_container( array(
            'min_height'          => array( 'unit' => 'px', 'size' => 500 ),
            'flex_justify_content'=> 'center',
            'background_background'=> 'classic',
            'background_image'    => array( 'url' => $img_hero ),
            'background_position' => 'center center',
            'background_size'     => 'cover',
            'padding'             => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'heading', array( 'title' => 'ESTABLISHED 2018', 'title_color' => '#BD9A5F', 'typography_font_family' => 'Outfit' ) ),
            mk_glamz_el_widget( 'heading', array( 'title' => 'The Art of Curated Beauty', 'title_color' => '#FFFFFF', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 60 ) ) ),
        ) ),
        mk_glamz_el_container( array(
            'padding' => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'heading', array( 'title' => 'Our Mission', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 40 ) ) ),
            mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#475569; font-family:Outfit; font-size:16px; line-height:1.8;">To redefine luxury through the lens of intentionality. MK GLAMZ exists to bridge the gap between high-performance artistry and the effortless grace of daily ritual.</p>' ) ),
            mk_glamz_el_widget( 'divider', array( 'color' => '#BD9A5F' ) ),
            mk_glamz_el_widget( 'heading', array( 'title' => 'The Vision', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 40 ) ) ),
            mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#475569; font-family:Outfit; font-size:16px; line-height:1.8;">A global flagship for the modern minimalist. We aspire to create a sanctuary where sophisticated products meet architectural design.</p>' ) ),
        ) )
    );

    // C. Build Services Page Elementor Data
    $services_elementor_data = array(
        mk_glamz_el_container( array(
            'min_height'          => array( 'unit' => 'px', 'size' => 450 ),
            'flex_justify_content'=> 'center',
            'background_background'=> 'classic',
            'background_color'    => '#0B1528',
            'padding'             => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'button', array( 'text' => 'COMING SOON', 'background_color' => '#FFFFFF', 'text_color' => '#0B1528' ) ),
            mk_glamz_el_widget( 'heading', array( 'title' => 'Professional Makeup Services', 'title_color' => '#FFFFFF', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 56 ) ) ),
        ) ),
        mk_glamz_el_container( array(
            'padding' => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'heading', array( 'title' => 'Couture Artistry', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 36 ) ) ),
            mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#475569; font-family:Outfit; font-size:16px; line-height:1.8;">From editorial wings to private bridal styling, our signature application respects individual anatomy, using advanced pigments and skin prep to deliver a flawless, high-definition finish.</p>' ) ),
            mk_glamz_el_widget( 'form', array( 'button_text' => 'REQUEST PRIORITY ACCESS', 'button_background_color' => '#0B1528' ) ),
        ) )
    );

    // D. Build Contact Page Elementor Data
    $contact_elementor_data = array(
        mk_glamz_el_container( array(
            'padding' => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'heading', array( 'title' => 'GET IN TOUCH', 'title_color' => '#BD9A5F', 'typography_font_family' => 'Outfit' ) ),
            mk_glamz_el_widget( 'heading', array( 'title' => 'Contact Us', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 56 ) ) ),
            mk_glamz_el_widget( 'text-editor', array( 'editor' => '<p style="color:#475569; font-family:Outfit; font-size:16px; line-height:1.8;">For order inquiries, professional registry support, or general comments, please reach out via our contact form or email us at support@mkglamz.com.</p>' ) ),
            mk_glamz_el_widget( 'form', array( 'button_text' => 'SEND MESSAGE', 'button_background_color' => '#0B1528' ) ),
        ) )
    );

    // E. Build FAQ Page Elementor Data
    $faq_elementor_data = array(
        mk_glamz_el_container( array(
            'padding' => array( 'unit' => 'px', 'top' => '100', 'right' => '60', 'bottom' => '100', 'left' => '60', 'isLinked' => false ),
        ), array(
            mk_glamz_el_widget( 'heading', array( 'title' => 'SUPPORT CENTER', 'title_color' => '#BD9A5F', 'typography_font_family' => 'Outfit' ) ),
            mk_glamz_el_widget( 'heading', array( 'title' => 'Frequently Asked Questions', 'title_color' => '#0B1528', 'typography_font_family' => 'Syne', 'typography_font_size' => array( 'unit' => 'px', 'size' => 48 ) ) ),
            mk_glamz_el_widget( 'accordion', array(
                'tabs' => array(
                    array( 'tab_title' => 'Are your products vegan & cruelty-free?', 'tab_content' => 'Yes. All MK GLAMZ formulations are 100% cruelty-free and vegan certified.' ),
                    array( 'tab_title' => 'How do I book a bridal artistry session?', 'tab_content' => 'You can book bridal sessions directly through our artistry service section or via our contact page.' ),
                    array( 'tab_title' => 'What is the return policy?', 'tab_content' => 'We offer returns within 30 days of purchase for unused products in original packaging.' ),
                ),
            ) ),
        ) )
    );

    // Create pages & inject Elementor metadata directly into postmeta
    $home_id     = mk_glamz_create_page( 'Home', 'home', '', 'Prestige beauty and curated luxury for the modern lifestyle.', $home_elementor_data );
    $about_id    = mk_glamz_create_page( 'About MK Glamz', 'about-mk-glamz', 'template-about.php', 'Our mission is to redefine luxury through intentionality.', $about_elementor_data );
    $shop_id     = mk_glamz_create_page( 'Shop', 'shop', '', 'Prestige cosmetic lines. Discover a symphony of texture and light.' );
    $services_id = mk_glamz_create_page( 'Makeup Services', 'makeup-services', 'template-services.php', 'Couture artistry for editorial campaigns and event styling.', $services_elementor_data );
    $contact_id  = mk_glamz_create_page( 'Contact', 'contact', 'template-contact.php', 'Reach out for master consultations and professional booking slots.', $contact_elementor_data );
    $faqs_id     = mk_glamz_create_page( 'FAQs', 'faqs', 'template-faq.php', 'Find answers about cosmetic formulations and bookings.', $faq_elementor_data );
    $blog_id     = mk_glamz_create_page( 'Beauty Blog', 'beauty-blog', '', 'Editorial insights and styling tips from our lead artists.' );
    $privacy_id  = mk_glamz_create_page( 'Privacy Policy', 'privacy-policy', 'template-privacy.php', 'Your privacy is of utmost importance.' );
    $terms_id    = mk_glamz_create_page( 'Terms & Conditions', 'terms-conditions', 'template-terms.php', 'Please read our terms of use.' );

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
            echo '<div class="notice notice-success is-dismissible"><p>' . __( 'MK Glamz Setup completed! Pages, menus, and Elementor starter layouts are configured.', 'mk-glamz' ) . '</p></div>';
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
        <p><?php _e( 'Configure core pages, menus, reading settings, and Elementor starter assets for MK Glamz.', 'mk-glamz' ); ?></p>
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
