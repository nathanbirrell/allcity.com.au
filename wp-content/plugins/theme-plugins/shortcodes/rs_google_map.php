<?php
/**
 *
 * Google Map
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_google_map( $atts, $content = '' ){

  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'lat'   => '',
    'long'  => ''
  ), $atts ) );

  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. sanitize_html_class($class) : '';

  wp_enqueue_script('jquery-sensor');
  wp_enqueue_script('jquery-map');

  $output  = '<div '.$id.' class="map map-style-1 #map'.$class.'" data-lat="'.esc_attr($lat).'" data-long="'.esc_attr($long).'">';
  $output .=  '<div class="map-overlay">';
  $output .=  '<button class="map-button" value="Show map">Locate Us on Map</button>';
  $output .=  '</div>';
  $output .=  '<div id="googlemap">';
  $output .=  '<div id="map"></div>';
  $output .=  '</div>';
  $output .=  '</div>';

  return $output;

}
add_shortcode('rs_google_map', 'rs_google_map');
