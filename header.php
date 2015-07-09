<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"
        type="image/x-icon"/>

  <?php wp_head(); ?>
</head>
<?php
$detect = new Mobile_Detect;

$cclass = '';
// Check if we are on a touch device.
if ( $detect->isMobile() || $detect->isTablet() ) {
  $cclass .= ' touch';
} else {
  $cclass .= ' non-touch';
}
// Check if we are on the home page.
if ( is_front_page() ) {
  $cclass .= ' home';
} else {
  $cclass .= ' not-home';
};

// Check the event page.
if ( $_GET['action'] == 'evrplusegister' && isset( $_GET['event_id'] ) ) {
  $cclass .= ' event-page';
}

?>
<body <?php body_class( $cclass ); ?>>
<div id="cbp-so-scroller" class="hfeed site">

  <div class="container">
    <div class="row">

      <div id="content" class="col-sm-9 col-lg-10 col-sm-push-3 col-lg-push-2">

        <header id="masthead" class="site-header clearfix">
          <div class="header-info">
            <!--Mobile menu link-->
            <a href="#menu_mobile" class="mobile-menu-icon">
              <i class="fa fa-bars"></i>
              <i class="fa fa-times"></i>
            </a>
            <?php if ( ! dynamic_sidebar( 'Header info' ) ) : ?>
            <?php endif; ?>
          </div>
          <div id="logo" class="site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
               title="<?php echo get_bloginfo( 'name' ); ?>">
              <img
                src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png"
                alt="<?php echo get_bloginfo( 'description', 'display' ); ?>"/>
            </a>
          </div>
        </header>

        <?php if ( ! is_front_page() && ! is_search() ) { ?>
          <div class="header-image">
            <?php
            // Get Header background meta box value.
            $post_meta_data = get_post_custom( $post->ID );

            $full_image_url = wp_get_attachment_url( $post_meta_data['header-background'][0], 'full' );
            // We need larger image on the event page.
            if ( is_single() && get_post_type( $post->ID ) == 'tribe_events' ) {
              $image = aq_resize( $full_image_url, 945, 360, TRUE, TRUE, TRUE ); //resize & crop & upscale image
            } else {
              $image = aq_resize( $full_image_url, 945, 180, TRUE, TRUE, TRUE );
            }
            // Set default image.
            if ( ! $image ) {
              $image = get_bloginfo( 'template_url' ) . '/images/content/subpage-bg.jpg';
            }
            ?>
            <img src="<?php echo $image; ?>">
            <a class="view-cart" href="<?php echo esc_url( home_url( '/' ) ); ?>cart">
              <i class="fa fa-shopping-cart"></i>
              Shopping Cart
              <?php
              // Get shopping cart products quantity.
              $product_amount = 0;
              // use this if need plain amount of the products.
              // $product_amount = sizeof( WC()->cart->get_cart() );
              // take quantity of the products into consideration.
              foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $product_amount += $cart_item['quantity'];
              }
              // show 0 items as well.
              //if ( $product_amount ) {
              echo "<span class='product_amount'>" . $product_amount . "</span>";
              //}
              ?>
            </a>
          </div>
        <?php } ?>
        <div class="site-content">
