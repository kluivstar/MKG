<?php
/**
 * Template Name: Privacy Policy
 */
get_header(); ?>
<main class="py-section-desktop max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop min-h-screen">
  <div class="max-w-3xl mx-auto pt-12">
    <h1 class="font-display text-4xl md:text-6xl text-primary mb-8">Privacy Policy</h1>
    <div class="prose max-w-none font-body-md text-on-surface-variant leading-relaxed space-y-6">
      <p>Your privacy is of utmost importance to MK GLAMZ. This Privacy Policy describes how your personal information is collected, used, and shared when you visit or make a purchase from our website.</p>
    </div>
  </div>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
</main>
<?php get_footer(); ?>
