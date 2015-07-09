<?php
/**
 * The template for displaying single services.
 */
?>
<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post();
        // The following determines what the post format is and shows the correct file accordingly
        $format = get_post_format();
        get_template_part( 'includes/post-formats/' . $format );
        if ( $format == '' ) {
          get_template_part( 'includes/post-formats/standard' );
        } ?>

        <?php get_template_part( 'includes/post-formats/related-posts' ); ?>

        <?php comments_template( '', TRUE ); ?>

      <?php endwhile; endif; ?>
    </div>
    <div class="sidebar sidebar-services col-sm-3">
      <?php dynamic_sidebar( 'Sidebar Services' ) ?>
    </div>

  </div>
</div>

<?php get_footer(); ?>
