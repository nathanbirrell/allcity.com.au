<?php
/**
 * Frontend Theme Functions.
 *
 * @package st
 * @subpackage Template
 */


if( !function_exists('st_site_menu')) {

  function st_site_menu($class = '', $skin) {

    echo '<div class="col-md-9 text-left float-right collapse-navation">
            <div class="navbar-collapse collapse navbar-inverse no-transition">
              <ul class="nav navbar-nav navbar-left navbar-'.sanitize_html_class($skin).'">';

    if ( function_exists('wp_nav_menu') && has_nav_menu( 'primary-menu' ) ) {

      wp_nav_menu(array(
        'theme_location'  => 'primary-menu',
        'container'       => false,
        'items_wrap'      => '%3$s',
        'menu_id'         => 'main-menu',
        'menu_class'      => $class,
      ));
    } else {
      echo '<a target="_blank" href="'. admin_url('nav-menus.php') .'" class="no-menu">'. __( 'You can edit your menu content on the Menus screen in the Appearance section.', 'nx' ) .'</a>';
    }

    echo '</ul>
          <div class-"ctas">
              <a href="tel:0395717000" title="Call us to get a quote on your Kitchen or Bathroom projects" target="_self" class="small-button float-right cta phone">03 9571 7000</a>
              <a href="#contact" title="Contact us to get a quote on your Kitchen or Bathroom projects" target="_self" class="small-button float-right cta">Get your free quote</a>
          </div>
        </div>
      </div>';
  }

}

if (! function_exists('rs_social_share') ) {
  function rs_social_share() { ?>
    <li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink());?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
    <li class="twitter"><a href="http://twitter.com/home?status=<?php echo esc_url(urlencode(the_title('', '', false))); ?><?php esc_url(the_permalink()); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
    <li class="linkedin"><a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink());?>&amp;title=<?php echo esc_attr(urlencode(the_title('','', false)));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
    <li class="google-plus"><a href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>" target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
  <?php }
}


if(! function_exists('rs_site_logo')) {

  function rs_site_logo() {

    $home_url = home_url('/');

    $output  =  '<div id="site-logo">';
    $output .=  '<h1 class="site-name rs-sticky-item"><a href="'.esc_url($home_url).'">'.get_bloginfo('name').'</a></h1>';
    $output .=  '</div>';

    return $output;

  }
}

/**
 *
 * Pagination
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'rs_paging_nav' ) ) {
  function rs_paging_nav( $args = array() ) {

    if( ! empty( $args['wp_query'] ) ){
      $wp_query       = $args['wp_query'];
      $max_num_pages  = $wp_query->max_num_pages;
    } else if( ! empty( $args['query'] ) ){
      $max_num_query  = new WP_Query( $args['query'] );
      $max_num_pages  = $max_num_query->max_num_pages;
      wp_reset_query();
    } else {
      $max_num_pages  = $GLOBALS['wp_query']->max_num_pages;
    }


    $defaults = array(
      'posts_per_page'  => get_option( 'posts_per_page' ),
      'max_pages'       => $max_num_pages,
      'post_type'       => 'post',
    );

    $args = wp_parse_args( $args, $defaults );

    //if ( $max_num_pages < 1 ) { return; }

    if( $args['nav'] == 'load' ) {

      $border_class = ($args['layout'] == 1) ? 'border-top ':'';
      $uniqid     = uniqid();
      $output     = '<div class="row ajax-pagination clearfix buttons '.$border_class.'os-animation blog-layout-'.$args['layout'].' text-center" data-os-animation="fadeInUp">';
      $output    .= '<a id="load-more" href="#" data-token="'. $uniqid .'" class="ajax-load-more text-center '.$args['load_more_style'].'">Load More Blog</a>&nbsp;&nbsp;<a href="'.$args['btn_link'].'" target="_blank" class="text-center '.$args['load_more_style'].'">View All Blog</a> ';
      $output    .= '</div>';

      unset( $args['query'] );
      wp_localize_script( 'jquery-main', 'rs_load_more_' . $uniqid, $args );

      echo $output;

    } else {
      //echo 'a';
      if( is_front_page() || is_home() ) {
        $paged = ( get_query_var('paged') ) ? intval( get_query_var('paged') ) : intval( get_query_var('page') );
      } else {
        $paged = intval( get_query_var('paged') );
      }

      $paged        = $paged ? $paged : 1;
      $pagenum_link = html_entity_decode( get_pagenum_link() );
      $query_args   = array();
      $url_parts    = explode( '?', $pagenum_link );

      if ( isset( $url_parts[1] ) ) {
        wp_parse_str( $url_parts[1], $query_args );
      }

      $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
      $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

      $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
      $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

      $links = paginate_links( array(
        'base'      => $pagenum_link,
        'format'    => $format,
        'total'     => $max_num_pages,
        'current'   => $paged,
        'mid_size'  => 1,
        'type'      => 'array',
        'add_args'  => array_map( 'urlencode', $query_args ),
        'prev_text' => __( '&lt;', 'sturlly' ),
        'next_text' => __( '&gt;', 'sturlly' ),
      ) );

      if ( $links ) {
      ?>
      <div class="pagination border-top">
        <nav class="pagerblock text-center">
          <?php
            foreach ($links as $link) {
              echo $link;
            }
          ?>
        </nav>
      </div>
      <?php
      }

    }
  }
}
