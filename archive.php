<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <div class="posts-list">
        <?php

        if ( have_posts() ) : while ( have_posts() ) : the_post();

          // The following determines what the post format is and shows the correct file accordingly
          $format = get_post_format();
          get_template_part( 'includes/post-formats/' . $format );

          if ( $format == '' ) {
            get_template_part( 'includes/post-formats/standard' );
          }

        endwhile;
        else:

          ?>

          <div class="no-results">
            <?php echo '<p><strong>' . __( 'There has been an error.', 'theme' ) . '</strong></p>'; ?>
            <p><?php _e( 'We apologize for any inconvenience, please', 'theme' ); ?> <a
                href="<?php bloginfo( 'url' ); ?>/"
                title="<?php bloginfo( 'description' ); ?>"><?php _e( 'return to the home page', 'theme' ); ?></a> <?php _e( 'or use the search form below.', 'theme' ); ?>
            </p>
            <?php
            /* outputs the default search form */
            get_search_form();
            ?>
          </div>

        <?php endif; ?>

      </div>

      <?php get_template_part( 'includes/post-formats/post-nav' ); ?>

    </div>

    <div class="sidebar sidebar-default col-sm-3">
      <?php dynamic_sidebar( 'sidebar' ); ?>
    </div>

  </div>
</div>

<?php get_footer(); ?>
