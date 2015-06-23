<?php
/**
 *
 * Chart
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_chart( $atts, $content = '' ){

  extract( shortcode_atts( array(
    'id'                   => '',
    'class'                => '',
    'percent'              => '',
    'title'                => '',
    'subtitle'             => '',

    // color
    'track_color'          => '',
    'bar_color'            => '',
    'title_font_color'     => '',
    'sub_title_font_color' => '',
    'percent_color'        => '',
    'percent_font_size'    => '',
    'font_weight'          => '',
  ), $atts ) );

  $id                   = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class                = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $title_font_color     = ($title_font_color) ? ' style="color:'.$title_font_color.';"':'';
  $sub_title_font_color = ($sub_title_font_color) ? ' style="color:'.$sub_title_font_color.';"':'';
  $percent_color        = ($percent_color) ? 'color:'.$percent_color.';':'';
  $percent_font_size    = ($percent_font_size) ? 'font-size:'.$percent_font_size.';':'';
  $font_weight          = ($font_weight) ? 'font-weight:'.$font_weight.';':'';
  $percent_style        = ( $percent_font_size || $percent_color || $font_weight ) ? ' style="'.$percent_color.$percent_font_size.$font_weight.'"':'';

  $output  = '<div '.$id.' class="canvas-style4'.$class.'">';
  $output .=  '<div class="text-center count-box">';
  $output .=  '<div class="chart5 easyPieChart" data-line-width="8" data-track="'.esc_attr($track_color).'" data-bar="'.esc_attr($bar_color).'" data-percent="'.esc_attr($percent).'" data-size="200"><span'.$percent_style.'>'.esc_html($percent).'%</span></div>';
  $output .=  '<h3 class="title margin-top"'.$title_font_color.'>'.esc_html($title).'</h3>';
  $output .=  (!empty($subtitle)) ? '<p'.$sub_title_font_color.'>'.esc_html($subtitle).'</p>':'';
  $output .=  '</div>';
  $output .=  '</div>';

  return $output;

}
add_shortcode('rs_chart', 'rs_chart');
