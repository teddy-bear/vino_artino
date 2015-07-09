<?php
/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */

function theme_widgets_init() {

// Header info
// Location: header
  register_sidebar( array(
    'name'          => 'Header info',
    'id'            => 'header-info',
    'description'   => __( 'Located in the header' ),
    'before_widget' => '<div id="%1$s" class="widget">',
    'after_widget'  => '</div>'
  ) );

// Main Sidebar
// Location: right sidebar
  register_sidebar( array(
    'name'          => __( 'Sidebar' ),
    'id'            => 'sidebar',
    'description'   => __( 'Displayed in the Blog page template' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

// Sidebar Right
// Location: Sidebar right page template
  register_sidebar( array(
    'name'          => __( 'Sidebar right' ),
    'id'            => 'sidebar-right',
    'description'   => __( 'Outputs content in the Sidebar Right page template' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

// Sidebar outer
// Location: Left column, below main menu
  register_sidebar( array(
    'name'          => __( 'Sidebar outer' ),
    'id'            => 'sidebar-outer',
    'description'   => __( 'Outputs content in the left column below main menu' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

}

add_action( 'widgets_init', 'theme_widgets_init' );
