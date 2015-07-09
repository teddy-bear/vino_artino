<?php
$post_meta = '';
//$post_meta = of_get_option( 'post_meta' );
?>
<?php if ( $post_meta == 'true' || $post_meta == '' ) { ?>
  <div class="post-meta">
    <div class="generic-info">
      <!--<span> by </span>-->
      <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
      <span>in </span>
      <?php
      // Show categories
      $categories = get_the_category();
      if ( $categories ) {
        echo '<i class="fa-folder-open"></i>';
        the_category( ', ' );
      }
      ?>
      <div class="tags">
        <?php
        // Show tags
        $tags = get_the_tags();
        if ( $tags ) {
          the_tags( '<i class="fa-tags"></i>', ', ' );
        }
        ?>
      </div>
      <time datetime="<?php the_time( 'm d,Y\TH:i' ); ?>">
        <i class="fa-calendar"></i>
        <? the_time( 'd' );
        echo ' of ';
        the_time( 'F, Y' ) ?>
      </time>
    </div>
    <div class="custom-data">
      <!-- Share Links -->
      <div class="share-networks clearfix">
        <span><?php _e( 'Share:' ); ?></span>
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i
            class="fa fa-facebook"></i></a>
        <a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
        <a target="_blank" href="/contact"><i class="fa fa-envelope"></i></a>
      </div>
      <!-- End Share Links -->
    </div>
  </div>
<?php } ?>