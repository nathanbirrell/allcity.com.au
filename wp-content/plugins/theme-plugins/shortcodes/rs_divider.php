<?php
/**
 *
 * Gap
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_divider( $atts, $content = '' ){

	extract( shortcode_atts( array(
    	'id'    => '',
    	'class' => '',
    	'margin_top'	=> '',
    	'margin_bottom'		=> '',
      'divider_color' => ''
  	), $atts ) );

  	$id             = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  	$class          = ( $class ) ? ' '. sanitize_html_classes($class) : '';
    $margin_top     = ( $margin_top ) ? 'margin-top:'.$margin_top.';':'';
    $margin_bottom  = ( $margin_bottom ) ? 'margin-bottom:'.$margin_bottom.';':'';
    $divider_color  = ( $divider_color ) ? 'background-color:'.$divider_color.';':'';
    $style          =  ( $margin_top || $margin_bottom) ? 'style="'.$margin_top.$margin_bottom.$divider_color.'"':'';

  	return '<div class="divider-dark clear-both '.$class.'" '.$id.''.$style.'></div>';
}

add_shortcode('rs_divider', 'rs_divider');