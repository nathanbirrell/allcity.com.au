<?php
/**
 *
 * VC COLUMN and VC COLUMN INNER
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function rs_column( $atts, $content = '', $id = '' ){

  extract( shortcode_atts( array(
    'id'                  => '',
    'class'               => '',
    'in_style'            => '',
    'width'               => '1/1',
    'offset'              => '',
    'animation'           => '',
  ), $atts ) );

  $id     =  ( $id ) ? 'id="'.esc_attr($id).'"':'';
  $class  = ( $class ) ? ' '. $class: '';
  $offset = ( $offset ) ? ' '. str_replace( 'vc_', '', $offset ) : '';

  // element animation
  $animation_class = ( $animation ) ? ' os-animation':'';
  $animation_type = ( $animation ) ? 'data-os-animation = "'.$animation.'"':'';

  return '<div'. $id .' class="col-md-'. rs_get_bootstrap_col( $width ) . sanitize_html_classes($animation_class . $class . $offset) . '" '.$animation_type.'>'. do_shortcode( wp_kses_post($content )) .'</div>';
}
add_shortcode( 'vc_column', 'rs_column' );
add_shortcode( 'vc_column_inner', 'rs_column' );
