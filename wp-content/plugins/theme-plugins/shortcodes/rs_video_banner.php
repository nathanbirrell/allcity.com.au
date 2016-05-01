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
      'broadcasts' => '',
    	'vimeo_id' => '',
      'youtube_id' => '',
      'autoplay_youtube_id' => '',
      'autoplay_vimeo_id' => '',
  	), $atts ) );

  	$id       = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  	$class    = ( $class ) ? ' '. sanitize_html_class($class) : '';

    wp_enqueue_script('jquery-fit');
    if($autoplay_youtube_id == true){
      $autoplay = 1;
      $autoplay_youtube_id = $autoplay;
    }
    if($autoplay_vimeo_id == true){
      $autoplay = 1;
      $autoplay_vimeo_id = $autoplay;
    }
    if ($broadcasts == 'youtube') {

      $output  = '<div '.$id.' class="home-slider full-screen video-main'.$class.'">';
      $output .=  '<iframe class="full-screen" src="https://www.youtube.com/embed/' . esc_attr($youtube_id) . '?autoplay=' . $autoplay . '" width="500" height="284" allowfullscreen></iframe>';
      $output .=  '</div>';

    } else {
      $output  = '<div '.$id.' class="home-slider full-screen video-main'.$class.'">';
      $output .=  '<iframe class="full-screen" src="//player.vimeo.com/video/'.esc_attr($vimeo_id).'?autoplay=' . $autoplay . '?title=0&amp;byline=0&amp;portrait=0&amp;color=bb9b44&amp;autoplay=1" width="500" height="284" allowfullscreen></iframe>';
      $output .=  '</div>';
    }
  	return $output;
}
add_shortcode('rs_video_banner', 'rs_video_banner');