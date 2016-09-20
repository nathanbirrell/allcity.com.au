<?php
/**
 *
 * Google Map
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_google_map( $atts, $content = '' ) {

  extract( shortcode_atts( array(
    'id'     => '',
    'class'  => '',
    'lat'    => '41.391152',
    'long'   => '2.1612133',
    'title'  => '',
    'marker' => ''
  ), $atts ) );
 
  $marker = ( is_numeric( $marker ) && ! empty( $marker ) ) ? wp_get_attachment_url( $marker ) : get_template_directory_uri() . '/assets/images/map-marker.png';
  
  $id     = ( $id ) ? ' id="' . esc_attr($id) . '"' : '';
  $class  = ( $class ) ? ' ' . sanitize_html_class($class) : '';

  wp_enqueue_script('jquery-sensor');
  wp_enqueue_script('jquery-map');

  $output  = '<div '.$id.' class="map map-style-1 google_maps #map'.$class.'" data-marker="' . $marker . '" data-lat="' . esc_attr( $lat ) . '" data-long="' . esc_attr( $long ) . '" data-zoom="1" >';
  $output .=  '<div class="map-overlay">';
  $output .=  '<button class="map-button" value="Show map">' . $title . '</button>';
  $output .=  '</div>';
  $output .=  '<div id="googlemap">';
  $output .=  '<div id="map"></div>';
  $output .=  '</div>';
  $output .=  '</div>';

  return $output;

}
add_shortcode('rs_google_map', 'rs_google_map');
