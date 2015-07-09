<?php
/**
 * Loads up all the widgets defined by this theme.
 *
 */

include_once( TEMPLATEPATH . '/includes/widgets/social-widget.php' );

add_action( "widgets_init", "load_my_widgets" );

function load_my_widgets() {
  register_widget( "SocialNetworksWidget" );
}
