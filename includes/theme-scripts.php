<?php
/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {

  /**
   * Script for device detection -> includes\mobile_Detect.php
   * used to connect scripts/styles on specific devices
   */
  $detect = new Mobile_Detect;

  /* ++++++++++ Styles ++++++++++ */
  // Load default stylesheet.
  wp_enqueue_style( 'default', get_stylesheet_uri() );

  // Bootstrap styles.
  // files contains only grid classes.
  wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/css/bootstrap-grid.css' );

  /* Custom fonts */
  wp_enqueue_style( 'Roboto', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic' );
  wp_enqueue_style( 'Oswald', '//fonts.googleapis.com/css?family=Oswald:400,300,700' );
  wp_enqueue_style( 'Playfair Display', '//fonts.googleapis.com/css?family=Playfair+Display' );
  wp_enqueue_style( 'Font Awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

  /* External plugins. */

  /**
   * Devices specific styles
   */
  // Mobile menu
  if ( $detect->isMobile() ) {
    wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/css/jquery.mmenu.all.css' );
  } else {
    //todo: if we put fancybox styles here, they are not conneced on tablet.
  }
  // Popup.
  wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css' );

  // Theme stylesheet.
  wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );

  // we do not need plugin styles for the gallery
  // todo: exclude styles
  wp_dequeue_style( 'nextgen_basic_thumbnails_style' ); // overwrote via theme styles
  wp_dequeue_style( 'nextgen_basic_album_style' ); // removed call in the plugin source file

  // Remove default Eventsplus plugin styles since they are not optimized.
  // own styles declared in _calendar.scss
  wp_deregister_style( 'evrplus_calendar' );
  wp_deregister_style( 'custom-style' );
  wp_deregister_style( 'evrplus_public' );
  wp_deregister_style( 'evrplus_pop_style' );
  wp_deregister_style( 'evrplus_colorbox_style' );

  // Remove default WooCommerce styles
  // own styles declared in _shop.scss
  wp_deregister_style( 'woocommerce-general' );
  wp_deregister_style( 'woocommerce-layout' );
  wp_deregister_style( 'woocommerce-smallscreen' );

  /* ++++++++++ Scripts ++++++++++ */
  // Equal heights.
  wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array( 'jquery' ), '', TRUE );

  // Mobile menu
  wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/js/jquery.mmenu.min.all.js', array( 'jquery' ), '4.7.4', TRUE );

  // Pinned elements on page scroll.
  wp_enqueue_script( 'pin', get_template_directory_uri() . '/js/jquery.pin.min.js', array( 'jquery' ), '', TRUE );

  // Infinite Scrolling / Auto-Paging
  //wp_enqueue_script( 'jscroll', get_template_directory_uri() . '/js/jquery.jscroll.min.js', array( 'jquery' ), '', TRUE );

  // Lazy Load for images
  wp_enqueue_script( 'lazyload', get_template_directory_uri() . '/js/jquery.lazyload.js', array( 'jquery' ), '', TRUE );

  // Popup
  wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array( 'jquery' ), '', TRUE );


  if ( ! $detect->isMobile() && ! $detect->isTablet() ) {
    /**
     * Desktop scripts here
     */

    // Theme custom scripts.
    wp_enqueue_script( 'init_touch', get_template_directory_uri() . '/js/init_desktop.js', array( 'jquery' ), '1.0', TRUE );

    // Custom select skin.
    wp_enqueue_script( 'sumoselect', get_template_directory_uri() . '/js/jquery.sumoselect.min.js', array( 'jquery' ), '', TRUE );

  } else {
    /**
     * Tablet & Mobile scripts.
     */
    // Theme custom scripts.
    wp_enqueue_script( 'init_touch', get_template_directory_uri() . '/js/init_touch.js', array( 'jquery' ), '1.0', TRUE );

  }

  /**
   * Theme custom scripts.
   */
  wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array( 'jquery' ), '', TRUE );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );