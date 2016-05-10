<?php
/**
 *
 * Progress Bar
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_progress_bar( $atts, $content = '' ){

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
  ), $atts ) );

  $id                   = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class                = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $title_font_color     = ($title_font_color) ? ' style="color:'.$title_font_color.';"':'';
  $sub_title_font_color = ($sub_title_font_color) ? ' style="color:'.$sub_title_font_color.';"':'';
  $track_color          = ($track_color) ? ' style="background-color:'.$track_color.';"':'';
  $bar_color            = ($bar_color) ? ' background-color:'.$bar_color.';':'';

  $output  = '<div '.$id.' class="col-md-9 col-sm-9'.$class.'">';
  $output .= '<div class="progress-bar-sub">';
  $output .=  '<div class="progress-name light-gray"'.$sub_title_font_color.'><strong'.$title_font_color.'>'.esc_html($title).'</strong> - '.esc_html($subtitle).'</div>';
  $output .=  '<div class="progress"'.$track_color.'>';
  $output .=  '<div class="progress-bar" role="progressbar" aria-valuenow="'.esc_attr($percent).'" aria-valuemin="0" aria-valuemax="100" style="width: '.esc_attr($percent).'%;'.$bar_color.'"></div>';
  $output .=  '</div></div></div>';

  return $output;

}
add_shortcode('rs_progress_bar', 'rs_progress_bar');
