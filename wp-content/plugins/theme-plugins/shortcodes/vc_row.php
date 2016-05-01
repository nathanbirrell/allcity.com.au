<?php
/**
 *
 * VC Row
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_row( $atts, $content = '', $key = '' ) {
  $defaults = array(
    'id'              => '',
    'class'           => '',
    'bgcolor'         => '',
    'background'      => '',
    'overlay'         => '',
    'overlay_alfa'    => '',
    'padding'         => '',
    'animation'       => '',
    'fluid'           => '',
    'padding_top'     => '',
    'padding_bottom'  => ''
  );
  extract( shortcode_atts( $defaults, $atts ) );

  $id              = ( $id ) ? ' id="'. esc_attr($id). '"' : '';
  $class           = ( $class ) ? ' '. sanitize_html_classes($class) : '';
  $animation_class = ( $animation ) ? ' os-animation':'';
  $animation_type  = ( $animation ) ? 'data-os-animation = "'.esc_attr($animation).'"':'';
  $is_fluid        = ( $fluid == 'yes' ) ? '-fluid' : '';
  $padding         = ( $padding ) ? $padding:' no-padding';
  $padding_top     = ( $padding_top ) ? 'padding-top:'.$padding_top.';':'';
  $padding_bottom  = ( $padding_bottom ) ? 'padding-bottom:'.$padding_bottom.';':'';
  $overlay_alfa    = ( $overlay == 'yes' ) ? ' '.sanitize_html_class($overlay_alfa):'';


  if ( is_numeric( $background ) ) {
    $image_src  = wp_get_attachment_image_src( $background, 'full' );
    $background = $image_src[0];
  }

  $background_image = ( $background ) ? 'background-image: url(' . $background . ');' :'';
  $bgcolor = ( $bgcolor ) ? 'background-color:'.$bgcolor.';':'';

  $background_style = '';
  if($overlay == 'yes') {
    $upper_padding = ' has-overlay';
    $background_style = ( $background_image || $bgcolor ) ? ' style="'.$background_image.$bgcolor.'"':'';
    $lower_padding_el = ( $padding == 'custom-padding' || $overlay == 'yes') ? ' style="'.$padding_top.$padding_bottom.'"':'';
  } else {
    $upper_padding = ' '.sanitize_html_class($padding);
    $padding = '';
    $lower_padding_el = '';
    $background_style = ( $background_image || $bgcolor || $padding_top || $padding_bottom ) ? ' style="'.$background_image.$bgcolor.$padding_top.$padding_bottom.'"':'';
  }

  $output  =  '<div class="content-section'.$upper_padding.'"'.esc_attr($id).''.$background_style.'>';
  $output .=  ($overlay == 'yes') ? '<div class="color-overlay'.$overlay_alfa.' '.sanitize_html_class($padding).'"'.$lower_padding_el.'>':'';
  $output .=  '<div class="container'.sanitize_html_class($is_fluid).'">';
  $output .=  '<div class="row'.$class.''.$animation_class.'" '.$animation_type.'>';
  $output .=  do_shortcode( wp_kses_post($content ));
  $output .=  '</div>';
  $output .=  '</div>';
  $output .= ($overlay == 'yes') ? '</div>':'';
  $output .=  '</div>';

  return $output;
}
add_shortcode( 'vc_row', 'rs_row' );
add_shortcode( 'vc_row_inner', 'rs_row' );
add_shortcode( 'vc_section', 'rs_row' );
