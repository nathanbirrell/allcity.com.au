<?php
/**
 *
 * Chart
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_banner( $atts, $content = '' ){

  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'style'         => '',
    'background'    => '',
    'big_heading'   => '',
    'small_heading' => '',
    'btn_text'      => '',
    'btn_link'      => '',
    'local_scroll'  => ''
  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  if ( function_exists( 'vc_parse_multi_attribute' ) ) {
    $parse_args     = vc_parse_multi_attribute( $btn_link );
    $href           = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '';
    $title          = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
    $target         = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
  }

  if ( function_exists( 'vc_parse_multi_attribute' ) ) {
    $parse_args     = vc_parse_multi_attribute( $local_scroll );
    $l_href           = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '';
    $l_title          = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
    $l_target         = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
  }

  $background_style = '';
  if ( is_numeric( $background ) && !empty($background)) {
    $image_src  = wp_get_attachment_image_src( $background, 'full' );
    $background = $image_src[0];
    $background_style = ' style="background-image:url('.$background.');"';
  }

  switch ($style) {
    case 'banner_with_button':
      $output  =  '<div '.$id.' class="header-style1 header animated'.$class.'" data-stellar-background-ratio="0.5"'.$background_style.'>';
      $output .= '<div  class="color-overlay full-screen header-text-style1">';
      $output .=  '<div class="container">';
      $output .=  '<div class="row">';
      $output .=  '<div class="col-md-8 col-md-offset-2 text-center">';
      $output .=  '<div class="intro-section os-animation" data-os-animation="fadeIn">';
      $output .=  '<h1 class="intro"><span class="highlight">'.esc_html($big_heading).'</span><br>';
      $output .=  esc_html($small_heading).'</h1>';
      if(!empty($href) && !empty($btn_text)) {
        $output .=  '<a class="highlight-button inner-link" title="'.esc_attr($title).'" target="'.esc_attr($target).'" href="'.esc_url($href).'">'.esc_html($btn_text).'</a> </div>';
      }
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      if(!empty($l_href)) {
        $output .=  '<div class="scrollDownWrap">';
        $output .=  '<div class="scrollDown"> <a title="'.esc_attr($l_title).'" target="'.esc_attr($l_target).'" href="'.esc_url($l_href).'" class="inner-link"><i class="fa fa-angle-down"></i> </a> </div>';
        $output .=  '</div>';
      }
      $output .=  '</div>';
      $output .=  '</div>';
      break;

    case 'banner_with_content':
      $output  = '<div '.$id.' class="header-style4 header animated'.$class.'" data-stellar-background-ratio="0.5"'.$background_style.'>';
      $output .=  '<div class="color-overlay full-screen header-text-style4">';
      $output .=  '<div class="intro-section os-animation" data-os-animation="fadeIn">';
      $output .=  '<h1 class="intro"><span class="highlight">'.esc_html($small_heading).'<strong>'.esc_html($big_heading).'</strong></span></h1>';
      $output .=  '<h6 class="treatments">' . $content . '</h6>';
      if(!empty($href) && !empty($btn_text)) {
        $output .=  '<a class="highlight-button inner-link" title="'.esc_attr($title).'" target="'.esc_attr($target).'" href="'.esc_url($href).'">'.esc_html($btn_text).'</a>';
      }
      $output .=  '</div>';
      if(!empty($l_href)) {
        $output .=  '<div class="scrollDownWrap os-animation" data-os-animation="fadeIn">';
        $output .=  '<div class="scrollDown"> <a title="'.esc_attr($l_title).'" target="'.esc_attr($l_target).'" href="'.esc_url($l_href).'" class="inner-link"><i class="fa fa-angle-down i-font-yellow"></i></a> </div>';
        $output .=  '</div>';
      } 
      $output .=  '</div></div>';
    break;

    case 'banner_with_half_transparent':
      $output  = '<div '.$id.' class="header-style3 header animated'.$class.'" data-stellar-background-ratio="0.5"'.$background_style.'>';
      $output .=  '<div class="intro-bg"></div>';
      $output .=  '<div class="color-overlay full-screen header-text-style3"> ';
      $output .=  '<div class="container">';
      $output .=  '<div class="row">';
      $output .=  '<div class="col-md-12 text-center">';
      $output .=  '<div class="intro-section os-animation" data-os-animation="fadeIn">';
      $output .=  '<h1 class="intro"><span class="highlight">'.esc_html($big_heading).'</span><br>'.esc_html($small_heading).'</h1>';
      if(!empty($href) && !empty($btn_text)) {
        $output .=  '<a class="highlight-button inner-link" title="'.esc_attr($title).'" target="'.esc_attr($target).'" href="'.esc_url($href).'">'.esc_html($btn_text).'</a> </div>';
      }
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      if(!empty($l_href)) {
        $output .=  '<div class="scrollDownWrap">';
        $output .=  '<div class="scrollDown"> <a title="'.esc_attr($l_title).'" target="'.esc_attr($l_target).'" href="'.esc_url($l_href).'" class="inner-link"><i class="fa fa-angle-down i-font-gold"></i> </a> </div>';
        $output .=  '</div>';
      }
      $output .=  '</div>';
      $output .=  '</div>';
      break;

    case 'banner_with_no_button':
    default:
      $output  = '<div '.$id.' class="header-style2 header animated'.$class.'" data-stellar-background-ratio="0.5"'.$background_style.'>';
      $output .=  '<div class="color-overlay full-screen header-text-style2">';
      $output .=  '<div class="container">';
      $output .=  '<div class="row">';
      $output .=  '<div class="col-md-8 col-md-offset-2 text-center">';
      $output .=  '<div class="intro-section os-animation" data-os-animation="fadeIn">';
      $output .=  '<h1 class="intro"><span class="highlight">'.wp_kses_post($big_heading).'</span></h1>';
      $output .=  '<h6 class="treatments">'.esc_html($small_heading).'</h6>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      if(!empty($l_href)) {
        $output .=  '<div class="scrollDownWrap os-animation" data-os-animation="fadeIn">';
        $output .=  '<div class="scrollDown"> <a title="'.esc_attr($l_title).'" target="'.esc_attr($l_target).'" href="'.esc_url($l_href).'" class="inner-link"><i class="fa fa-angle-down i-font-violet"></i></a> </div>';
        $output .=  '</div>';
      }
      $output .=  '</div> </div></div>';
    break;
  }

  return $output;

}
add_shortcode('rs_banner', 'rs_banner');
