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

	wp_enqueue_style( 'sturlly-child-theme', get_template_directory_uri() . '/style.css', array(), $parent['Version'], 'all');
	
	wp_enqueue_style('allcity_style', get_stylesheet_directory_uri() . '/assets/css/style.css', array('custom-style','portfolio-style','fancybox','scrollbar','responsive','prettyPhoto'));

	wp_enqueue_script('allcity_script', get_stylesheet_directory_uri() . '/assets/js/script.js', array( 'jquery' ), false, true);
}
add_action('wp_enqueue_scripts', 'sturlly_parent_styles');