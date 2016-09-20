<?php
/**
 *
 * Gallery
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_gallery( $atts, $content = '' ){

  	extract( shortcode_atts( array(
    	'id'     => '',
    	'class'  => '',
    	'images' => '',
  	), $atts ) );

  	$id       = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  	$class    = ( $class ) ? ' '. sanitize_html_class($class) : '';

  	$images = explode(',', $images);

    $output  =  '<div '.$id.' class="photoshots-gallery clearfix'.$class.'">';
  	$output .=  '<div class="gallery">';
	  $output	.=	'<ul class="thumbnails">';

    if(!empty($images)) {
  	  foreach($images as $image) {
    		$image_src       = wp_get_attachment_image_src( $image, 'gallery' );
        $image_src_full  = wp_get_attachment_image_src( $image, 'full' );
    		$output	.=	'<li class="span3"><a href="'.esc_url($image_src_full[0]).'" data-rel="lightbox[group]"><img alt="gallery-image" src="'.esc_url($image_src[0]).'" /></a></li>';
    	}
    }

	$output	.=	'</ul>';
	$output	.=	'</div></div>';

  return $output;
}
add_shortcode('rs_gallery', 'rs_gallery');
