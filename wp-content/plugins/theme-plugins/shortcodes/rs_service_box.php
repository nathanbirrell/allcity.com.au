<?php
/**
 *
 * Service Box
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_service_box( $atts, $content = '' ){

    extract( shortcode_atts( array(
      'id'                  => '',
      'class'               => '',
      'big_heading'         => '',
      'small_heading'       => '',
      'image'               => '',
      'icon'                => '',
      'link'                => '',
      'style'               => 'box_align_left_with_icon',
      'image'               => '',
      'btn_text'            => '',

      // color attrubutes
      'big_heading_color'   => '',
      'small_heading_color' => '',
      'content_color'       => '',
    ), $atts ) );

    $id      = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
    $class   = ( $class ) ? ' '. sanitize_html_classes($class) : '';

    if ( function_exists( 'vc_parse_multi_attribute' ) ) {
      $parse_args     = vc_parse_multi_attribute( $link );
      $href           = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '#';
      $title          = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
      $target         = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
    }

    $backgroud_url = '';
    if(is_numeric($image) && !empty($image)) {
        $image_src  = wp_get_attachment_image_src( $image, 'full' );
        $backgroud_url = $image_src[0];
    }

    $content_color       = ( !empty($content_color) ) ? ' style="color:'.$content_color.';"':'';
    $big_heading_color   = ( !empty($big_heading_color) ) ? ' style="color:'.$big_heading_color.';"':'';
    $small_heading_color = ( !empty($small_heading_color) ) ? ' style="color:'.$small_heading_color.';"':'';

    $output  = '';

    switch ($style) {
      case 'box_with_border_bottom':
        $output .= '<div '.$id.' class="work-count'.$class.'">';
        $output .=  '<div class="work-count-box work-count-style1"> <span class="title-top"'.$big_heading_color.'>'.esc_html($big_heading).'</span> <span class="title"'.$small_heading_color.'>'.esc_html($small_heading).'</span>';
        $output .=  '<div class="black-line-top"></div>';
        $output .=  '<div class="black-line-bottom"></div>';
        $output .=  '<p class="content-white"'.$content_color.'>'.do_shortcode(wp_kses_data($content)).'</p>';
        $output .= '<a href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'" class="small-button inner-link">'.esc_html($btn_text).'</a> </div>';
        $output .=  '</div>';
        break;

      case 'box_align_center_with_icon':
        $output  = '<div class="work-count">';
        $output .= '<div class="work-count-box work-count-style2"> <span class="title-top"><i class="fa fa-'.sanitize_html_class($icon).' i-font-blue"></i></span> <span class="title"'.$big_heading_color.'>'.esc_html($big_heading).'</span>';
        $output .=  '<div class="black-line-top"></div>';
        $output .=  '<div class="black-line-bottom"></div>';
        $output .=  '<p class="content-white">'.do_shortcode(wp_kses_data($content)).'</p>';
        $output .=  '<a href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'" class="small-button inner-link">'.esc_html($btn_text).'</a> </div>';
        $output .=  '</div>';
        break;

      case 'box_with_image_and_shadow':
        $output  = '<div '.$id.' class="dishes-style1 margin-top text-center'.$class.'"><div class="dishes-main">';
        $output .=  '<div class="dishes-main-img"><img src="'.esc_url($backgroud_url).'" alt=""/></div>';
        $output .=  '<div class="dishes-main-text">';
        $output .=  '<h4'.$big_heading_color.'>'.esc_html($big_heading).'</h4>';
        $output .=  '<div class="black-line-top margin-auto-center margin-top-med"></div>';
        $output .=  '<div class="black-line-bottom margin-auto-center"></div>';
        $output .=  '<p'.$content_color.'>'.do_shortcode(wp_kses_data($content)).'</p>';
        $output .=  '</div>';
        $output .=  '</div></div>';
        break;

      case 'box_align_left_with_icon':
        $output  = '<div '.$id.' class="feature'.$class.'">';
        $output .=  '<div class="icon-container"> <i class="fa fa-'.sanitize_html_class($icon).'"></i> </div>';
        $output .=  '<div class="fetaure-details">';
        $output .=  '<h4 class="title"'.$big_heading_color.'>'.esc_html($big_heading).' <span'.$small_heading_color.'>'.esc_html($small_heading).'</span></h4>';
        $output .=  '<p class="content"'.$content_color.'>'.do_shortcode(wp_kses_data($content)).'</p>';
        $output .=  '</div>';
        $output .=  '</div>';
        break;

      default:
          $output  = '<div '.$id.' class="feature'.$class.'">';
          $output .=  '<div class="fetaure-details">';
          $output .=  '<h4 class="title"'.$big_heading_color.'>'.esc_html($big_heading).' <span'.$small_heading_color.'>'.esc_html($small_heading).'</span></h4>';
          $output .=  '<p class="content"'.$content_color.'>'.do_shortcode(wp_kses_data($content)).'</p>';
          $output .=  '</div>';
          $output .=  '</div>';

        break;
    }

    return $output;

}

add_shortcode('rs_service_box', 'rs_service_box');
