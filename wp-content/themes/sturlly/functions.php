<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package st
 * @since 1.0
 */
add_action('after_setup_theme', 'st_after_setup');
define( 'CS_ACTIVE_SHORTCODE',  false );

defined( 'F_PATH' )     or  define( 'F_PATH', 'st' );
defined( 'T_NAME' )     or  define( 'T_NAME', 'st');
defined( 'T_URI' )      or  define( 'T_URI',  get_template_directory_uri() );
defined( 'T_PATH' )     or  define( 'T_PATH', get_template_directory() );

// After Theme Setup.
// ----------------------------------------------------------------------------------------------------
if( !function_exists('st_after_setup')) {

  function st_after_setup() {

    add_image_size('portfolio',         396,    396, true );
    add_image_size('blog-regular',      1130,   113, true );
    add_image_size('gallery',           317,    317, true );
    add_image_size('blog-single',       1100,   715, true );
    add_image_size('blog-layout-2',     347,    347, true );
    add_image_size('blog-list',         723,    470, true );
    add_image_size('portfolio-single',  824,    824, true );
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background' );
    add_theme_support('automatic-feed-links' );
    add_theme_support('post-formats',   array( 'audio', 'video') );

    // Register Menus.
    // ----------------------------------------------------------------------------------------------------
    register_nav_menus  (array( 'primary-menu' => __( 'Main Navigation', 'st' ) ) );
  }

}


locate_template ( 'framework/includes/rs-actions-config.php',     true );
locate_template ( 'framework/includes/rs-helper-functions.php',   true );
locate_template ( 'framework/includes/rs-frontend-functions.php',   true );
locate_template ( 'framework/includes/rs-include-config.php',     true );
locate_template ( 'framework/includes/rs-filters-config.php',   true );
locate_template ( 'framework/includes/rs-widgets-config.php',     true );

// Framework Integration.
// ----------------------------------------------------------------------------------------------------
require_once dirname( __FILE__ ) .'/framework/cs-framework.php';

if ( ! isset( $content_width ) ) {
  $content_width = 1140;
}

?>
