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
define( 'ORGANICITY_VERSION', '0.1.0' );

function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

function get_current_post_id() {
    if (array_key_exists('post', $_GET)) {
        return $_GET['post'];
    } elseif (array_key_exists('post_ID', $_POST)) {
        return $_POST['post_ID'];
    } else {
        return null;
    }
}

/**
 * Makes Organicity available for translation.
 */
function organicity_setup() {
    load_theme_textdomain( 'organicity', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'organicity_setup' );

/*
 * Add theme customizer setting.
 */

function organicity_customize_register($wp_customize) {
    $wp_customize->add_setting('events_coming_soon_text', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'events_coming_soon_text',
        array(
            'label' => 'Events Coming-soon text',
            'section' => 'title_tagline',
            'type' => 'textarea'
        )
    ));
}

add_action('customize_register', 'organicity_customize_register');

/*
 * Add theme support for Feature Image/Post thumbnails
 */
function add_post_thumbnail_support() {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 450, 250, true );
    add_image_size( 'instance-name', 700, 400);

}
add_filter('init', 'add_post_thumbnail_support');

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since 0.1.0
 */
function organicity_scripts_styles() {

    $postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . "/js/owl.carousel.js", array('jquery'), ORGANICITY_VERSION);
    wp_enqueue_script( 'organicity', get_template_directory_uri() . "/js/organicity{$postfix}.js", array('jquery'), ORGANICITY_VERSION, true );
    //wp_enqueue_script( 'ajax-filter', get_template_directory_uri() . "/js/ajax-filter-post{$postfix}.js", array('jquery'), ORGANICITY_VERSION, true );


    wp_enqueue_style( 'pure', get_template_directory_uri() . "/pure-min.css");
    wp_enqueue_style( 'pure-grid', get_template_directory_uri() . "/grids-responsive-min.css");

    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . "/owl.carousel.css");
    wp_enqueue_style( 'owl-theme', get_template_directory_uri() . "/owl.theme.css");

    wp_enqueue_style( 'organicity-style', get_template_directory_uri() . "/style{$postfix}.css", array(), ORGANICITY_VERSION );

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
        'singular_name' => 'City',
        'menu_name'           => __('City', 'organicity'),
    );
    $rewrite = array(
        'slug' => 'cities',
        'with_front' => false
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'rewrite'           => $rewrite,
        'show_ui' => true,
        'has_archive'   => true,

    );
    register_taxonomy('city', array('event', 'post'), $args);
}
add_action('init', 'register_city_taxonomy');

/*
 * Register a custom taxonomy for the FAQ groups
 */
function register_faq_taxonomy() {
    $labels = array(
        'name'          => 'FAQ Groups',
        'singular_name' => 'FAQ Group',
        'menu_name'     => __('FAQ Groups', 'organicity'),
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => false,
        'show_in_nav_menus' => false,
        'show_admin_column' => true,
        'rewrite'           => false,
        'has_archive'       => false,
        'show_ui'           => true
    );
    register_taxonomy('faq_group', array('faq'), $args);
}
add_action('init', 'register_faq_taxonomy');

/*
 * Register a custom post type for FAQs
 */
function register_faq_posttype() {
    $labels = array(
        'name'                => __('FAQs', 'organicity'),
        'singular_name'       => __('FAQ', 'organicity'),
        'menu_name'           => __('FAQs', 'organicity'),
        'parent_item_colon'   => __('Parent FAQ:', 'organicity'),
        'all_items'           => __('All FAQs', 'organicity'),
        'view_item'           => __('View FAQ', 'organicity'),
        'add_new_item'        => __('Add New FAQ', 'organicity'),
        'add_new'             => __('Add FAQ', 'organicity'),
        'edit_item'           => __('Edit FAQ', 'organicity'),
        'update_item'         => __('Update FAQ', 'organicity'),
        'search_items'        => __('Search FAQs', 'organicity'),
        'not_found'           => __('No FAQs found.', 'organicity')
    );
    $args = array(
        'labels'              => $labels,
        'publicly_queriable'  => true,
        'show_ui'             => true,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => false,
        'has_archive'         => true,
        'rewrite'             => array('slug' => __('faqs', 'organicity'), 'with_front'  => false),
        'public'              => true,
        'menu_icon'           => 'dashicons-info',
        'menu_position'       => 6,
        'supports'            => array('title', 'editor'),
        'taxonomies'          => ['faq_group']
    );
    register_post_type('faq', $args);
}
add_action('init', 'register_faq_posttype');

/*
 * Register a custom post type for Tools
 */
function register_tool_posttype() {
    $labels = array(
        'name'                => __('Tools', 'organicity'),
        'singular_name'       => __('Tool', 'organicity'),
        'menu_name'           => __('Tools', 'organicity'),
        'parent_item_colon'   => __('Parent Tool:', 'organicity'),
        'all_items'           => __('All Tools', 'organicity'),
        'view_item'           => __('View Tool', 'organicity'),
        'add_new_item'        => __('Add New Tool', 'organicity'),
        'add_new'             => __('Add Tool', 'organicity'),
        'edit_item'           => __('Edit Tool', 'organicity'),
        'update_item'         => __('Update Tool', 'organicity'),
        'search_items'        => __('Search Tools', 'organicity'),
        'not_found'           => __('No Tools found.', 'organicity')
    );
    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array('slug' => __('tools', 'organicity'), 'with_front'  => false),
        'menu_icon'     => 'dashicons-hammer',
        'menu_position' => 7,
        'supports'      => array('title', 'editor')
    );
    register_post_type('tool', $args);
}
add_action('init', 'register_tool_posttype');

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
            wp_insert_term($city, $taxonomy);
        }
    }

}
add_action('init', 'populate_city_terms');




// Add term page
function pippin_taxonomy_add_new_meta_field() {
    // this will add the custom meta field to the add new term page
    ?>
    <div class="form-field">
        <label for="term_meta[custom_term_meta]"><?php _e( 'Example meta field', 'organicity' ); ?></label>
        <input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="">
        <p class="description"><?php _e( 'Enter a value for this field','organicity' ); ?></p>
    </div>
<?php
}
add_action( 'city_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2 );






// Edit term page
function pippin_taxonomy_edit_meta_field($term) {

    // put the term ID into a variable
    $t_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option( "taxonomy_$t_id" ); ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[custom_term_meta]"><?php _e( 'Example meta field', 'organicity' ); ?></label></th>
        <td>
            <input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="<?php echo esc_attr( $term_meta['custom_term_meta'] ) ? esc_attr( $term_meta['custom_term_meta'] ) : ''; ?>">
            <p class="description"><?php _e( 'Enter a value for this field','organicity' ); ?></p>
        </td>
    </tr>
<?php
}
add_action( 'city_edit_form_fields', 'pippin_taxonomy_edit_meta_field', 10, 2 );



// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_$t_id" );
        $cat_keys = array_keys( $_POST['term_meta'] );
        foreach ( $cat_keys as $key ) {
            if ( isset ( $_POST['term_meta'][$key] ) ) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option( "taxonomy_$t_id", $term_meta );
    }
}
add_action( 'edited_city', 'save_taxonomy_custom_meta', 10, 2 );
add_action( 'create_city', 'save_taxonomy_custom_meta', 10, 2 );



/*
 * add social media settings menu to admin
 */
$social_media_sites = array(
    'organicity_url_facebook'    => 'Facebook',
    'organicity_url_twitter'     => 'Twitter',
    'organicity_url_slideshare'  => 'SlideShare',
    'organicity_url_linkedin'    => 'LinkedIn',
    'organicity_url_instagram'   => 'Instagram',
    'organicity_url_youtube'     => 'YouTube'
);

function add_organicity_social_menu() {
    add_options_page('Social media settings', 'Social media', 'manage_options', 'organicity_social_menu', 'render_organicity_settings_page');
}
add_action('admin_menu', 'add_organicity_social_menu');

function register_organicity_settings() {
    global $social_media_sites;
    foreach ($social_media_sites as $key => $name) {
        register_setting('organicity-options', $key);
    }
}
add_action('admin_init', 'register_organicity_settings');

function render_organicity_settings_page() {
    global $social_media_sites; ?>
    <div class="wrap">
        <h2>Organicity social media URLs</h2>
        <form method="post" action="options.php">
            <?php settings_fields('organicity-options'); ?>
            <?php do_settings_sections('organicity-options'); ?>
            <?php foreach ($social_media_sites as $key => $name) { ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php echo $name; ?></th>
                        <td><input type="text" name="<?php echo $key; ?>" value="<?php echo esc_attr(get_option($key)); ?>" size=50/></td>
                    </tr>
                </table>
            <?php }; ?>
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

//////////////////////////////////////////////
//////////////////////////////////////////////
/////////////// METABOXES ////////////////////
//////////////////////////////////////////////
//////////////////////////////////////////////

/*
 * Register custom meta boxes
 * @requires Meta Box plugin - http://metabox.io/
 */
function register_meta_boxes($meta_boxes) {

    $prefix = 'organicity_';

    /*
     * Select from City taxonomy
     * on posts and events
     */
    $meta_boxes[] = array(
        'title'  => 'City',
        'pages'  => array( 'post', 'event' ),
        'fields' => array(
            array(
                'name'    => 'Select a city:',
                'id'      => $prefix . 'city',
                'type'    => 'taxonomy',
                'options' => array(
                    'taxonomy'  => 'city',
                    'type'      => 'checkbox_list'
                )
            )
        )
    );


    /*
     * Fields for the Event posttype
     */
    $meta_boxes[] = array(
        'title'   => 'Event details',
        'pages'   => 'event',
        'fields'  => array(
            array(
                'name'        => 'Event location',
                'id'          => $prefix . 'event_location',
                'type'        => 'text',
                'size'        => 50
            ),
            array(
                'name'        => 'Event date',
                'id'          => $prefix . 'event_date',
                'type'        => 'date',
                'js_options'  => array(
                    'dateFormat' => 'yy-mm-dd' //'dd-mm-yy'
                )
            ),
            array(
                'name'        => 'Event URL',
                'id'          => $prefix . 'event_url',
                'type'        => 'url'
            )
        )
    );


    /*
     * Fields for the Tool posttype
     */
    $meta_boxes[] = array(
        'title'   => 'Tool details',
        'pages'   => 'tool',
        'fields'  => array(
            array(
                'name'        => 'Short label',
                'id'          => $prefix . 'tool_label',
                'type'        => 'text'
            ),
            array(
                'name'        => 'Short description',
                'id'          => $prefix . 'tool_short_description',
                'type'        => 'wysiwyg',
                'options' => array('textarea_rows' => 8)
            ),
            array(
                'name'        => 'Link to tool',
                'id'          => $prefix . 'tool_link_href',
                'type'        => 'url'
            ),
            array(
                'name'        => 'Show as full-width section?',
                'id'          => $prefix . 'tool_is_full_width',
                'type'        => 'checkbox'
            )
        )
    );

    $meta_boxes[] = array(
        'title'    => 'Tool graphics',
        'pages'    => 'tool',
        'priority' => 'low',
        'fields'   => array(
            array(
                'name'        => 'Big graphic',
                'id'          => $prefix . 'tool_graphic_big',
                'type'        => 'media',
                'max_file_uploads' => 1
            ),
            array(
                'name'        => 'Small graphic outline',
                'id'          => $prefix . 'tool_graphic_small_outline',
                'type'        => 'media',
                'max_file_uploads' => 1
            ),
            array(
                'name'        => 'Small graphic filled',
                'id'          => $prefix . 'tool_graphic_small_filled',
                'type'        => 'media',
                'max_file_uploads' => 1
            )
        )
    );


    $meta_boxes[] = array(
        'title'    => 'Tool content',
        'pages'    => 'tool',
        'priority' => 'high',
        'fields'   => array(
            array(
                'name'        => 'Video (optional)',
                'id'          => $prefix . 'tool_video',
                'type'        => 'oembed'
            ),
            array(
                'name'        => 'Images (optional)',
                'id'          => $prefix . 'tool_images',
                'type'        => 'media'
            )
        )
    );

    /*
     * Homepage specific features
     */
    $homepage_button_fields = array(
        'title'   => 'Header buttons',
        'pages'   => 'page',
        'fields'  => array(
            array(
                'name'  => 'Internal link text',
                'id'    => $prefix . 'header_anchor_link_text',
                'type'  => 'text',
                'size'  => 50
            ),
            array(
                'name'  => 'Internal link title attribute',
                'id'    => $prefix . 'header_anchor_link_title',
                'type'  => 'text',
                'size'  => 50
            ),
            array(
                'name'  => 'Internal link visible?',
                'id'    => $prefix . 'header_anchor_link_visible',
                'type'  => 'checkbox',
                'std'   => 1
            ),
            array(
                'name'  => 'External link text',
                'id'    => $prefix . 'header_apply_link_text',
                'type'  => 'text',
                'size'  => 50
            ),
            array(
                'name'  => 'External link destination',
                'id'    => $prefix . 'header_apply_link_href',
                'type'  => 'text'
            ),
            array(
                'name'  => 'External link visible?',
                'id'    => $prefix . 'header_apply_link_visible',
                'type'  => 'checkbox',
                'std'   => 0
            )
        )
    );

    $homepage_callout_fields = array(
        'title'   => 'Call-out banner',
        'pages'   => 'page',
        'fields'  => array(
            array(
                'name'  => 'Heading',
                'id'    => $prefix . 'callout_heading',
                'type'  => 'text'
            ),
            array(
                'name'  => 'Description',
                'id'    => $prefix . 'callout_description',
                'type'  => 'text'
            ),
            array(
                'name'  => 'Button text',
                'id'    => $prefix . 'callout_button_text',
                'type'  => 'text',
                'size'  => 50
            ),
            array(
                'name'  => 'Button destination',
                'id'    => $prefix . 'callout_button_href',
                'type'  => 'text'
            ),
            array(
                'name'  => 'Visible',
                'id'    => $prefix . 'callout_visible',
                'type'  => 'checkbox',
                'std'   => 0
            )
        )
    );

    $homepage_event_fields = array(
        'title'   => 'Events section',
        'pages'   => 'page',
        'fields'  => array(
            array(
                'name'  => 'Title',
                'id'    => $prefix . 'homepage_events_section_title',
                'type'  => 'text',
                'size'  => 80
            ),
            array(
                'name'  => 'Show section',
                'id'    => $prefix . 'homepage_events_section_visible',
                'type'  => 'checkbox',
                'std'   => 1
            ),
            array(
                'name'    => 'Content',
                'id'      => $prefix . 'homepage_events_section_content',
                'type'    => 'wysiwyg',
                'options' => array('textarea_rows'=>10)
            ),
            array(
                'name'  => 'Link text',
                'id'    => $prefix . 'homepage_events_link_text',
                'type'  => 'text',
                'size'  => 50
            )
        )
    );

    $homepage_signup_fields = array(
        'title'   => 'Signup section',
//    'post_types' => ['page','post'],
        'pages'   => 'page',
        'fields'  => array(
            array(
                'name'  => 'Title',
                'id'    => $prefix . 'homepage_signup_section_title',
                'type'  => 'text',
                'size'  => 80
            ),
            array(
                'name'  => 'Show section',
                'id'    => $prefix . 'homepage_signup_section_visible',
                'type'  => 'checkbox',
                'std'   => 1
            ),
            array(
                'name'    => 'Content',
                'id'      => $prefix . 'homepage_signup_section_content',
                'type'    => 'wysiwyg',
                'options' => array('textarea_rows'=>10)
            ),
            array(
                'name'  => 'Signup field placeholder text',
                'id'    => $prefix . 'homepage_signup_placeholder_text',
                'type'  => 'text',
                'size'  => 50
            ),
            array(
                'name'  => 'Signup button text',
                'id'    => $prefix . 'homepage_signup_button_text',
                'type'  => 'text',
                'size'  => 50
            )
        )
    );

    /*
     * only show if editing homepage
     */
    $post_id = get_current_post_id();
    $frontpage_id = get_option('page_on_front');

    if ($post_id == $frontpage_id) {
        $meta_boxes[] = $homepage_button_fields;
        $meta_boxes[] = $homepage_callout_fields;
        $meta_boxes[] = $homepage_event_fields;
        $meta_boxes[] = $homepage_signup_fields;
    }

    /*
     * Open call page specific features
     */

     $open_call_id = get_id_by_slug('open-call');

     if ($post_id == $open_call_id) {
         $meta_boxes[] = array(
             'title'   => 'Open Call Header',
             'pages'   => 'page',
             'fields'  => array(
                 array(
                     'name'  => 'Heading',
                     'id'    => $prefix . 'open_call_heading',
                     'type'  => 'textarea',
                     'size'  => 100
                 ),
                 array(
                     'name'  => 'Short description',
                     'id'    => $prefix . 'open_call_short_description',
                     'type'  => 'textarea',
                     'size'  => 300
                 ),
                 array(
                     'name'  => 'Apply button title',
                     'id'    => $prefix . 'open_call_apply_button_text',
                     'type'  => 'text',
                     'size'  => 30
                 ),
                 array(
                     'name'  => 'Apply button link',
                     'id'    => $prefix . 'open_call_apply_button_href',
                     'type'  => 'url',
                     'size'  => 30
                 ),
                 array(
                     'name'  => 'Download button title',
                     'id'    => $prefix . 'open_call_download_button_text',
                     'type'  => 'text',
                     'size'  => 30
                 ),
                 array(
                     'name'  => 'Download button link',
                     'id'    => $prefix . 'open_call_download_button_href',
                     'type'  => 'file_input'
                 )
             )
         );

         $meta_boxes[] = array(
             'title'   => 'Helpdesk',
             'pages'   => 'page',
             'fields'  => array(
                 array(
                     'name'  => 'Helpdesk title',
                     'id'    => $prefix . 'open_call_helpdesk_title',
                     'type'  => 'text'
                 ),
                 array(
                     'name'  => 'Helpdesk description',
                     'id'    => $prefix . 'open_call_helpdesk_description',
                     'type'  => 'textarea'
                 ),
                 array(
                     'name'  => 'Helpdesk button text',
                     'id'    => $prefix . 'open_call_helpdesk_button_text',
                     'type'  => 'text'
                 ),
                 array(
                     'name'  => 'Helpdesk button link',
                     'id'    => $prefix . 'open_call_helpdesk_button_href',
                     'type'  => 'url'
                 )
             )
         );
     }

    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'register_meta_boxes');







function tags_filter( $tag_query ) {
    $tax = 'post_tag';
    $terms = get_terms( $tax );
    $count = count( $terms );

    if ( $count > 0 ): ?>
        <div class="post-tags">
            <?php
            foreach ( $terms as $term ) {
                $term_link = get_term_link( $term, $tax );

                echo '<a href="' . $term_link . '" class="tax-filter ';
                if($tag_query == $term->slug){ echo 'highlight';}
                echo '" title="' . $term->slug . '">' . $term->name . '</a> ';
            } ?>
        </div>
    <?php endif;
}

function city_filter() {
    $tax = 'city';
    $terms = get_terms( $tax );
    $count = count( $terms );

    if ( $count > 0 ): ?>
            <?php
            foreach ( $terms as $term ) {
                $term_link = get_term_link( $term, $tax );

                echo '<div class="pure-u-1-1 pure-u-md-1-4"><div class="city-filter-tab"><a href="' . '" class="city-filter" title="' . $term->slug . '">' . $term->name . '</a></div></div> ';
            } ?>
    <?php endif;
}


function city_homepage_filter($currentcity) {
    $tax = 'city';
    $terms = get_terms( $tax );
    $count = count( $terms );

    if ( $count > 0 ): ?>
        <?php
        foreach ( $terms as $term ) {
            $term_link = get_term_link( $term, $tax );
            echo '<li><a href="'. home_url('cities').'/'.$term->slug.'"';
            if($currentcity == $term->slug){
                echo 'class="active"';
            };
            echo '>'.$term->name .'</a></li>';
            //echo '<div class="pure-u-1-1 pure-u-md-1-4"><div class="city-filter-tab"><a href="' . '" class="city-filter" title="' . $term->slug . '">' . $term->name . '</a></div></div> ';

        } ?>
    <?php endif;
}




function ajax_filter_posts_scripts() {
    // Enqueue script
    wp_localize_script( 'organicity', 'afp_vars', array(
            'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
            'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
        )
    );
}
add_action('wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100);


// Script for getting posts
function ajax_filter_get_posts() {

    $event_template = false;



    // Verify nonce
    if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
        die('Permission denied');



    if($_POST['postType']){
        $postType = $_POST['postType'];
    }else{
        $postType = 'post';
    }



    // WP Query
    $args = array(
        'post_type' => $postType,
    );


    if(array_key_exists('taxonomy', $_POST) && $_POST['taxonomy']){
        $args['tag'] = $_POST['taxonomy'];

    }else if(array_key_exists('city', $_POST) && $_POST['city']){
    $event_template = true;
        if($_POST['city'] == 'all'){
            $args['city'] = "";
        }else {
            $args['city'] = $_POST['city'];
        }
    }


    if(array_key_exists('eventFilter', $_POST) && $_POST['eventFilter']){
        $args['meta_key'] = 'organicity_event_date';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = DESC;

    }




    $query = new WP_Query( $args );

    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();


    if(!$event_template):?>

        <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-2 pure-u-lg-1-3">
            <?php get_template_part('partials/blogcard'); ?>
        </div>

    <?php else: ?>
        <div class="pure-u-1-1">
            <div class="event">
                <div class="event__meta">
                    <span class="date"><?php echo date("d.m.Y", strtotime(rwmb_meta('organicity_event_date'))); ?></span>

                </div>
                <div class="event__content">

                    <h4><?php the_title(); ?></h4>

                    <h5><?php echo rwmb_meta('organicity_event_location')?></h5>


                    <?php the_content(__('Read more'));?>
                </div>
                <div class="event__right">
                    <a class="button button--external " href="<?php echo rwmb_meta('organicity_event_url'); ?>" target="_blank">
                        Event Details
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php endwhile; ?>
    <?php else: ?>
        <h2>No posts found</h2>
    <?php endif;

    die();
}

add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');
