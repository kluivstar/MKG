<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <?php wp_head(); ?>
  <script>
    // Inline Tailwind config mapping layout spacing, font families, and colors directly to CSS variables
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "var(--color-primary)",
            "secondary": "var(--color-secondary)",
            "background": "var(--color-background)",
            "on-background": "var(--color-on-background)",
            "surface": "var(--color-surface)",
            "surface-dim": "var(--color-surface-dim)",
            "surface-bright": "var(--color-surface-bright)",
            "surface-container-lowest": "var(--color-surface-container-lowest)",
            "surface-container-low": "var(--color-surface-container-low)",
            "surface-container": "var(--color-surface-container)",
            "surface-container-high": "var(--color-surface-container-high)",
            "surface-container-highest": "var(--color-surface-container-highest)",
            "on-surface": "var(--color-on-surface)",
            "on-surface-variant": "var(--color-on-surface-variant)",
            "inverse-surface": "var(--color-inverse-surface)",
            "inverse-on-surface": "var(--color-inverse-on-surface)",
            "outline": "var(--color-outline)",
            "outline-variant": "var(--color-outline-variant)",
            "surface-tint": "var(--color-surface-tint)",
            "on-primary": "var(--color-on-primary)",
            "primary-container": "var(--color-primary-container)",
            "on-primary-container": "var(--color-on-primary-container)",
            "inverse-primary": "var(--color-inverse-primary)",
            "on-secondary": "var(--color-on-secondary)",
            "secondary-container": "var(--color-secondary-container)",
            "on-secondary-container": "var(--color-on-secondary-container)",
            "tertiary": "var(--color-tertiary)",
            "on-tertiary": "var(--color-on-tertiary)",
            "tertiary-container": "var(--color-tertiary-container)",
            "on-tertiary-container": "var(--color-on-tertiary-container)",
            "error": "var(--color-error)",
            "on-error": "var(--color-on-error)",
            "error-container": "var(--color-error-container)",
            "on-error-container": "var(--color-on-error-container)",
            "primary-fixed": "var(--color-primary-fixed)",
            "primary-fixed-dim": "var(--color-primary-fixed-dim)",
            "on-primary-fixed": "var(--color-on-primary-fixed)",
            "on-primary-fixed-variant": "var(--color-on-primary-fixed-variant)",
            "secondary-fixed": "var(--color-secondary-fixed)",
            "secondary-fixed-dim": "var(--color-secondary-fixed-dim)",
            "on-secondary-fixed": "var(--color-on-secondary-fixed)",
            "on-secondary-fixed-variant": "var(--color-on-secondary-fixed-variant)",
            "tertiary-fixed": "var(--color-tertiary-fixed)",
            "tertiary-fixed-dim": "var(--color-tertiary-fixed-dim)",
            "on-tertiary-fixed": "var(--color-on-tertiary-fixed)",
            "on-tertiary-fixed-variant": "var(--color-on-tertiary-fixed-variant)",
            "surface-variant": "var(--color-surface-variant)"
          },
          borderRadius: {
            "sm": "var(--radius-sm)",
            "DEFAULT": "var(--radius-default)",
            "md": "var(--radius-md)",
            "lg": "var(--radius-lg)",
            "xl": "var(--radius-xl)",
            "full": "var(--radius-full)"
          },
          spacing: {
            "gutter": "var(--spacing-gutter)",
            "margin-mobile": "var(--spacing-margin-mobile)",
            "margin-desktop": "var(--spacing-margin-desktop)",
            "section-mobile": "var(--spacing-section-mobile)",
            "base": "var(--spacing-base)",
            "section-desktop": "var(--spacing-section-desktop)"
          },
          fontFamily: {
            "body-lg": ["Outfit"],
            "label-sm": ["Outfit"],
            "display-lg-mobile": ["Syne", "Clash Display"],
            "display-lg": ["Syne", "Clash Display"],
            "headline-xl": ["Syne", "Clash Display"],
            "headline-lg": ["Syne", "Clash Display"],
            "body-md": ["Outfit"],
            "label-md": ["Outfit"]
          }
        }
      }
    };
  </script>
</head>
<body <?php body_class( 'bg-background text-on-background font-body-md selection:bg-secondary-fixed selection:text-on-secondary-fixed pt-[88px]' ); ?>>
<?php wp_body_open(); ?>

  <!-- Navigation Bar -->
  <nav class="fixed top-0 w-full z-50 navbar-glass">
    <div class="flex justify-between items-center px-margin-mobile md:px-margin-desktop py-6 max-w-[1440px] mx-auto">
      
      <!-- Left Menu: Dynamic Menu (Primary Menu) -->
      <div class="flex-1 hidden md:flex gap-8 items-center">
        <?php
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex gap-8 font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70 items-center',
                'fallback_cb'    => false,
            ) );
        } else {
            // Fallback Menu
            echo '<a class="font-label-md text-label-md uppercase tracking-widest text-primary font-bold" href="' . esc_url( home_url('/shop') ) . '">SHOP</a>';
            echo '<a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70 hover:text-primary transition-colors" href="' . esc_url( home_url('/about') ) . '">ABOUT</a>';
            echo '<a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70 hover:text-primary transition-colors" href="' . esc_url( home_url('/#journal') ) . '">JOURNAL</a>';
        }
        ?>
      </div>

      <!-- Center Logo: Dynamic Custom Logo -->
      <div class="flex-shrink-0 text-center">
        <?php
        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
            echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="font-display text-2xl md:text-3xl font-bold tracking-tighter text-primary">' . get_bloginfo( 'name' ) . '</a>';
        }
        ?>
      </div>

      <!-- Right Icons -->
      <div class="flex-1 flex justify-end items-center gap-6">
        <div class="hidden md:flex gap-8 items-center mr-8 font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70">
          <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/hair-services' ) ); ?>">HAIRS</a>
          <a class="hover:text-primary transition-colors" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">ACCOUNT</a>
        </div>
        <button class="cursor-pointer transition-all duration-300 ease-in-out hover:opacity-70 bg-transparent border-0">
          <span class="material-symbols-outlined">search</span>
        </button>
        <button class="cursor-pointer transition-all duration-300 ease-in-out hover:opacity-70 relative bg-transparent border-0" data-cart-trigger>
          <span class="material-symbols-outlined">shopping_bag</span>
          <span class="absolute -top-1 -right-1 w-4 h-4 bg-secondary-fixed-dim text-white text-[9px] font-bold flex items-center justify-center rounded-full hidden" data-cart-count>0</span>
        </button>
        <button class="md:hidden bg-transparent border-0" data-menu-trigger>
          <span class="material-symbols-outlined">menu</span>
        </button>
      </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobile-nav" class="hidden md:hidden bg-surface-container-lowest border-t border-outline-variant/30 px-6 py-8 flex flex-col gap-6">
        <?php
        if ( has_nav_menu( 'mobile' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'mobile',
                'container'      => false,
                'menu_class'     => 'flex flex-col gap-6 font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70',
                'fallback_cb'    => false,
            ) );
        } else {
            echo '<a class="font-label-md text-label-md uppercase tracking-widest text-primary font-bold" href="' . esc_url( home_url('/shop') ) . '">SHOP ALL</a>';
            echo '<a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70" href="' . esc_url( home_url('/about') ) . '">OUR STORY</a>';
            echo '<a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70" href="' . esc_url( home_url('/hair-services') ) . '">HAIRS</a>';
            echo '<a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70" href="' . esc_url( home_url('/account') ) . '">MY ACCOUNT</a>';
        }
        ?>
    </div>
  </nav>
