document.addEventListener('DOMContentLoaded', () => {
  // 1. Editorial Reveal on Scroll
  const revealElements = document.querySelectorAll('.editorial-reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  });

  revealElements.forEach(el => {
    observer.observe(el);
  });

  // 2. Sliding Cart Drawer Toggle & Functionality
  const cartTrigger = document.querySelector('[data-cart-trigger]');
  const cartClose = document.querySelector('[data-cart-close]');
  const cartDrawer = document.getElementById('cart-drawer');
  const cartBackdrop = document.getElementById('cart-backdrop');
  const cartCountBadges = document.querySelectorAll('[data-cart-count]');

  function openCart() {
    if (cartDrawer && cartBackdrop) {
      cartDrawer.classList.add('open');
      cartBackdrop.classList.add('open');
      document.body.style.overflow = 'hidden'; // Lock background scroll
    }
  }

  function closeCart() {
    if (cartDrawer && cartBackdrop) {
      cartDrawer.classList.remove('open');
      cartBackdrop.classList.remove('open');
      document.body.style.overflow = '';
    }
  }

  if (cartTrigger) cartTrigger.addEventListener('click', openCart);
  if (cartClose) cartClose.addEventListener('click', closeCart);
  if (cartBackdrop) cartBackdrop.addEventListener('click', closeCart);

  // Simple In-Memory Cart State
  let cartItems = [
    {
      id: 'prestige-foundation',
      name: 'Prestige Luminous Foundation',
      shade: '02 Warm Silk',
      price: 68.00,
      image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBuxPXCIAJDif5PwIIksEX7ZuyzYC6F9T7vtPOuuj6-UVpzXQC91uiYpajHdbU9iAxCaawRTcnpaDTCSwS6TcwP7qYF5lorcT-FJkXniErOiQQYgrC23LsC5hENgAoSUIUTz-qAPaRAvZzcPP84OwmIfl2cm0SWmzrjpAU6iXzKF_SNqVKeWxRU9YNcs0-ZUW_Fqnq8c3EtyEq6PnCbGJGrWGpjr0u4RmEKqpSG546ZSGtGbbiwlRe_D0_kVRIh3aVMsP2IthH11xdI',
      qty: 1
    }
  ];

  // Render Cart Drawer
  const cartItemsContainer = document.getElementById('cart-drawer-items');
  const cartSubtotalEl = document.getElementById('cart-drawer-subtotal');

  function renderCart() {
    if (!cartItemsContainer) return;
    
    // Update badge counts
    const totalQty = cartItems.reduce((acc, item) => acc + item.qty, 0);
    cartCountBadges.forEach(badge => {
      badge.textContent = totalQty;
      if (totalQty > 0) {
        badge.classList.remove('hidden');
      } else {
        badge.classList.add('hidden');
      }
    });

    if (cartItems.length === 0) {
      cartItemsContainer.innerHTML = `
        <div class="flex flex-col items-center justify-center h-64 text-center px-6">
          <span class="material-symbols-outlined text-4xl text-on-surface-variant/40 mb-4">shopping_bag</span>
          <p class="font-body-md text-on-surface-variant mb-6">Your shopping bag is empty.</p>
          <a href="shop.html" class="bg-primary text-on-primary px-8 py-4 uppercase font-label-md text-label-md tracking-widest hover:bg-neutral-800 transition-colors">Shop All</a>
        </div>
      `;
      if (cartSubtotalEl) cartSubtotalEl.textContent = '$0.00';
      return;
    }

    let cartHtml = '';
    let subtotal = 0;

    cartItems.forEach((item, index) => {
      const itemSubtotal = item.price * item.qty;
      subtotal += itemSubtotal;
      cartHtml += `
        <div class="flex gap-4 p-6 border-b border-outline-variant/30">
          <img src="${item.image}" alt="${item.name}" class="w-20 h-24 object-cover bg-surface-container-low rounded-md">
          <div class="flex-1 flex flex-col justify-between">
            <div>
              <div class="flex justify-between items-start">
                <h4 class="font-display text-sm font-semibold">${item.name}</h4>
                <button data-remove-item="${index}" class="text-on-surface-variant/50 hover:text-primary transition-colors">
                  <span class="material-symbols-outlined text-lg">close</span>
                </button>
              </div>
              <p class="text-xs text-on-surface-variant/75 mt-1">Shade: ${item.shade}</p>
            </div>
            <div class="flex justify-between items-center mt-2">
              <div class="flex items-center border border-outline-variant rounded-sm">
                <button data-qty-dec="${index}" class="px-2 py-1 text-xs hover:bg-surface-container transition-colors">-</button>
                <span class="px-3 text-xs font-semibold">${item.qty}</span>
                <button data-qty-inc="${index}" class="px-2 py-1 text-xs hover:bg-surface-container transition-colors">+</button>
              </div>
              <span class="font-body text-sm font-medium">$${itemSubtotal.toFixed(2)}</span>
            </div>
          </div>
        </div>
      `;
    });

    cartItemsContainer.innerHTML = cartHtml;
    if (cartSubtotalEl) cartSubtotalEl.textContent = `$${subtotal.toFixed(2)}`;

    // Add event listeners to newly rendered items
    document.querySelectorAll('[data-remove-item]').forEach(btn => {
      btn.addEventListener('click', (e) => {
        const idx = parseInt(btn.getAttribute('data-remove-item'));
        cartItems.splice(idx, 1);
        renderCart();
      });
    });

    document.querySelectorAll('[data-qty-dec]').forEach(btn => {
      btn.addEventListener('click', () => {
        const idx = parseInt(btn.getAttribute('data-qty-dec'));
        if (cartItems[idx].qty > 1) {
          cartItems[idx].qty--;
        } else {
          cartItems.splice(idx, 1);
        }
        renderCart();
      });
    });

    document.querySelectorAll('[data-qty-inc]').forEach(btn => {
      btn.addEventListener('click', () => {
        const idx = parseInt(btn.getAttribute('data-qty-inc'));
        cartItems[idx].qty++;
        renderCart();
      });
    });
  }

  // Initial render
  renderCart();

  // Expose global Add to Cart logic
  window.addToCart = function(product) {
    const existing = cartItems.find(item => item.id === product.id && item.shade === product.shade);
    if (existing) {
      existing.qty++;
    } else {
      cartItems.push({
        id: product.id,
        name: product.name,
        shade: product.shade || 'Default',
        price: product.price,
        image: product.image,
        qty: 1
      });
    }
    renderCart();
    openCart();
  };

  // 3. FAQ Accordion Collapsible toggles
  const accordionItems = document.querySelectorAll('.accordion-item');
  accordionItems.forEach(item => {
    const header = item.querySelector('.accordion-header');
    const content = item.querySelector('.accordion-content');
    if (header && content) {
      header.addEventListener('click', () => {
        const isActive = item.classList.contains('active');
        // Close all accordions
        accordionItems.forEach(otherItem => {
          otherItem.classList.remove('active');
          const otherContent = otherItem.querySelector('.accordion-content');
          if (otherContent) otherContent.style.maxHeight = '0px';
        });

        if (!isActive) {
          item.classList.add('active');
          content.style.maxHeight = content.scrollHeight + 'px';
        }
      });
    }
  });

  // 4. Product Page Gallery Image Switching
  const mainGalleryImage = document.getElementById('main-gallery-image');
  const thumbnailButtons = document.querySelectorAll('[data-gallery-thumb]');

  if (thumbnailButtons && mainGalleryImage) {
    thumbnailButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        const newSrc = btn.getAttribute('data-gallery-thumb');
        mainGalleryImage.setAttribute('src', newSrc);

        // Highlight active thumbnail
        thumbnailButtons.forEach(t => t.classList.remove('border-primary'));
        thumbnailButtons.forEach(t => t.classList.add('border-transparent'));
        btn.classList.remove('border-transparent');
        btn.classList.add('border-primary');
      });
    });
  }

  // 5. Mobile Navigation Menu Toggle
  const menuTrigger = document.querySelector('[data-menu-trigger]');
  const mobileNav = document.getElementById('mobile-nav');
  if (menuTrigger && mobileNav) {
    menuTrigger.addEventListener('click', () => {
      mobileNav.classList.toggle('hidden');
      const icon = menuTrigger.querySelector('.material-symbols-outlined');
      if (icon) {
        icon.textContent = mobileNav.classList.contains('hidden') ? 'menu' : 'close';
      }
    });
  }
});
