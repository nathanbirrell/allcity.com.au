<?php
/**
 *
 * Bordered Service Box
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function rs_icon_boxes( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'col'           => '',

    // colors
    'icon_color'    => '',
    'heading_color' => '',
    'border_color'  => '',
    'content_color' => '',

  ), $atts ) );

  $id       =  ( $id ) ? 'id="'.esc_attr($id).'"':'';
  $class    = ( $class ) ? ' '. sanitize_html_class($class) : '';

  global $rs_box_col, $el_icon_style, $el_heading_style, $el_content_style, $el_border_style;
  $rs_box_col = $col;

  $el_icon_style    = ( $icon_color ) ? ' style="color:'.$icon_color.';"':'';
  $el_heading_style = ( $heading_color ) ? ' style="color:'.$heading_color.';"':'';
  $el_border_style  = ( $border_color ) ? ' style="border-color:'.$border_color.';"':'';
  $el_content_style = ( $content_color ) ? ' style="color:'.$content_color.';"':'';

  $output  = '<div '.$id.' class="border-bottom clearfix'.$class.'"'.$el_border_style.'>';
  $output .=  do_shortcode($content);
  $output .=  '</div>';

  return $output;

}
add_shortcode( 'rs_icon_boxes', 'rs_icon_boxes' );


function rs_icon_box( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'heading'         => '',
    'icon'            => '',

  ), $atts ) );

  global $rs_box_col, $el_icon_style, $el_heading_style, $el_content_style, $el_border_style;


  switch ($rs_box_col) {
    case '2':
      $grid = 'col-md-6';
      $responsive = 'col-sm-6';
      break;
    case '3':
      $grid = 'col-md-4';
      $responsive = 'col-sm-4';
      break;
    case '4':
      $grid = 'col-md-3';
      $responsive = 'col-sm-3';
      break;
    default:
      # code...
      break;
  }

  $output  =  '<div class="'.sanitize_html_class($grid).' '.sanitize_html_class($responsive).' border-right service-style1 service-box text-center"'.$el_border_style.'>';
  $output .=  '<div class="service-icon"><i class="fa fa-'.sanitize_html_class($icon).'"'.$el_icon_style.'></i></div>';
  $output .=  '<h6'.$el_heading_style.'>'.esc_html($heading).'</h6>';
  $output .=  '<p class="content"'.$el_content_style.'>'.do_shortcode(wp_kses_data($content)).'</p>';
  $output .=  '</div>';

  return $output;

}
add_shortcode( 'rs_icon_box', 'rs_icon_box' );
