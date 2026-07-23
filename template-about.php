<?php
/**
 * Template Name: About MK Glamz
 */
get_header(); ?>
<main>
  <!-- Hero Section -->
  <header class="relative w-full h-[600px] md:h-[800px] flex items-end overflow-hidden pt-24">
    <div class="absolute inset-0 z-0">
      <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAw4WS-IKveooabN5YOrTqs6yV0UvsuQws5AEdusl9gmveHrUTHXpyo1sXGcnXjvq-cXRHwCezXvEYDZqXb7iSbKiXrZ5arNblwoBltpm_iG3reDd1Zxon3PpYWGPo5-nKVENaXytt3l7Pxmg7b7nD64CjDpQ6eqPOLNrLnAZxiRihnPa4Tw1qyVs5OOx9SBL5mGm6LQvv-Ix7EkbFDcRWaRZL-SkI6Tz1UHUjm9c452qRBxxuylYhPRvPnoU5wPH7sRG-Ol3SlNnfW')"></div>
      <div class="absolute inset-0 bg-gradient-to-t from-background/40 to-transparent"></div>
    </div>
    <div class="relative z-10 px-margin-mobile md:px-margin-desktop pb-section-desktop max-w-[1440px] mx-auto w-full">
      <div class="max-w-3xl editorial-reveal visible">
        <span class="font-label-sm text-label-sm uppercase tracking-[0.2em] text-on-surface/60 block mb-4">ESTABLISHED 2018</span>
        <h1 class="font-display text-5xl md:text-8xl text-primary mb-8 leading-none">The Art of <br/>Curated Beauty.</h1>
      </div>
    </div>
  </header>

  <!-- Mission & Vision - Asymmetric Bento Grid -->
  <section class="px-margin-mobile md:px-margin-desktop py-section-desktop max-w-[1440px] mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter items-start">
      <div class="md:col-span-7 mb-12 md:mb-0">
        <div class="aspect-[4/5] bg-surface-container overflow-hidden rounded-none">
          <img class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" alt="Prestige makeup texture" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDLxryS5HtBK7niFTj4LMTsjA7Qe083eI_ukCyepAsg-RHOrT9iBGZd2quh9cC-YfzGKexIEJKfK04ayOmzc7L5dZ71BvMYjpszw53s593V9v8i6X0x3hnAkY-aur4S6y62okLx-EciJIVZwsi9WjOA4rLCaA9XL203_1KfUbOLeMBYrJM9hos9MTaEcRsXSUEd311rekDCCrRt-cDUKlMTK0novECwc7t38Og52vTZQsg5guVMCtN0_VxFQ_tvUvDNnz5jnotl8fqh"/>
        </div>
      </div>
      <div class="md:col-span-5 md:pt-24">
        <h2 class="font-display text-3xl md:text-5xl text-primary mb-8">Our Mission</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-12">
          To redefine luxury through the lens of intentionality. MK GLAMZ exists to bridge the gap between high-performance artistry and the effortless grace of daily ritual. We believe beauty is not an addition, but an unveiling.
        </p>
        <div class="h-px w-24 bg-secondary-fixed-dim mb-12"></div>
        <h2 class="font-display text-3xl md:text-5xl text-primary mb-8">The Vision</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
          A global flagship for the modern minimalist. We aspire to create a sanctuary where sophisticated products meet architectural design, fostering a community that values quality over quantity and soul over trend.
        </p>
      </div>
    </div>
  </section>

  <!-- Elementor Content Hook -->
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
</main>
<?php get_footer(); ?>
