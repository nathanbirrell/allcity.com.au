<?php
/**
 * Action Hooks.
 *
 * @package st
 * @since 1.0
 */

add_action( 'widgets_init',     'st_register_widgets' );
add_action( 'wp_enqueue_scripts',   'st_enqueue_scripts' );
add_action( 'wp_ajax_ajax-pagination', 'st_ajax_pagination');
add_action( 'wp_ajax_nopriv_ajax-pagination', 'st_ajax_pagination');
add_action( 'wp_footer', 'st_enqueue_inline_styles' );
add_action( 'wp_head',        'rs_custom_styles', 8);
add_action( 'tgmpa_register', 'rs_include_required_plugins' );


/**
* @return null
* @param none
* Add inline styles
**/
if( !function_exists('st_inline_styles')) {

  function st_enqueue_inline_styles() {

    global $st_inline_styles;

    if ( ! empty( $st_inline_styles ) ) {
      echo '<style id="custom-shortcode-css" type="text/css">'. st_css_compress( join( '', $st_inline_styles ) ) .'</style>';
    }
  }
}


/**
* @return null
* @param none
* register widgets
**/
if( !function_exists('st_register_widgets') ) {

  function st_register_widgets() {

    // register sidebars
    register_sidebar(array(
        'id'            => 'sidebar',
        'name'          => 'Sidebar',
        'before_widget' => '<div id="%1$s" class="sidebar-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="title">',
        'after_title'   => '</h6>',
        'description'   => 'Drag the widgets for sidebars.'
      ));
  }
}

/**
* @return null
* @param none
* loads all the js and css script to frontend
**/

if( !function_exists('st_enqueue_scripts')) {

  function st_enqueue_scripts() {

    if( ( is_admin() ) ) { return; }

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-migrate' );
    wp_enqueue_script( 'jquery-ui-core' );

    if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); }

    wp_enqueue_style( 'fontawesome',    T_URI . '/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'animation',      T_URI . '/assets/css/animation.css' );
    wp_enqueue_style( 'bootstrap',      T_URI . '/assets/css/bootstrap.css' );
    wp_enqueue_style( 'custom-style',   T_URI . '/assets/css/style.css' );
    wp_enqueue_style( 'portfolio-style',T_URI . '/assets/css/style-portfolio.css' );
    wp_enqueue_style( 'fancybox',       T_URI . '/assets/css/jquery.fancybox.css' );
    wp_enqueue_style( 'scrollbar',      T_URI . '/assets/css/custom-scrollbar.css' );
    wp_enqueue_style( 'responsive',     T_URI . '/assets/css/responsive.css' );
    wp_enqueue_style( 'prettyPhoto',    T_URI . '/assets/css/pretty-photo.css' );
    rs_enqueue_google_fonts();

    wp_enqueue_script( 'jquery-moderziner',     T_URI . '/assets/js/modernizr.custom.js',       array( 'jquery' ), true, false );
    wp_enqueue_script( 'jquery-loader',         T_URI . '/assets/js/loader.min.js',             array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-preloader',      T_URI . '/assets/js/preloader.js',              array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-easing',         T_URI . '/assets/js/jquery.easing.1.3.js',      array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-hover',          T_URI . '/assets/js/hover.min.js',              array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-parallax',       T_URI . '/assets/js/parallel.min.js',           array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-scroll',         T_URI . '/assets/js/smooth-scroll.js',          array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-media',          T_URI . '/assets/js/matchMedia.js',             array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-main',           T_URI . '/assets/js/custom.js',                 array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-conter',         T_URI . '/assets/js/conter.js',                 array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-bootstrap',      T_URI . '/assets/js/bootstrap-custom.js',       array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-nav',            T_URI . '/assets/js/jquery.nav.js',             array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-images',         T_URI . '/assets/js/imagesloaded.pkgd.min.js',  array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-custom-scroll',  T_URI . '/assets/js/custom-scrollbar.min.js',   array( 'jquery' ), false, true );

    wp_enqueue_script( 'jquery-classie',        T_URI . '/assets/js/classie.js',                array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-portfolio',      T_URI . '/assets/js/portfolio.js',              array( 'jquery' ), false, true );
    //wp_register_script( 'jquery-grid',          T_URI . '/assets/js/cbpGridGallery.js',         array( 'jquery' ), false, true );
    wp_register_script( 'jquery-fit',           T_URI . '/assets/js/jquery.fitvids.js',         array( 'jquery' ), false, true );
    wp_enqueue_script( 'jquery-prettyphoto',    T_URI . '/assets/js/jquery.prettyPhoto.js',     array( 'jquery' ), false, true );

    wp_register_script('jquery-sensor',      'http://maps.google.com/maps/api/js?sensor=false', array('jquery-main'), false, true);
    wp_register_script('jquery-map',          T_URI . '/assets/js/map.js',                      array('jquery-sensor'), false, true);
    wp_enqueue_script('jquery-counter',       T_URI . '/assets/js/counter.js',                  array('jquery'), false, true);
    wp_enqueue_script('jquery-comming-soon',  T_URI . '/assets/js/coming-soon.js',              array('jquery'), false, true);
    
    wp_enqueue_script('portfolio-scripts',    T_URI . '/assets/js/all.js',                      array('jquery'), false, true);
    wp_enqueue_script('idangerous-swiper',    T_URI . '/assets/js/idangerous.swiper.min.js',    array('jquery'), false, true);
    wp_enqueue_script('isotope-pkgd',         T_URI . '/assets/js/isotope.pkgd.min.js',         array('jquery'), false, true);
    wp_enqueue_script('fancybox',             T_URI . '/assets/js/jquery.fancybox.pack.js',     array('jquery'), false, true);


    wp_localize_script('jquery-main', 'rs_ajax',
      array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'siteurl' => get_template_directory_uri()
      )
    );

  }

}

/**
 *
 * Ajax Pagination
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if( ! function_exists( 'st_ajax_pagination' ) ) {
  function st_ajax_pagination() {


    $type       = ( ! empty( $_POST['post_type'] ) ) ? $_POST['post_type'] : 'post';
    $layout     = ( ! empty( $_POST['layout'] ) ) ? $_POST['layout'] : '1';
    $query_args = array(
      'paged'           => $_POST['paged'],
      'posts_per_page'  => $_POST['posts_per_page'],
      'post_type'       => $type,
    );

    query_posts( $query_args );

    while( have_posts() ) : the_post();

    $post_format = (get_post_format() == true) ? get_post_format():'standard';
    get_template_part( 'post-formats/layout-'.$layout.'/content', $post_format );

    endwhile;
    wp_reset_query();

    die();
  }
}


if(! function_exists('rs_include_required_plugins')) {

  function rs_include_required_plugins() {

    $plugins = array(

      array(
        'name'                => 'Contact Form 7', // The plugin name
        'slug'                => 'contact-form-7', // The plugin slug (typically the folder name)
        'required'            => false, // If false, the plugin is only 'recommended' instead of required
        'version'             => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'    => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'        => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'                => 'Visual Composer', // The plugin name
        'slug'                => 'js_composer', // The plugin slug (typically the folder name)
        'source'              => 'http://demo.nrgthemes.com/projects/plugins/js_composer.zip', // The plugin source
        'required'            => true, // If false, the plugin is only 'recommended' instead of required
        'version'             => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'    => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'        => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'                => 'Theme Plugins', // The plugin name
        'slug'                => 'theme-plugins', // The plugin slug (typically the folder name)
        'source'              => 'http://demo.nrgthemes.com/plugins/sturlly-plugins/theme-plugins.zip', // The plugin source
        'required'            => true, // If false, the plugin is only 'recommended' instead of required
        'version'             => '1.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'    => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation'  => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'        => '', // If set, overrides default API URL and points to an external URL
      ),
    );

    $config = array(
      'domain'           => 'st',               // Text domain - likely want to be the same as your theme.
      'default_path'     => '',                          // Default absolute path to pre-packaged plugins
      'parent_menu_slug' => 'themes.php',        // Default parent menu slug
      'parent_url_slug'  => 'themes.php',        // Default parent URL slug
      'menu'             => 'install-required-plugins',  // Menu slug
      'has_notices'      => true,                        // Show admin notices or not
      'is_automatic'     => false,             // Automatically activate plugins after installation or not
      'message'          => '',              // Message to output right before the plugins table
      'strings'          => array(
        'page_title'                      => __( 'Install Required Plugins', 'st' ),
        'menu_title'                      => __( 'Install Plugins', 'st' ),
        'installing'                      => __( 'Installing Plugin: %s', 'st' ), // %1$s = plugin name
        'oops'                            => __( 'Something went wrong with the plugin API.', 'st' ),
        'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
        'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
        'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
        'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
        'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
        'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
        'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
        'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
        'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
        'return'                          => __( 'Return to Required Plugins Installer', 'st' ),
        'plugin_activated'                => __( 'Plugin activated successfully.', 'st' ),
        'complete'                        => __( 'All plugins installed and activated successfully. %s', 'st' ), // %1$s = dashboard link
        'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
      )
    );

    tgmpa( $plugins, $config );

  }
}



if( ! function_exists( 'rs_custom_styles' ) ) {

  function rs_custom_styles() {
    $body_color  = cs_get_option( 'body_color' );
    $custom_css  = cs_get_option( 'custom_css' );
    $style  = '<style type="text/css" media="screen">';
    $style .= rs_get_typography();
    $style .= ( $body_color ) ? 'p {color:' . $body_color . ' !important;}' : '';
    $style .= ( ! empty( $custom_css ) ) ? $custom_css : '';
    $style .= '</style>';
    echo $style;
  }
}
