<?php

if ( ! function_exists( 'theme_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   *
   */
  function theme_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on twentyfifteen, use a find and replace
     * to change 'twentyfifteen' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'theme', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, TRUE );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
      'primary' => __( 'Primary Menu' ),
      'social'  => __( 'Secondary Menu' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption'
    ) );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
      'aside',
      'image',
      'video',
      'quote',
      'link',
      'gallery',
      'status',
      'audio',
      'chat'
    ) );

  }
endif; // theme_setup
add_action( 'after_setup_theme', 'theme_setup' );


/**
 * Declare post types
 *
 * Learn more: {@link http://codex.wordpress.org/Function_Reference/register_post_type}
 */

/* Portfolio */
add_action( 'init', 'post_type_portfolio' );
function post_type_portfolio() {
  register_post_type( 'portfolio',
    array(
      'label'           => __( 'Portfolio' ),
      'show_ui'         => TRUE,
      'show_in_menu'    => FALSE,
      'capability_type' => 'page',
      'menu_icon'       => get_template_directory_uri() . '/images/system/icon_portfolio.png',
      'rewrite'         => array(
        'slug'       => 'portfolio-view',
        'with_front' => TRUE,
      ),
      'supports'        => array(
        'title'
      )
    )
  );
  register_taxonomy( 'portfolio_category', 'portfolio', array(
    'hierarchical' => TRUE,
    'public'       => FALSE,
    'label'        => 'Portfolio Categories',
    "rewrite"      => TRUE,
    "query_var"    => TRUE,
    'show_ui'      => TRUE,
  ) );
}
