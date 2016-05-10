<?php
/*
Plugin Name: Theme Plugins
Plugin URI: https://relstudiosnx.com/
Author: Satish Pokhrel
Author URI: https://www.relstudiosnx.com
Version: 1.3
Description: Includes Shortcodes + Custom Post Types ( Portfolio, Model ) for theme.
Text Domain: rs
*/

if(!class_exists('RS_Plugins') && class_exists('Vc_Manager'))
{

	// Define Constants
	defined('RS_ROOT')		or define('RS_ROOT', dirname(__FILE__));

	class RS_Plugins
	{

		private $assets_css;
		private $assets_js;

		public function __construct() {
			$this->assets_css 	= plugins_url('/composer/assets/css', __FILE__);
			$this->assets_js	= plugins_url('/composer/assets/js', __FILE__);
			add_action( 'init', array($this, 'rs_register_post_type'), 0);
			add_action( 'admin_menu', array($this, 'rs_vc_remove_gird' ));
			add_action( 'admin_print_scripts-post.php', array($this, 'rs_load_vc_scripts'), 99);
			add_action( 'admin_print_scripts-post-new.php', array($this, 'rs_load_vc_scripts'), 99);
			$this->rs_vc_load_shortcodes();
			$this->rs_init();
		}

		public function rs_register_post_type() {
			$post_type_labels       = array(
		      'name'                => 'Portfolios',
		      'singular_name'       => 'Portfolio',
		      'menu_name'           => 'Portfolio',
		      'parent_item_colon'   => 'Parent Item:',
		      'all_items'           => 'All Portfolios',
		      'view_item'           => 'View Item',
		      'add_new_item'        => 'Add New Item',
		      'add_new'             => 'Add New',
		      'edit_item'           => 'Edit Item',
		      'update_item'         => 'Update Item',
		      'search_items'        => 'Search portfolios',
		      'not_found'           => 'No portfolios found',
		      'not_found_in_trash'  => 'No portfolios found in Trash',
		    );

		    $post_type_rewrite      = array(
		      'slug'                => 'portfolio-item',
		      'with_front'          => true,
		      'pages'               => true,
		      'feeds'               => true,
		    );

		    $post_type_args         = array(
		      'label'               => 'portfolio',
		      'description'         => 'Portfolio information pages',
		      'labels'              => $post_type_labels,
		      'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'comments' ),
		      'taxonomies'          => array( 'post' ),
		      'hierarchical'        => false,
		      'public'              => true,
		      'show_ui'             => true,
		      'show_in_menu'        => true,
		      'show_in_nav_menus'   => true,
		      'show_in_admin_bar'   => true,
		      'can_export'          => true,
		      'has_archive'         => true,
		      'exclude_from_search' => true,
		      'publicly_queryable'  => true,
		      'rewrite'             => $post_type_rewrite,
		      'capability_type'     => 'post',
		    );
		    register_post_type( 'portfolio', $post_type_args );

		    $taxonomy_labels                = array(
		      'name'                        => 'Portfolio',
		      'singular_name'               => 'Portfolio',
		      'menu_name'                   => 'Categories',
		      'all_items'                   => 'All Categories',
		      'parent_item'                 => 'Parent Category',
		      'parent_item_colon'           => 'Parent Category:',
		      'new_item_name'               => 'New Category Name',
		      'add_new_item'                => 'Add New Category',
		      'edit_item'                   => 'Edit Category',
		      'update_item'                 => 'Update Category',
		      'separate_items_with_commas'  => 'Separate categories with commas',
		      'search_items'                => 'Search categories',
		      'add_or_remove_items'         => 'Add or remove categories',
		      'choose_from_most_used'       => 'Choose from the most used categories',
		    );

		    $taxonomy_rewrite         = array(
		      'slug'                  => 'portfolio-category',
		      'with_front'            => true,
		      'hierarchical'          => true,
		    );

		    $taxonomy_args          = array(
		      'labels'              => $taxonomy_labels,
		      'hierarchical'        => true,
		      'public'              => true,
		      'show_ui'             => true,
		      'show_admin_column'   => true,
		      'show_in_nav_menus'   => true,
		      'show_tagcloud'       => true,
		      'rewrite'             => $taxonomy_rewrite,
		    );
		    register_taxonomy( 'portfolio-category', 'portfolio', $taxonomy_args );


		    $taxonomy_tags_args     = array(
		      'hierarchical'        => false,
		      'show_admin_column'   => true,
		      'rewrite'             => 'portfolio-tag',
		      'label'               => 'Tags',
		      'singular_label'      => 'Tags',
		    );
		    register_taxonomy( 'portfolio-tag', array('portfolio'), $taxonomy_tags_args );

        /* Model Post Type */
        $post_type_labels       = array(
          'name'                => 'Models',
          'singular_name'       => 'Model',
          'menu_name'           => 'Model',
          'parent_item_colon'   => 'Parent Model:',
          'all_items'           => 'All Models',
          'view_item'           => 'View Model',
          'add_new_item'        => 'Add New Model',
          'add_new'             => 'Add New',
          'edit_item'           => 'Edit Model',
          'update_item'         => 'Update Model',
          'search_items'        => 'Search Models',
          'not_found'           => 'No Models found',
          'not_found_in_trash'  => 'No Models found in Trash',
        );

        $post_type_rewrite      = array(
          'slug'                => 'model-item',
          'with_front'          => true,
          'pages'               => true,
          'feeds'               => true,
        );

        $post_type_args         = array(
          'label'               => 'Model',
          'description'         => 'Model information pages',
          'labels'              => $post_type_labels,
          'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'comments' ),
          'taxonomies'          => array( 'post' ),
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => true,
          'publicly_queryable'  => true,
          'rewrite'             => $post_type_rewrite,
          'capability_type'     => 'post',
        );
        register_post_type( 'model', $post_type_args );

        $taxonomy_labels                = array(
          'name'                        => 'Model',
          'singular_name'               => 'Model',
          'menu_name'                   => 'Categories',
          'all_items'                   => 'All Categories',
          'parent_item'                 => 'Parent Category',
          'parent_item_colon'           => 'Parent Category:',
          'new_item_name'               => 'New Category Name',
          'add_new_item'                => 'Add New Category',
          'edit_item'                   => 'Edit Category',
          'update_item'                 => 'Update Category',
          'separate_items_with_commas'  => 'Separate categories with commas',
          'search_items'                => 'Search categories',
          'add_or_remove_items'         => 'Add or remove categories',
          'choose_from_most_used'       => 'Choose from the most used categories',
        );

        $taxonomy_rewrite         = array(
          'slug'                  => 'model-category',
          'with_front'            => true,
          'hierarchical'          => true,
        );

        $taxonomy_args          = array(
          'labels'              => $taxonomy_labels,
          'hierarchical'        => true,
          'public'              => true,
          'show_ui'             => true,
          'show_admin_column'   => true,
          'show_in_nav_menus'   => true,
          'show_tagcloud'       => true,
          'rewrite'             => $taxonomy_rewrite,
        );
        register_taxonomy( 'model-category', 'model', $taxonomy_args );



			$this->rs_vc_load_map();

		} //end of register portfolio

		public function rs_init()
		{
			global $vc_manager;
			$vc_manager->setIsAsTheme();
			$vc_manager->disableUpdater();
			$vc_manager->setEditorDefaultPostTypes( array( 'page', 'post', 'portfolio' ) );
			$vc_manager->frontendEditor()->disableInline();
			$vc_manager->automapper()->setDisabled();
		}

		public function rs_vc_load_shortcodes()
		{
			foreach( glob( RS_ROOT . '/'. 'shortcodes/rs_*.php' ) as $shortcode )
			{
				require_once(RS_ROOT .'/'. 'shortcodes/'. basename( $shortcode ) );
			}

			foreach( glob( RS_ROOT . '/'. 'shortcodes/vc_*.php' ) as $shortcode )
			{
				require_once( RS_ROOT .'/' .'shortcodes/'. basename( $shortcode ) );
			}
		}

		public function rs_vc_load_map()
		{
			require_once( RS_ROOT .'/' .'composer/map.php' );
		}

		public function rs_load_vc_scripts() {
			wp_enqueue_style( 'rs-vc-custom',	$this->assets_css. '/vc-style.css' );
			wp_enqueue_script( 'vc-script', $this->assets_js .'/vc-script.js' ,  array('jquery'), '1.0.0', true );
		}

		public function rs_vc_remove_gird()
		{
  			remove_menu_page( 'edit.php?post_type=vc_grid_item' );
		}

	} // end of class

	new RS_Plugins;
} // end of class_exists
