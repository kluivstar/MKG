<?php
/**
 * MK GLAMZ WooCommerce archive-product.php override.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header(); ?>

<main class="pt-16 pb-section-desktop">
  <!-- Collection Header -->
  <header class="px-margin-mobile md:px-margin-desktop max-w-[1440px] mx-auto mb-16 mt-12">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-xs uppercase tracking-widest text-on-surface-variant/60 mb-6 font-semibold">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-primary transition-colors">Home</a>
      <span>/</span>
      <span class="text-primary font-bold">Shop All</span>
    </nav>
    <h1 class="font-display text-5xl md:text-8xl mb-4">The Collection</h1>
    <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
      Elevate your daily ritual with our curated selection of high-performance beauty essentials. Each formula is crafted for editorial longevity and effortless radiance.
    </p>
  </header>

  <!-- Category & Sort Filter Bar -->
  <section class="px-margin-mobile md:px-margin-desktop max-w-[1440px] mx-auto mb-12 sticky top-20 z-40 bg-background/95 py-4 backdrop-blur-md border-b border-outline-variant/20">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 pb-2">
      <!-- Categories -->
      <div class="flex flex-wrap items-center gap-x-8 gap-y-4 font-label-md text-label-md uppercase tracking-widest">
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="text-primary font-bold border-b-2 border-primary pb-1">All</a>
        <?php
        $categories = get_terms( array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
        ) );
        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
            foreach ( $categories as $cat ) {
                echo '<a href="' . esc_url( get_term_link( $cat ) ) . '" class="text-on-surface-variant hover:text-primary transition-colors hover-underline-gold relative">' . esc_html( $cat->name ) . '</a>';
            }
        }
        ?>
        <div class="flex items-center gap-2 px-3 py-1 bg-surface-container-high rounded-full opacity-70">
          <span class="text-on-surface-variant text-[11px] font-bold">Hair Line</span>
          <span class="text-[9px] font-bold text-secondary">COMING SOON</span>
        </div>
      </div>
      <!-- Sorting -->
      <div class="flex items-center gap-4">
        <?php woocommerce_catalog_ordering(); ?>
      </div>
    </div>
  </section>

  <!-- Product Grid -->
  <section class="px-margin-mobile md:px-margin-desktop max-w-[1440px] mx-auto">
    <?php if ( woocommerce_product_loop() ) : ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-gutter">
          <?php
          if ( wc_get_loop_prop( 'total' ) ) {
              while ( have_posts() ) {
                  the_post();
                  global $product;
                  ?>
                  <article <?php wc_product_class( 'group product-card-hover cursor-pointer' ); ?> onclick="location.href='<?php the_permalink(); ?>'">
                    <div class="relative aspect-[3/4] mb-6 overflow-hidden bg-surface-container-low rounded-md">
                      <div class="absolute top-4 right-4 z-10" onclick="event.stopPropagation();">
                        <?php echo do_shortcode('[ti_wishlists_addtowishlist loop=yes]'); // YITH or TI Wishlist shortcode if active ?>
                      </div>
                      <?php if ( has_post_thumbnail() ) : ?>
                          <?php the_post_thumbnail( 'large', array( 'class' => 'product-image w-full h-full object-cover transition-transform duration-700 ease-out' ) ); ?>
                      <?php else : ?>
                          <img class="product-image w-full h-full object-cover transition-transform duration-700 ease-out" src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" alt="<?php the_title_attribute(); ?>"/>
                      <?php endif; ?>
                      
                      <div class="quick-view-btn absolute bottom-0 left-0 w-full p-4 opacity-0 transform translate-y-4 transition-all duration-300">
                        <button class="w-full bg-primary text-on-primary py-4 font-label-md text-label-md uppercase tracking-widest hover:bg-neutral-800 transition-colors" onclick="event.stopPropagation(); location.href='?add-to-cart=<?php echo esc_attr( $product->get_id() ); ?>'">Add to Bag</button>
                      </div>
                    </div>
                    <div class="text-left">
                      <h3 class="font-display text-xl mb-1"><?php the_title(); ?></h3>
                      <p class="font-body-md text-body-md text-on-surface-variant mb-2"><?php echo wc_get_product_category_list( $product->get_id(), ', ', '', '' ); ?></p>
                      <p class="font-body-lg text-body-lg font-bold text-primary"><?php echo $product->get_price_html(); ?></p>
                    </div>
                  </article>
                  <?php
              }
          }
          ?>
        </div>
        <?php
        // Pagination
        woocommerce_pagination();
    else :
        do_action( 'woocommerce_no_products_found' );
    endif;
    ?>
  </section>
</main>

<?php get_footer(); ?>
