<?php
/**
 * Template Name: FAQs
 */
get_header(); ?>
<main class="py-section-desktop max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop min-h-screen">
  <div class="max-w-3xl mx-auto pt-12">
    <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary-fixed-dim block mb-4 text-center">SUPPORT CENTER</span>
    <h1 class="font-display text-4xl md:text-6xl text-primary mb-12 text-center">Frequently Asked Questions</h1>

    <div class="space-y-6">
      <details class="group bg-surface-container-low p-6 border border-outline-variant/30 [&_summary::-webkit-details-marker]:hidden">
        <summary class="flex justify-between items-center font-display text-xl text-primary cursor-pointer">
          <span>Are your products vegan & cruelty-free?</span>
          <span class="transition group-open:-rotate-180"><i class="fa-solid fa-chevron-down text-sm"></i></span>
        </summary>
        <p class="mt-4 font-body-md text-on-surface-variant leading-relaxed">Yes. All MK GLAMZ formulations are 100% cruelty-free and vegan certified.</p>
      </details>

      <details class="group bg-surface-container-low p-6 border border-outline-variant/30 [&_summary::-webkit-details-marker]:hidden">
        <summary class="flex justify-between items-center font-display text-xl text-primary cursor-pointer">
          <span>How do I book a bridal artistry session?</span>
          <span class="transition group-open:-rotate-180"><i class="fa-solid fa-chevron-down text-sm"></i></span>
        </summary>
        <p class="mt-4 font-body-md text-on-surface-variant leading-relaxed">You can book bridal sessions directly through our artistry service section or via our contact page.</p>
      </details>

      <details class="group bg-surface-container-low p-6 border border-outline-variant/30 [&_summary::-webkit-details-marker]:hidden">
        <summary class="flex justify-between items-center font-display text-xl text-primary cursor-pointer">
          <span>What is the return policy?</span>
          <span class="transition group-open:-rotate-180"><i class="fa-solid fa-chevron-down text-sm"></i></span>
        </summary>
        <p class="mt-4 font-body-md text-on-surface-variant leading-relaxed">We offer returns within 30 days of purchase for unused products in original packaging.</p>
      </details>
    </div>
  </div>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
</main>
<?php get_footer(); ?>
