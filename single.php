<?php
/**
 * MK GLAMZ single.php template for single post detail view
 */

get_header(); ?>

<main class="py-section-desktop max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop min-h-screen">
  <?php
  while ( have_posts() ) : the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'max-w-3xl mx-auto space-y-8' ); ?>>
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs uppercase tracking-widest text-on-surface-variant/60 font-semibold mb-6">
          <a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-primary transition-colors">Home</a>
          <span>/</span>
          <a href="<?php echo esc_url( get_post_type_archive_link('post') ); ?>" class="hover:text-primary transition-colors">Journal</a>
          <span>/</span>
          <span class="text-primary font-bold"><?php the_title(); ?></span>
        </nav>

        <header class="space-y-4">
          <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">
            <?php echo get_the_date(); ?> • BY <?php the_author(); ?>
          </span>
          <h1 class="font-display text-4xl md:text-6xl text-primary leading-tight"><?php the_title(); ?></h1>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="aspect-video bg-surface-container overflow-hidden rounded-none">
              <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
            </div>
        <?php endif; ?>

        <div class="prose max-w-none font-body-md text-on-surface-variant leading-relaxed space-y-6">
          <?php
          the_content();
          ?>
        </div>

        <footer class="border-t border-outline-variant/30 pt-8 mt-12">
          <div class="flex flex-wrap gap-2">
            <span class="font-label-sm text-xs uppercase tracking-wider text-on-surface-variant/70">Categories:</span>
            <?php the_category( ', ' ); ?>
          </div>
          <div class="flex flex-wrap gap-2 mt-4">
            <?php the_tags( '<span class="font-label-sm text-xs uppercase tracking-wider text-on-surface-variant/70">Tags:</span> ', ', ', '' ); ?>
          </div>
        </footer>

      </article>
      <?php
  endwhile;
  ?>
</main>

<?php get_footer(); ?>
