<?php
/**
 *
 * Contact Details List
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function rs_contact_details_list( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'           => '',
    'class'        => '',
    'phone_no'     => '',
    'website'      => '',

    'icon_color'   => '',
    'text_color'   => '',
    'border_color' => '',
  ), $atts ) );

  $id       = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class    = ( $class ) ? ' '. sanitize_html_class($class) : '';
  $icon_color = ( $icon_color ) ? ' style="color:'.$icon_color.';"':'';
  $text_color = ( $text_color ) ? ' style="color:'.$text_color.';"':'';
  $border_color = ( $border_color ) ? ' style="background-color:'.$border_color.';"':'';

  $output  = '<div '.$id.' class="contact-style1'.$class.'">';
  $output .=  '<ul class="icon-list">';
  $output .=  '<li'.$text_color.'><i class="fa fa-phone"'.$icon_color.'></i>'.esc_html($phone_no).'</li>';
  $output .=  '<li class="divider"'.$border_color.'></li>';
  $output .=  '<li'.$text_color.'><i class="fa fa-envelope-o"'.$icon_color.'></i>'.do_shortcode(wp_kses_data($content)).'</li>';
  $output .=  '<li class="divider"'.$border_color.'></li>';
  $output .=  '<li><i class="fa fa-globe"'.$icon_color.'></i><a href="#"'.$text_color.'>'.esc_html($website).'</a></li>';
  $output .=  '</ul>';
  $output .=  '</div>';

  return $output;

}
add_shortcode( 'rs_contact_details_list', 'rs_contact_details_list' );
