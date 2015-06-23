<?php
/**
 *
 * Gap
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_about_me_list( $atts, $content = '' ){

  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'name'          => '',
    'date_of_birth' => '',
    'phone'         => '',
    'address'       => '',
    'nationality'   => '',
    'btn_text'      => '',
    'btn_link'      => '',
  ), $atts ) );

  $id       = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class    = ( $class ) ? ' '. sanitize_html_class($class) : '';

  if ( function_exists( 'vc_parse_multi_attribute' ) ) {
    $parse_args     = vc_parse_multi_attribute( $btn_link );
    $href           = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '#';
    $title          = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
    $target         = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_blank';
  }

  $output  = '<div '.$id.' class="col-md-9 col-sm-9'.$class.'">';
  $output .= '<div class="about-con margin-top">';
  $output .=  '<ul class="light-gray">';
  $output .=  '<li>Name: '.esc_html($name).'</li>';
  $output .=  '<li>Email: '.do_shortcode(wp_kses_data($content)).'</li>';
  $output .=  '<li>Phone: '.esc_html($phone).'</li>';
  $output .=  '<li>Date of birth: '.esc_html($date_of_birth).'</li>';
  $output .=  '<li>Address: '.esc_html($address).'</li>';
  $output .=  '<li>Nationality: '.esc_html($nationality).'</li>';
  $output .=  '</ul>';
  $output .=  '<a title="'.$title.'" target="'.$target.'" href="'.$href.'" class="small-button text-left small-button-gray margin-top">'.esc_html($btn_text).'</a></div></div>';
  return $output;

}
add_shortcode('rs_about_me_list', 'rs_about_me_list');
