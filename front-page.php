<?php
/**
 * MK GLAMZ front-page.php template
 */

get_header(); ?>

<!-- Main Content -->
<main>
  <!-- Hero Section -->
  <section class="hero-section relative h-screen w-full flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
      <img class="w-full h-full object-cover object-center scale-105 transition-transform duration-[10s] hover:scale-100" alt="MK GLAMZ Hero Makeup Shot" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero.jpg"/>
      <div class="absolute inset-0 bg-gradient-to-r from-background/40 to-transparent"></div>
    </div>
    <div class="relative z-10 px-margin-mobile md:px-margin-desktop max-w-[1440px] mx-auto w-full">
      <div class="max-w-2xl editorial-reveal visible">
        <span class="font-label-md text-label-md tracking-[0.3em] uppercase text-on-surface-variant mb-6 block">The Inaugural Collection</span>
        <h2 class="font-display text-5xl md:text-8xl text-primary mb-8 leading-none">The Art of <br/>Elegance</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-10 max-w-lg">Curating prestige beauty for the discerning individual. Discover a symphony of texture, light, and artistry in our limited release series.</p>
        <div class="flex gap-4">
          <a href="<?php echo esc_url( home_url('/shop') ); ?>" class="bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-white hover:text-black transition-all duration-300 uppercase tracking-widest text-[11px] md:text-sm font-label-md px-6 py-3 md:px-10 md:py-5 font-bold text-center inline-block">Shop Now</a>
          <a href="#makeup-booking" class="border border-white/40 text-white hover:border-white hover:bg-white/5 transition-all duration-300 uppercase tracking-widest text-[11px] md:text-sm font-label-md px-6 py-3 md:px-10 md:py-5 font-bold text-center inline-block">BOOK US</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Elementor & Dynamic Content Hook -->
  <?php
  if ( have_posts() ) {
      while ( have_posts() ) : the_post();
          the_content();
      endwhile;
  }
  ?>

  <!-- Featured Collections (Bento Style) -->
  <section class="featured-collections-section py-section-desktop px-margin-mobile md:px-margin-desktop max-w-[1440px] mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
      <h3 class="font-display text-4xl md:text-5xl text-primary">Signature Tones</h3>
      <p class="font-body-md text-body-md text-on-surface-variant max-w-sm text-right">Meticulously developed formulas for professional-grade results at home.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter h-[auto] md:h-[800px]">
      <!-- Col 1 -->
      <div class="md:col-span-8 relative overflow-hidden group cursor-pointer h-[400px] md:h-full">
        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Face collection preview" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBuxPXCIAJDif5PwIIksEX7ZuyzYC6F9T7vtPOuuj6-UVpzXQC91uiYpajHdbU9iAxCaawRTcnpaDTCSwS6TcwP7qYF5lorcT-FJkXniErOiQQYgrC23LsC5hENgAoSUIUTz-qAPaRAvZzcPP84OwmIfl2cm0SWmzrjpAU6iXzKF_SNqVKeWxRU9YNcs0-ZUW_Fqnq8c3EtyEq6PnCbGJGrWGpjr0u4RmEKqpSG546ZSGtGbbiwlRe_D0_kVRIh3aVMsP2IthH11xdI"/>
        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors"></div>
        <div class="absolute bottom-10 left-10 text-white">
          <span class="font-label-sm text-label-sm uppercase tracking-widest block mb-2">Collection 01</span>
          <h4 class="font-display text-3xl md:text-5xl mb-4">Face</h4>
          <a href="<?php echo esc_url( home_url('/shop') ); ?>" class="text-white border-b border-white pb-1 font-label-md text-label-md tracking-widest uppercase hover:opacity-70 transition-opacity">Explore Line</a>
        </div>
      </div>
      
      <!-- Col 2 -->
      <div class="md:col-span-4 flex flex-col gap-gutter h-[800px] md:h-full">
        <div class="relative overflow-hidden group cursor-pointer flex-1 h-[400px]">
          <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Lips collection preview" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAOsX6nxh7IgKj7r3enVghuiZDbee2W97G3K6Ma9U37eHXchXDzLTj_NEUJlBTHDZiXfm9iOeXZz67VAcYN-8whfeoLs8fevrqG7fZ-76FDQOpBseYqdxBVUiwiM1wbpmk6Lv5hAUJGf5ZY5yEkZDdPNbeqToroAyJvEFpDGMC9b9r9phygupAkXg4RnMebUJVqOG1vvU7Oaw9lrz7matdlhPOux7OLmRduIRLn0h8IyQvRhhgSwmt34N0rZEXUrLlEDlxRDL53ZS4r"/>
          <div class="absolute inset-0 bg-black/5 group-hover:bg-black/15 transition-colors"></div>
          <div class="absolute bottom-8 left-8 text-white">
            <h4 class="font-display text-2xl md:text-3xl mb-2">Lips</h4>
            <a href="<?php echo esc_url( home_url('/shop') ); ?>" class="text-white border-b border-white pb-1 font-label-sm text-label-sm tracking-widest uppercase hover:opacity-70 transition-opacity">Shop Now</a>
          </div>
        </div>
        <div class="relative overflow-hidden group cursor-pointer flex-1 h-[400px]">
          <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Eyes collection preview" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC3RUMFSf52Lq895LPVQlSYabYadYWj7Hp9NAtllIXk0ctGN82QU8IEAgjYnB9Op6Aey6KplWPxJq-avmkPrRcu-KcroIWfGrWJN1RdQQ7_zZQyf3xIcqcyCsL8ZGHCYru16I3rNaSmpuTS1R_uAOdsM_UL90iaZqcNkZr3W9slgKX8d2kpFcDPgEJkL6n9_uLTLtStUUcEzhuFZNw-CwON0EjjDfiYz8nUCljwRu0hV8opYysF1ygnPCVVjDdLvEzu5_bpQribHCZ2"/>
          <div class="absolute inset-0 bg-black/5 group-hover:bg-black/15 transition-colors"></div>
          <div class="absolute bottom-8 left-8 text-white">
            <h4 class="font-display text-2xl md:text-3xl mb-2">Eyes</h4>
            <a href="<?php echo esc_url( home_url('/shop') ); ?>" class="text-white border-b border-white pb-1 font-label-sm text-label-sm tracking-widest uppercase hover:opacity-70 transition-opacity">Discover</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Best Sellers: Dynamic WooCommerce Products -->
  <section class="best-sellers-section bg-surface-container-low py-section-desktop overflow-hidden">
    <div class="px-margin-mobile md:px-margin-desktop max-w-[1440px] mx-auto mb-12 flex justify-between items-baseline">
      <h3 class="font-display text-3xl md:text-5xl text-primary">Best Sellers</h3>
      <a class="font-label-md text-label-md text-primary hover:opacity-50 transition-opacity uppercase tracking-widest border-b border-primary pb-1" href="<?php echo esc_url( home_url('/shop') ); ?>">View All Arrivals</a>
    </div>
    
    <div class="flex gap-gutter overflow-x-auto hide-scrollbar px-margin-mobile md:px-margin-desktop pb-8">
      <?php
      if ( class_exists( 'WooCommerce' ) ) {
          // Dynamic query for WooCommerce products
          $args = array(
              'post_type'      => 'product',
              'posts_per_page' => 4,
              'meta_key'       => 'total_sales',
              'orderby'        => 'meta_value_num',
          );
          $loop = new WP_Query( $args );
          if ( $loop->have_posts() ) {
              while ( $loop->have_posts() ) : $loop->the_post();
                  global $product;
                  ?>
                  <div class="min-w-[320px] md:min-w-[400px] group cursor-pointer" onclick="location.href='<?php the_permalink(); ?>'">
                    <div class="relative overflow-hidden bg-white mb-6">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <?php the_post_thumbnail( 'large', array( 'class' => 'w-full aspect-[3/4] object-cover group-hover:scale-105 transition-transform duration-700' ) ); ?>
                      <?php else : ?>
                          <img class="w-full aspect-[3/4] object-cover group-hover:scale-105 transition-transform duration-700" alt="Product Placeholder" src="<?php echo esc_url( wc_placeholder_img_src() ); ?>"/>
                      <?php endif; ?>
                      <div class="absolute bottom-4 left-4 right-4 bg-surface/90 backdrop-blur text-primary text-xs font-label-md tracking-widest uppercase py-3 text-center opacity-0 translate-y-2 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 pointer-events-none hover:bg-primary hover:text-on-primary">Quick Shop</div>
                    </div>
                    <div class="text-center">
                      <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest mb-1">
                        <?php echo wc_get_product_category_list( $product->get_id(), ', ', '', '' ); ?>
                      </p>
                      <h4 class="font-display text-xl md:text-2xl text-primary mb-2"><?php the_title(); ?></h4>
                      <p class="font-body-md text-body-md text-on-surface-variant"><?php echo $product->get_price_html(); ?></p>
                    </div>
                  </div>
                  <?php
              endwhile;
              wp_reset_postdata();
          } else {
              // WooCommerce is active but no products are added yet
              echo '<p class="text-on-surface-variant">No products found. Add products in the WordPress Admin.</p>';
          }
      } else {
          // WooCommerce not active: output premium design placeholders
          ?>
          <!-- Velvet Skin Fluid -->
          <div class="min-w-[320px] md:min-w-[400px] group cursor-pointer">
            <div class="relative overflow-hidden bg-white mb-6">
              <img class="w-full aspect-[3/4] object-cover group-hover:scale-105 transition-transform duration-700" alt="Velvet Skin Fluid foundation" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBSc4q6a0pFvNa3VTS7shBcgks6PxZOtBOWyCf54qzZX9KAFp8a_GpXdtl_cFVXwIaNCLZH9Qk4Nt-qszqif9BIZJ788t4IX9rfWM71RHLmfuI23kgxdElLUYZ9TPaHmlkPFHISfrAxelnit6MPDvGzWiGYy4yRKdxY0k2UF8Ib1A2Dh3QdG6lssxcaiNf6ToBDDiaUD-kRCbFagbBfTv7HCIYszx4vof51q-qZ4qqzrggxe1zrVkoorl4dt1RPH0xVyFYTmczgj-bn"/>
              <div class="absolute bottom-4 left-4 right-4 bg-surface/90 backdrop-blur text-primary text-xs font-label-md tracking-widest uppercase py-3 text-center opacity-0 translate-y-2 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 pointer-events-none hover:bg-primary hover:text-on-primary">Quick Shop</div>
            </div>
            <div class="text-center">
              <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest mb-1">Face</p>
              <h4 class="font-display text-xl md:text-2xl text-primary mb-2">Velvet Skin Fluid</h4>
              <p class="font-body-md text-body-md text-on-surface-variant">$62.00</p>
            </div>
          </div>
          <?php
      }
      ?>
    </div>
  </section>

  <!-- Professional Artistry (Emphasized Section) -->
  <section id="makeup-booking" class="artistry-booking-section py-section-desktop px-margin-mobile md:px-margin-desktop max-w-[1440px] mx-auto my-16 bg-surface-container rounded-none p-8 md:p-16 shadow-md grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-section-desktop items-center">
    <div class="order-2 md:order-1">
      <div class="relative">
        <img class="w-full aspect-[4/5] object-cover rounded-none" alt="Makeup artistry service" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHwIKeoqy6E04wAFnmlhpKkzVawU_haqFhl7KrHG0lKiwNLY0UZjl41JoHmHG5uyh3vS07c0hxTelNlEygtJ49WQ9q5orBj9VcXl4-XYvGhYkDHSntxolU6vltVS83LRa96_8po-7d5z7ZIRGwllU1RuRjOg1xJmVH3HqQZeWlRkCqMjGrN1u1prCVVU358-YbTnBTHXoh84jQ26Nm7jE34dObJw30MhqMQ6hgjpo7e1phVNrNV7l-HdbaivNXEZC69530gCe_yIgn"/>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 border-4 border-secondary-fixed-dim rounded-none hidden lg:block -z-10"></div>
      </div>
    </div>
    <div class="order-1 md:order-2">
      <span class="font-label-md text-label-md tracking-[0.3em] uppercase text-secondary mb-6 block">Artistry Services</span>
      <h3 class="font-display text-4xl md:text-5xl text-primary mb-8 leading-tight">Mastering Your <br/>Unique Canvas</h3>
      <p class="font-body-lg text-body-lg text-on-surface-variant mb-8 font-semibold">Our master artists provide bespoke beauty consultations and full-service makeup applications for your most significant moments. From bridal elegance to editorial avant-garde, we bring prestige artistry to life.</p>
      <ul class="space-y-4 mb-10">
        <li class="flex items-center gap-4 font-label-md text-label-md uppercase tracking-widest text-primary">
          <span class="material-symbols-outlined text-secondary-fixed-dim">check_circle</span>
          Bridal Artistry Consultations
        </li>
        <li class="flex items-center gap-4 font-label-md text-label-md uppercase tracking-widest text-primary">
          <span class="material-symbols-outlined text-secondary-fixed-dim">check_circle</span>
          Editorial &amp; Red Carpet Styling
        </li>
        <li class="flex items-center gap-4 font-label-md text-label-md uppercase tracking-widest text-primary">
          <span class="material-symbols-outlined text-secondary-fixed-dim">check_circle</span>
          Private Artistry Masterclasses
        </li>
      </ul>
      <button class="bg-primary text-on-primary px-12 py-6 rounded-none font-label-md text-label-md tracking-widest uppercase hover:bg-neutral-800 transition-all duration-500 shadow-lg">Book A Session</button>
    </div>
  </section>

  <!-- The Hair Collection Preview -->
  <section class="hair-collection-section relative h-[600px] w-full flex items-center overflow-hidden bg-black text-white">
    <div class="absolute inset-0 z-0">
      <img class="w-full h-full object-cover opacity-60" alt="Flowing hair model" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBK5sZs89OeYLqHWcWmKtpcM7wIbC7MGXFdmKlnTUxBDsVVZu2kjltPd70ElBrLipUitVF_LQV67iAwH3w00xmQRDwUjZbS3oB3PRKMa2-crxem_47UYa6l3bkQtsIhSARBGed6lX0eR4LWyw-OLs6JhuFSdKCjoD1iB3xqDl7ifYYUXZD7DZ2w7O3Js359UOoj5E_7aGHzVJkI7xd4LF5nkw3Nqp4YWRNlwYaBiO8YG5eoJFQPeTNpYTdeVGfO-p2qgu5Zk3u3tPiV"/>
      <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
    </div>
    <div class="relative z-10 px-margin-desktop max-w-[1440px] mx-auto w-full text-center">
      <div class="inline-block champagne-gradient text-primary px-4 py-1 font-label-sm text-label-sm uppercase tracking-widest mb-6 font-bold">Coming Soon</div>
      <h3 class="font-display text-4xl md:text-5xl mb-4">The Hair Collection</h3>
      <p class="font-body-lg text-body-lg text-neutral-300 max-w-xl mx-auto mb-10">Extending our philosophy of elegance to the crown. A curated system of care and styling, launching Winter 2026.</p>
      <a href="<?php echo esc_url( home_url('/hair-services') ); ?>" class="border border-white/40 hover:border-white text-white px-10 py-5 font-label-md text-label-md tracking-widest uppercase transition-all duration-500 inline-block">Join the Waitlist</a>
    </div>
  </section>

  <!-- Beauty Journal Preview: Dynamic standard WordPress posts -->
  <section id="journal" class="beauty-journal-section py-section-desktop px-margin-mobile md:px-margin-desktop max-w-[1440px] mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-baseline mb-16">
      <h3 class="font-display text-3xl md:text-5xl text-primary">The Beauty Journal</h3>
      <a class="font-label-md text-label-md text-primary tracking-widest uppercase border-b border-primary pb-1 mt-4 md:mt-0" href="<?php echo esc_url( get_post_type_archive_link('post') ); ?>">Read More Editorial</a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
      <?php
      $blog_args = array(
          'post_type'      => 'post',
          'posts_per_page' => 2,
      );
      $blog_loop = new WP_Query( $blog_args );
      if ( $blog_loop->have_posts() ) {
          while ( $blog_loop->have_posts() ) : $blog_loop->the_post();
              ?>
              <article class="group cursor-pointer" onclick="location.href='<?php the_permalink(); ?>'">
                <div class="overflow-hidden mb-8 bg-surface-container-low rounded-none">
                  <?php if ( has_post_thumbnail() ) : ?>
                      <?php the_post_thumbnail( 'large', array( 'class' => 'w-full aspect-video object-cover group-hover:scale-105 transition-transform duration-700' ) ); ?>
                  <?php else : ?>
                      <div class="w-full aspect-video bg-surface-container-high flex items-center justify-center text-on-surface-variant/35 font-bold uppercase tracking-widest text-xs">Editorial Image</div>
                  <?php endif; ?>
                </div>
                <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-4 block"><?php echo get_the_date(); ?> • <?php the_author(); ?></span>
                <h4 class="font-display text-2xl text-primary mb-4 group-hover:text-secondary-fixed-dim transition-colors"><?php the_title(); ?></h4>
                <p class="font-body-md text-body-md text-on-surface-variant mb-6"><?php echo wp_trim_words( get_the_excerpt(), 25 ); ?></p>
                <a href="<?php the_permalink(); ?>" class="font-label-md text-label-md tracking-widest uppercase text-primary border-b border-primary pb-1 group-hover:pb-2 transition-all inline-block">Read Article</a>
              </article>
              <?php
          endwhile;
          wp_reset_postdata();
      } else {
          // Fallback static journal items
          ?>
          <article class="group cursor-pointer">
            <div class="overflow-hidden mb-8 bg-surface-container-low rounded-none">
              <img class="w-full aspect-video object-cover group-hover:scale-105 transition-transform duration-700" alt="Morning canvas routine" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDX0lSy0SVL_OnTtMOJO67P-yVwYWVIs0PJWQRb4nnsHL1unb0aSYpamzwXNz4Jp8dAkc2bzx4mIKUt4ExAFEq73jkgLxYWw32_hTei1dhAfQCJsrufoOLVAw1PZcpeD1vGSpqz4OWLUuCeaDqM40Lw3ezQg90gzPEML38jwrTrs3h-SbOK9ihZB2WYUMGPrOoOc0wjTb2wiOAXKctSV4JQnoh3bdgCzyouodl_D9kqDN-Tc7utVrJOmdQwm7L7wMWLrYhmxq34yhWt"/>
            </div>
            <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-4 block">Artistry • 12 MIN READ</span>
            <h4 class="font-display text-2xl text-primary mb-4 group-hover:text-secondary-fixed-dim transition-colors">The 7 AM Ritual: Prepping the Canvas</h4>
            <p class="font-body-md text-body-md text-on-surface-variant mb-6">Discover the morning skincare and priming secrets used by our lead artists to ensure makeup longevity and that signature MK glow.</p>
            <a href="<?php echo esc_url( get_post_type_archive_link('post') ); ?>" class="font-label-md text-label-md tracking-widest uppercase text-primary border-b border-primary pb-1 group-hover:pb-2 transition-all inline-block">Read Article</a>
          </article>
          <?php
      }
      ?>
    </div>
  </section>

  <!-- Newsletter Signup -->
  <section class="newsletter-signup-section py-section-desktop bg-primary text-on-primary">
    <div class="px-margin-mobile md:px-margin-desktop max-w-4xl mx-auto text-center">
      <h3 class="font-display text-3xl md:text-5xl mb-6">The Inner Circle</h3>
      <p class="font-body-lg text-body-lg text-neutral-400 mb-10">Sign up to receive early access to new collections, exclusive artistry tutorials, and invitations to private boutique events.</p>
      <form class="flex flex-col md:flex-row gap-4 max-w-2xl mx-auto">
        <input class="flex-1 bg-transparent border-b border-white/30 focus:border-white border-x-0 border-t-0 p-4 font-label-md text-label-md tracking-widest placeholder:text-neutral-600 focus:ring-0 outline-none transition-all" placeholder="EMAIL ADDRESS" type="email" required/>
        <button class="bg-white text-primary px-10 py-4 font-label-md text-label-md tracking-widest uppercase hover:bg-neutral-200 transition-colors" type="submit">Join Now</button>
      </form>
    </div>
  </section>
</main>

<?php get_footer(); ?>
