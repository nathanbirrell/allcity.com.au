<?php
/**
 *
 * VC Column Text
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function vc_column_text( $atts, $content = '', $id = '' ){

  extract( shortcode_atts( array(
    'id'             => '',
    'class'          => '',

    'font_size'      => '',
    'text_align'     => '',
    'font_weight'    => '',
    'letter_spacing' => '',
    'font_color'     => '',
    'text_transform' => '',
    'margin_top'     => '',
    'margin_bottom'  => '',
    'line_height'    => '',

  ), $atts ) );

  $id      = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class   = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $customize    = ( $font_size || $text_align || $font_weight || $letter_spacing || $font_color || $text_transform || $margin_top || $margin_bottom || $line_height ) ? true:false;
  $custom_style = '';
  $uniqid_class = '';

  if( $customize ) {
    $uniqid       = uniqid();
    $custom_style = '';

    $custom_style .=  '.column-text-'.$uniqid.' p {';
    $custom_style .=  ( $font_size ) ? 'font-size:'.$font_size.';':'';
    $custom_style .=  ( $text_align ) ? 'text-align:'.$text_align.';':'';
    $custom_style .=  ( $letter_spacing ) ? 'letter-spacing:'.$letter_spacing.';':'';
    $custom_style .=  ( $font_weight ) ? 'font-weight:'.$font_weight.';':'';
    $custom_style .=  ( $font_color ) ? 'color:'.$font_color.';':'';
    $custom_style .=  ( $text_transform ) ? 'text-transform:'.$text_transform.';':'';
    $custom_style .=  ( $margin_top ) ? 'margin-top:'.$margin_top.';':'';
    $custom_style .=  ( $margin_bottom ) ? 'margin-bottom:'.$margin_bottom.';':'';
    $custom_style .=  ( $line_height ) ? 'line-height:'.$line_height.';':'';
    $custom_style .= '}';

    st_add_inline_style( $custom_style );

    $uniqid_class  = ' column-text-'. $uniqid;
  }

  return '<div'. $id .' class="vc-column-text clearfix '.sanitize_html_class($uniqid_class).$class.'">'. rs_set_wpautop( $content ) .'</div>';
}
add_shortcode( 'vc_column_text', 'vc_column_text' );
