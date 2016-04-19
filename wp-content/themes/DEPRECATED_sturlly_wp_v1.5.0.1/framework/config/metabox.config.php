<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();

// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_page_options',
  'title'     => 'Page Options',
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'high',
  'sections'  => array(

    array(
      'name'   => 'page_option',
      'fields' => array(

        array(
          'id'      => 'page_layout_model',
          'type'    => 'switcher',
          'title'   => 'Full Width',
          'default' => false,
          'label'   => 'Make page as full width without container.',
        ),

        array(
          'id'    => 'page_header_bg',
          'type'  => 'upload',
          'title' => 'Background',
          'info'  => 'Upload background for page header.'
        ),

        array(
          'id'       => 'page_header_description',
          'type'     => 'textarea',
          'title'    => 'Description',
          'info'     => 'Add description under page title.',
        ),

      ),
    ),

  ),
);


// -----------------------------------------
// Post Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_post_options',
  'title'     => 'Post Single Options',
  'post_type' => 'post',
  'context'   => 'normal',
  'priority'  => 'high',
  'sections'  => array(

    array(
      'name'   => 'post_single',
      'fields' => array(

        array(
          'id'             => 'blog_post_type',
          'type'           => 'select',
          'title'          => 'Post Type As',
          'options'        => array(
            'gallery'    => 'Gallery',
            'video'    => 'Video',
          ),
          'default' => 'gallery',
          'info'    => 'Choose post type. <strong style="color:#111;">Only for standard post format.</strong>',
        ),

        array(
          'id'    => 'post_gallery',
          'type'  => 'gallery',
          'title' => 'Upload',
          'add_title'   => 'Add Images',
          'edit_title'  => 'Edit Images',
          'clear_title' => 'Remove Images',
          'info'  => 'Upload images for slider. <strong style="color:#111;">Only for standard post format.</strong>',
          'dependency' => array( 'blog_post_type', '==', 'gallery' ),
        ),

        array(
          'id'       => 'post_video',
          'type'     => 'textarea',
          'sanitize' => false,
          'title'    => 'Iframe Code',
          'info'     => 'Add iframe video code. <strong style="color:#111;">Only for standard post format.</strong>',
          'dependency' => array( 'blog_post_type', '==', 'video' ),
        ),

      ),
    ),

  ),
);

$options[]    = array(
  'id'        => '_custom_portfolio_post_options',
  'title'     => 'Portfolio Options',
  'post_type' => 'portfolio',
  'context'   => 'normal',
  'priority'  => 'high',
  'sections'  => array(

    array(
      'name'   => 'portfolio_post',
      'fields' => array(

        array(
          'id'    => 'pt_post_price',
          'type'  => 'text',
          'title' => 'Price',
          'info'  => 'Add price text only for <strong style="color:#111;">travel &amp; resturant</strong> layout.'
        ),

        array(
          'id'    => 'pt_post_price_discount',
          'type'  => 'text',
          'title' => 'Discount Percent',
          'info'  => 'Add price discount percent only for <strong style="color:#111;">travel</strong> layout.'
        ),

      ),
    ),

  ),
);

// -----------------------------------------
// Post Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_portfolio_options',
  'title'     => 'Portfolio Single Options',
  'post_type' => 'portfolio',
  'context'   => 'normal',
  'priority'  => 'high',
  'sections'  => array(

    array(
      'name'   => 'portfolio_single',
      'fields' => array(

        array(
          'id'    => 'pt_gallery',
          'type'  => 'gallery',
          'title' => 'Upload',
          'add_title'   => 'Add Images',
          'edit_title'  => 'Edit Images',
          'clear_title' => 'Remove Images',
          'info'  => 'Upload images for slider.'
        ),

        array(
          'id'    => 'pt_additonal_note',
          'type'  => 'textarea',
          'title' => 'Additional Text ( Under Category )',
        ),

        array(
          'id'      => 'pt_review',
          'type'    => 'switcher',
          'title'   => 'Show Review',
          'default' => false,
          'label'   => 'Select yes/no to show/hide review star.',
          'info'    => 'Specially for <strong style="color:#000;">resturant layout</strong>.'
        ),

        array(
          'id'    => 'pt_about_client',
          'type'  => 'textarea',
          'title' => 'About Client',
        ),

      ),
    ),

  ),
);

$options[]    = array(
  'id'        => '_custom_model_post_options',
  'title'     => 'Model Options',
  'post_type' => 'model',
  'context'   => 'normal',
  'priority'  => 'high',
  'sections'  => array(

    array(
      'name'   => 'model_post',
      'fields' => array(

        array(
          'id'             => 'model_featured_position',
          'type'           => 'select',
          'title'          => 'Featured Image Position',
          'options'        => array(
            'left'    => 'Left',
            'right'    => 'Right',
          ),
          'default' => 'left',
          'info'    => 'Choose position.',
        ),

        array(
          'id'    => 'model_sub_heading',
          'type'  => 'textarea',
          'title' => 'Additonal Description',
          'info'  => 'Enter description <strong style="color:#111;">just below heading</strong>.'
        ),
      ),
    ),

  ),
);



CSFramework_Metabox::instance( $options );
