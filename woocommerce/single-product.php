<?php
/**
 * MK GLAMZ WooCommerce single-product.php override.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header(); ?>

<main class="pt-16 pb-section-desktop max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop">
  <?php while ( have_posts() ) : the_post(); global $product; ?>
    
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-xs uppercase tracking-widest text-on-surface-variant/60 mb-12 font-semibold">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-primary transition-colors">Home</a>
      <span>/</span>
      <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="hover:text-primary transition-colors">Shop</a>
      <span>/</span>
      <span class="text-primary font-bold"><?php the_title(); ?></span>
    </nav>

    <!-- Product Layout Grid -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter lg:items-start">
      
      <!-- Gallery Component -->
      <div class="col-span-12 md:col-span-7 grid grid-cols-12 gap-4">
        <!-- Thumbnails Column -->
        <div class="col-span-2 space-y-4">
          <?php
          $attachment_ids = $product->get_gallery_image_ids();
          if ( has_post_thumbnail() ) {
              $thumb_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'thumbnail' );
              $full_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'large' );
              ?>
              <button data-gallery-thumb="<?php echo esc_url($full_url); ?>" class="aspect-[3/4] w-full bg-surface-container-low overflow-hidden border border-primary rounded-sm">
                <img class="w-full h-full object-cover" alt="Primary Image" src="<?php echo esc_url($thumb_url); ?>"/>
              </button>
              <?php
          }
          if ( $attachment_ids ) {
              foreach ( $attachment_ids as $attachment_id ) {
                  $thumb_url = wp_get_attachment_image_url( $attachment_id, 'thumbnail' );
                  $full_url = wp_get_attachment_image_url( $attachment_id, 'large' );
                  ?>
                  <button data-gallery-thumb="<?php echo esc_url($full_url); ?>" class="aspect-[3/4] w-full bg-surface-container-low overflow-hidden border border-transparent rounded-sm">
                    <img class="w-full h-full object-cover" alt="Gallery Image" src="<?php echo esc_url($thumb_url); ?>"/>
                  </button>
                  <?php
              }
          }
          ?>
        </div>
        <!-- Main Product Image -->
        <div class="col-span-10">
          <div class="aspect-[3/4] bg-surface-container-low overflow-hidden rounded-md">
            <?php if ( has_post_thumbnail() ) : ?>
                <img id="main-gallery-image" class="w-full h-full object-cover transition-all duration-500" alt="<?php the_title_attribute(); ?>" src="<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'large' ) ); ?>"/>
            <?php else : ?>
                <img id="main-gallery-image" class="w-full h-full object-cover transition-all duration-500" alt="Product Placeholder" src="<?php echo esc_url( wc_placeholder_img_src() ); ?>"/>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Product Info Details -->
      <div class="col-span-12 md:col-span-5 md:sticky md:top-32 space-y-10 mt-8 md:mt-0">
        <div class="space-y-4">
          <div class="flex items-center space-x-2">
            <div class="flex text-secondary">
              <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
              <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
              <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
              <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
              <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
            </div>
            <span class="font-label-sm text-label-sm text-on-surface-variant">(4.8 / 124 REVIEWS)</span>
          </div>
          <h1 class="font-display text-3xl md:text-5xl leading-tight uppercase"><?php the_title(); ?></h1>
          <p class="font-display text-2xl text-primary"><?php echo $product->get_price_html(); ?></p>
        </div>

        <!-- Add to Bag / Form (WooCommerce standard add-to-cart hook support) -->
        <div class="woocommerce-add-to-cart-wrapper">
          <?php woocommerce_template_single_add_to_cart(); ?>
        </div>

        <!-- Accordions -->
        <div class="divide-y divide-outline-variant/30 border-t border-b border-outline-variant/30">
          <!-- Accordion Item 1 -->
          <div class="accordion-item">
            <button class="accordion-header">
              <span class="font-label-md text-label-md uppercase tracking-widest text-primary font-semibold">Description</span>
              <span class="material-symbols-outlined accordion-icon">expand_more</span>
            </button>
            <div class="accordion-content">
              <div class="accordion-content-inner text-on-surface-variant/80 font-body-md leading-relaxed">
                <?php the_content(); ?>
              </div>
            </div>
          </div>

          <!-- Accordion Item 2 -->
          <div class="accordion-item">
            <button class="accordion-header">
              <span class="font-label-md text-label-md uppercase tracking-widest text-primary font-semibold">Additional Details</span>
              <span class="material-symbols-outlined accordion-icon">expand_more</span>
            </button>
            <div class="accordion-content">
              <div class="accordion-content-inner text-on-surface-variant/80 font-body-md leading-relaxed">
                <?php do_action( 'woocommerce_product_additional_information', $product ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
