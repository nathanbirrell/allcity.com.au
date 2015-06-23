<?php
/**
 *
 * Conter
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_conter( $atts, $content = '' ){

  extract( shortcode_atts( array(
    'id'        => '',
    'class'     => '',
    'conter_no' => '',
    'title'     => '',
    'border_color'  => '',
  ), $atts ) );

  $id       = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class    = ( $class ) ? ' '. sanitize_html_class($class) : '';
  $border_color = ( $border_color ) ? ' style="background-color:'.$border_color.';"':'';

  $output  =  '<div class="st-conter-box counter-style3 text-center '.$class.'" '.$id.'>';
  $output .=  '<div class="counterBox counterWithAnimation" data-delay="400" data-animation="fade-in-left" data-countNmber="'.esc_attr($conter_no).'"> <span class="counterBoxNumber">'.esc_html($conter_no).'</span>';
  $output .=  '<div class="orange-line"'.$border_color.'></div>';
  $output .=  '<h6 class="counterBoxDetails">'.esc_html($title).'</h6>';
  $output .=  '</div>';
  $output .=  '</div>';

  return $output;
  
}
add_shortcode('rs_conter', 'rs_conter');