<?php
/**
 * MK GLAMZ 404.php error template
 */

get_header(); ?>

<main class="py-section-desktop max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop min-h-screen flex flex-col items-center justify-center text-center">
  <div class="max-w-md space-y-6">
    <h1 class="font-display text-7xl md:text-9xl text-primary font-bold">404</h1>
    <h2 class="font-display text-2xl md:text-3xl text-primary font-semibold uppercase tracking-wider">Page Not Found</h2>
    <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
      The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
    </p>
    <div class="pt-6">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="bg-primary text-on-primary px-10 py-5 rounded-none font-label-md text-label-md tracking-widest uppercase hover:bg-neutral-800 transition-colors inline-block">
        Go Back Home
      </a>
    </div>
  </div>
</main>

<?php get_footer(); ?>
