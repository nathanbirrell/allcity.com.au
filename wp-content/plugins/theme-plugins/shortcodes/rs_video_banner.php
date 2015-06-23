<?php
/**
 *
 * Video Banner
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_video_banner( $atts, $content = '' ) {

  	extract( shortcode_atts( array(
    	'id'    => '',
      'class' => '',
    	'vimeo_id' => '',
  	), $atts ) );

  	$id       = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  	$class    = ( $class ) ? ' '. sanitize_html_class($class) : '';

    wp_enqueue_script('jquery-fit');

    $output  = '<div '.$id.' class="home-slider full-screen video-main'.$class.'">';
    $output .=  '<iframe class="full-screen" src="//player.vimeo.com/video/'.esc_attr($vimeo_id).'?title=0&amp;byline=0&amp;portrait=0&amp;color=bb9b44&amp;autoplay=1" width="500" height="284" allowfullscreen></iframe>';
    $output .=  '</div>';
  	return $output;
}
add_shortcode('rs_video_banner', 'rs_video_banner');