<?php
/**
 *
 * Blog
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function rs_blog( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'cats'        	  => '',
    'limit' 		      => '',
    'layout'          => '1',
    'nav'             => 'load',
    'btn_link'        => '',
    'load_more_style' => 'small-button small-button-gray'
  ), $atts ) );

  global $wp_query, $paged, $rs_active;
  if( is_front_page() || is_home() ) {
    $paged = ( get_query_var('paged') ) ? intval( get_query_var('paged') ) : intval( get_query_var('page') );
  } else {
    $paged = intval( get_query_var('paged') );
  }

  if ( function_exists( 'vc_parse_multi_attribute' ) ) {
    $parse_args   = vc_parse_multi_attribute( $btn_link );
    $href         = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '#';
  }

  $args = array(
  	'post_type'	=> 'post',
  	'posts_per_page'	=>	$limit,
    'paged'           => $paged,
  	'tax_query'		=> array(
  		array(
  			'taxonomy'	=> 'category',
  			'field'		=> 'ids',
  			'terms'		=> explode(',', $cats),
  		),
  	)	
  );

  $nav_args = array(
    'nav'             => $nav,
    'posts_per_page'  => $limit,
    'layout'          => $layout,
    'btn_link'        => $href,
    'load_more_style' => $load_more_style
  );

  $tmp_query  = $wp_query;
  $wp_query   = new WP_Query( $args );

  ob_start();
  $count = 0;
  if ( have_posts() ) while ( have_posts() ) : the_post();

  $post_format = (get_post_format() == true) ? get_post_format():'standard';
  $rs_active = ($count == 0) ? 'active':'';
  get_template_part('post-formats/layout-'.$layout.'/content', $post_format );

  $count++;
  endwhile; 
  rs_paging_nav( $nav_args );

  wp_reset_query();
  wp_reset_postdata();
  $wp_query = $tmp_query;

  $output = ob_get_clean();
  return $output; 
}
add_shortcode( 'rs_blog', 'rs_blog' );
