<?php

/**
 * Theme custom functions.
 */

/**
 * Cut string length to a specified words limit
 *
 * @param string $text
 * @param integer $limit
 *
 * @return string
 */
function trim_string_length( $text, $limit ) {
  $text = strip_tags( $text );
  if ( str_word_count( $text, 0 ) > $limit ) {
    $words = str_word_count( $text, 2 );
    $pos   = array_keys( $words );
    $text  = substr( $text, 0, $pos[ $limit ] );
  }

  return $text;
}


/**
 * Remove invalid tags
 *
 * @param string $str
 * @param array $tags
 *
 * @return string
 */
function remove_invalid_tags( $str, $tags ) {
  foreach ( $tags as $tag ) {
    $str = preg_replace( '#^<\/' . $tag . '>|<' . $tag . '>$#', '', trim( $str ) );
  }

  return $str;
}

/**
 * Remove empty paragraphs
 *
 * @param string $content
 *
 * @return string
 */
function shortcode_empty_paragraph_fix( $content ) {
  $array = array(
    '<p>['    => '[',
    ']</p>'   => ']',
    ']<br />' => ']'
  );

  $content = strtr( $content, $array );

  return $content;
}

add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );

/**
 * Custom Pagination
 * @link http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin
 */
function pagination( $pages = '', $range = 2 ) {
  $showitems = ( $range * 2 ) + 1;

  global $paged;
  if ( empty( $paged ) ) {
    $paged = 1;
  }

  if ( $pages == '' ) {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if ( ! $pages ) {
      $pages = 1;
    }
  }

  if ( 1 != $pages ) {
    echo "<div class='pagination-custom'>";
    if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
      echo "<a href='" . get_pagenum_link( 1 ) . "'>&laquo;</a>";
    }
    if ( $paged > 1 && $showitems < $pages ) {
      echo "<a href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo;</a>";
    }

    for ( $i = 1; $i <= $pages; $i ++ ) {
      if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
        echo ( $paged == $i ) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link( $i ) . "' class='inactive' >" . $i . "</a>";
      }
    }

    if ( $paged < $pages && $showitems < $pages ) {
      echo "<a href='" . get_pagenum_link( $paged + 1 ) . "'>&rsaquo;</a>";
    }
    if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
      echo "<a href='" . get_pagenum_link( $pages ) . "'>&raquo;</a>";
    }
    echo "</div>\n";
  }
}

/**
 * Retrieve browser name and attach it to the custom body class.
 * updates html output by modifying $body_class variable defined in header.php
 */
function append_browser_name( &$body_class ) {
  $user_agent = $_SERVER["HTTP_USER_AGENT"];
  if ( strpos( $user_agent, "Presto" ) ) {
    $browser = "opera";
  } else if ( strpos( $user_agent, "Chrome" ) ) {
    $browser = "chrome";
  } else if ( strpos( $user_agent, "Safari" ) ) {
    $browser = "safari";
  } else if ( strpos( $user_agent, 'Firefox' ) ) {
    $browser = "firefox";
  } else if ( strpos( $user_agent, "MSIE" ) ) {
    $browser = "ie";
  } else {
    $browser = "other";
  }

  return $body_class .= ' ' . $browser;
}
