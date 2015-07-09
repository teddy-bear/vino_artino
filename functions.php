<?php
/**
 * Functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 */


/**
 * Define global constants
 */
@define( 'PARENT_DIR', get_template_directory() );
@define( 'PARENT_URL', get_template_directory_uri() );

/**
 * Include Reusable text block plugin
 */
require_once PARENT_DIR . '/includes/text-blocks.php';

/**
 * Declare post types
 */
require_once PARENT_DIR . '/includes/theme-init.php';

/**
 * Connect custom widgets
 */
require_once PARENT_DIR . '/includes/register-widgets.php';

/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
require_once PARENT_DIR . '/includes/sidebar-init.php';

/**
 * Assign theme shortcodes
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
require_once PARENT_DIR . '/includes/shortcodes.php';


/**
 * Aqua Resizer for image cropping and resizing on the fly
 */
require_once PARENT_DIR . '/includes/aq_resizer.php';

/**
 * Tablet & mobile check library
 */
require_once PARENT_DIR . '/includes/mobile_Detect.php';

/**
 * Custom theme functions
 *
 */
require_once PARENT_DIR . '/includes/theme-function.php';

/**
 * Enqueue scripts and styles.
 */
require_once PARENT_DIR . '/includes/theme-scripts.php';

/**
 * Enable shortcodes in sidebar
 */
add_filter( 'widget_text', 'do_shortcode' );

/*-----------------------------------------------------------------------------------*/
/*	Include Meta Box
/*-----------------------------------------------------------------------------------*/
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/includes/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/includes/meta-box' ) );
require_once RWMB_DIR . 'meta-box.php';
require_once RWMB_DIR . 'config-meta-boxes.php';

/**
 * Widget CSS Classes
 * Plugin URI: http://cleverness.org/plugins/widget-css-classes *
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 3.3
 *
 * gives you the ability to add custom classes to your WordPress widgets
 * *
 */
require_once PARENT_DIR . '/includes/widget-css-classes/widget-css-classes.php';
