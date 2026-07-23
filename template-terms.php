<?php
/**
 * Template Name: Terms & Conditions
 */
get_header(); ?>
<main class="py-section-desktop max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop min-h-screen">
  <div class="max-w-3xl mx-auto pt-12">
    <h1 class="font-display text-4xl md:text-6xl text-primary mb-8">Terms & Conditions</h1>
    <div class="prose max-w-none font-body-md text-on-surface-variant leading-relaxed space-y-6">
      <p>Welcome to MK GLAMZ. By accessing or using our website, products, and services, you agree to be bound by these Terms and Conditions.</p>
    </div>
  </div>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
</main>
<?php get_footer(); ?>
