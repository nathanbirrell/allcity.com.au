<?php
/**
 *
 * Clients
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_clients( $atts, $content = '' ){

  	extract( shortcode_atts( array(
    	'id'    => '',
    	'class' => '',
    	'images'  => '',
  	), $atts ) );

  	$id       = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  	$class    = ( $class ) ? ' '. sanitize_html_class($class) : '';

  	$images = explode(',', $images);
  
  $output  =  '<div '.$id.' class="clients-slider client-logos client-logos-style1 text-center'.$class.'">';
	$output	.=	'<ul class="slides">';

	foreach($images as $image) {
  		$image_src  = wp_get_attachment_image_src( $image, 'full' );
  		$output	.=	'<li><img src="'.$image_src[0].'" alt="" /></li>';
  	}

	$output	.=	'</ul>';
	$output	.=	'</div>';

  	return $output;
}
add_shortcode('rs_clients', 'rs_clients');