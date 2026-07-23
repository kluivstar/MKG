<?php
/**
 * Theme Navigation Bar Template Part
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
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
          // Fallback Menu with Mega Menu
          ?>
          <div class="group py-2">
            <a class="font-label-md text-label-md uppercase tracking-widest text-primary font-bold cursor-pointer" href="<?php echo esc_url( home_url('/shop') ); ?>">SHOP <i class="fa-solid fa-chevron-down text-[10px] ml-1.5 align-middle"></i></a>
            
            <!-- Mega Menu Dropdown -->
            <div class="absolute left-0 top-[100%] w-full bg-white border border-outline-variant/30 p-8 grid grid-cols-12 gap-8 shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 pointer-events-none group-hover:pointer-events-auto z-50">
              <!-- Left: Categories -->
              <div class="col-span-5 flex flex-col gap-6">
                <h4 class="font-display text-lg tracking-widest uppercase text-secondary font-bold text-left">Categories</h4>
                <div class="flex flex-col gap-4 text-left">
                  <a href="<?php echo esc_url( home_url('/shop') ); ?>" class="font-display text-3xl text-primary font-bold hover:text-secondary-fixed-dim transition-colors">Face Products</a>
                  <a href="<?php echo esc_url( home_url('/shop') ); ?>" class="font-display text-3xl text-primary font-bold hover:text-secondary-fixed-dim transition-colors">Lip Products</a>
                  <a href="<?php echo esc_url( home_url('/shop') ); ?>" class="font-display text-3xl text-primary font-bold hover:text-secondary-fixed-dim transition-colors">Luminous Powders</a>
                  <a href="<?php echo esc_url( home_url('/shop') ); ?>" class="font-display text-3xl text-primary font-bold hover:text-secondary-fixed-dim transition-colors">Prestige Collection</a>
                </div>
              </div>
              
              <!-- Right: Recommended Products -->
              <div class="col-span-7 grid grid-cols-2 gap-6 border-l border-outline-variant/30 pl-8 text-left">
                <div class="col-span-2">
                  <h4 class="font-display text-lg tracking-widest uppercase text-secondary font-bold mb-4">Recommended</h4>
                </div>
                <!-- Recommended 1 -->
                <a href="<?php echo esc_url( home_url('/shop') ); ?>" class="flex gap-4 group/item">
                  <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBSc4q6a0pFvNa3VTS7shBcgks6PxZOtBOWyCf54qzZX9KAFp8a_GpXdtl_cFVXwIaNCLZH9Qk4Nt-qszqif9BIZJ788t4IX9rfWM71RHLmfuI23kgxdElLUYZ9TPaHmlkPFHISfrAxelnit6MPDvGzWiGYy4yRKdxY0k2UF8Ib1A2Dh3QdG6lssxcaiNf6ToBDDiaUD-kRCbFagbBfTv7HCIYszx4vof51q-qZ4qqzrggxe1zrVkoorl4dt1RPH0xVyFYTmczgj-bn" class="w-20 h-24 object-cover" alt="Recommended Fluid"/>
                  <div>
                    <h5 class="font-display text-base text-primary group-hover/item:text-secondary-fixed-dim transition-colors">Velvet Skin Fluid</h5>
                    <p class="font-body-md text-sm text-on-surface-variant">$62.00</p>
                  </div>
                </a>
                <!-- Recommended 2 -->
                <a href="<?php echo esc_url( home_url('/shop') ); ?>" class="flex gap-4 group/item">
                  <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBGYx0R3up-CWY_53ISGIXIeIGS37weK3M_sU_plXRCXTYy0I0QavV5cncffSRK6m-_4e3owjd9EiIp37IApIfDi4A8hJ-awQC4uvxBwIJVWLHYSCUMFyRi3KsbO_Bae9v1I2l7DP3EKeySmXxUPRwMujCesk8MLmmh4kl8Owmu3uXRPEuWfYCh4-p4elebFZ4qCLNDZjfpv3hTUHlCLqvGsS1PJI6cQIbWgKz5adCjngCWT652HzFTRnq2odPTZNup58cdeUijmSrg" class="w-20 h-24 object-cover" alt="Recommended Satin"/>
                  <div>
                    <h5 class="font-display text-base text-primary group-hover/item:text-secondary-fixed-dim transition-colors">Satin Petal Lipstick</h5>
                    <p class="font-body-md text-sm text-on-surface-variant">$38.00</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <?php
          echo '<a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70 hover:text-primary transition-colors" href="' . esc_url( home_url('/about-mk-glamz') ) . '">ABOUT</a>';
          echo '<a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70 hover:text-primary transition-colors" href="' . esc_url( home_url('/beauty-blog') ) . '">JOURNAL</a>';
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
        <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/makeup-services' ) ); ?>">HAIRS</a>
        <a class="hover:text-primary transition-colors" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">ACCOUNT</a>
      </div>
      <button class="cursor-pointer transition-all duration-300 ease-in-out hover:opacity-70 bg-transparent border-0">
        <i class="fa-solid fa-magnifying-glass text-lg"></i>
      </button>
      <button class="cursor-pointer transition-all duration-300 ease-in-out hover:opacity-70 relative bg-transparent border-0" data-cart-trigger>
        <i class="fa-solid fa-bag-shopping text-lg"></i>
        <span class="absolute -top-1 -right-1 w-4 h-4 bg-secondary-fixed-dim text-white text-[9px] font-bold flex items-center justify-center rounded-full hidden" data-cart-count>0</span>
      </button>
      <button class="md:hidden bg-transparent border-0" data-menu-trigger>
        <i class="fa-solid fa-bars text-lg"></i>
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
          ?>
          <div class="flex flex-col gap-4">
            <button class="flex justify-between items-center font-label-md text-label-md uppercase tracking-widest text-primary font-bold bg-transparent border-0 cursor-pointer text-left w-full" onclick="document.getElementById('mobile-shop-submenu').classList.toggle('hidden')">
              <span>SHOP</span>
              <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>
            <div id="mobile-shop-submenu" class="hidden pl-4 flex flex-col gap-4">
              <a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70" href="<?php echo esc_url( home_url('/shop') ); ?>">Face Products</a>
              <a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70" href="<?php echo esc_url( home_url('/shop') ); ?>">Lip Products</a>
              <a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70" href="<?php echo esc_url( home_url('/shop') ); ?>">Luminous Powders</a>
              <a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70" href="<?php echo esc_url( home_url('/shop') ); ?>">Prestige Collection</a>
            </div>
          </div>
          <?php
          echo '<a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70" href="' . esc_url( home_url('/about-mk-glamz') ) . '">OUR STORY</a>';
          echo '<a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70" href="' . esc_url( home_url('/makeup-services') ) . '">HAIRS</a>';
          echo '<a class="font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/70" href="' . esc_url( home_url('/account') ) . '">MY ACCOUNT</a>';
      }
      ?>
  </div>
</nav>
