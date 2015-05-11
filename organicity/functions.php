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
define( 'ORGANICITY_VERSION', '0.1.0' );
//set false for production
define( 'SCRIPT_DEBUG', true );
 /**
  * Set up theme defaults and register supported WordPress features.
  *
  * @uses load_theme_textdomain() For translation/localization support.
  *
  * @since 0.1.0
  */
 function organicity_setup() {
	/**
	 * Makes Organicity available for translation.
	 *
	 * Translations can be added to the /lang directory.
	 * If you're building a theme based on Organicity, use a find and replace
	 * to change 'organicity' to the name of your theme in all template files.
	 */
	load_theme_textdomain( 'organicity', get_template_directory() . '/languages' );
 }
 add_action( 'after_setup_theme', 'organicity_setup' );

 /**
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function organicity_scripts_styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'organicity', get_template_directory_uri() . "/js/organicity{$postfix}.js", array(), ORGANICITY_VERSION, true );

	wp_enqueue_style( 'pure', get_template_directory_uri() . "/pure-min.css");
  wp_enqueue_style( 'pure-grid', get_template_directory_uri() . "/grids-responsive-min.css");

  wp_enqueue_style( 'organicity', get_template_directory_uri() . "/style{$postfix}.css", array(), ORGANICITY_VERSION );

 }
 add_action( 'wp_enqueue_scripts', 'organicity_scripts_styles' );

 /*
  * Register our header menu
  */
  function register_header_menu() {
    register_nav_menu('header-menu',__( 'Header menu' ));
  }
  add_action( 'init', 'register_header_menu' );

/*
 * Register a custom post type for Events
 */

function register_event_posttype() {
  $labels = array(
    'name'                => __('Events', 'organicity'),
    'singular_name'       => __('Event', 'organicity'),
    'menu_name'           => __('Events', 'organicity'),
    'parent_item_colon'   => __('Parent Event:', 'organicity'),
    'all_items'           => __('All Events', 'organicity'),
    'view_item'           => __('View Event', 'organicity'),
    'add_new_item'        => __('Add New Event', 'organicity'),
    'add_new'             => __('Add Event', 'organicity'),
    'edit_item'           => __('Edit Event', 'organicity'),
    'update_item'         => __('Update Event', 'organicity'),
    'search_items'        => __('Search Events', 'organicity'),
    'not_found'           => __('No Events found.', 'organicity')
  );
  $args = array(
   'labels'        => $labels,
   'public'        => true,
   'has_archive'   => true,
   'rewrite'       => array('slug' => __('events', 'organicity'), 'with_front'  => false),
   'menu_icon'     => 'dashicons-calendar-alt',
   'menu_position' => 5,
   'supports'      => array('title', 'editor', 'thumbnail')
  );
  register_post_type('event', $args);
}
add_action('init', 'register_event_posttype');

/*
* Register a custom taxonomy for the cities
*/

function register_city_taxonomy() {
  $labels = array(
    'name' => 'Cities',
    'singular_name' => 'City'
  );
  $rewrite = array(
    'slug' => 'cities',
    'with_front' => false
  );
  $args = array(
    'labels'            => $labels,
    'hierarchical'      => false,
    'public'            => false,
    'show_admin_column' => true,
    'rewrite'           => $rewrite
  );
  register_taxonomy('city', array('event', 'post'), $args);
}
add_action('init', 'register_city_taxonomy');

/*
 * Pre-populate the Organicity cities
 */
function populate_city_terms() {
  $taxonomy = 'city';
  $cities = array(
    __('London', 'organicity'),
    __('Santander', 'organicity'),
    __('Aarhus', 'organicity')
  );

  foreach ($cities as $city) {
    if (!term_exists($city, $taxonomy)) {
      wp_insert_term( $city, $taxonomy);
    }
  }

}
add_action('init', 'populate_city_terms');

/*
 * Add custom meta box for selecting from City taxonomy
 * @requires Meta Box plugin - http://metabox.io/
 */
function register_meta_boxes($meta_boxes) {

  $prefix = 'organicity_';

  $meta_boxes[] = array(
    'title'  => 'City',
    'pages'  => array( 'post', 'event' ),
    'fields' => array(
      array(
        'name' => 'Select a city:',
        'id'   => $prefix . 'city',
        'type' => 'taxonomy',
        'options' => array(
          'taxonomy'  => 'city',
          'type'      => 'checkbox_list'
        )
      )
    )
  );
  return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'register_meta_boxes');

/*
 * Add theme support for Feature Image/Post thumbnails
 */
function add_post_thumbnail_support() {
  add_theme_support('post-thumbnails');
}
add_filter('init', 'add_post_thumbnail_support');
