<?php
/**
 *
 * Gap
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_buttons( $atts, $content = '' ){

	extract( shortcode_atts( array(
    	'id'                     => '',
    	'class'                  => '',
    	'btn_text'               => '',
    	'link'                   => '',
    	'btn_align'              => '',
      'btn_size'               => '',

      // custom color
      'btn_text_color'         => '',
      'btn_text_hover_color'   => '',
      'btn_border_color'       => '',
      'btn_border_hover_color' => ''
  	), $atts ) );

  $id       = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class    = ( $class ) ? ' '. sanitize_html_class($class) : '';
  $custom_style = '';
  $uniqid_class = '';

  $btn_align = ($btn_align) ? sanitize_html_class($btn_align):'';
  $btn_size  = ($btn_size == 'small') ? 'small-button':'highlight-button-black';
  $customize = ( $btn_text_color || $btn_text_hover_color || $btn_border_color || $btn_border_hover_color ) ? true:false;

	if ( function_exists( 'vc_parse_multi_attribute' ) ) {
  	$parse_args     = vc_parse_multi_attribute( $link );
  	$href           = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '#';
  	$title          = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
  	$target         = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_blank';
 	}

  if( $customize ) {
    $uniqid       = uniqid();
    $custom_style = '';

    if( $btn_text_color || $btn_border_color ) {
      $custom_style .=  '.custom-btn-'.$uniqid.'{';
      $custom_style .=  ( $btn_text_color ) ? 'color:'.$btn_text_color.';':'';
      $custom_style .=  ( $btn_border_color ) ? 'border-color:'.$btn_border_color.';':'';
      $custom_style .= '}';
    }

    if( $btn_border_hover_color || $btn_text_hover_color ) {
      $custom_style .=  '.custom-btn-'.$uniqid.':hover {';
      $custom_style .=  ( $btn_text_hover_color ) ? 'color:'.$btn_text_hover_color.' !important;':'';
      $custom_style .=  ( $btn_border_hover_color ) ? 'border-color:'.$btn_border_hover_color.';':'';
      $custom_style .= '}';
    }

    st_add_inline_style( $custom_style );
    $uniqid_class  = ' custom-btn-'. $uniqid;
  }

  	return '<div class="btn-align '.$btn_align.'"><a id="href-about" class="'.$btn_size.$uniqid_class.' inner-link" title="'.$title.'" target="'.$target.'" href="'.$href.'">'.$btn_text.'</a></div>';
}

add_shortcode('rs_buttons', 'rs_buttons');
