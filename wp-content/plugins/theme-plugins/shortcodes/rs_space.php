<?php
/**
 *
 * Gap
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_space( $atts, $content = '' ){

  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'size'  => '',
  ), $atts ) );

  $id       = ( $id ) ? ' id="'. $id .'"' : '';
  $class    = ( $class ) ? ' '. $class : '';
  $size     = ( $size ) ? ' style="height:'. rs_validpx( $size ) .'"' : '';

  return '<hr'. $id .' class="space'. $class .'"'. $size .'>';
}
add_shortcode('rs_space', 'rs_space');
