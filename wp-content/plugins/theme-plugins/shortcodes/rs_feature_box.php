<?php
/**
 *
 * Feature Box
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_feature_box( $atts, $content = '' ){

    extract( shortcode_atts( array(
      'id'       => '',
      'class'    => '',
      'heading'  => '',
      'sub_heading' => '',
      'link'     => '',
      'style'    => '',
      'image'    => '', 
      'btn_text' => ''
    ), $atts ) );

    $id      = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
    $class   = ( $class ) ? ' '. sanitize_html_classes($class) : '';

    if ( function_exists( 'vc_parse_multi_attribute' ) ) {
      $parse_args     = vc_parse_multi_attribute( $link );
      $href           = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '#';
      $title          = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
      $target         = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
    }

    $background = '';
    if ( is_numeric( $image ) && !empty($image) ) {
      $image_src  = wp_get_attachment_image_src( $image, 'full' );
      $background = $image_src[0];
    }

    switch ($style) {
      case 'hover_with_image_button':
        $output  = '<div '.$id.' class="dishes-main margin-top-50 text-center'.$class.'">';
        $output .=  '<div class="dishes-main-img"><img src="'.esc_url($background).'" alt=""/></div>';
        $output .=  '<div class="dishes-main-text">';
        $output .=  '<h4 class="gray-text">'.esc_html($heading).'</h4>';
        $output .=  '<p class="content">'.do_shortcode(wp_kses_data($content)).'</p>';
        $output .=  '<a href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'" class="small-button small-button-dark-gray margin-top">'.esc_html($btn_text).'</a>';
        $output .=  '</div>';
        $output .=  '</div>';
        break;

      case 'hover_text_with_image':
        $output  =  '<div '.$id.' class="margin-top team-style7'.$class.'">';
        $output .= '<div class="team-details text-center">';
        $output .=  '<figure class="team-profile">';
        $output .=  '<img src="'.esc_url($background).'" alt="" />';
        $output .=  '<figcaption class="text-center our-team">';
        $output .=  '<p class="content-white text-center">'.do_shortcode(wp_kses_data($content)).'</p>';
        $output .=  '</figcaption>';
        $output .=  '</figure>';
        $output .=  '<div class="namerol"> <span>'.esc_html($heading).'</span>';
        $output .=  '<div class="red-line-small text-center"></div>';
        $output .=  '<p class="content">'.do_shortcode(wp_kses_data($sub_heading)).'</p>';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '</div>';
        break;

      case 'image_with_title':
        $output  = '<div '.$id.' class="work-count-style3'.$class.'">';
        $output .= '<div class="work-count-box">';
        $output .=  '<div class="gray-bg float-left">';
        $output .=  '<img src="'.esc_url($background).'" alt=""/><span class="title">'.esc_html($heading).'</span>';
        $output .=  '<p class="gray-text margin-bottom-50">'.do_shortcode(wp_kses_data($content)).'</p>';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '</div>';
        break;

      case 'hover_with_image_no_button':
        $output  = '<div '.$id.' class="margin-top-50 dishes-main'.$class.' text-center">';
        $output .=  '<div class="dishes-main-img"><img src="'.esc_url($background).'"  alt=""/></div>';
        $output .=  '<div class="dishes-main-text">';
        $output .=  '<h4 class="gray-text">'.esc_html($heading).'</h4>';
        $output .=  '<p class="content margin-bottom">'.do_shortcode(wp_kses_data($content)).'</p>';
        $output .=  '</div>';
        $output .=  '</div>';
        break;

      case 'box_with_heading_transparent_background':
        $output  = '<div '.$id.' class="team-style2 margin-top-50'.$class.'">';
        $output .=  '<div class="team-details text-center">';
        $output .=  '<figure class="team-profile"><img alt="" src="'.esc_url($background).'"/><div class="offers-tour-price">'.esc_html($heading).'</div></figure>';
        $output .=  '<div class="namerol">';
        $output .=  '<p class="content">'.do_shortcode(wp_kses_data($content)).'</p>';
        $output .=  '<a class="small-button" href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'">'.esc_html($btn_text).'</a>';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '</div>';
        break;

      case 'box_with_heading_and_sub_heading_transparent_background':
        $output  = '<div '.$id.' class="team-style9 margin-top-50'.$class.'">';
        $output .= '<div class="team-details text-center">';
        $output .=  '<figure class="team-profile"><img src="'.esc_url($background).'" alt="" /><div class="offers-tour-price">'.esc_html($heading).'</div><div class="start-price">'.esc_html($sub_heading).'</div></figure>';
        $output .=  '<div class="namerol">';
        $output .=  '<p class="content">'.do_shortcode(wp_kses_data($content)).'</p>';
        $output .=  '<a href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'" class="small-button-red">'.esc_html($btn_text).'</a>';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '</div>';
        break;
      
      default:
        # code...
        break;
    }


  return $output;

}

add_shortcode('rs_feature_box', 'rs_feature_box');