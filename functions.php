<?php
/**
 * Organicity functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package Organicity
 * @since 0.1.0
 */
 
 // Useful global constants
define( 'OC_VERSION', '0.1.0' );
 
 /**
  * Set up theme defaults and register supported WordPress features.
  *
  * @uses load_theme_textdomain() For translation/localization support.
  *
  * @since 0.1.0
  */
 function oc_setup() {
	/**
	 * Makes Organicity available for translation.
	 *
	 * Translations can be added to the /lang directory.
	 * If you're building a theme based on Organicity, use a find and replace
	 * to change 'oc' to the name of your theme in all template files.
	 */
	load_theme_textdomain( 'oc', get_template_directory() . '/languages' );
 }
 add_action( 'after_setup_theme', 'oc_setup' );
 
 /**
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function oc_scripts_styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'oc', get_template_directory_uri() . "/assets/js/organicity{$postfix}.js", array(), OC_VERSION, true );
		
	wp_enqueue_style( 'oc', get_template_directory_uri() . "/assets/css/organicity{$postfix}.css", array(), OC_VERSION );
 }
 add_action( 'wp_enqueue_scripts', 'oc_scripts_styles' );
 
 /**
  * Add humans.txt to the <head> element.
  */
 function oc_header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';
	
	echo apply_filters( 'oc_humans', $humans );
 }
 add_action( 'wp_head', 'oc_header_meta' );