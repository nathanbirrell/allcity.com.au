<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings      = array(
  'menu_title' => 'Theme Option',
  'menu_type'  => 'add_menu_page',
  'menu_slug'  => 'cs-framework',
  'ajax_save'  => false,
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ----------------------------------------
// a option section for options general  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'general',
  'title'       => 'General',
  'icon'        => 'fa fa-gear',

  // begin: fields
  'fields'      => array(
    array(
      'id'             => 'page_type',
      'type'           => 'select',
      'title'          => 'Page Type',
      'options'        => array(
        'multi-page'    => 'Multi Page',
        'one-page'      => 'One Page',
      ),
      'default' => 'multi-page',
      'info'    => 'Choose page layout type.',
    ),
    array(
      'id'             => 'general_skin',
      'type'           => 'select',
      'title'          => 'Skin',
      'options'        => array(
        'default'    => 'Default',
        'blue'    => 'Blue',
        'gold'    => 'Gold',
        'green'   => 'Green',
        'purple'  => 'Purple',
        'red'     => 'Red',
        'violet'  => 'Violet',
        'yellow'  => 'Yellow',
      ),
      'default' => 'default',
      'info'    => 'Choose skin for your site.',
    ),
    array(
      'id'      => 'general_logo',
      'type'    => 'upload',
      'title'   => 'Upload Logo (Dark)',
      'default' => get_template_directory_uri().'/assets/images/logo-dark.png',
      'after'   => '<p class="cs-text-muted" style="font-style:italic;">Upload dark logo for your site.</p>',
    ),

    array(
      'id'      => 'general_logo_light',
      'type'    => 'upload',
      'title'   => 'Upload Logo (Light)',
      'default' => get_template_directory_uri().'/assets/images/logo-white.png',
      'after'   => '<p class="cs-text-muted" style="font-style:italic;">Upload light logo for your site.</p>',
    ),

    array(
      'id'      => 'general_favicon',
      'type'    => 'upload',
      'title'   => 'Upload Favicon',
      'default' => get_template_directory_uri().'/assets/images/favicon.png',
      'after'   => '<p class="cs-text-muted" style="font-style:italic;">Upload favicon for your site.</p>',
    ),
    array(
      'id'      => 'custom_css',
      'type'    => 'textarea',
      'title'   => 'Custom CSS',
      //'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum facilisis magna. Nunc et mi eget quam.',
      //'dependency' => array( 'style', '==', 'style2' ),
    ),
  ), // end: fields
);

// ----------------------------------------
// a option section for options typography  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'typography',
  'title'       => 'Typography',
  'icon'        => 'fa fa-font',

  // begin: fields
  'fields'      => array(


    array(
      'id'        => 'heading_typo',
      'type'      => 'typography',
      'title'     => 'Heading (H1,H2,...H6)',
      'default'   => array(
        'family'   => 'Oswald',
        'font'     => 'google'
      ),
      'variant'   => false,
    ),

    array(
      'id'        => 'body_typo',
      'type'      => 'typography',
      'title'     => 'Body',
      'default'   => array(
        'family'   => 'Open Sans',
        'font'     => 'google'
      ),
      'variant'   => false,
    ),

    array(
      'id'         => 'font_size',
      'type'       => 'text',
      'title'      => 'Font Size',
      'info'       => 'Enter body fontsize.',
      'default'    => '14px',
    ),

    array(
      'id'         => 'line_height',
      'type'       => 'text',
      'title'      => 'Line Height',
      'info'       => 'Enter body line height.',
      'default'    => '26px',
    ),

    array(
      'id'      => 'heading_color',
      'type'    => 'color_picker',
      'title'   => 'Heading Color',
      'default' => '',
      'rgba'    => false
    ),

    array(
      'id'      => 'body_color',
      'type'    => 'color_picker',
      'title'   => 'Body Color',
      'default' => '',
      'rgba'    => false
    ),

  ), // end: fields
);

// ----------------------------------------
// a option section for options typography  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'single_page',
  'title'       => 'Blog Single Page',
  'icon'        => 'fa fa-pencil',
  //'sections'    => array(

    // begin: fields
    'fields'      => array(


      array(
        'id'        => 'date',
        'type'      => 'switcher',
        'title'     => 'Date',
        'default'   => true,
        'info'      => 'Select on/off to show/hide date.'
      ),

      array(
        'id'        => 'category',
        'type'      => 'switcher',
        'title'     => 'Category',
        'default'   => true,
        'info'      => 'Select on/off to show/hide category.'
      ),

      array(
        'id'        => 'tags',
        'type'      => 'switcher',
        'title'     => 'Tags',
        'default'   => true,
        'info'      => 'Select on/off to show/hide tags.'
      ),

      array(
        'id'        => 'comment',
        'type'      => 'switcher',
        'title'     => 'Comment',
        'default'   => true,
        'info'      => 'Select on/off to show/hide comment.'
      ),

    ), // end: fields



  //)
);

// ----------------------------------------
// a option section for options footer  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'footer',
  'title'       => 'Footer',
  'icon'        => 'fa fa-list',

  // begin: fields
  'fields'      => array(

    array(
      'id'      => 'footer_bg',
      'type'    => 'upload',
      'title'   => 'Background',
      'default' => get_template_directory_uri().'/assets/images/footer-bg.jpg',
    ),

    array(
      'id'      => 'footer_text',
      'type'    => 'textarea',
      'title'   => 'Footer Text',
      'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum facilisis magna. Nunc et mi eget quam.',
      'dependency' => array( 'style', '==', 'style2' ),
    ),


    array(
      'id'         => 'csocial_intagram',
      'type'       => 'text',
      'title'      => 'Instagram URL',
      'info'       => 'Enter Instagram url.',
      'default'    => '#',
    ),

    array(
      'id'         => 'fsocial_fb',
      'type'       => 'text',
      'title'      => 'Facebook URL',
      'info'       => 'Enter facebook url.',
      'default'    => '#',
    ),

    array(
      'id'         => 'fsocial_google',
      'type'       => 'text',
      'title'      => 'Google+ URL',
      'info'       => 'Enter Google+ url.',
      'default'    => '#',
    ),

    array(
      'id'         => 'fsocial_twitter',
      'type'       => 'text',
      'title'      => 'Twitter URL',
      'info'       => 'Enter twitter url.',
      'default'    => '#',
    ),

    array(
      'id'         => 'fsocial_linkedin',
      'type'       => 'text',
      'title'      => 'Linkedin URL',
      'info'       => 'Enter linkedin url.',
      'default'    => '#',

    ),

    array(
      'id'         => 'fsocial_youtube',
      'type'       => 'text',
      'title'      => 'Youtube URL',
      'info'       => 'Enter youtube url.',
      'default'    => '#',
    ),

    array(
      'id'         => 'fsocial_dribble',
      'type'       => 'text',
      'title'      => 'Dribble URL',
      'info'       => 'Enter dribble url.',
      'default'    => '#',
    ),

    array(
      'id'         => 'fsocial_pinterest',
      'type'       => 'text',
      'title'      => 'Pinterest URL',
      'info'       => 'Enter pinterest url.',
      'default'    => '#',
    ),

    array(
      'id'         => 'fsocial_rss',
      'type'       => 'text',
      'title'      => 'RSS Feed URL',
      'info'       => 'Enter rss feed url.',
      'default'    => '#',
    ),

    array(
      'id'       => 'copyright_text',
      'type'     => 'wysiwyg',
      'title'    => 'Copyright Text',
      'settings' => array(
        'textarea_rows' => 5,
        //'tinymce'       => false,
        'media_buttons' => false,
      ),
      'default'   => '&copy; 2014 Sturlly is proudly powered by <a href="http://nrgthemes.com">NRGThemes</a>'
    ),

  ), // end: fields
);


// ----------------------------------------
// a option section for options typography  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'page_templates',
  'title'       => 'Page Templates',
  'icon'        => 'fa fa-file-text',
  'sections'    => array(

    array(
      'name'      => 'index_page',
      'title'     => 'Index Page',

      // begin: fields
      'fields'      => array(


        array(
          'id'      => 'index_bg',
          'type'    => 'upload',
          'title'   => 'Page Header Background',
        ),

        array(
          'id'        => 'index_heading',
          'type'      => 'text',
          'title'     => 'Heading',
          'default'   => 'Index Page',
        ),

        array(
          'id'        => 'index_desc',
          'type'      => 'text',
          'title'     => 'Description',
          'default'   => 'Our Thought in One Place',
        ),

      ), // end: fields
    ),

    array(
      'name'      => 'archive_page',
      'title'     => 'Archive Page',

      // begin: fields
      'fields'      => array(


        array(
          'id'      => 'archive_bg',
          'type'    => 'upload',
          'title'   => 'Page Header Background',
        ),

        array(
          'id'        => 'archive_desc',
          'type'      => 'text',
          'title'     => 'Description',
          'default'   => 'Our Thought in One Place',
        ),

      ), // end: fields
    ),

    array(
      'name'      => 'search_page',
      'title'     => 'Search Page',

      // begin: fields
      'fields'      => array(


        array(
          'id'      => 'search_bg',
          'type'    => 'upload',
          'title'   => 'Page Header Background',
        ),

        array(
          'id'        => 'search_desc',
          'type'      => 'text',
          'title'     => 'Description',
          'default'   => 'Our Thought in One Place',
        ),

      ), // end: fields
    ),

    array(
      'name'      => '404_page',
      'title'     => '404 Page',

      // begin: fields
      'fields'      => array(


        array(
          'id'      => '404_bg',
          'type'    => 'upload',
          'title'   => 'Page Header Background',
        ),

        array(
          'id'        => '404_desc',
          'type'      => 'text',
          'title'     => 'Description',
          'default'   => 'Page Not Found',
        ),

      ), // end: fields
    ),

    array(
      'name'      => 'comming_page',
      'title'     => 'Comming Soon',

      // begin: fields
      'fields'      => array(

        array(
          'id'      => 'comming_logo',
          'type'    => 'upload',
          'title'   => 'Upload Logo',
          'default' => get_template_directory_uri().'/assets/images/logo-white-coming-soon.png',
        ),

        array(
          'id'      => 'comming_bg',
          'type'    => 'upload',
          'title'   => 'Background',
          'default' => get_template_directory_uri().'/assets/images/home.jpg',
        ),

        array(
          'id'        => 'comming_heading',
          'type'      => 'text',
          'title'     => 'Heading',
          'default'   => 'WE ARE A BIG DIGITAL AGENCY',
        ),

        array(
          'id'        => 'comming_desc',
          'type'      => 'textarea',
          'title'     => 'Description',
          'default'   => 'Our website is under construction. We\'ll be here soon with our new awesome site, subscribe to be notified.',
        ),

        array(
          'id'        => 'comming_year',
          'type'      => 'text',
          'title'     => 'Year',
          'default'   => '2015',
          'info'      => 'Enter project completion year.'
        ),

        array(
          'id'        => 'comming_month',
          'type'      => 'text',
          'title'     => 'Month',
          'default'   => '12',
          'info'      => 'Enter project completion month.'
        ),

        array(
          'id'        => 'comming_day',
          'type'      => 'text',
          'title'     => 'Day',
          'default'   => '15',
          'info'      => 'Enter project completion day.'
        ),

        array(
        'id'         => 'csocial_fb',
        'type'       => 'text',
        'title'      => 'Facebook URL',
        'info'       => 'Enter facebook url.',
        'default'    => '#',
      ),

      array(
        'id'         => 'csocial_twitter',
        'type'       => 'text',
        'title'      => 'Twitter URL',
        'info'       => 'Enter twitter url.',
        'default'    => '#',
      ),

      array(
        'id'         => 'csocial_linkedin',
        'type'       => 'text',
        'title'      => 'Linkedin URL',
        'info'       => 'Enter linkedin url.',
        'default'    => '#',

      ),

      array(
        'id'         => 'csocial_youtube',
        'type'       => 'text',
        'title'      => 'Youtube URL',
        'info'       => 'Enter youtube url.',
        'default'    => '#',
      ),

      array(
        'id'         => 'csocial_dribble',
        'type'       => 'text',
        'title'      => 'Dribble URL',
        'info'       => 'Enter dribble url.',
        'default'    => '#',
      ),

      array(
        'id'         => 'csocial_rss',
        'type'       => 'text',
        'title'      => 'RSS Feed URL',
        'info'       => 'Enter rss feed url.',
        'default'    => '#',
      ),



      ), // end: fields
    ),



  )
);



// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => 'Backup',
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => 'You can save your current options. Download a Backup and Import.',
    ),

    array(
      'type'    => 'backup',
    ),

  )
);


CSFramework::instance( $settings, $options );
