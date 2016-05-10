<?php
/**
 *
 * Feature Box
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_seasonal_dish( $atts, $content = '' ){

    extract( shortcode_atts( array(
      'id'         => '',
      'class'      => '',
      'heading'    => '',
      'link'       => '',
      'link_2'     => '',
      'image'      => '', 
      'btn_text'   => '',
      'btn_text_2' => ''
    ), $atts ) );

    $id      = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
    $class   = ( $class ) ? ' '. sanitize_html_classes($class) : '';

    if ( function_exists( 'vc_parse_multi_attribute' ) ) {
      $parse_args = vc_parse_multi_attribute( $link );
      $href       = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '#';
      $title      = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
      $target     = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
    }

    if ( function_exists( 'vc_parse_multi_attribute' ) ) {
      $parse_args = vc_parse_multi_attribute( $link_2 );
      $href_2     = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '#';
      $title_2    = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
      $target_2   = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
    }

    if ( is_numeric( $image ) ) {
      $image_src  = wp_get_attachment_image_src( $image, 'full' );
      $background = $image_src[0];
    }

    $output  =  '<div '.$id.' class="margin-top dishes-style2'.$class.'">';
    $output .=  '<div class="dishes-main">';
    $output .=  '<div class="dishes-main-img"><img src="'.esc_url($background).'" alt="" /></div>';
    $output .=  '<div class="dishes-main-text">';
    $output .=  '<h4>'.esc_html($heading).'</h4>';
    $output .=  '<p>'.do_shortcode(wp_kses_data($content)).'</p>';
    $output .=  '<a class="small-button-red inner-link" href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'">'.esc_html($btn_text).'</a>';
    $output .=  '<a class="small-button inner-link" href="'.esc_url($href_2).'" title="'.esc_attr($title_2).'" target="'.esc_attr($target_2).'">'.esc_html($btn_text_2).'</a>';
    $output .=  '</div></div></div>';

    return $output;

}

add_shortcode('rs_seasonal_dish', 'rs_seasonal_dish');