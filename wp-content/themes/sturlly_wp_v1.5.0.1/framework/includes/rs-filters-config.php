<?php
/**
 * Filter Hooks
 *
 * @package strully
 * @since 1.0
 */

add_filter( 'walker_nav_menu_start_el', 'rs_one_page_nav_walker', 10, 4 );
add_filter( 'rs-post-format-video', 'rs_post_format_media' );
add_filter( 'rs-post-format-audio', 'rs_post_format_media' );
add_filter( 'the_content', 'rs_content_filter', 2 );
add_filter( 'wp_title', 'rs_wp_title', 10, 2 );

if (! function_exists('rs_wp_title') ) {
  function rs_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() ) {
      return $title;
    } // end if

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
      $title = "$title $sep $site_description";
    } // end if

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 ) {
      $title = sprintf( __( 'Page %s', 'rs' ), max( $paged, $page ) ) . " $sep $title";
    } // end if

    return $title;

  } // end rs_wp_title
}

/**
* @return # 'key with'
* @param  $output, item, depth, args
*
**/
if( !function_exists('rs_one_page_nav_walker') ) {
  function rs_one_page_nav_walker($output, $item, $depth, $args) {

    // get the page layout type
    $type_website = cs_get_option('page_type');
    //echo '<pre>';
    //print_r($item->classes[0]);
    //echo '</pre>';

    if ( is_object($item) ) {  // Exectue only when it's in menu items

        // if($args->theme_location == 'primary-menu' && $item->object == 'page' || $item->object == 'portfolio-category') {
        if($item->classes[0] != 'multi') {

          $home_childs = array();  // Default value for home children


          if($item->object == 'portfolio-category') {
              $title = str_replace(' ', '-', $item->title);
              $url  = '#' . strtolower($title);

            } elseif(is_single() || is_404() || is_archive() || is_search() || is_page_template('template-blog-list.php')) {
              $url = home_url() . '/#' . get_slug($item->object_id);
            } else {
              $url = '#' . get_slug($item->object_id);
            }

          $pattern = '/(?<=href\=")[^]]+?(?=")/';

          if (!isset($type_website) or $type_website == 'one-page') {
            $output = preg_replace($pattern, $url, $output);
          } else {
            $hsv_classes_menu = $item->classes;

            if  ($item->object == 'portfolio-category'  or ( in_array('menu-item-has-children', $hsv_classes_menu) and in_array('current_page_item', $hsv_classes_menu) ) ) {

              $output = preg_replace($pattern, $url, $output);
            }
          }

        } else {
          $dom = new DOMDocument;
          $dom->encoding = 'utf-8';
          $dom->loadHTML( mb_convert_encoding($output, "HTML-ENTITIES", "UTF-8") );

          $dom->removeChild($dom->firstChild);  // Remove <!DOCTYPE
          $dom->replaceChild($dom->firstChild->firstChild->firstChild, $dom->firstChild); // Remove <html><body></body></html>

          $anchors = $dom->getElementsByTagName('a');
          foreach($anchors as $anchor) {
            $anchor->setAttribute('class', 'external');
          }

          $output = $dom->saveHTML();
        }

    }

      return $output;
  }
}

/**
 *
 * Post formats filters in the_content
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'rs_content_filter' ) ) {
  function rs_content_filter( $content ) {
    $post_format = get_post_format();
    if ( $post_format ) {
      $content = apply_filters( 'rs-post-format-'. $post_format, $content );
    }
    return $content;
  }
}

/**
 *
 * Post format "Video and Audio"
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'rs_post_format_media' ) ) {
  function rs_post_format_media( $content ) {

    $media = get_first_url_from_string( $content );

    if( ! empty( $media ) ){

      $content  = str_replace( $media, '', $content );

    } else {

      $pattern = rs_get_shortcode_regex( rs_tagregexp() );
      preg_match( '/'.$pattern.'/s', $content, $media );
      if ( ! empty( $media[2] ) ) {
        $content = str_replace( $media[0], '', $content );
      }

    }

    return $content;
  }
}
