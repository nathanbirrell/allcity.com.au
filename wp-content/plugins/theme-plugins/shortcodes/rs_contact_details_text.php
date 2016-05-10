<?php
/**
 *
 * Contact Details List
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function rs_contact_details_text( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'heading'       => '',
    'heading_color' => '',
    'text_color'    => '',

  ), $atts ) );

  $id            = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class         = ( $class ) ? ' '. sanitize_html_class($class) : '';
  $heading_color = ( $heading_color ) ? ' style="color:'.$heading_color.';"':'';
  $text_color    = ( $text_color ) ? ' style="color:'.$text_color.';"':'';

  $output  = '<div '.$id.' class="contact-style1'.$class.'">';
  $output .=  '<div class="head"> <span class="contact-title"'.$heading_color.'>'.esc_html($heading).'</span>';
  $output .=  '<p class="content contact-text"'.$text_color.'>'.do_shortcode(wp_kses_post($content)).'</p>';
  $output .=  '</div>';
  $output .=  '</div>';

  return $output;

}
add_shortcode( 'rs_contact_details_text', 'rs_contact_details_text' );
