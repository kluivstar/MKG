<?php
/**
 * MK GLAMZ index.php fallback template
 */

get_header(); ?>

<main class="py-section-desktop max-w-[1440px] mx-auto px-margin-mobile md:px-margin-desktop min-h-screen">
  <div class="mb-16">
    <h1 class="font-display text-4xl md:text-7xl mb-4"><?php single_post_title(); ?></h1>
    <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
      <?php bloginfo('description'); ?>
    </p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            ?>
            <article <?php post_class( 'group cursor-pointer mb-12' ); ?> onclick="location.href='<?php the_permalink(); ?>'">
              <div class="overflow-hidden mb-6 bg-surface-container-low rounded-none">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large', array( 'class' => 'w-full aspect-video object-cover group-hover:scale-105 transition-transform duration-700' ) ); ?>
                <?php else : ?>
                    <div class="w-full aspect-video bg-surface-container-high flex items-center justify-center text-on-surface-variant/35 font-bold uppercase tracking-widest text-xs">Editorial Image</div>
                  <?php endif; ?>
              </div>
              <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-3 block"><?php echo get_the_date(); ?></span>
              <h3 class="font-display text-xl text-primary mb-3 group-hover:text-secondary-fixed-dim transition-colors"><?php the_title(); ?></h3>
              <p class="font-body-md text-body-md text-on-surface-variant mb-4"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
              <a href="<?php the_permalink(); ?>" class="font-label-md text-label-md tracking-widest uppercase text-primary border-b border-primary pb-1 group-hover:pb-2 transition-all inline-block">Read Article</a>
            </article>
            <?php
        endwhile;

        // Pagination
        the_posts_navigation( array(
            'prev_text' => esc_html__( 'Older posts', 'mk-glamz' ),
            'next_text' => esc_html__( 'Newer posts', 'mk-glamz' ),
        ) );

    else :
        echo '<p class="text-on-surface-variant">No journal entries found.</p>';
    endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>
