<?php
/**
 * MK GLAMZ Theme Footer
 */
?>
  <!-- Footer Component -->
  <footer class="bg-surface-container-high py-section-desktop border-t border-outline-variant/30 text-on-surface">
    <div class="max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
        <div>
          <h3 class="font-display text-2xl font-bold tracking-tighter text-primary mb-6"><?php bloginfo( 'name' ); ?></h3>
          <p class="font-body-md text-on-surface-variant/80 max-w-xs mb-6">
            <?php bloginfo( 'description' ); ?>
          </p>
          <div class="flex gap-4">
            <a href="#" class="hover:text-secondary-fixed-dim transition-colors" aria-label="Instagram"><span class="material-symbols-outlined">camera</span></a>
            <a href="#" class="hover:text-secondary-fixed-dim transition-colors" aria-label="Pinterest"><span class="material-symbols-outlined">dynamic_feed</span></a>
            <a href="#" class="hover:text-secondary-fixed-dim transition-colors" aria-label="TikTok"><span class="material-symbols-outlined">music_note</span></a>
          </div>
        </div>
        
        <div>
          <h4 class="font-label-md text-label-md tracking-widest uppercase text-primary mb-6">SHOP</h4>
          <ul class="flex flex-col gap-4 font-body-md text-on-surface-variant">
            <li><a href="<?php echo esc_url( home_url('/shop') ); ?>" class="hover:text-primary transition-colors">Face Products</a></li>
            <li><a href="<?php echo esc_url( home_url('/shop') ); ?>" class="hover:text-primary transition-colors">Lip Products</a></li>
            <li><a href="<?php echo esc_url( home_url('/shop') ); ?>" class="hover:text-primary transition-colors">Luminous Powders</a></li>
            <li><a href="<?php echo esc_url( home_url('/shop') ); ?>" class="hover:text-primary transition-colors">Prestige Collection</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="font-label-md text-label-md tracking-widest uppercase text-primary mb-6">OUR STORY</h4>
          <ul class="flex flex-col gap-4 font-body-md text-on-surface-variant">
            <li><a href="<?php echo esc_url( home_url('/about') ); ?>" class="hover:text-primary transition-colors">The Brand</a></li>
            <li><a href="<?php echo esc_url( home_url('/#journal') ); ?>" class="hover:text-primary transition-colors">Editorial Journal</a></li>
            <li><a href="<?php echo esc_url( home_url('/hair-services') ); ?>" class="hover:text-primary transition-colors">Hair Services</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Careers</a></li>
          </ul>
        </div>
        
        <!-- Dynamic Widgets Footer Block -->
        <div>
          <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
              <?php dynamic_sidebar( 'footer-1' ); ?>
          <?php else : ?>
              <h4 class="font-label-md text-label-md tracking-widest uppercase text-primary mb-6">SUPPORT</h4>
              <ul class="flex flex-col gap-4 font-body-md text-on-surface-variant">
                <li><a href="#" class="hover:text-primary transition-colors">Shipping & Returns</a></li>
                <li><a href="#" class="hover:text-primary transition-colors">FAQ</a></li>
                <li><a href="#" class="hover:text-primary transition-colors">Contact Us</a></li>
                <li><a href="<?php echo esc_url( home_url('/privacy-policy') ); ?>" class="hover:text-primary transition-colors">Privacy Policy</a></li>
              </ul>
          <?php endif; ?>
        </div>
      </div>
      
      <div class="border-t border-outline-variant/30 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 font-label-sm text-label-sm text-on-surface-variant/60 uppercase tracking-widest">
        <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
        <div class="flex gap-6">
          <a href="#" class="hover:text-primary transition-colors">Terms of Service</a>
          <a href="<?php echo esc_url( home_url('/privacy-policy') ); ?>" class="hover:text-primary transition-colors">Privacy</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Sliding Cart Drawer (WooCommerce Integrated overlay wrapper) -->
  <div id="cart-backdrop" class="drawer-backdrop"></div>
  <div id="cart-drawer" class="drawer">
    <div class="flex justify-between items-center p-6 border-b border-outline-variant/30">
      <h3 class="font-display text-lg font-bold tracking-tight text-primary">SHOPPING BAG (<span data-cart-count>0</span>)</h3>
      <button data-cart-close class="text-primary hover:opacity-75 transition-opacity bg-transparent border-0 cursor-pointer">
        <span class="material-symbols-outlined text-2xl">close</span>
      </button>
    </div>
    
    <div id="cart-drawer-items" class="flex-1 overflow-y-auto hide-scrollbar">
      <!-- WooCommerce Cart drawer preview items loaded dynamically by main.js -->
    </div>
    
    <div class="p-6 border-t border-outline-variant/30 bg-surface-container-low">
      <div class="flex justify-between items-center mb-6">
        <span class="font-label-md text-label-md tracking-wider uppercase text-on-surface-variant">Estimated Subtotal</span>
        <span id="cart-drawer-subtotal" class="font-body text-lg font-bold">$0.00</span>
      </div>
      <p class="text-xs text-on-surface-variant/80 mb-6">Shipping, taxes, and discounts will be calculated at checkout.</p>
      <div class="flex flex-col gap-3">
        <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="w-full bg-primary text-on-primary text-center py-5 uppercase font-label-md text-label-md tracking-widest hover:bg-neutral-800 transition-colors block">Proceed to Checkout</a>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="w-full text-center py-3 uppercase font-label-sm text-label-sm tracking-widest hover:text-primary transition-colors block">Continue Shopping</a>
      </div>
    </div>
  </div>

  <?php wp_footer(); ?>
</body>
</html>
