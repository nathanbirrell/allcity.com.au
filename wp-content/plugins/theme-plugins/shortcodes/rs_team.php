<?php
/**
 *
 * Team
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_team( $atts, $content = '' ){

  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'big_heading'   => '',
    'btn_link'      => '',
    'btn_text'      => '',
    'small_heading' => '',
    'style'         => '',
    'image'         => '',
    'icon_one'      => '',
    'icon_two'      => '',
    'icon_three'    => '',
    'url_one'       => '',
    'url_two'       => '',
    'url_three'     => '',
  ), $atts ) );

  $id      = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class   = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $image_url = '';
  if ( is_numeric( $image ) && !empty($image ) ) {
    $image_src  = wp_get_attachment_image_src( $image, 'full' );
    $image_url = $image_src[0];
  }

  if ( function_exists( 'vc_parse_multi_attribute' ) ) {
    $parse_args     = vc_parse_multi_attribute( $btn_link );
    $href           = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '#';
    $title          = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
    $target         = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_blank';
  }

  switch ($style) {
    case 'box_with_no_button':
      $output  = '<div class="team-style7'.$class.'" '.$id.'>';
      $output .=  '<div class="team-details text-center">';
      $output .=  '<figure class="team-profile"><img src="'.esc_url($image_url).'" alt="" />';
      $output .=  '<figcaption class="text-center our-team">';
      $output .=  '<div class="content-white text-center">'.do_shortcode($content).'</div>';
      $output .=  '<div class="orange-line"></div>';
      $output .=  '<div class="social">'; 
      $output .=  ($url_one) ? '<a href="'.esc_url($url_one).'" target="_blank"><i class="fa fa-'.sanitize_html_class($icon_one).'"></i></a>':'';
      $output .=  ($url_two) ? '<a href="'.esc_url($url_two).'" target="_blank"><i class="fa fa-'.sanitize_html_class($icon_two).'"></i></a>':'';
      $output .=  ($url_three) ? '<a href="'.esc_url($url_three).'" target="_blank"><i class="fa fa-'.sanitize_html_class($icon_three).'"></i></a></div>':'';
      $output .=  '</figcaption>';
      $output .=  '</figure>';
      $output .=  '<div class="namerol"> <span>'.$big_heading.'</span>';
      $output .=  '<div class="orange-line text-center"></div>';
      $output .=  '<p class="content">'.$small_heading.'</p>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      break;
    
    case 'box_with_button':
      $output  = '<div '.$id.' class="team-style5'.$class.' text-center">';
      $output .=  '<div class="team-details">';
      $output .=  '<figure class="team-profile"><img src="'.esc_url($image_url).'" alt="" />';
      $output .=  '<figcaption class="text-center our-team">';
      $output .=  '<div class="content-white text-center">'.do_shortcode($content).'</div>';
      $output .=  '<div class="blue-line-small"></div>';
      $output .=  '<div class="social">';
      $output .=  ($url_one) ? '<a href="'.esc_url($url_one).'" target="_blank"><i class="fa fa-'.sanitize_html_class($icon_one).'"></i></a>':'';
      $output .=  ($url_two) ? '<a href="'.esc_url($url_two).'" target="_blank"><i class="fa fa-'.sanitize_html_class($icon_two).'"></i></a>':'';
      $output .=  ($url_three) ? '<a href="'.esc_url($url_three).'" target="_blank"><i class="fa fa-'.sanitize_html_class($icon_three).'"></i></a></div>':'';
      $output .=  '</figcaption>';
      $output .=  '</figure>';
      $output .=  '<div class="namerol"> <span>'.esc_html($big_heading).'</span>';
      $output .=  '<div class="blue-line-small text-center"></div>';
      $output .=  '<p class="content">'.esc_html($small_heading).'</p>';
      $output .=  '<a href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'" class="small-button">'.esc_html($btn_text).'</a>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      break;

    case 'box_without_social_icons':
      $output  = '<div '.$id.' class="team-style10'.$class.'">';
      $output .= '<div class="team-details text-center">';
      $output .=  '<figure class="team-profile"><img src="'.esc_url($image_url).'" alt="" />';
      $output .=  '<div class="offers-tour-price">'.esc_html($small_heading).'</div></figure>';
      $output .=  '<div class="namerol"><span>'.esc_html($big_heading).'</span>';
      $output .=  '<div class="blue-line-small text-center"></div>';
      $output .=  '<p class="content">'.do_shortcode(wp_kses_data($content)).'</p>';
      $output .=  '<a href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'" class="small-button">'.esc_html($btn_text).'</a>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      break;

    case 'box_with_button_on_hover':
      $output  = '<div '.$id.' class="team-style2'.$class.'">';
      $output .=  '<div class="team-details os-animation text-center">';
      $output .=  '<figure class="team-profile"><img src="'.esc_url($image_url).'" alt="" />';
      $output .=  '<figcaption class="text-center our-team">';
      $output .=  '<div class="content-white text-center">'.do_shortcode($content).'</div>';
      $output .=  '<a class="small-button-gray margin-top" href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'">'.esc_html($btn_text).'</a>';
      $output .=  '</figcaption>';
      $output .=  '</figure>';
      $output .=  '<div class="namerol"> <span>'.esc_html($big_heading).'</span>';
      $output .=  '<div class="gray-line"></div>';
      $output .=  '<p class="content">'.esc_html($small_heading).'</p>';
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
add_shortcode('rs_team', 'rs_team');