<?php
/**
 *
 * Testimonial
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function rs_slider( $atts, $content = '', $id = '' ) {

  global $rs_slider;
  $rs_slider = array();

  extract( shortcode_atts( array(
    'id'     => '',
    'class'  => '',
  ), $atts ) );

  do_shortcode( $content );

  $output  = '<div data-ride="carousel" class="row carousel carousel-content slide slider-content margin-top" id="myCarousel2">';
  $output .=  '<ol class="carousel-indicators">';
  foreach($rs_slider as $key => $item) {
    $active_class = ( $key == 0 ) ? ' active':'';
    $output .=  '<li data-slide-to="'.esc_html($key).'" data-target="#myCarousel2" class="indicator '.esc_html($active_class).'"></li>';
  }
  $output .=  '</ol>';
  $output .=  '<div class="carousel-inner">';

  foreach($rs_slider as $key => $item) {
    $active_item_class = ( $key == 0 ) ? ' active':'';
    $output .=  '<div class="item '.sanitize_html_class($active_item_class).'">';
    $output .=  '<div class="margin-top">';
    $output .=  do_shortcode(wp_kses_post($item['content']));
    $output .=  '</div>';
    $output .=  '</div>';
  }

  $output .=  '</div>';
  $output .=  '</div>';

  return $output;

}

add_shortcode( 'rs_slider', 'rs_slider' );


function rs_slider_item( $atts, $content = '', $id = '' ) {

    global $rs_slider;
    $rs_slider[] = array( 'atts' => $atts, 'content' => $content );
    return;

}
add_shortcode( 'rs_slider_item', 'rs_slider_item' );
