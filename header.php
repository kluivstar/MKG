<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <script>
    tailwind = {
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
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-background text-on-background font-body-md selection:bg-secondary-fixed selection:text-on-secondary-fixed pt-[88px]' ); ?>>
<?php wp_body_open(); ?>

  <!-- Navigation Bar -->
  <?php get_template_part( 'template-parts/navbar' ); ?>
