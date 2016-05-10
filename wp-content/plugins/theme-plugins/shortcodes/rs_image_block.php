<?php
/**
 *
 * Image Block
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_image_block( $atts, $content = '' ){

  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'image'  => '',
    'animation' => '',
  ), $atts ) );

  $id       = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class    = ( $class ) ? ' '. sanitize_html_classes($class) : '';
  
  $animation_class = ( $animation ) ? 'os-animation':'';
  $animation_type = ( $animation ) ? 'data-os-animation = "'.esc_attr($animation).'"':'';

  $image_src = '';
  if ( is_numeric( $image ) && !empty($image) ){
    $image_src  = wp_get_attachment_image_src( $image, 'full' );
    $image_src = $image_src[0];
  }

  return '<div class="expertise-img '.$class.' '.$animation_class.'" '.$id.''.$animation_type.'><img src="'.esc_url($image_src).'" class="animated fadeIn" alt="image" /></div>';
}
add_shortcode('rs_image_block', 'rs_image_block');