<?php get_header(); ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php
        // Get author data.
        if ( isset( $_GET['author_name'] ) ) :
          $curauth = get_userdatabylogin( $author_name );
        else :
          $curauth = get_userdata( intval( $author ) );
        endif;
        _e( 'About:', 'theme' ); ?><?php echo $curauth->display_name;
        ?>
      </div>
      <div class="col-sm-9">
        <div class="author-info">
          <p class="avatar">
            <?php if ( function_exists( 'get_avatar' ) ) {
              echo get_avatar( $curauth->user_email, $size = '120' );
            } ?>
          </p>

          <?php if ( $curauth->description != "" ) { /* Displays the author's description from their Wordpress profile */ ?>
            <p><?php echo $curauth->description; ?></p>
          <?php } ?>
        </div>
        <h3 class="author-info_h">
          <?php _e( 'Recent Posts by', 'theme' ); ?><?php echo $curauth->display_name; ?>
        </h3>

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
              <?php echo '<p><strong>' . __( 'No post yet.', 'theme' ) . '</strong></p>'; ?>
            </div><!--no-results-->

          <?php endif; ?>
        </div>
        <?php get_template_part( 'includes/post-formats/post-nav' ); ?>
        <div id="recent-author-comments">
          <h3
            class="author-info_h"><?php _e( 'Recent Comments by', 'theme' ); ?><?php echo $curauth->display_name; ?></h3>
          <?php
          $number   = 5; // number of recent comments to display
          $comments = $wpdb->get_results( "SELECT * FROM $wpdb->comments WHERE comment_approved = '1' and comment_author_email='$curauth->user_email' ORDER BY comment_date_gmt DESC LIMIT $number" );
          ?>
          <ul>
            <?php
            if ( $comments ) : foreach ( (array) $comments as $comment ) :
              echo '<li class="recentcomments">' . sprintf( __( '%1$s on %2$s' ), get_comment_date(), '<a href="' . get_comment_link( $comment->comment_ID ) . '">' . get_the_title( $comment->comment_post_ID ) . '</a>' ) . '</li>';
            endforeach;
            else: ?>
              <p>
                <?php _e( 'No comments by', 'theme' ); ?><?php echo $curauth->display_name; ?><?php _e( 'yet.', 'theme' ); ?>
              </p>
            <?php endif; ?>
          </ul>
        </div>


      </div>
      <div class="sidebar sidebar-default col-sm-3">
        <?php dynamic_sidebar( 'sidebar' ); ?>
      </div>
    </div>
  </div>
<?php get_footer(); ?>