<?php
/**
 *
 * Section Title
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function rs_section_title( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'                    => '',
    'class'                 => '',
    'heading'               => '',
    'description'           => '',
    'style'                 => 'big_heading_with_border',

    'heading_color'         => '',
    'border_color'          => '',
    'content_color'         => '',
    'description_color'     => '',

    'heading_font_size'     => '',
  ), $atts ) );

  $id      = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class   = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $description_color = ( $description_color ) ? ' style="color:'.$description_color.' !important;"':'';
  $content_color     = ( $content_color ) ? ' style="color:'.$content_color.' !important;"':'';
  $el_border_color   = ( $border_color ) ? ' style="border-color:'.$border_color.';"':'';
  $el_heading_style  = ( $heading_color ) ? ' style="color:'.$heading_color.' !important;"':'';

  $output = '';
  switch ($style) {
    case 'big_heading_with_border':
      $output .= '<div '.$id.' class="border-bottom text-center title-style1'.$class.'"'.$el_border_color.'>';
      $output .= '<div class="col-md-6 col-sm-6 title-text border-right"'.$el_border_color.'>';
      $output .= '<h2 class="title"'.$el_heading_style.'>'.$heading.'</h2>';
      $output .= '</div>';
      $output .= '<div class="col-md-6 col-sm-6 simple-text">';
      $output .= '<p class="description text-left"'.$content_color.'>'.do_shortcode($content).'</p>';
      $output .= '</div>';
      $output .= '</div>';
      break;

    case 'heading_border_bottom':
      $border_color_bottom      = ( $border_color ) ? ' style="background-color:'.$border_color.';"':'';
      $output .=  '<div '.$id.' class="title-style2 title-text'.$class.'">';
      $output .=  '<h2 class="title text-center"'.$el_heading_style.'>'.$heading.'</h2>';
      $output .=  '<div class="green-line"'.$border_color_bottom.'></div>';
      $output .=  '</div>';
      $output .=  '<div class="text-center title-style2 clear-both">';
      $output .=  (!empty($content)) ? '<div class="col-xs-10 title-style2 col-md-6 col-sm-8 text-center description margin-top margin-bottom margin-auto-center gray-text"'.$content_color.'>'.do_shortcode($content).'</div>':'';
      $output .=  '</div>';
      break;

    case 'heading_border_bottom_bold_text':
      $border_color_bottom      = ( $border_color ) ? ' style="background-color:'.$border_color.';"':'';
      $output .=  '<div '.$id.' class="title-style3 title-text'.$class.'">';
      $output .=  '<h2 class="title text-center"'.$el_heading_style.'>'.$heading.'</h2>';
      $output .=  '<div class="red-line"'.$border_color_bottom.'></div>';
      $output .=  '</div>';
      $output .=  '<div class="text-center title-style3 clear-both">';
      $output .=  '<div class="col-md-7 title-style3 col-sm-7 text-center white-text description margin-top margin-bottom margin-auto-center gray-text"'.$content_color.'><h6>'.do_shortcode($content).'</h6></div>';
      $output .=  '</div>';
      break;

    case 'square_bordered_heading':
      $sq_border_color   = ( $border_color ) ? 'border-color:'.$border_color.';':'';
      $sq_heading_style  = ( $heading_color ) ? 'color:'.$heading_color.';':'';
      $bordered_heading = ( $border_color || $heading_color ) ? ' style="'.$sq_heading_style.$sq_border_color.'"':'';

      $output .=  '<div '.$id.' class="title-style5'.$class.'">';
      $output .=  '<div class="display-inline title-text">';
      $output .=  '<h2 class="title text-center"'.$bordered_heading.'>'.$heading.'</h2>';
      $output .=  '</div>';
      $output .=  '<div class="title-style5 text-center clear-both">';
      $output .=  '<div class="col-md-7 title-style5 col-sm-7 text-center description margin-bottom margin-auto-center gray-text"><h6'.$content_color.'>'.do_shortcode($content).'</h6></div>';
      $output .=  (!empty($description)) ? '<div class="col-md-7 col-sm-7 text-center white-text description margin-top margin-bottom margin-auto-center"'.$description_color.'>'.esc_html($description).'</div>':'';
      $output .=  '</div>';
      $output .=  '</div>';
      break;

    case 'heading_with_no_description':
      $output .= '<div '.$id.' class="title-text title-style3 height-auto'.$class.'">';
      $output .= '<h2 class="title text-center white-text no-margin-top"'.$el_heading_style.'>'.esc_html($heading).'</h2>';
      $output .=  '</div>';
      break;

    case 'small_heading_with_description':
    default:
      $output .=  '<div class="col-md-7 col-sm-7 text-center white-text description margin-bottom margin-auto-center gray-text"><h6'.$el_heading_style.'>'.esc_html($heading).'</h6></div>';
      $output .=  '<div class="col-md-7 col-sm-7 text-center white-text description margin-top margin-bottom-100 margin-auto-center gray-text"'.$content_color.'>'.do_shortcode($content).'</div>';
      break;
  }

  return $output;

}
add_shortcode( 'rs_section_title', 'rs_section_title' );
