<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single vevent hentry">

  <div class="content-padding">

    <p class="tribe-events-back">
      <a href="<?php echo esc_url( tribe_get_events_link() ); ?>">
        <?php _e( '&laquo; All Events', 'tribe-events-calendar' ) ?>
      </a>
    </p>

    <!-- Notices -->
    <?php tribe_events_the_notices() ?>

    <?php
    // Output anchor link only if we have at least 1 ticket assigned to the event.
    if ( TribeEventsTickets::get_event_tickets( $event_id ) ) {
      the_title( '<h2 class="tribe-events-single-event-title summary entry-title">', '<br><span class="book-tickets"><i class="fa fa-ticket"></i>Book tickets</span></h2>' );
    } else {
      the_title( '<h2 class="tribe-events-single-event-title summary entry-title">', '</h2>' );
    }
    ?>
    <div id="message">
      <i class="fa fa-check-circle-o"></i>
      <?php the_title( '<strong>', '</strong>' ); ?> has been added to the cart
    </div>
    <div class="tribe-events-schedule updated published tribe-clearfix">
      <?php
      echo tribe_events_event_schedule_details( $event_id, '<h3><i class="fa fa-calendar"></i>', '</h3>' );
      ?>
      <?php if ( tribe_get_cost() ) : ?>
        <span class="tribe-events-divider">|</span>
        <span class="tribe-events-cost"><?php echo tribe_get_cost( NULL, TRUE ) ?></span>
      <?php endif; ?>
    </div>

    <!-- Event header -->
    <div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
      <!-- Navigation -->
      <h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
      <ul class="tribe-events-sub-nav">
        <li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
        <li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
      </ul>
      <!-- .tribe-events-sub-nav -->
    </div>
    <!-- #tribe-events-header -->
  </div>

  <?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <!-- Event featured image, but exclude link -->
      <?php //echo tribe_event_featured_image( $event_id, 'full', FALSE );?>

      <!-- Image gallery -->
      <div class="image-gallery">
        <?php
        $gallery_images = rwmb_meta( 'content-gallery', 'type=image&size=full', $event_id );
        foreach ( $gallery_images as $prop_image_id => $prop_image_meta ) {
          $image = aq_resize( $prop_image_meta['url'], 264, 184, TRUE, TRUE, TRUE ); //resize & crop img
          //var_dump( $prop_image_meta );
          ?>
          <div class="item">
            <figure>
              <a href="<?php echo $prop_image_meta['url'] ?>" title="<?php echo $prop_image_meta['title'] ?>"
                 data-src="<?php echo $prop_image_meta['url'] ?>"
                 data-thumbnail="<?php echo $image ?>"
                 data-title="<?php echo $prop_image_meta['title'] ?>"
                 data-description="<?php echo $prop_image_meta['description'] ?>"
                 data-fancybox-group="gallery">
                <img src="<?php echo $image ?>" alt="<?php echo $prop_image_meta['alt'] ?>"/>
              </a>
              <figcaption class="info">
                <strong><?php echo $prop_image_meta['alt'] ?></strong>
                <em><?php echo $prop_image_meta['title'] ?></em>
                <span><?php echo $prop_image_meta['description'] ?></span>
              </figcaption>
            </figure>
          </div>
        <?php } ?>
      </div>

      <!-- Event content -->

      <?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
      <div class="tribe-events-single-event-description tribe-events-content entry-content description content-padding">
        <?php the_content(); ?>
      </div>
      <!-- .tribe-events-single-event-description -->
      <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

      <!-- Event meta -->
      <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
      <?php
      /**
       * The tribe_events_single_event_meta() function has been deprecated and has been
       * left in place only to help customers with existing meta factory customizations
       * to transition: if you are one of those users, please review the new meta templates
       * and make the switch!
       */
      if ( ! apply_filters( 'tribe_events_single_event_meta_legacy_mode', FALSE ) ) {
        tribe_get_template_part( 'modules/meta' );
      } else {
        echo tribe_events_single_event_meta();
      }
      ?>
      <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>

    </div> <!-- #post-x -->
    <?php if ( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments', FALSE ) ) comments_template() ?>
  <?php endwhile; ?>

  <!-- Event footer -->
  <div id="tribe-events-footer" class="content-padding">
    <!-- Navigation -->
    <!-- Navigation -->
    <h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
    <ul class="tribe-events-sub-nav">
      <li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
      <li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
    </ul>
    <!-- .tribe-events-sub-nav -->
  </div>
  <!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
