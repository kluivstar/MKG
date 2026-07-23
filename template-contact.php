<?php
/**
 * Template Name: Contact
 */
get_header(); ?>
<main class="py-section-desktop max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop min-h-screen">
  <div class="grid grid-cols-1 md:grid-cols-12 gap-12 pt-12">
    <div class="md:col-span-5">
      <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary-fixed-dim block mb-4">GET IN TOUCH</span>
      <h1 class="font-display text-4xl md:text-6xl text-primary mb-6">Contact Us</h1>
      <p class="font-body-lg text-body-lg text-on-surface-variant mb-8">For order inquiries, professional registry support, or general comments, please reach out via our contact form or email us at support@mkglamz.com.</p>
    </div>

    <div class="md:col-span-7 bg-surface-container-low p-8 md:p-12 border border-outline-variant/30">
      <form class="space-y-6" onsubmit="event.preventDefault(); alert('Your message has been sent!');">
        <div>
          <label class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-2">Name</label>
          <input type="text" required class="w-full bg-white border border-outline-variant/50 p-4 font-body-md focus:outline-none focus:border-primary"/>
        </div>
        <div>
          <label class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-2">Email</label>
          <input type="email" required class="w-full bg-white border border-outline-variant/50 p-4 font-body-md focus:outline-none focus:border-primary"/>
        </div>
        <div>
          <label class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant mb-2">Message</label>
          <textarea rows="5" required class="w-full bg-white border border-outline-variant/50 p-4 font-body-md focus:outline-none focus:border-primary"></textarea>
        </div>
        <button type="submit" class="w-full bg-primary text-on-primary py-4 font-label-md text-label-md uppercase tracking-widest font-bold hover:bg-neutral-800 transition-colors">Send Message</button>
      </form>
    </div>
  </div>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
</main>
<?php get_footer(); ?>
