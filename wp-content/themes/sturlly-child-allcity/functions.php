<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package Sturlly
 * @since 1.0
 */

function sturlly_parent_styles() {
	$parent = get_template();
	$parent = wp_get_theme($parent);

	wp_enqueue_style( 'sturlly', get_template_directory_uri() . '/style.css', array(), $parent['Version'], 'all');
	
	wp_enqueue_style('allcity-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array());

	wp_enqueue_script('allcity-script', get_stylesheet_directory_uri() . '/assets/js/script.min.js', array(), false, true);

	wp_localize_script('allcity-script', 'rs_ajax',
      array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'siteurl' => get_template_directory_uri()
      )
    );
}
add_action('wp_enqueue_scripts', 'sturlly_parent_styles');

function remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );