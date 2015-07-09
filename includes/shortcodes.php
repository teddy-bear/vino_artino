<?php

/**
 * Layout controls & grid markup based on Bootstrap version 3.* framework.
 */

// Container
function container_shortcode( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $output = '<div class="container ' . $class . '">';
  $output .= do_shortcode( $content );
  $output .= '</div> <!-- .container (end) -->';

  return $output;
}

add_shortcode( 'container', 'container_shortcode' );

// Row
function row_shortcode( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $output = '<div class="row ' . $class . '">';
  $output .= do_shortcode( $content );
  $output .= '</div> <!-- .row (end) -->';

  return $output;
}

add_shortcode( 'row', 'row_shortcode' );

/**
 * Columns: add bootstrap classes to make grid layout.
 * Eg.: [column class="col-sm-6"]
 */
function column_shortcode( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  $return = '<div class="' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'column', 'column_shortcode' );


/**
 * Columns with logical names
 * based on the same bootstrap classes
 * Eg.: one_half = column 50% width; one_fourth = column 25% width
 */
// one_half
function one_half_column( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-6 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'one_half', 'one_half_column' );

// one_third
function one_third_column( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-4 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'one_third', 'one_third_column' );

// two_third
function two_third_column( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-8 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'two_third', 'two_third_column' );

// one_fourth
function one_fourth_column( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-3 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'one_fourth', 'one_fourth_column' );

// three_fourth
function three_fourth_column( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-9 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'three_fourth', 'three_fourth_column' );

// one_sixth
function one_sixth_column( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-2 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'one_sixth', 'one_sixth_column' );

// five_sixth
function five_sixth_column( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-10 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'five_sixth', 'five_sixth_column' );

// Wrapper
function wrapper_shortcode( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $output = '<div class="wrapper ' . $class . '">';
  $output .= do_shortcode( $content );
  $output .= '</div> <!-- .row (end) -->';

  return $output;
}

add_shortcode( 'wrapper', 'wrapper_shortcode' );

// Universal block wrapper for styling purposes.
function block_shortcode( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $output = '<div class="block ' . $class . '">';
  $output .= do_shortcode( $content );
  $output .= '</div>';

  return $output;
}

add_shortcode( 'block', 'block_shortcode' );

// Clear
function clear_shortcode( $atts, $content = NULL ) {

  $output = '<div class="clear"></div>';

  return $output;
}

add_shortcode( 'clear', 'clear_shortcode' );

// Spacer
function spacer_shortcode( $atts, $content = NULL ) {

  $output = '<div class="spacer"></div>';

  return $output;
}

add_shortcode( 'spacer', 'spacer_shortcode' );


/**
 * Content adding section
 */
// Content (list of recent posts by default)
// todo: make shortcode more flexible and universal.
function shortcode_content( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'post_type'        => 'post',
    'category'         => '',
    'custom_category'  => '',
    'num'              => '-1',
    'meta'             => 'false',
    'meta_format'      => '',
    'thumb'            => 'false',
    'thumb_width'      => '120',
    'thumb_height'     => '120',
    'more_text_single' => '',
    'excerpt_count'    => '0',
    'content_count'    => '0',
    'css_class'        => '',
    'class_item'       => ''
  ), $atts ) );

  $output = '<ul class="recent-posts ' . $css_class . '">';

  global $post;

  $args = array(
    'post_type'              => $post_type,
    'category_name'          => $category,
    $post_type . '_category' => $custom_category,
    'numberposts'            => $num,
    'orderby'                => 'post_date',
    'order'                  => 'DESC'
  );

  $latest = get_posts( $args );

  foreach ( $latest as $post ) {
    setup_postdata( $post );
    $excerpt        = get_the_excerpt( $post->ID );
    $content        = get_the_content( $post->ID );
    $attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    $url            = $attachment_url['0'];
    $image          = aq_resize( $url, $thumb_width, $thumb_height, TRUE );


    $post_classes = get_post_class();
    foreach ( $post_classes as $key => $value ) {
      $pos = strripos( $value, 'tag-' );
      if ( $pos !== FALSE ) {
        unset( $post_classes[ $i ] );
      }
    }
    $post_classes = implode( ' ', $post_classes );


    $output .= '<li class="' . $post_classes . ' ' . $class_item . '"><div class="wrapper">';

    if ( $thumb == 'true' ) {

      if ( has_post_thumbnail( $post->ID ) ) {
        $output .= '<figure class="featured-thumbnail"><a href="' . get_permalink( $post->ID ) . '" title="' . get_the_title( $post->ID ) . '">';
        if ( $image ) {
          $output .= '<img  src="' . $image . '"/>';
        } else {
          $output .= '<img  src="' . $url . '"/>';
        }
        $output .= '</a></figure>';
      }
    }


    $output .= '<div class="wrap-info">';

    $output .= '<h5><a href="' . get_permalink( $post->ID ) . '" title="' . get_the_title( $post->ID ) . '">';
    $output .= get_the_title( $post->ID );
    $output .= '</a></h5>';


    if ( $meta == 'true' ) {
      $output .= '<span class="meta">';
      $output .= '<span class="post-date">';
      if ( $meta_format == 'long' ) {
        $output .= get_the_time( 'j' ) . ' of ' . get_the_time( 'F, Y' );
      } else {
        $output .= '<span class="meta_day">' . get_the_time( 'd' ) . '/</span><span class="meta_mouths">' . get_the_time( 'm' ) . '/</span><span class="meta_year">' . get_the_time( 'Y' ) . '</span>';
      }
      $output .= '</span>';
      $output .= '</span>';
    }

    if ( $excerpt_count >= 1 ) {

      $output .= '<div class="excerpt">';
      $output .= trim_string_length( $excerpt, $excerpt_count );
      $output .= '</div>';
    }

    if ( $content_count >= 1 ) {
      $output .= '<div class="content">';
      $output .= trim_string_length( $content, $content_count );
      $output .= '</div>';
    }

    /**
     * Show author custom field
     * used in the Testimonials post type
     * reference http://codex.wordpress.org/Function_Reference/get_post_custom_values
     */
    $custom_field_author = get_post_custom_values( 'author' );
    if ( $custom_field_author ) {
      $output .= '<strong class="author">' . $custom_field_author[0] . '</strong>';
    }

    if ( $more_text_single != "" ) {
      $output .= '<a href="' . get_permalink( $post->ID ) . '" class="readmore" title="' . get_the_title( $post->ID ) . '">';
      $output .= $more_text_single;
      $output .= '</a>';
    }

    $output .= '</div>';

    $output .= '<div class="clear"></div>';
    $output .= '</div></li><!-- .entry (end) -->';

  }
  $output .= '</ul><!-- .recent-posts (end) -->';

  wp_reset_postdata();

  return $output;

}

add_shortcode( 'content', 'shortcode_content' );


// Categories
// todo: needs testing -> try to show categories/taxonomies from custom post types(portfolio).
// taxonomy works but doesn`t work for default post
function shortcode_list_categories( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'taxonomy'   => '',
    'title'      => '',
    'orderby'    => '',
    'order'      => '',
    'exclude'    => '',
    'include'    => '',
    'number'     => '',
    'hide_empty' => '',
    'class'      => ''
  ), $atts ) );

  $categories = get_categories( 'taxonomy=' . $taxonomy . '&exclude=' . $exclude . '&include=' . $include . '&number=' . $number . '&orderby=' . $orderby . '&order=' . $order . '&hide_empty=' . $hide_empty );

  $output = '';

  if ( ! empty( $title ) || $title != '' ) {
    $output .= '<h3 class="list_cats ' . $class . '-title">' . $title . '</h3>';
  }

  $output .= '<ul class="list_cats ' . $class . '">';
  foreach ( $categories as $category ) {
    $output .= '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name . '</a></li>';
  }
  $output .= '</ul>';

  return $output;
}

add_shortcode( 'list_categories', 'shortcode_list_categories' );
