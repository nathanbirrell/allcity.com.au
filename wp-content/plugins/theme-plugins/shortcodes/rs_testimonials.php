<?php
/**
 *
 * Testimonial
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function rs_testimonials( $atts, $content = '', $id = '' ) {

    global $rs_testimonials;
    $rs_testimonials = array();

    extract( shortcode_atts( array(
      'id'     => '',
      'class'  => '',
      'style'  => '',
    ), $atts ) );

    //if( empty( $rs_banner_slider ) ) { return; }
    do_shortcode( $content );

    $count   = count( $rs_testimonials );

    $rating_html = ( $style == 'testimonial_with_rating' ) ? '<div class="reviews"><i class="fa fa-star i-font-green"></i><i class="fa fa-star i-font-green"></i><i class="fa fa-star i-font-green"></i><i class="fa fa-star i-font-green"></i><i class="fa fa-star-half-o i-font-green"></i></div>':'';
    $tes_style   =  ( $style == 'testimonial_with_rating') ? 'style7':'style1';


    switch ($style) {
        case 'testimonial_with_no_rating':
        case 'testimonial_with_rating':
            
            $output  =  '<div class="testimonial testimonial-'.sanitize_html_class($tes_style).'">';
            $output .=  '<div data-ride="carousel" class="carousel slide" id="myCarousel">';
            $output .=  '<ol class="carousel-indicators">';

            foreach ($rs_testimonials as $key => $rs_slide) {
                $active_class = ( $key == 0 ) ? 'active':'';
                $output .=  '<li class="'.$active_class.'" data-slide-to="'.$key.'" data-target="#myCarousel"></li>';
            }

            $output .=  '</ol>';
            $output .=  '<div class="carousel-inner">';

            foreach ($rs_testimonials as $key => $rs_slide) {
                $active_item_class = ( $key == 0 ) ? 'active':'';
                $output .=  '<div class="item '.$active_item_class.'">';
                $output .=  '<div class="container">';
                $output .=  '<div class="carousel-caption">';
                $output .=  $rating_html;
                $output .=  '<p>'.do_shortcode(wp_kses_data($rs_slide['content'])).'</p>';
                $output .=  '<div class="white-line"></div>';
                $output .=  '<span>'.esc_html($rs_slide['atts']['cite']).'</span>'; 
                $output .=  '</div>';
                $output .=  '</div>';
                $output .=  '</div>';
                
            }

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

add_shortcode( 'rs_testimonials', 'rs_testimonials' );


function rs_testimonial( $atts, $content = '', $id = '' ) {

    global $rs_testimonials;
    $rs_testimonials[] = array( 'atts' => $atts, 'content' => $content );
    return;

}
add_shortcode( 'rs_testimonial', 'rs_testimonial' );