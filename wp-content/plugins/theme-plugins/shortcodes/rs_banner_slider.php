<?php
/**
 *
 * Intro Slider
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function rs_banner_slider( $atts, $content = '', $id = '' ) {

    global $rs_banner_slider;
    $rs_banner_slider = array();

    extract( shortcode_atts( array(
      'id'     => '',
      'class'  => '',
      'style'  => '',
    ), $atts ) );

    //if( empty( $rs_banner_slider ) ) { return; }
    do_shortcode( $content );

    $count   = count( $rs_banner_slider );



    switch ($style) {
        case 'slider_with_no_button':
            $output =   '<div class="home-slider full-screen slider-text-style5 no-padding">';
            $output .=  '<div id="carousel3" class="carousel slide" data-ride="carousel3" data-interval=\'false\'>';
            $output .=  '<ol class="carousel-indicators">';

            foreach ($rs_banner_slider as $key => $rs_slider) {
                $active_class = ( $key == 0 ) ? 'active':'';
                $output .=  '<li class="'.$active_class.'" data-slide-to="'.$key.'" data-target="#carousel3"></li>';
            }

            $output .=  '</ol>';
            $output .=  '<div class="carousel-inner">';

            foreach ($rs_banner_slider as $key => $rs_slider) {
                $active_item_class = ( $key == 0 ) ? 'active':'';
                $background = $rs_slider['atts']['background'];

                $backgroud_url = '';
                if(is_numeric($background) && !empty($background)) {
                    $image_src  = wp_get_attachment_image_src( $background, 'full' );
                    $backgroud_url = $image_src[0];
                }

                $output .=  '<div class="item '.sanitize_html_class($active_item_class).'">';
                $output .=  '<div class="black-overlay-dark"></div>';
                $output .=  '<div style="background-image:url('.esc_url($backgroud_url).');" class="fill"></div>';
                $output .=  '<div class="slider-text"><div class="col-md-6"><h1>'.esc_html($rs_slider['atts']['big_heading']).'</h1> <span>'.esc_html($rs_slider['atts']['small_heading']).'</span></div></div>';
                $output .=  '</div>';
            }

            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';
        break;

        case 'slider_with_button':
            $output =   '<div class="home-slider full-screen slider-text-style1">';
            $output .=  '<div id="carousel3" class="carousel slide " data-ride="carousel3" data-interval=\'false\'>';
            $output .=  '<ol class="carousel-indicators">';

            foreach ($rs_banner_slider as $key => $rs_slider) {
                $active_class = ( $key == 0 ) ? 'active':'';
                $output .=  '<li class="'.$active_class.'" data-slide-to="'.$key.'" data-target="#carousel3"></li>';
            }
            $output .=  '</ol>';
            $output .=  '<div class="carousel-inner">';
            foreach ($rs_banner_slider as $key => $rs_slider) {
                $active_item_class = ( $key == 0 ) ? 'active':'';
                $background = $rs_slider['atts']['background'];

                $backgroud_url = '';
                if(is_numeric($background) && !empty($background)) {
                    $image_src  = wp_get_attachment_image_src( $background, 'full' );
                    $backgroud_url = $image_src[0];
                }

                $btn_link = ( isset($rs_slider['atts']['btn_link']) ) ? $rs_slider['atts']['btn_link']:'';
                $btn_text = ( isset($rs_slider['atts']['btn_text'])) ? $rs_slider['atts']['btn_text']:'';

                if ( function_exists( 'vc_parse_multi_attribute' ) ) {
                  $parse_args     = vc_parse_multi_attribute( $btn_link );
                  $href           = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '';
                  $title          = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
                  $target         = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
                }

                $output .=  '<div class="item '.$active_item_class.'">';
                $output .=  '<div class="slider-gradient-overlay"></div>';
                $output .=  '<div style="background-image:url('.esc_url($backgroud_url).');" class="fill"></div>';
                $output .=  '<div class="slider-text">';
                $output .=  '<div class="col-md-6">';
                $output .=  '<h1>'.esc_html($rs_slider['atts']['big_heading']).'</h1>';
                $output .=  '<span>'.esc_html($rs_slider['atts']['small_heading']).'</span>';
                if(!empty($href) && !empty($btn_text)) {
                  $output .=  '<a href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'" class="highlight-button inner-link">'.esc_html($btn_text).'</a>';
                }
                $output .=  '</div>';
                $output .=  '</div>';
                $output .=  '</div>';
            }

            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';
        break;

        case 'slider_with_description':
          $output  =  '<div class="home-slider full-screen slider-text-style3">';
          $output .=  '<div id="carousel3" class="carousel slide " data-ride="carousel3" data-interval=\'false\'>';
          $output .=  '<ol class="carousel-indicators">';

          foreach ($rs_banner_slider as $key => $rs_slider) {
              $active_class = ( $key == 0 ) ? 'active':'';
              $output .=  '<li class="'.$active_class.'" data-slide-to="'.$key.'" data-target="#carousel3"></li>';
          }

          $output .=  '</ol>';
          $output .=  '<div class="carousel-inner">';
          foreach ($rs_banner_slider as $key => $rs_slider) {
            $active_item_class = ( $key == 0 ) ? 'active':'';
            $background = $rs_slider['atts']['background'];

            $backgroud_url = '';
            if(is_numeric($background) && !empty($background)) {
                $image_src  = wp_get_attachment_image_src( $background, 'full' );
                $backgroud_url = $image_src[0];
            }

            $btn_link = ( isset($rs_slider['atts']['btn_link']) ) ? $rs_slider['atts']['btn_link']:'';
            $btn_text = ( isset($rs_slider['atts']['btn_text'])) ? $rs_slider['atts']['btn_text']:'';

            if ( function_exists( 'vc_parse_multi_attribute' ) ) {
              $parse_args     = vc_parse_multi_attribute( $btn_link );
              $href           = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '';
              $title          = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
              $target         = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
            }

            $output .=  '<div class="item '.$active_item_class.'">';
            $output .=  '<div class="slider-gradient-overlay1"></div>';
            $output .=  '<div style="background-image:url('.esc_url($backgroud_url).');" class="fill"></div>';
            $output .=  '<div class="slider-text">';
            $output .=  '<div class="container">';
            $output .=  '<div class="row">';
            $output .=  '<div class="col-md-8 col-md-push-2">';
            $output .=  '<h2>'.esc_html($rs_slider['atts']['small_heading']).'</h2>';
            $output .=  '<h1>'.esc_html($rs_slider['atts']['big_heading']).'</h1>';
            $output .=  '<div class="white-line-top"></div>';
            $output .=  '<div class="white-line-bottom"></div>';
            $output .=  '<span>'.do_shortcode(wp_kses_data($rs_slider['content'])).'</span>';
            if(!empty($href) && !empty($btn_text)) {
              $output .=  '<a href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'" class="highlight-button inner-link">'.esc_html($btn_text).'</a>';
            }
            $output .= '</div></div></div></div></div>';
          }

          $output .=  '</div>'; // end of carousel3
          $output .=  '</div>'; // end of carousel3
          $output .=  '</div>'; // end of carousel3

        break;

        case 'slider_with_seperator':
        default:
          $output  = '<div class="home-slider full-screen slider-text-style4">';
          $output .=  '<div id="carousel3" class="carousel slide " data-ride="carousel3" data-interval=\'false\'>';
          $output .=  '<ol class="carousel-indicators">';

          foreach ($rs_banner_slider as $key => $rs_slider) {
              $active_class = ( $key == 0 ) ? 'active':'';
              $output .=  '<li class="'.$active_class.'" data-slide-to="'.$key.'" data-target="#carousel3"></li>';
          }

          $output .=  '</ol>';
          $output .=  '<div class="carousel-inner">';

          foreach ($rs_banner_slider as $key => $rs_slider) {

            $btn_link = ( isset($rs_slider['atts']['btn_link']) ) ? $rs_slider['atts']['btn_link']:'';
            $btn_text = ( isset($rs_slider['atts']['btn_text'])) ? $rs_slider['atts']['btn_text']:'';

            if ( function_exists( 'vc_parse_multi_attribute' ) ) {
              $parse_args     = vc_parse_multi_attribute( $btn_link );
              $href           = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '';
              $title          = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : 'button';
              $target         = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
            }

            $active_item_class = ( $key == 0 ) ? 'active':'';
            $background = $rs_slider['atts']['background'];

            $backgroud_url = '';
            if(is_numeric($background) && !empty($background)) {
                $image_src  = wp_get_attachment_image_src( $background, 'full' );
                $backgroud_url = $image_src[0];
            }
            $output .=  '<div class="item '.$active_item_class.'">';
            $output .=  '<div class="slider-gradient-overlay"></div>';
            $output .=  '<div style="background-image:url('.esc_url($backgroud_url).');" class="fill"></div>';
            $output .=  '<div class="slider-text">';
            $output .=  '<div class="col-md-6">';
            $output .=  '<div class="tour-price"><span class="black-text">only</span>$350</div>';
            $output .=  '<h1>'.esc_html($rs_slider['atts']['big_heading']).'</h1>';
            $output .=  '<span>'.esc_html($rs_slider['atts']['small_heading']).'</span>';
            if(!empty($href) && !empty($btn_text)) {
              $output .=  '<a href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'" class="highlight-button inner-link" >'.esc_html($btn_text).'</a>';
            }
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';
          }

          $output .=  '</div>'; // end of carousel3
          $output .=  '</div>'; // end of carousel3
          $output .=  '</div>'; // end of carousel3
        break;
    }

    return $output;

}

add_shortcode( 'rs_banner_slider', 'rs_banner_slider' );


function rs_slide_item( $atts, $content = '', $id = '' ) {

    global $rs_banner_slider;
    $rs_banner_slider[] = array( 'atts' => $atts, 'content' => $content );
    return;

}
add_shortcode( 'rs_slide_item', 'rs_slide_item' );
