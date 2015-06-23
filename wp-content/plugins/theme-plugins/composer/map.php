<?php
/*
* Visual Composre Map File
*/

// Include Helpers
include_once( RS_ROOT .'/composer/helpers.php' );
include_once( RS_ROOT .'/composer/params.php' );

if ( ! function_exists( 'is_plugin_active' ) ) {
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

$vc_column_width_list = array(
  '1 column - 1/12'     => '1/12',
  '2 columns - 1/6'     => '1/6',
  '3 columns - 1/4'     => '1/4',
  '4 columns - 1/3'     => '1/3',
  '5 columns - 5/12'    => '5/12',
  '6 columns - 1/2'     => '1/2',
  '7 columns - 7/12'    => '7/12',
  '8 columns - 2/3'     => '2/3',
  '9 columns - 3/4'     => '3/4',
  '10 columns - 5/6'    => '5/6',
  '11 columns - 11/12'  => '11/12',
  '12 columns - 1/1'    => '1/1'
);

// Animation
// ------------------------------------------------------------------------------------------
$vc_map_animation = array(
  'type'        => 'dropdown',
  'heading'     => 'Animation',
  'param_name'  => 'animation',
  'admin_label' => true,
  'value'       => rs_get_animations(),
  'group'       => 'Animation'
);

// Extras
// ------------------------------------------------------------------------------------------
$vc_map_extra_id = array(
  'type'        => 'textfield',
  'heading'     => 'Extra ID',
  'param_name'  => 'id',
  'group'       => 'Extras'
);

$vc_map_extra_class = array(
  'type'        => 'textfield',
  'heading'     => 'Extra Class',
  'param_name'  => 'class',
  'group'       => 'Extras'
);

$vc_map_text_align = array(
  'type'                => 'dropdown',
  'heading'             => 'Align',
  'value'              => array(
    'Select Align'      => '',
    'Left'  => 'left',
    'Center'  => 'center',
    'Right'   => 'right'
  ),
  'param_name'          => 'text_align',
  'group'               => 'Text Align'
);

$vc_font_weight   = array(
  'type'        => 'dropdown',
  'heading'     => 'Font Weight',
  'param_name'  => 'font_weight',
  'admin_label' => true,
  'value'       => array(
    'Select Weight' => '',
    '300'           => 'font-light',
    '400'           => 'font-medium',
    '600'           => 'font-bold',
  ),

);

$vc_map_defaults        = array( $vc_map_extra_id, $vc_map_extra_class );

// ==========================================================================================
// VC ROW
// ==========================================================================================
vc_map( array(
  'name'                    => 'Row',
  'base'                    => 'vc_row',
  'icon'                    => 'fa fa-plus-square-o',
  'is_container'            => true,
  'category' =>             array('All', 'Content'),
  'show_settings_on_create' => false,
  'description'             => 'Place content elements inside the section',
  'params'                  => array(
    array(
      'type'        => 'dropdown',
      'heading'     => '100% Full Width',
      'param_name'  => 'fluid',
      'value'       => array('No' => 'no', 'Yes' => 'yes'),
    ),
    // Background
    // ------------------------------------------------------------------------------------------
    array(
      'type'                => 'attach_image',
      'heading'             => 'Background Image',
      'param_name'          => 'background',
    ),
    array(
      'type'                => 'colorpicker',
      'heading'             => 'Background Color',
      'param_name'          => 'bgcolor',
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Overlay',
      'param_name'  => 'overlay',
      'value'       => array('No' => 'no', 'Yes' => 'yes'),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Overlay Alfa',
      'param_name'  => 'overlay_alfa',
      'value'       => array(
        'Red With Opacity 60'   => 'red-alfa-60',
        'Red With Opacity 90'   => 'red-alfa-90',
        'Black With Opacity 60' => 'black-alfa-60',
        'Black With Opacity 70' => 'black-alfa-70',
        'Black With Opacity 85' => 'black-alfa-85',
      ),
      'dependency'  => array( 'element' => 'overlay', 'value' => array('yes') ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Padding',
      'param_name'  => 'padding',
       'value'               => array(
        'Select a padding'  => '',
        'pt-90 pb-90'   => 'pt-90-pb-90',
        'pt-94 pb-93'   => 'pt-94-pb-93',
        'pt-129 pb-120' => 'pt-129-pb-120',
        'pt-90 pb-0'    => 'pt-90-pb-0',
        'pt-0 pb-60'    => 'pt-0-pb-60',
        'pt-0 pb-65'    => 'pt-0-pb-65',
        'pt-0 pb-70'    => 'pt-0-pb-70',
        'pt-0 pb-90'    => 'pt-0-pb-90',
        'no-padding'     => 'no-padding',
        'custom-padding' => 'custom-padding',
      ),
    ),

    array(
      'type'        => 'textfield',
      'heading'     => 'Padding Top',
      'param_name'  => 'padding_top',
      'dependency'  => array( 'element' => 'padding', 'value' => array('custom-padding') ),
    ),

    array(
      'type'        => 'textfield',
      'heading'     => 'Padding Bottom',
      'param_name'  => 'padding_bottom',
      'dependency'  => array( 'element' => 'padding', 'value' => array('custom-padding') ),
    ),

    $vc_map_animation,
    $vc_map_extra_id,
    $vc_map_extra_class,

  ),
  'js_view'                 => 'VcRowView'
) );

// ==========================================================================================
// VC COLUMN
// ==========================================================================================
vc_map( array(
  'name'            => 'Column',
  'base'            => 'vc_column',
  'is_container'    => true,
  'content_element' => false,
  'params'          => array(
    array(
      'type' => 'dropdown',
      'heading' => 'Width',
      'param_name' => 'width',
      'value' => $vc_column_width_list,
      'group' => 'Width & Responsiveness',
      'description' => 'Select column width.',
      'std' => '1/1'
    ),
    array(
      'type' => 'column_offset',
      'heading' => 'Responsiveness',
      'param_name' => 'offset',
      'group' => 'Width & Responsiveness',
      'description' => 'Adjust column for different screen sizes. Control width, offset and visibility settings.',
    ),
    $vc_map_text_align,
    $vc_map_animation,
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
  'js_view'         => 'VcColumnView'
) );


// ==========================================================================================
// VC COLUMN INNER
// ==========================================================================================
vc_map( array(
  'name'                      => 'Column',
  'base'                      => 'vc_column_inner',
  'class'                     => '',
  'icon'                      => '',
  'wrapper_class'             => '',
  'controls'                  => 'full',
  'allowed_container_element' => false,
  'content_element'           => false,
  'is_container'              => true,
  'params'                    => array(
    array(
      'type' => 'dropdown',
      'heading' => 'Width',
      'param_name' => 'width',
      'value' => $vc_column_width_list,
      'group' => 'Width & Responsiveness',
      'description' => 'Select column width.',
      'std' => '1/1'
    ),
    array(
      'type' => 'column_offset',
      'heading' => 'Responsiveness',
      'param_name' => 'offset',
      'group' => 'Width & Responsiveness',
      'description' => 'Adjust column for different screen sizes. Control width, offset and visibility settings.',
    ),
    $vc_map_text_align,
    $vc_map_animation,
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
  'js_view'                   => 'VcColumnView'
) );

// ==========================================================================================
// Banner Slider
// ==========================================================================================
vc_map( array(
  'name'                    => 'Banner Slider',
  'base'                    => 'rs_banner_slider',
  'icon'                    => 'fa fa-building',
  'as_parent'               => array('only' => 'rs_slide_item'),
  'show_settings_on_create' => true,
  'js_view'                 => 'VcColumnView',
  'content_element'         => true,
  'description'             => 'Create intro slider.',
  'params'                  => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'Slider With No Button'   => 'slider_with_no_button',
        'Slider With Button'      => 'slider_with_button',
        'Slider With Description' => 'slider_with_description',
        'Slider With Seperator'   => 'slider_with_seperator',
      ),
      'admin_label' => true,
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Active',
      'param_name'  => 'active',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

vc_map( array(
  'name'                    => 'Slide',
  'base'                    => 'rs_slide_item',
  'icon'                    => 'fa fa-cube',
  'description'             => 'Add slide.',
  'as_child'                => array('only' => 'rs_banner_slider'),
  'params'  => array(
    array(
      'type'        => 'attach_image',
      'heading'     => 'Background',
      'param_name'  => 'background',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Big Heading',
      'param_name'  => 'big_heading',
      'holder'      => 'h3'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Small Heading',
      'param_name'  => 'small_heading',
      'holder'      => 'h4'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
    ),
  )

) );

// ==========================================================================================
// Video Banner
// ==========================================================================================

  vc_map( array(
  'name'            => 'Banner Video',
  'base'            => 'rs_video_banner',
  'icon'            => 'fa fa-video-camera',
  'description'     => 'Video banner.',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Vimeo Video ID',
      'param_name'  => 'vimeo_id',
      'description' => 'Add vimeo video id e.g 87701971',
      'admin_label' => true
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  )

) );

// ==========================================================================================
// Banner Image
// ==========================================================================================

  vc_map( array(
  'name'            => 'Banner',
  'base'            => 'rs_banner',
  'icon'            => 'fa fa-envelope ',
  'description'     => 'Add banner intro with image.',
  'params'          => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'Banner With Button'  =>  'banner_with_button',
        'Banner With Content' =>  'banner_with_content',
        'Banner With No Button' =>  'banner_with_no_button',
        'Banner With Half Transparent'  => 'banner_with_half_transparent'
      ),
    ),
    array(
      'type'        => 'attach_image',
      'heading'     => 'Background',
      'param_name'  => 'background',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Big Heading',
      'param_name'  => 'big_heading',
      'holder'      => 'h3'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Small Heading',
      'param_name'  => 'small_heading',
      'holder'      => 'h4'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
      'dependency' => array( 'element' => 'style', 'value' => array('banner_with_content', 'banner_with_button', 'banner_with_half_transparent') ),
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
      'dependency' => array( 'element' => 'style', 'value' => array('banner_with_content', 'banner_with_button', 'banner_with_half_transparent') ),
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Local Scroll Link',
      'param_name'  => 'local_scroll',
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'dependency' => array( 'element' => 'style', 'value' => array('banner_with_content') ),
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )

) );

if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {

  global $wpdb;

  $db_cf7froms  = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'wpcf7_contact_form'");
  $cf7_forms    = array();

  if ( $db_cf7froms ) {

    foreach ( $db_cf7froms as $cform ) {
      $cf7_forms[$cform->post_title] = $cform->ID;
    }

  } else {
    $cf7_forms['No contact forms found'] = 0;
  }

// ==========================================================================================
// Contact Form
// ==========================================================================================

  vc_map( array(
  'name'            => 'Contact Form',
  'base'            => 'rs_contact_form',
  'icon'            => 'fa fa-envelope ',
  'description'     => 'Contact Form 7',
  'params'          => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Form Style',
      'param_name'  => 'style',
      'value'       => array(
        'Form With White Background'       =>  'contact-style1',
        'Form With Transparent Background' =>  'contact-style2',
        'Form With Grey Background'        =>  'contact-style8',
        'Form With White Dark Background'  =>  'contact-style3',
      ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Contact Form',
      'param_name'  => 'form_id',
      'value'       => $cf7_forms,
      'admin_label' => true,
      'description' => 'Choose previously created contact form from the drop down list.',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )

) );


}

// ==========================================================================================
// Contact Details List
// ==========================================================================================

  vc_map( array(
  'name'            => 'Contact Details List',
  'base'            => 'rs_contact_details_list',
  'icon'            => 'fa fa-envelope ',
  'description'     => 'Add detail list with icon.',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Phone No',
      'param_name'  => 'phone_no',
      'holder'      => 'div'
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Email',
      'param_name'  => 'content',
      'holder'      => 'div'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Website',
      'param_name'  => 'website',
      'holder'      => 'div'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Icon Color',
      'param_name'  => 'icon_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Text Color',
      'param_name'  => 'text_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Border Color',
      'param_name'  => 'border_color',
      'group'       => 'Custom Color Properties'
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )

) );

// ==========================================================================================
// Contact Details List
// ==========================================================================================

  vc_map( array(
  'name'            => 'Contact Details Text',
  'base'            => 'rs_contact_details_text',
  'icon'            => 'fa fa-envelope ',
  'description'     => 'Add detail text with heading.',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Heading',
      'param_name'  => 'heading',
      'holder'      => 'h3'
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'holder'      => 'div'
    ),

    array(
      'type'        => 'colorpicker',
      'heading'     => 'Heading Color',
      'param_name'  => 'heading_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Text Color',
      'param_name'  => 'text_color',
      'group'       => 'Custom Color Properties'
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )

) );


// ==========================================================================================
// SLIDER CONTENTS
// ==========================================================================================
vc_map( array(
  'name'                    => 'Slider Contents',
  'base'                    => 'rs_slider',
  'icon'                    => 'fa fa-exchange',
  'description'             => 'Create some slider contents',
  'params'                  => array(

    array(
      'type'       => 'textfield',
      'heading'    => 'ID',
      'param_name' => 'id',
    ),
    array(
      'type'       => 'textfield',
      'heading'    => 'Extra Class',
      'param_name' => 'class',
    ),

  ),
  'as_parent'       => array('only' => 'rs_slider_item'),
  'js_view'         => 'RSSliderView',
) );

vc_map( array(
  'name'            => 'Slider Content',
  'base'            => 'rs_slider_item',
  'as_child'        => array('only' => 'rs_slider'),
  'is_container'    => true,
  'content_element' => false,
  'js_view'         => 'VcColumnView',
) );

// ==========================================================================================
// Section Title
// ==========================================================================================
vc_map( array(
  'name'   => 'Section Title',
  'base'   => 'rs_section_title',
  'icon'   => 'fa fa-text-height',
  'params' => array(
    array(
      'type'       => 'dropdown',
      'heading'    => 'Style',
      'param_name' => 'style',
      'value'      => array(
        'Big Heading With Border'         => 'big_heading_with_border',
        'Heading Border Bottom'           => 'heading_border_bottom',
        'Heading Border Bottom Bold Text' => 'heading_border_bottom_bold_text',
        'Square Bordered Heading'         => 'square_bordered_heading',
        'Heading With No Description'     => 'heading_with_no_description',
        'Small Heading With Description'  => 'small_heading_with_description',
      ),
    ),
    array(
      'type'       => 'textfield',
      'heading'    => 'Heading',
      'param_name' => 'heading',
      'holder'     => 'h2'
    ),
    array(
      'type'       => 'textarea_html',
      'heading'    => 'Content',
      'param_name' => 'content',
      'dependency' => array( 'element' => 'style', 'value' => array('small_heading_with_description', 'big_heading_with_border', 'heading_border_bottom', 'heading_border_bottom_bold_text', 'square_bordered_heading') ),
    ),
    array(
      'type'       => 'textarea',
      'heading'    => 'Description ( Optional )',
      'param_name' => 'description',
      'dependency' => array( 'element' => 'style', 'value' => array('square_bordered_heading') ),
    ),
    array(
      'type'       => 'colorpicker',
      'heading'    => 'Heading Color',
      'param_name' => 'heading_color',
      'group'      => 'Custom Color Properties'
    ),
    array(
      'type'       => 'colorpicker',
      'heading'    => 'Content Color',
      'param_name' => 'content_color',
      'group'      => 'Custom Color Properties'
    ),
    array(
      'type'       => 'colorpicker',
      'heading'    => 'Description Color',
      'param_name' => 'description_color',
      'group'      => 'Custom Color Properties'
    ),
    array(
      'type'       => 'colorpicker',
      'heading'    => 'Border Color',
      'param_name' => 'border_color',
      'group'      => 'Custom Color Properties'
    ),

    // Extras
    // ------------------------------------------------------------------------------------------
    $vc_map_extra_id,
    $vc_map_extra_class,

  ),
) );


// ==========================================================================================
// Icon Boxes
// ==========================================================================================
vc_map( array(
  'name'                    => 'Borderd Service Box',
  'base'                    => 'rs_icon_boxes', //'hsv_pricing_table',
  'icon'                    => 'fa fa-columns',
  'as_parent'               => array('only' => 'rs_icon_box'), // hsv_pricing_column
  'show_settings_on_create' => true,
  'js_view'                 => 'VcColumnView',
  'content_element'         => true,
  'description'             => 'Create a icon boxes.',
  'params'                  => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Column',
      'param_name'  => 'col',
      'value'       => array('2' => '2', '3' => '3', '4' => '4'),
      'description' => 'Choose Column.'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Icon Color',
      'param_name'  => 'icon_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Heading Color',
      'param_name'  => 'heading_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Border Color',
      'param_name'  => 'border_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Content Color',
      'param_name'  => 'content_color',
      'group'       => 'Custom Color Properties'
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

vc_map( array(
  'name'                    => 'Add Box',
  'base'                    => 'rs_icon_box',
  'icon'                    => 'fa fa-cube',
  'description'             => 'Add box.',
  'as_child'                => array('only' => 'rs_icon_boxes'),
  'params'  => array(
    array(
      'type'        => 'icon',
      'heading'     => 'Icon',
      'placeholder' => 'Select Icon',
      'param_name'  => 'icon',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Heading',
      'param_name'  => 'heading',
      'holder'      => 'div'
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'value'       => '',
      'description' => 'Add Description.',
      'holder'      => 'div'
    ),
  )

) );

// ==========================================================================================
// VC COLUMN TEXT
// ==========================================================================================
vc_map( array(
  'name'          => 'Text Block',
  'base'          => 'vc_column_text',
  'icon'          => 'fa fa-text-width',
  'description'   => 'A block of text with WYSIWYG editor',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Align',
      'param_name'  => 'text_align',
      'value'       => array(
        'Select Align' => '',
        'Left'   => 'left',
        'Center' => 'center',
        'Right'  => 'right',
      ),
    ),
    array(
      'holder'      => 'div',
      'type'        => 'textarea_html',
      'heading'     => 'Text',
      'param_name'  => 'content',
      'value'       => '<p>I am text block. Click edit button to change this text.</p>',
    ),

    array(
      'type'        => 'textfield',
      'heading'     => 'Font Size',
      'param_name'  => 'font_size',
      'description' => 'Enter the font size in px e.g 14px.',
      'group'       => 'Font Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Font Color',
      'param_name'  => 'font_color',
      'group'       => 'Font Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Letter Spacing',
      'param_name'  => 'letter_spacing',
      'description' => 'Enter the spacing size in px e.g 2px.',
      'group'       => 'Font Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Line Height',
      'param_name'  => 'line_height',
      'description' => 'Enter the size in px e.g 2px.',
      'group'       => 'Font Properties'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Font Weight',
      'param_name'  => 'font_weight',
      'value'       => array(
        'Select Weight' => '',
        'Light'         => '300',
        'Normal'        => '400',
        'Medium'        => '600',
        'Bold'          => '800'
      ),
      'group'       => 'Font Properties'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Text Transform',
      'param_name'  => 'text_transform',
      'value'       => array(
        'Select Transform' => '',
        'Lowercase'        => 'lowercase',
        'Uppercase'        => 'uppercase',
      ),
      'group'       => 'Font Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Margin Top',
      'param_name'  => 'margin_top',
      'description' => 'Enter the size in px e.g 20px.',
      'group'       => 'Margin Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Margin Bottom',
      'param_name'  => 'margin_bottom',
      'description' => 'Enter the size in px e.g 20px.',
      'group'       => 'Margin Properties'
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );

// ==========================================================================================
// SPACE
// ==========================================================================================
vc_map( array(
  'name'                    => 'Space',
  'base'                    => 'rs_space',
  'icon'                    => 'fa fa-arrows-v',
  'description'             => 'Add Some space',
  'show_settings_on_create' => false,
  'params'                  => array(
    array(
      'type'          => 'textfield',
      'param_name'    => 'size',
      'heading'       => 'Size',
      'description'   => 'Eg. 100px 10em -25px 25% etc...',
      'admin_label'   => true,
    ),
  ),
) );

// ==========================================================================================
// BUTTONS
// ==========================================================================================
vc_map( array(
  'name'                    => 'Buttons',
  'base'                    => 'rs_buttons',
  'icon'                    => 'fa fa-square',
  'description'             => 'Classy Buttons',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Button Position',
      'param_name'  => 'btn_align',
      'admin_label' => true,
      'value'       => array(
        'Select Position' => '',
        'Left'            => 'text-left',
        'Center'          => 'text-center',
        'Right'           => 'text-right',
      ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Button Size',
      'param_name'  => 'btn_size',
      'admin_label' => true,
      'value'       => array(
        'Small'  => 'small',
        'Medium' => 'medium',
      ),
    ),
    array(
      'type'          => 'vc_link',
      'param_name'    => 'link',
      'heading'       => 'Link',
    ),
    array(
      'type'          => 'textfield',
      'param_name'    => 'btn_text',
      'heading'       => 'Button Text',
      'description'   => 'Enter button text name',
      'admin_lael'    => true
    ),
    array(
      'type'          => 'colorpicker',
      'param_name'    => 'btn_text_color',
      'heading'       => 'Button Text Color',
      'group'         => 'Custom Color Properties'
    ),
    array(
      'type'          => 'colorpicker',
      'param_name'    => 'btn_text_hover_color',
      'heading'       => 'Button Text Hover Color',
      'group'         => 'Custom Color Properties'
    ),
    array(
      'type'          => 'colorpicker',
      'param_name'    => 'btn_border_color',
      'heading'       => 'Button Border Color',
      'group'         => 'Custom Color Properties'
    ),
    array(
      'type'          => 'colorpicker',
      'param_name'    => 'btn_border_hover_color',
      'heading'       => 'Button Border Hover Color',
      'group'         => 'Custom Color Properties'
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

vc_map( array(
  'name'            => 'Portfolio',
  'base'            => 'rs_portfolio',
  'icon'            => 'fa fa-briefcase',
  'description'     => 'Create a Portfolio',
  'params'          => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Portfolio Style',
      'param_name'  => 'portfolio_style',
      'value'             => array(
        'Title With Arrow Left'                  => 'style1',
        'Half Hover With Description and Button' => 'style6',
        'Title With Half Transparent Background' => 'style3',
        'Title With Plus Icon'                   => 'style7',
        'Full Background Transparent'            => 'style2',
        'Centered White Background With Button'  => 'style4',
      ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Select Categories',
      'param_name'  => 'cats',
      'placeholder' => 'Select category',
      'value'       => rs_element_values( 'categories', array(
        'sort_order'  => 'ASC',
        'taxonomy'    => 'portfolio-category',
        'hide_empty'  => false,
      ) ),
      'std'         => '',
      'description' => 'You can choose spesific categories for portfolio, default is all categories.',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Post Per Page',
      'param_name'  => 'posts_per_page',
      'value'       => 5
    ),
    array(
      'type' => 'dropdown',
      'admin_label' => true,
      'heading' => 'Order by',
      'param_name' => 'orderby',
      'value' => array(
        __('ID', 'st') => 'ID',
        __('Author', 'st') => 'author',
        __('Post Title', 'st') => 'title',
        __('Date', 'st') => 'date',
        __('Last Modified', 'st') => 'modified',
        __('Random Order', 'st') => 'rand',
        __('Comment Count', 'st') => 'comment_count',
        __('Menu Order', 'st') => 'menu_order',
      ),
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )

) );

vc_map( array(
  'name'            => 'Model',
  'base'            => 'rs_model',
  'icon'            => 'fa fa-female',
  'description'     => 'Create a Model',
  'params'          => array(
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Select Categories',
      'param_name'  => 'cats',
      'placeholder' => 'Select category',
      'value'       => rs_element_values( 'categories', array(
        'sort_order'  => 'ASC',
        'taxonomy'    => 'model-category',
        'hide_empty'  => false,
      ) ),
      'std'         => '',
      'description' => 'You can choose spesific categories for model, default is all categories.',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Post Per Page',
      'param_name'  => 'limit',
      'value'       => 5
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  ),

) );


// ==========================================================================================
// Testimonial
// ==========================================================================================
vc_map( array(
  'name'                    => 'Testimonial',
  'base'                    => 'rs_testimonials', //'hsv_pricing_table',
  'icon'                    => 'fa fa-comments',
  'as_parent'               => array('only' => 'rs_testimonial'), // hsv_pricing_column
  'show_settings_on_create' => true,
  'js_view'                 => 'VcColumnView',
  'content_element'         => true,
  'description'             => 'Create testimonial.',
  'params'                  => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'Testimonial With Rating'     => 'testimonial_with_rating',
        'Testimonial With No Rating'  => 'testimonial_with_no_rating',
        'Testimonial With Quote Icon' => 'testimonial_with_quote_icon',
      ),
    ),
  ),
) );

vc_map( array(
  'name'                    => 'Testimonial Block',
  'base'                    => 'rs_testimonial',
  'icon'                    => 'fa fa-comments',
  'description'             => 'Create a testimonial block.',
  'as_child'                => array('only' => 'rs_testimonials'),
  'params'  => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Cite',
      'param_name'  => 'cite',
      'value'       => 'Jone Doe'
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'value'       => 'We build pretty complex tools and this allows us to take designs and turn them into functional prototypes quickly and easily.',
      'holder'      => 'div'
    ),
  )

) );

// ==========================================================================================
// Service Box
// ==========================================================================================
vc_map( array(
  'name'                    => 'Service Box',
  'base'                    => 'rs_service_box',
  'icon'                    => 'fa fa-flag-checkered',
  'description'             => 'Service Box.',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'                => 'dropdown',
      'heading'             => 'Style',
      'param_name'          => 'style',
      'value'               => array(
        'Box With Border Bottom'     => 'box_with_border_bottom',
        'Box Align Center With Icon' => 'box_align_center_with_icon',
        'Box Align Left With Icon'   => 'box_align_left_with_icon',
        'Box With Image And Shadow'  => 'box_with_image_and_shadow',
      ),
      'admin_label'         => true
    ),
    array(
      'type'        => 'icon',
      'heading'     => 'Select Icon',
      'param_name'  => 'icon',
      'dependency'  => array( 'element' => 'style', 'value' => array('box_align_center_with_icon', 'box_align_left_with_icon') ),
    ),
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image',
      'param_name'  => 'image',
      'dependency'  => array( 'element' => 'style', 'value' => array('box_with_image_and_shadow') ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Big Heading',
      'param_name'  => 'big_heading',
      'holder'      => 'h3',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Small Heading',
      'param_name'  => 'small_heading',
      'holder'      => 'h4',
      'dependency'  => array( 'element' => 'style', 'value' => array('box_with_border_bottom', 'box_align_left_with_icon') ),
    ),

    array(
      'type'          => 'vc_link',
      'param_name'    => 'link',
      'heading'       => 'Button Link',
      'dependency'  => array( 'element' => 'style', 'value' => array('box_with_border_bottom', 'box_align_center_with_icon') ),
    ),
    array(
      'type'          => 'textfield',
      'param_name'    => 'btn_text',
      'heading'       => 'Button Text',
      'description'   => 'Enter button text name',
      'dependency'  => array( 'element' => 'style', 'value' => array('box_with_border_bottom', 'box_align_center_with_icon') ),
    ),
    array(
      'type'       => 'textarea_html',
      'param_name' => 'content',
      'holder'     => 'div',
      'heading'    => 'Content',
    ),

    array(
      'type'       => 'colorpicker',
      'param_name' => 'big_heading_color',
      'heading'    => 'Big Heading Color',
      'group'      => 'Color Properties'
    ),
    array(
      'type'       => 'colorpicker',
      'param_name' => 'small_heading_color',
      'heading'    => 'Small Heading Color',
      'group'      => 'Color Properties'
    ),
    array(
      'type'       => 'colorpicker',
      'param_name' => 'content_color',
      'heading'    => 'Content Color',
      'group'      => 'Color Properties'
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  ),

) );



// ==========================================================================================
// Feature Box
// ==========================================================================================
vc_map( array(
  'name'                    => 'Feature Box',
  'base'                    => 'rs_feature_box',
  'icon'                    => 'fa fa-rocket',
  'description'             => 'Add Feature Box.',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'                => 'dropdown',
      'heading'             => 'Style',
      'param_name'          => 'style',
      'value'               => array(
        'Hover With Image Button'   => 'hover_with_image_button',
        'Hover Text With Image'     => 'hover_text_with_image',
        'Image With Title'          => 'image_with_title',
        'Hover With Image No Buton' => 'hover_with_image_no_button',
        'Box With Heading Transparent Background' => 'box_with_heading_transparent_background',
        'Box With Heading And Sub Heading Transparent Background' => 'box_with_heading_and_sub_heading_transparent_background',
      ),
      'admin_label'  => true
    ),
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image',
      'param_name'  => 'image',
      'description' => 'Upload image for box.',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Heading',
      'param_name'  => 'heading',
      'holder'      => 'h3',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Sub Heading',
      'param_name'  => 'sub_heading',
      'dependency'  => array( 'element' => 'style', 'value' => array('hover_text_with_image', 'box_with_heading_and_sub_heading_transparent_background') ),
    ),
    array(
      'type'          => 'vc_link',
      'param_name'    => 'link',
      'heading'       => 'Button Link',
      'dependency'  => array( 'element' => 'style', 'value' => array('hover_with_image_button', 'box_with_heading_transparent_background', 'box_with_heading_and_sub_heading_transparent_background') ),
    ),
    array(
      'type'        => 'textfield',
      'param_name'  => 'btn_text',
      'heading'     => 'Button Text',
      'value'       => 'More Info',
      'description' => 'Enter button text name',
      'dependency'  => array( 'element' => 'style', 'value' => array('hover_with_image_button', 'box_with_heading_transparent_background', 'box_with_heading_and_sub_heading_transparent_background') ),
      'admin_lael'  => true
    ),
    array(
      'type'       => 'textarea_html',
      'param_name' => 'content',
      'holder'     => 'div',
      'heading'    => 'Content',
      'value'      => ''
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,

  ),

) );

// ==========================================================================================
// Educational Block
// ==========================================================================================
vc_map( array(
  'name'                    => 'Educational Block',
  'base'                    => 'rs_education_block',
  'icon'                    => 'fa fa-sitemap',
  'description'             => 'Your\'s education block.',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'        => 'icon',
      'heading'     => 'Select Icon',
      'param_name'  => 'icon',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Year Text',
      'param_name'  => 'year',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'University Text',
      'param_name'  => 'university',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Title',
      'param_name'  => 'title',
      'holder'      => 'h3'
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'holder'      => 'div'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Grade Text',
      'param_name'  => 'grade',
    ),


    array(
      'type'        => 'colorpicker',
      'heading'     => 'Icon Color',
      'param_name'  => 'icon_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Year Text Color',
      'param_name'  => 'year_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'University Text Color',
      'param_name'  => 'university_color',
      'group'       => 'Custom Color Properties'
    ),

    array(
      'type'        => 'colorpicker',
      'heading'     => 'Title Text Color',
      'param_name'  => 'title_color',
      'group'       => 'Custom Color Properties'
    ),

    array(
      'type'        => 'colorpicker',
      'heading'     => 'Content Color',
      'param_name'  => 'content_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Grade Text Color',
      'param_name'  => 'grade_color',
      'group'       => 'Custom Color Properties'
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,

  ),

) );

// ==========================================================================================
// SEASONAL DISH
// ==========================================================================================
vc_map( array(
  'name'                    => 'Seasonal Dish Box',
  'base'                    => 'rs_seasonal_dish',
  'icon'                    => 'fa fa-birthday-cake',
  'description'             => 'Add seasonal dish box.',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'       => 'attach_image',
      'heading'    => 'Image',
      'param_name' => 'image',
    ),
    array(
      'type'       => 'textfield',
      'heading'    => 'Heading',
      'param_name' => 'heading',
      'holder'     => 'h2',
    ),
    array(
      'type'       => 'vc_link',
      'param_name' => 'link',
      'heading'    => 'Button Link One',
    ),
    array(
      'type'       => 'textfield',
      'param_name' => 'btn_text',
      'heading'    => 'Button Text One',
    ),

    array(
      'type'       => 'vc_link',
      'param_name' => 'link_2',
      'heading'    => 'Button Link Two',
    ),
    array(
      'type'       => 'textfield',
      'param_name' => 'btn_text_2',
      'heading'    => 'Button Text Two',
    ),
    array(
      'type'       => 'textarea_html',
      'param_name' => 'content',
      'holder'     => 'div',
      'heading'    => 'Content',
      'value'      => ''
    ),
  ),

  $vc_map_extra_id,
  $vc_map_extra_class,

) );

// ==========================================================================================
// Image Block
// ==========================================================================================
vc_map( array(
  'name'                    => 'Image Block',
  'base'                    => 'rs_image_block',
  'icon'                    => 'fa fa-image',
  'description'             => 'Add responsive image.',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image',
      'param_name'  => 'image',
    ),
    $vc_map_animation,
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

// ==========================================================================================
// About Me Detail List
// ==========================================================================================
vc_map( array(
  'name'                    => 'About Me List',
  'base'                    => 'rs_about_me_list',
  'icon'                    => 'fa fa-sort-amount-asc',
  'description'             => 'Add details about me.',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Name',
      'param_name'  => 'name',
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Email',
      'param_name'  => 'content',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Phone',
      'param_name'  => 'phone',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'DOB',
      'param_name'  => 'date_of_birth',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Address',
      'param_name'  => 'address',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Nationality',
      'param_name'  => 'nationality',
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

// ==========================================================================================
// Table Book
// ==========================================================================================
vc_map( array(
  'name'                    => 'Table Book',
  'base'                    => 'rs_table_book',
  'icon'                    => 'fa fa-dollar',
  'description'             => 'Book a table',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'link',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
      'value'       => 'Order Now'
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'holder'      => 'h2',
      'value'       => 'Tell us your name, the occasion of your visit, and how many are in your party...'
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

// ==========================================================================================
// Pie Chart
// ==========================================================================================
vc_map( array(
  'name'                    => 'Pie Chart',
  'base'                    => 'rs_chart',
  'icon'                    => 'fa fa-line-chart',
  'description'             => 'Animated chart.',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Percent',
      'param_name'  => 'percent',
      'value'       => '',
      'admin_label' => true,
      'description' => 'Enter percent e.g 30,50.'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Title',
      'param_name'  => 'title',
      'value'       => ''
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Sub Title',
      'param_name'  => 'subtitle',
      'value'       => ''
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Track Color',
      'param_name'  => 'track_color',
      'value'       => ''
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Bar Color',
      'param_name'  => 'bar_color',
      'value'       => ''
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Title Font Color',
      'param_name'  => 'title_font_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Sub Title Font Color',
      'param_name'  => 'sub_title_font_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Percent Text Color',
      'param_name'  => 'percent_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Percent Text Font Size',
      'param_name'  => 'percent_font_size',
      'description' => 'Enter font size in px,em e.g 20px',
      'group'       => 'Custom Font Properties'
    ),
        array(
      'type'        => 'dropdown',
      'heading'     => 'Font Weight',
      'param_name'  => 'font_weight',
      'value'       => array(
        'Select Weight' => '',
        'Light'         => '300',
        'Normal'        => '400',
        'Medium'        => '600',
        'Bold'          => '800'
      ),
      'group'       => 'Custom Font Properties'
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

// ==========================================================================================
// Progress Bar
// ==========================================================================================
vc_map( array(
  'name'                    => 'Progress Bar',
  'base'                    => 'rs_progress_bar',
  'icon'                    => 'fa fa-tasks',
  'description'             => 'Animated bar.',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Percent',
      'param_name'  => 'percent',
      'value'       => '',
      'admin_label' => true,
      'description' => 'Enter percent e.g 30,50.'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Title',
      'param_name'  => 'title',
      'value'       => ''
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Sub Title',
      'param_name'  => 'subtitle',
      'value'       => ''
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Track Color',
      'param_name'  => 'track_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Bar Color',
      'param_name'  => 'bar_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Title Font Color',
      'param_name'  => 'title_font_color',
      'group'       => 'Custom Color Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Sub Title Font Color',
      'param_name'  => 'sub_title_font_color',
      'group'       => 'Custom Color Properties'
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

// ==========================================================================================
// Teams
// ==========================================================================================
vc_map( array(
  'name'                    => 'Our Team',
  'base'                    => 'rs_team',
  'icon'                    => 'fa fa-user',
  'description'             => 'Our members.',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'                => 'dropdown',
      'heading'             => 'Style',
      'param_name'          => 'style',
      'value'               => array(
        'Box With No Button'       => 'box_with_no_button',
        'Box With Button'          => 'box_with_button',
        'Box Without Social Icons' => 'box_without_social_icons',
        'Box With Button On Hover' => 'box_with_button_on_hover'
      ),
    ),
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image',
      'param_name'  => 'image',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Big Heading',
      'param_name'  => 'big_heading',
      'value'       => '',
      'holder'      => 'h3'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Small Heading',
      'param_name'  => 'small_heading',
      'value'       => '',
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'value'       => '',
      'holder'      => 'div'
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
      'value'       => '',
      'dependency'  => array( 'element' => 'style', 'value' => array('box_with_button', 'box_without_social_icons', 'box_with_button_on_hover') ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
      'value'       => '',
      'dependency'  => array( 'element' => 'style', 'value' => array('box_with_button', 'box_without_social_icons', 'box_with_button_on_hover') ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Icon One',
      'param_name'  => 'icon_one',
      'value'       => array(
        'facebook'    => 'facebook',
        'flickr'      => 'flickr',
        'github'      => 'github',
        'dribbble'    => 'dribbble',
        'gplus'       => 'google-plus',
        'instagram'   => 'instagram',
        'linkedin'    => 'linkedin',
        'pinterest'   => 'pinterest',
        'rss'         => 'rss',
        'stumbleupon' => 'stumbleupon',
        'tumblr'      => 'tumblr',
        'twitter'     => 'twitter',
        'vimeo'       => 'vimeo-square',
        'youtube'     => 'youtube',
      ),
      'group'       => 'Social Links',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'URL One',
      'param_name'  => 'url_one',
      'value'       => '#',
      'group'       => 'Social Links',
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Icon Two',
      'param_name'  => 'icon_two',
      'value'       => array(
        'twitter'     => 'twitter',
        'dribbble'    => 'dribbble',
        'facebook'    => 'facebook',
        'flickr'      => 'flickr',
        'github'      => 'github',
        'gplus'       => 'google-plus',
        'instagram'   => 'instagram',
        'linkedin'    => 'linkedin',
        'pinterest'   => 'pinterest',
        'rss'         => 'rss',
        'stumbleupon' => 'stumbleupon',
        'tumblr'      => 'tumblr',
        'vimeo'       => 'vimeo-square',
        'youtube'     => 'youtube',
      ),
      'group'       => 'Social Links',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'URL Two',
      'param_name'  => 'url_two',
      'value'       => '#',
      'group'       => 'Social Links'
    ),

    array(
      'type'        => 'dropdown',
      'heading'     => 'Icon Three',
      'param_name'  => 'icon_three',
      'value'       => array(
        'gplus'       => 'google-plus',
        'dribbble'    => 'dribbble',
        'facebook'    => 'facebook',
        'flickr'      => 'flickr',
        'github'      => 'github',
        'instagram'   => 'instagram',
        'linkedin'    => 'linkedin',
        'pinterest'   => 'pinterest',
        'rss'         => 'rss',
        'stumbleupon' => 'stumbleupon',
        'tumblr'      => 'tumblr',
        'twitter'     => 'twitter',
        'vimeo'       => 'vimeo-square',
        'youtube'     => 'youtube',
      ),
      'group'       => 'Social Links',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'URL Three',
      'param_name'  => 'url_three',
      'value'       => '#',
      'group'       => 'Social Links'
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

// ==========================================================================================
// Conter
// ==========================================================================================
vc_map( array(
  'name'                    => 'Counter',
  'base'                    => 'rs_conter',
  'icon'                    => 'fa fa-tachometer',
  'description'             => 'Animated conter.',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Conter No',
      'param_name'  => 'conter_no',
      'value'       => '312',
      'admin_label' => true,
      'description' => 'Enter conter number.'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Title',
      'param_name'  => 'title',
      'value'       => 'Pizzas Ordered'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Border Color (optional)',
      'param_name'  => 'border_color',
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

// ==========================================================================================
// BLOG
// ==========================================================================================
vc_map( array(
  'name'            => 'Blog',
  'base'            => 'rs_blog',
  'icon'            => 'fa fa-pencil',
  'description'     => 'Create a blog',
  'params'          => array(
    array(
      'type'         => 'dropdown',
      'heading'      => 'Style',
      'param_name'   => 'layout',
      'value'        => array(
        'Full Width' => '1',
        'Grid Style' => '2',
      ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Choose Categories',
      'param_name'  => 'cats',
      'placeholder' => 'Choose category (optional)',
      'value'       => rs_element_values( 'categories', array(
        'sort_order'  => 'ASC',
        'hide_empty'  => false,
      ) ),
      'std'         => '',
      'description' => 'You can choose spesific categories for blog, default is all categories.',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Posts Per Page',
      'param_name'  => 'limit',
      'value'       => get_option( 'posts_per_page' ),
      'admin_label' => true
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'View All Blog Link',
      'param_name'  => 'btn_link',
    ),
    array(
      'type'         => 'dropdown',
      'heading'      => 'Load More Button Style',
      'param_name'   => 'load_more_style',
      'value'        => array(
        'Outlined' => 'small-button',
        'Solid'    => 'small-button small-button-gray',
      ),
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  )

) );

// ==========================================================================================
// Clients
// ==========================================================================================
vc_map( array(
  'name'            => 'Clients',
  'base'            => 'rs_clients',
  'icon'            => 'fa fa-users',
  'description'     => 'Create a clients',
  'params'          => array(
    array(
      'type'        => 'attach_images',
      'heading'     => 'Image',
      'param_name'  => 'images',
    ),
  )

) );


// ==========================================================================================
// Gallery
// ==========================================================================================
vc_map( array(
  'name'            => 'Gallery',
  'base'            => 'rs_gallery',
  'icon'            => 'fa fa-file-photo-o',
  'description'     => 'Create a lightbox gallery',
  'params'          => array(
    array(
      'type'        => 'attach_images',
      'heading'     => 'Image',
      'param_name'  => 'images',
    ),
  )

) );

// ==========================================================================================
// Google Map
// ==========================================================================================
vc_map( array(
  'name'            => 'Google Map',
  'base'            => 'rs_google_map',
  'icon'            => 'fa fa-map-marker',
  'description'     => 'Add google map',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Latitude',
      'value'       => '40.6700',
      'admin_label' => true,
      'param_name'  => 'lat',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Longitude',
      'value'       => '-73.9400',
      'admin_label' => true,
      'param_name'  => 'long',
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  )

) );

// ==========================================================================================
// Divider
// ==========================================================================================
vc_map( array(
  'name'                    => 'Divider',
  'base'                    => 'rs_divider',
  'icon'                    => 'fa fa-bars',
  'description'             => 'Add divider.',
  'show_settings_on_create' => true,
  'params'                  => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Margin Top',
      'param_name'  => 'margin_top',
      'admin_label' => true,
      'description' => 'Enter margin in pixel 30px.'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Margin Bottom',
      'param_name'  => 'margin_bottom',
      'description' => 'Enter margin in pixel 30px.',
      'admin_label' => true,
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Divider Color (Optional)',
      'param_name'  => 'divider_color',
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

class RS_WPBakeryShortCodesContainer extends WPBakeryShortCodesContainer {
  public function contentAdmin( $atts, $content = null ) {
      $width = $el_class = '';
      extract( shortcode_atts( $this->predefined_atts, $atts ) );
      $label_class = ( isset( $this->settings['label_class'] ) ) ? $this->settings['label_class'] : 'info';
      $output  = '';

      $column_controls = $this->getColumnControls( $this->settings( 'controls' ) );
      $column_controls_bottom = $this->getColumnControls( 'add', 'bottom-controls' );
      for ( $i = 0; $i < count( $width ); $i ++ ) {
        $output .= '<div ' . $this->mainHtmlBlockParams( $width, $i ) . '>';
        $output .= '<div class="rs-container-title"><span class="rs-label rs-label-'. $label_class .'">'. $this->settings['name'] .'</span></div>'; // ADDED THIS LINE
        $output .= $column_controls;
        $output .= '<div class="wpb_element_wrapper">';
        $output .= '<div ' . $this->containerHtmlBlockParams( $width, $i ) . '>';
        $output .= do_shortcode( shortcode_unautop( $content ) );
        $output .= '</div>';
        if ( isset( $this->settings['params'] ) ) {
          $inner = '';
          foreach ( $this->settings['params'] as $param ) {
            $param_value = isset( $$param['param_name'] ) ? $$param['param_name'] : '';
            if ( is_array( $param_value ) ) {
              // Get first element from the array
              reset( $param_value );
              $first_key = key( $param_value );
              $param_value = $param_value[$first_key];
            }
            $inner .= $this->singleParamHtmlHolder( $param, $param_value );
          }
          $output .= $inner;
        }
        $output .= '</div>';
        $output .= $column_controls_bottom;
        $output .= '</div>';
      }
      return $output;
  }
}


class WPBakeryShortCode_RS_Slider extends RS_WPBakeryShortCodesContainer {}
class WPBakeryShortCode_RS_Slider_Item extends RS_WPBakeryShortCodesContainer {}
class WPBakeryShortCode_RS_Icon_Boxes   extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_RS_Icon_Box     extends WPBakeryShortCode {}
class WPBakeryShortCode_RS_Testimonials extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_RS_Testimonial  extends WPBakeryShortCode {}
class WPBakeryShortCode_RS_Banner_Slider extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_RS_Slide_Item  extends WPBakeryShortCode {}

add_action( 'admin_init', 'vc_remove_elements', 10);
function vc_remove_elements( $e = array() ) {

  if ( !empty( $e ) ) {
    foreach ( $e as $key => $r_this ) {
      vc_remove_element( 'vc_'.$r_this );
    }
  }
}

$s_elemets = array( 'icon', 'masonry_media_grid', 'masonry_grid', 'tabs', 'tab', 'accordion', 'accordion_tab', 'wp_tagcloud', 'basic_grid', 'media_grid', 'custom_heading', 'empty_space', 'clients', 'olumn_text', 'widget_sidebar', 'toggle', 'images_carousel', 'carousel', 'tour', 'gallery', 'posts_slider', 'posts_grid', 'teaser_grid', 'separator', 'text_separator', 'message', 'facebook', 'tweetmeme', 'googleplus', 'pinterest', 'single_image', 'button', 'toogle', 'button2', 'cta_button', 'cta_button2', 'video', 'gmaps', 'flickr', 'progress_bar', 'raw_html', 'raw_js', 'pie', 'wp_search', 'wp_meta', 'wp_recentcomments', 'wp_calendar', 'wp_pages', 'wp_custommenu', 'wp_text', 'wp_posts', 'wp_links', 'wp_categories', 'wp_archives', 'wp_rss' );
vc_remove_element('client', 'testimonial');
vc_remove_elements( $s_elemets );

