<?php
/**
 * MK GLAMZ page.php template for generic pages
 */

get_header(); ?>

<main class="py-section-desktop max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop min-h-screen">
  <?php
  while ( have_posts() ) : the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="mb-12">
          <h1 class="font-display text-4xl md:text-7xl mb-4 text-primary"><?php the_title(); ?></h1>
        </header>

        <div class="prose max-w-none font-body-md text-on-surface-variant leading-relaxed space-y-6">
          <?php
          the_content();

          wp_link_pages( array(
              'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mk-glamz' ),
              'after'  => '</div>',
          ) );
          ?>
        </div>
      </article>
      <?php
  endwhile;
  ?>
</main>

<?php get_footer(); ?>
