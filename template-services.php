<?php
/**
 * Template Name: Makeup Services
 */
get_header(); ?>
<main>
  <!-- Hero Section -->
  <header class="relative w-full h-[500px] md:h-[650px] flex items-end overflow-hidden pt-24 bg-primary text-on-primary">
    <div class="px-margin-mobile md:px-margin-desktop pb-section-desktop max-w-[1440px] mx-auto w-full">
      <div class="max-w-3xl">
        <span class="inline-block bg-secondary-fixed-dim text-on-secondary-fixed text-xs font-bold px-3 py-1 uppercase tracking-widest mb-6">COMING SOON</span>
        <h1 class="font-display text-4xl md:text-7xl text-white mb-6 leading-none">Professional Makeup & Hair Services</h1>
        <p class="font-body-lg text-body-lg text-slate-300 max-w-xl">Prestige editorial and event artistry. Experiential consultations and couture beauty designs for your defining moments.</p>
      </div>
    </div>
  </header>

  <!-- Service Details & Waitlist -->
  <section class="px-margin-mobile md:px-margin-desktop py-section-desktop max-w-[1440px] mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
      <div class="md:col-span-7">
        <h2 class="font-display text-3xl md:text-5xl text-primary mb-6">Couture Artistry</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-8">From editorial wings to private bridal styling, our signature application respects individual anatomy, using advanced pigments and skin prep to deliver a flawless, high-definition finish.</p>
      </div>

      <!-- Waitlist Form Card -->
      <div class="md:col-span-5 bg-surface-container-low p-8 md:p-12 border border-outline-variant/30">
        <h3 class="font-display text-2xl text-primary mb-4">Join The Waitlist</h3>
        <p class="font-body-md text-on-surface-variant mb-6">Be the first to know when booking slots open for our upcoming Hair & Makeup services.</p>
        <form class="space-y-4" onsubmit="event.preventDefault(); alert('Thank you for joining our waitlist!');">
          <div>
            <label class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-2">Full Name</label>
            <input type="text" required class="w-full bg-white border border-outline-variant/50 p-4 font-body-md focus:outline-none focus:border-primary" placeholder="Enter your name"/>
          </div>
          <div>
            <label class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-2">Email Address</label>
            <input type="email" required class="w-full bg-white border border-outline-variant/50 p-4 font-body-md focus:outline-none focus:border-primary" placeholder="name@example.com"/>
          </div>
          <button type="submit" class="w-full bg-primary text-on-primary py-4 font-label-md text-label-md uppercase tracking-widest font-bold hover:bg-neutral-800 transition-colors">Request Priority Access</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Elementor Content Hook -->
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
</main>
<?php get_footer(); ?>
