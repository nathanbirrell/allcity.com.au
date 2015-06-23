<?php
/**
 *
 * Contact Form
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function rs_contact_form( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'      => '',
    'class'   => '',
    'form_id' => '',
    'style'   => '',
  ), $atts ) );

  $id       = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class    = ( $class ) ? ' '. sanitize_html_class($class) : '';
  $style    = ( $style ) ? ' '.sanitize_html_class($style):'';

  $output = '<div class="contact-form'.$class.$style.'">';
  $output .=  do_shortcode('[contact-form-7 id="'.$form_id.'"]');
  $output .=  '</div>';

  return $output;

}
add_shortcode( 'rs_contact_form', 'rs_contact_form' );
