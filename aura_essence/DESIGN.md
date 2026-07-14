---
name: Aura & Essence
colors:
  surface: '#fbf9f8'
  surface-dim: '#dcd9d9'
  surface-bright: '#fbf9f8'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f6f3f2'
  surface-container: '#f0eded'
  surface-container-high: '#eae8e7'
  surface-container-highest: '#e4e2e1'
  on-surface: '#1b1c1c'
  on-surface-variant: '#4c4546'
  inverse-surface: '#303030'
  inverse-on-surface: '#f3f0f0'
  outline: '#7e7576'
  outline-variant: '#cfc4c5'
  surface-tint: '#5e5e5e'
  primary: '#000000'
  on-primary: '#ffffff'
  primary-container: '#1b1b1b'
  on-primary-container: '#848484'
  inverse-primary: '#c6c6c6'
  secondary: '#735c00'
  on-secondary: '#ffffff'
  secondary-container: '#fed65b'
  on-secondary-container: '#745c00'
  tertiary: '#000000'
  on-tertiary: '#ffffff'
  tertiary-container: '#1b1c1b'
  on-tertiary-container: '#848482'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#e2e2e2'
  primary-fixed-dim: '#c6c6c6'
  on-primary-fixed: '#1b1b1b'
  on-primary-fixed-variant: '#474747'
  secondary-fixed: '#ffe088'
  secondary-fixed-dim: '#e9c349'
  on-secondary-fixed: '#241a00'
  on-secondary-fixed-variant: '#574500'
  tertiary-fixed: '#e4e2e0'
  tertiary-fixed-dim: '#c7c6c4'
  on-tertiary-fixed: '#1b1c1b'
  on-tertiary-fixed-variant: '#464746'
  background: '#fbf9f8'
  on-background: '#1b1c1c'
  surface-variant: '#e4e2e1'
typography:
  display-lg:
    fontFamily: Syne
    fontSize: 80px
    fontWeight: '700'
    lineHeight: 88px
    letterSpacing: -0.02em
  display-lg-mobile:
    fontFamily: Syne
    fontSize: 48px
    fontWeight: '700'
    lineHeight: 52px
    letterSpacing: -0.01em
  headline-xl:
    fontFamily: Syne
    fontSize: 48px
    fontWeight: '600'
    lineHeight: 56px
    letterSpacing: -0.01em
  headline-lg:
    fontFamily: Syne
    fontSize: 32px
    fontWeight: '600'
    lineHeight: 40px
  body-lg:
    fontFamily: Outfit
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
  body-md:
    fontFamily: Outfit
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  label-md:
    fontFamily: Outfit
    fontSize: 14px
    fontWeight: '500'
    lineHeight: 20px
    letterSpacing: 0.05em
  label-sm:
    fontFamily: Outfit
    fontSize: 12px
    fontWeight: '600'
    lineHeight: 16px
    letterSpacing: 0.1em
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  base: 8px
  section-desktop: 120px
  section-mobile: 64px
  gutter: 24px
  margin-desktop: 80px
  margin-mobile: 20px
---

## Brand & Style

The design system is engineered to evoke an atmosphere of exclusive, high-end editorial luxury. It targets a fashion-forward audience that values sophistication, purity, and a curated aesthetic. The UI leverages a **Modern Minimalist** style with **Editorial** influences, prioritizing breathing room and high-contrast typography to create a "digital flagship store" experience.

The emotional response is one of calm, aspiration, and indulgence. By utilizing generous white space and a restricted, warm palette, the interface recedes to allow premium product photography to become the primary visual driver. The interaction model is intentional and graceful, avoiding frantic animations or cluttered layouts in favor of a poised, architectural structure.

## Colors

The palette is rooted in organic, high-end neutrals to establish a sense of timelessness. 

- **Primary (Deep Black):** Used exclusively for high-impact typography and primary call-to-action buttons. It provides the "ink" on the page.
- **Secondary (Champagne Gold):** Reserved for subtle accents, interactive states, and premium signifiers. It should be used sparingly to maintain its value.
- **Tertiary (Warm White):** The core background color (`#FCFAF8`), providing a softer, more luxurious feel than a sterile pure white.
- **Neutral (Charcoal):** Used for secondary text, labels, and borders where pure black would be too jarring.
- **Surface (Very Light Gray):** Used for subtle section breaks and container backgrounds to maintain depth without breaking the minimalist flow.

## Typography

Typography is the structural backbone of this design system. Since "Clash Display" is a custom asset, **Syne** is utilized as the primary display face for its bold, geometric, and high-fashion characteristics. It is paired with **Outfit** for body and functional text to ensure modern legibility.

- **Headlines:** Use high-contrast sizing. Large display type should be used for hero sections and editorial transitions. Tight letter-spacing on larger sizes enhances the premium feel.
- **Body Text:** Keep line lengths between 45-75 characters to ensure a comfortable reading experience.
- **Labels:** Always use uppercase with increased letter-spacing for navigation items, categories, and overlines to create a rhythmic, structured appearance.

## Layout & Spacing

This design system employs a **Fixed Grid** philosophy for desktop to maintain the integrity of editorial compositions, and a **Fluid Grid** for mobile.

- **Desktop:** 12-column grid with an 80px outer margin and 24px gutters. Sections are separated by significant vertical whitespace (120px) to prevent the "cheap marketplace" density.
- **Mobile:** 4-column grid with a 20px outer margin.
- **Spacing Rhythm:** Based on an 8px scale. Use larger increments (64px, 80px, 120px) for layout structure and smaller increments (8px, 16px, 24px) for component internals.
- **Alignment:** Primarily left-aligned for editorial content, with centered layouts reserved for hero statements or minimalist product showcases.

## Elevation & Depth

To maintain a high-end feel, the design system avoids heavy shadows. Depth is communicated through **Tonal Layering** and **Low-Contrast Outlines**.

- **Surface Tiers:** Use the Warm White (`#FCFAF8`) as the base. Pure White (`#FFFFFF`) is used for elevated cards or floating elements.
- **Shadows:** When necessary, use a singular "Ambient Shadow": a very soft, diffused shadow (Blur: 32px, Opacity: 4%, Color: #000000). 
- **Borders:** Use hairline borders (1px) in a very light gray or champagne tint to define boundaries without adding visual weight.
- **Glassmorphism:** Apply a subtle backdrop blur (12px) on navigation bars and overlays to maintain a sense of space and continuity.

## Shapes

The shape language is refined and balanced. It avoids the playfulness of fully rounded pills and the harshness of sharp corners.

- **Primary Radius:** A 0.5rem (8px) radius is the standard for buttons, inputs, and cards. This provides a "Modern Soft" aesthetic that feels premium and approachable.
- **Large Elements:** Containers or hero images may use a `rounded-lg` (16px) radius to soften the layout.
- **Interactive Elements:** Checkboxes and small selectors use a `rounded-sm` (4px) radius to maintain precision.

## Components

### Buttons
- **Primary:** Solid Black background, White text. Medium rounded corners. Generous padding (16px 32px). No shadow.
- **Secondary:** Transparent background, 1px Black or Gold border. 
- **Hover State:** Primary buttons transition to a Deep Charcoal or apply a slight lift. Secondary buttons fill with a very pale gold tint.

### Product Cards
- **Style:** No outer borders or heavy shadows.
- **Image:** Large aspect ratio (3:4 or 1:1) with a light gray background in the photography.
- **Details:** Centered or left-aligned typography below the image. Product name in Syne (Headline-sm), price in Outfit (Body-md).
- **Interaction:** On hover, the image subtly scales (1.05x), and a "Quick Add" text link appears (never a bulky button).

### Input Fields
- **Style:** Underlined (bottom border only) or very subtly outlined. 
- **Typography:** Placeholder text in Charcoal with high transparency. 
- **Focus:** The bottom border transitions to Champagne Gold.

### Navigation
- **Top Bar:** Fixed, semi-transparent backdrop blur.
- **Links:** Uppercase labels with wide letter-spacing. Active state indicated by a subtle gold dot beneath the label.

### Beauty Journal (Blog)
- **Grid:** Asymmetrical layout to mimic a physical magazine.
- **Imagery:** Full-width bleeds and mixed-media styling.