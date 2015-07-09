<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-holder' ); ?>>

  <header class="entry-header">
    <?php if ( ! is_singular() ) : ?>
      <h3 class="entry-title">
        <a href="<?php the_permalink(); ?>" title="<?php _e( 'Permalink to:' ); ?> <?php the_title(); ?>">
          <?php the_title(); ?>
        </a>
      </h3>
    <?php else : ?>
      <!-- <h1 class="entry-title"><?php //the_title(); ?></h1> -->
    <?php endif; ?>
  </header>

  <?php get_template_part( 'includes/post-formats/post-meta' ); ?>

  <?php get_template_part( 'includes/post-formats/post-thumb' ); ?>

  <?php if ( ! is_singular() ) { ?>

    <div class="post-content">
      <?php
      $post_excerpt = 'true';
      //$post_excerpt = of_get_option( 'post_excerpt' );
      ?>
      <?php if ( $post_excerpt == 'true' || $post_excerpt == '' ) { ?>

        <div class="excerpt">
          <?php
          $content = get_the_content();
          $excerpt = get_the_excerpt();
          if ( has_excerpt() ) {
            echo trim_string_length( $excerpt, 75 );
          } else {
            if ( ! is_search() ) {
              echo trim_string_length( $content, 55 );
            } else {
              echo trim_string_length( $excerpt, 55 );
            }
          }
          ?>
        </div>
      <?php } ?>
      <a href="<?php the_permalink() ?>" class="details"><?php _e( 'Read more' ); ?></a>
    </div>
  <?php } else { ?>
    <div class="content">
      <?php the_content( '' ); ?>
    </div>
  <?php } ?>
</article>
