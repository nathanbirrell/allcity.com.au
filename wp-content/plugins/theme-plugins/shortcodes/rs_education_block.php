<?php
/**
 *
 * Education Block
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_education_block( $atts, $content = '' ){

  extract( shortcode_atts( array(
    'id'               => '',
    'class'            => '',
    'title'            => '',
    'icon'             => '',
    'year'             => '',
    'university'       => '',
    'grade'            => '',

    // color
    'icon_color'       => '',
    'title_color'      => '',
    'year_color'       => '',
    'university_color' => '',
    'grade_color'      => '',
    'content_color'    => '',
  ), $atts ) );

  $id      = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class   = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $icon_color       = ($icon_color) ? ' style="color:'.$icon_color.';"':'';
  $title_color      = ($title_color) ? ' style="color:'.$title_color.';"':'';
  $year_color       = ($year_color) ? ' style="color:'.$year_color.' !important;"':'';
  $university_color = ($university_color) ? ' style="color:'.$university_color.';"':'';
  $grade_color      = ($grade_color) ? ' style="color:'.$grade_color.';"':'';
  $content_color    = ($content_color) ? ' style="color:'.$content_color.';"':'';


  $output  =  '<div '.$id.' class="team-style8'.$class.'">';
  $output .=  '<div class="team-details text-center">';
  $output .=  '<figure class="team-profile dark-gray-bg">';
  $output .=  '<i class="fa fa-'.sanitize_html_class($icon).' i-font-yellow"'.$icon_color.'></i>';
  $output .=  '<span class="year white-text"'.$year_color.'>'.esc_html($year).'</span>';
  $output .=  '<span class="university"'.$university_color.'>'.esc_html($university).'</span>';
  $output .=  '</figure>';
  $output .=  '<div class="namerol"><span'.$title_color.'>'.esc_html($title).'</span>';
  $output .=  '<p class="content"'.$content_color.'>'.do_shortcode(wp_kses_data($content)).'</p>';
  $output .=  '<span class="result"'.$grade_color.'>'.esc_html($grade).'</span>';
  $output .=  '</div>';
  $output .=  '</div>';
  $output .=  '</div>';

  return $output;

}
add_shortcode('rs_education_block', 'rs_education_block');
