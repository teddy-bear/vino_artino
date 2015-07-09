<?php
/**
 * Home page template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();
      the_content();
    endwhile;
    ?>

  </main>
  <!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
