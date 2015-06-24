<?php
/**
 * Backend Theme Functions.
 *
 * @package pixar
 * @subpackage Template
 */

if( !function_exists('rs_shortcode_exists')) {

  function rs_shortcode_exists( $shortcode = false ) {

    global $shortcode_tags;

    if ( ! $shortcode )
      return false;
    if ( array_key_exists( $shortcode, $shortcode_tags ) )
      return true;

    return false;
  }

}

/**
 * Theme Logo.
 *
 * @package pixar
 * @subpackage Template
 */
if(! function_exists('rs_site_logo')) {

  function rs_site_logo() {

    $home_url = home_url('/');
    $logo     = cs_get_option('general_logo');

    if( empty($logo)) {
      echo '<h1 class="logo"><a href="'.esc_url($home_url).'">'.get_bloginfo('name').'</a></h1>';
    } else {
      echo '<a class="logo-dark" href="'.esc_url($home_url).'"><img class="logo-dark" alt="..." src="'.esc_url(cs_get_option('general_logo')).'" /></a>';
      echo '<a class="logo-light" href="'.esc_url($home_url).'"><img class="logo-white" alt="..." src="'.esc_url(cs_get_option('general_logo_light')).'" /></a>';
    }

  }
}

/**
*
* @return none
* @param  css
* compress css
*
**/
if( !function_exists('st_css_compress')) {

  function st_css_compress($css) {
    $css  = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
    $css  = str_replace( ': ', ':', $css );
    $css  = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
    return $css;
  }

}

/**
*
* @return none
* @param  class
* multiple class sanitization
*
**/
if ( ! function_exists( 'sanitize_html_classes' ) && function_exists( 'sanitize_html_class' ) ) {
  function sanitize_html_classes( $class, $fallback = null ) {

    // Explode it, if it's a string
    if ( is_string( $class ) ) {
      $class = explode(" ", $class);
    }


    if ( is_array( $class ) && count( $class ) > 0 ) {
      $class = array_map("sanitize_html_class", $class);
      return implode(" ", $class);
    }
    else {
      return sanitize_html_class( $class, $fallback );
    }
  }
}

/**
*
* @return none
* @param  style
* add inline css
*
**/
global $st_inline_styles;
$st_inline_styles = array();
if( ! function_exists( 'st_add_inline_style' ) ) {
  function st_add_inline_style( $style ) {

    global $st_inline_styles;
    array_push( $st_inline_styles, $style );
  }
}

/**
*
* @return post id + front page id
* @param  none
*
**/
if( !function_exists('rs_get_post_id_by_menu')) {
  function rs_get_post_id_by_menu() {

    $menu_name = 'primary-menu';

    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] )) {
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
    }

    foreach ( $menu_items as $menu_item ) {
        if($menu_item->classes[0] == 'multi') { continue; }
        $numbers[] = $menu_item->object_id;
    }

    $numbers[] = get_option('page_on_front');
  //  print_r($numbers);

    return $numbers;
    
  }
}

/**
*
* @return slug name
* @param  menu id
* returns the slug name via menu id
*
**/
if(! function_exists('get_slug')) {

  function get_slug( $id ) {

    if ( $id == null ) $id = $post->ID;
    $post_data = get_post( $id, ARRAY_A );
    $slug = $post_data['post_name'];

    return $slug;
  }

}

/**
*
* @return string
* @param  null
* returns the home url
*
**/
if(! function_exists('get_home_front_page_url')) {

  function get_home_front_page_url() {

    $front_page_ID = get_option('page_on_front');
    return get_permalink($front_page_ID);

  }

}

/**
 *
 * Get first "url" from post content or string
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'get_first_url_from_string' ) ) {
  function get_first_url_from_string( $string ) {
    $pattern  = "/^\b(?:(?:https?|ftp):\/\/)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
    preg_match( $pattern, $string, $link );
    return ( !empty( $link[0] ) ) ? $link[0] : false;
  }
}

/**
 *
 * Custom Regular Expression
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists('rs_get_shortcode_regex') ) {
  function rs_get_shortcode_regex( $tagregexp = '' ) {
    // WARNING! Do not change this regex without changing do_shortcode_tag() and strip_shortcode_tag()
    // Also, see shortcode_unautop() and shortcode.js.
    return
      '\\['                                // Opening bracket
      . '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
      . "($tagregexp)"                     // 2: Shortcode name
      . '(?![\\w-])'                       // Not followed by word character or hyphen
      . '('                                // 3: Unroll the loop: Inside the opening shortcode tag
      .     '[^\\]\\/]*'                   // Not a closing bracket or forward slash
      .     '(?:'
      .         '\\/(?!\\])'               // A forward slash not followed by a closing bracket
      .         '[^\\]\\/]*'               // Not a closing bracket or forward slash
      .     ')*?'
      . ')'
      . '(?:'
      .     '(\\/)'                        // 4: Self closing tag ...
      .     '\\]'                          // ... and closing bracket
      . '|'
      .     '\\]'                          // Closing bracket
      .     '(?:'
      .         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
      .             '[^\\[]*+'             // Not an opening bracket
      .             '(?:'
      .                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
      .                 '[^\\[]*+'         // Not an opening bracket
      .             ')*+'
      .         ')'
      .         '\\[\\/\\2\\]'             // Closing shortcode tag
      .     ')?'
      . ')'
      . '(\\]?)';                          // 6: Optional second closing brocket for escaping shortcodes: [[tag]]
  }
}

/**
 *
 * Tag Regular Expression
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'rs_tagregexp' ) ) {
  function rs_tagregexp() {
    return apply_filters( 'rs_custom_tagregexp', 'video|audio|playlist|video-playlist|embed|rs_media' );
  }
}

/**
 *
 * Helper Functions
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists('is_explodable' ) ) {

  function is_explodable( $page_name ) {
    return (strpos($page_name, ',') === false ) ? false : true;
  }

}


/**
 *
 * POST FORMAT: VIDEO & AUDIO
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'rs_post_media' ) ) {
  function rs_post_media( $content ) {

    $is_video = ( get_post_format() == 'video' ) ? true : false;
    $media    = get_first_url_from_string( $content );

    if( ! empty( $media ) ) {

      global $wp_embed;
      $content  = do_shortcode( $wp_embed->run_shortcode( '[embed]'. $media .'[/embed]' ) );

    } else {

      $pattern = rs_get_shortcode_regex( rs_tagregexp() );
      preg_match( '/'.$pattern.'/s', $content, $media );

      if ( ! empty( $media[2] ) ) {

        if( $media[2] == 'embed' ) {
          global $wp_embed;
          $content = do_shortcode( $wp_embed->run_shortcode( $media[0] ) );
        } else {
          $content = do_shortcode( $media[0] );
        }

      }

    }

    if( ! empty( $media ) ) {

      $output  = '<div class="entry-media">';
      $output .= ( $is_video ) ? '<div class="rs-fluid"><div class="rs-fluid-inner">' : '';
      $output .= $content;
      $output .= ( $is_video ) ? '</div></div>' : '';
      $output .= '</div>';

      return $output;

    }

    return false;
  }
}

/**
 *
 * Google Font
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if(!function_exists('rs_enqueue_google_fonts')) {

  function rs_enqueue_google_fonts() {

    $query_args    = array();
    $typography    = array();
    $heading       = cs_get_option('heading_typo');
    $body          = cs_get_option('body_typo');

    $typography    =  array(
      array(
        'selector' => 'h1,h2,h3,h4,h5,h6',
        'font'     => $heading
      ),
      array(
        'selector' => 'body',
        'font'     => $body
      )
    );

    foreach ( $typography as $font ) {
      $query_args[] = $font['font']['family'].':300,400,600,700';
    }

    if ( ! empty( $query_args ) ) {
      wp_enqueue_style( 'rs-google-fonts', add_query_arg( 'family', urlencode( implode( '|', $query_args ) ).'&subset=latin', '//fonts.googleapis.com/css' ), array(), null );
    }
  }

}

/**
 *
 * Typography
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'rs_get_typography' ) ) {
  function rs_get_typography() {

    $heading_typography = cs_get_option('heading_typo');
    $body_typography    = cs_get_option('body_typo');
    $size               = cs_get_option('font_size');
    $line_height        = cs_get_option('line_height');
    $heading_color      = cs_get_option('heading_color');
    $body_color         = cs_get_option('body_color');

    $typography =  array(
      0 => array(
        'selector' => 'h1,h2,h3,h4,h5',
        'color'    => $heading_color,
        'font'     => $heading_typography
      ),

      1 => array(
        'selector'    => 'body',
        'color'       => $body_color,
        'font'        => $body_typography,
        'size'        => $size,
        'line_height' => $line_height
      ),

    );

    $output     = '';

    if ( ! empty( $typography ) ) {
      foreach ( $typography as $font ) {
        if ( ! empty( $font['selector'] ) ) {

          $family  = '"'. $font['font']['family'] .'", Arial, sans-serif';

          $output .= $font['selector'] . '{';
          $output .= 'font-family: '. $family .';';
          $output .= ( ! empty( $font['size'] ) ) ? 'font-size: '.  $font['size'] .';' : '';
          $output .= ( ! empty( $font['color'] ) ) ? 'color:'.$font['color'].';' : '';
          $output .= ( ! empty( $font['line_height'] ) ) ? 'line-height: '. $font['line_height'] .';' : '';
          $output .= '}';

        }
      }
    }

    return $output;

  }
}

