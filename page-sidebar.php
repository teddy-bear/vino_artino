<?php
/**
 * Template Name: Sidebar right
 */
get_header(); ?>

  <div class="row">

    <div class="col-sm-9">
      <main>
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

          // Include the page content template.
          get_template_part( 'content', 'page' );

          // End the loop.
        endwhile;
        ?>
      </main>
    </div>

    <div class="sidebar sidebar-right col-sm-3">
      <?php dynamic_sidebar( 'sidebar-right' ); ?>
    </div>

  </div>

<?php get_footer(); ?>