<?php
/**
 *
 * Book Table
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_table_book( $atts, $content = '' ){

	extract( shortcode_atts( array(
    	'id'       => '',
    	'class'    => '',
    	'btn_text' => '',
    	'link'     => '',
  	), $atts ) );

    $id      = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
    $class   = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  	if ( function_exists( 'vc_parse_multi_attribute' ) ) {
    	$parse_args = vc_parse_multi_attribute( $link );
    	$href       = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '#';
    	$title      = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
    	$target     = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_blank';
   	}

    $output  =  '<div class="col-md-8 col-sm-8 book-a-table text-center">';
    $output .=  do_shortcode(wp_kses_data($content)).'<br>';
    $output .=  '<a href="'.esc_url($href).'" target="'.esc_url($target).'" class="highlight-button inner-link" id="hrefabout">'.esc_html($btn_text).'</a>';
    $output .=  '</div>';

  	return $output;
}

add_shortcode('rs_table_book', 'rs_table_book');