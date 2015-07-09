<?php get_header(); ?>
  <div class="page-title">
    <h1><?php _e( 'Search for:', 'theme' ); ?> "<?php the_search_query(); ?>"</h1>
  </div>

  <div class="posts-list">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="item">
        <h3><?php the_title(); ?></h3>

        <div class="post-meta">
          <div class="generic-info">
            <time datetime="<?php the_time( 'm d,Y\TH:i' ); ?>">
              <i class="fa-calendar"></i>
              <? the_time( 'd' );
              echo ' of ';
              the_time( 'F, Y' ) ?>
            </time>
          </div>
        </div>
        <a href="<?php the_permalink() ?>" class="details"><?php _e( 'Read more' ); ?></a>
      </article>
      <?php
    endwhile;
    else:
      ?>

      <div class="no-results">
        <?php echo '<p><strong>' . __( 'There has been an error.', 'theme' ) . '</strong></p>'; ?>
        <p>
          <?php _e( 'We apologize for any inconvenience, please', 'theme' ); ?>
          <a href="<?php bloginfo( 'url' ); ?>/" title="<?php bloginfo( 'description' ); ?>">
            <?php _e( 'return to the home page', 'theme' ); ?>
          </a>
          <?php _e( 'or use the search form below.', 'theme' ); ?>
        </p>
        <?php
        /* outputs the default search form */
        get_search_form();
        ?>
      </div>

    <?php endif; ?>

  </div>

<?php get_template_part( 'includes/post-formats/post-nav' ); ?>

<?php get_footer(); ?>