<?php
/**
 *
 * Portfolio
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function rs_portfolio( $atts, $content = '', $id = '' ){

  global $wp_query, $paged, $post;

  wp_enqueue_script('jquery-grid');

  $defaults = array(
    'id'              => '',
    'class'           => '',
    'cats'            => '',
    'portfolio_style' => 'style2',
    'posts_per_page'  => '',
    'orderby'         => 'ID',
  );

  $atts['portfolio_style'] = 'allcity'; //Force all city theme

  extract( shortcode_atts( $defaults, $atts ) );

  if( is_front_page() || is_home() ) {
    $paged = ( get_query_var('paged') ) ? intval( get_query_var('paged') ) : intval( get_query_var('page') );
  } else {
    $paged = intval( get_query_var('paged') );
  }

  // Query
  $args = array(
    'posts_per_page'  => $posts_per_page,
    'post_type'       => 'portfolio',
    'paged'           => $paged,
  );

  if( !empty($cats) ) {
    $args['tax_query'] = array(
      array(
        'taxonomy'  => 'portfolio-category',
        'field'     => 'ids',
        'terms'     => explode( ',', $cats )
      )
    );
  }

  $tmp_query  = $wp_query;
  $wp_query   = new WP_Query( $args );

  ob_start();

  echo '<div id="grid-gallery" class="grid-gallery no-padding-top no-padding-bottom rs-'.sanitize_html_class($portfolio_style).'">';


  echo '<div id="work" class="work grid-wrap">';

    $filter_args = array(
      'echo'     => 0,
      'title_li' => '',
      'style'    => 'none',
      'taxonomy' => 'portfolio-category',
      'walker'   => new Walker_Portfolio_List_Categories(),
    );

    if( !empty($cats) ) {

      $exp_cats = explode(',', $cats );
      $new_cats = array();

      foreach ( $exp_cats as $cat_value ) {
        $has_children = get_term_children( $cat_value, 'portfolio-category' );
        if( ! empty( $has_children ) ) {
          $new_cats[] = implode( ',', $has_children );
        } else {
          $new_cats[] = $cat_value;
        }
      }

      $filter_args['include'] = implode( ',', $new_cats );

    }

    $filter_args = wp_parse_args( $args, $filter_args );

  echo '<ul class="filters isotope-filters " >';
  echo '<li><a class="activbut" data-filter="*" href="#">all</a></li>';
  echo wp_list_categories( $filter_args );
  echo '</ul>';

  echo '<ul class="grid isotope row  animated izotope-container portfolio-'. $portfolio_style .' " style="position-relative; overflow:hidden;" >';
  echo '<div class="grid-sizer"></div>';
  
 	
  while( have_posts() ) : the_post();
    get_template_part('templates/portfolio-styles/portfolio', 'allcity' );
  endwhile;
 
  echo '</ul>';
  echo '</div>';

  // echo '<div class="popup-wrappers">';
  // while( have_posts() ) : the_post();
  //   get_template_part('templates/portfolio-styles/portfolio', 'single' );
  // endwhile;
  // echo '<div class="popup-next"><span class="fa fa-angle-right"></span></div>';
  // echo '<div class="popup-prev"><span class="fa fa-angle-left"></span></div>';
  // echo '<div class="popup-close"></div>';
  // echo '</div>';



  echo '</div>';

  wp_reset_query();
  wp_reset_postdata();
  $wp_query = $tmp_query;

  $output = ob_get_clean();

  return $output;

}

add_shortcode('rs_portfolio', 'rs_portfolio');
