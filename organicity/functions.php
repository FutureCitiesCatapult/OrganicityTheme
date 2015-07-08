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

//TODO: set false for production
define( 'SCRIPT_DEBUG', true );

/**
 * Makes Organicity available for translation.
 */
function organicity_setup() {
    load_theme_textdomain( 'organicity', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'organicity_setup' );

/*
 * Add theme support for Feature Image/Post thumbnails
 */
function add_post_thumbnail_support() {
    add_theme_support('post-thumbnails');
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

//function register_city_posttype() {
//    $labels = array(
//        'name' => 'Cities',
//        'singular_name' => 'City',//,
//        'menu_name'           => __('City', 'organicity'),
//        'parent_item'          => null,
//         'parent_item_colon'   => __('Parent City:', 'organicity'),
//         'all_items'           => __('All Cities', 'organicity'),
//         'view_item'           => __('View City', 'organicity'),
//         'add_new_item'        => __('Add New City', 'organicity'),
//         'add_new'             => __('Add City', 'organicity'),
//         'edit_item'           => __('Edit City', 'organicity'),
//         'update_item'         => __('Update City', 'organicity'),
//         'search_items'        => __('Search Cities', 'organicity'),
//         'not_found'           => __('No Cities found.', 'organicity')
//    );
//    $args = array(
//        'labels'        => $labels,
//        'public'        => true,
//        'has_archive'   => true,
//        'rewrite'       => null,//array('slug' => __('cities', 'organicity'), 'with_front'  => false),
//        'menu_icon'     => 'dashicons-calendar-alt',
//        'menu_position' => 6,
//        'supports'      => array('title', 'editor', 'thumbnail')
//    );
//    register_post_type('city', $args);
//}
//add_action('init', 'register_city_posttype');


/*
 * Register a custom taxonomy for the cities
 */
function register_city_taxonomy() {
    $labels = array(
        'name' => 'Cities',
        'singular_name' => 'City',//,
        'menu_name'           => __('City', 'organicity'),
        //'parent_item'          => null,
       // 'parent_item_colon'   => __('Parent City:', 'organicity'),
       // 'all_items'           => __('All Cities', 'organicity'),
       // 'view_item'           => __('View City', 'organicity'),
       // 'add_new_item'        => __('Add New City', 'organicity'),
       // 'add_new'             => __('Add City', 'organicity'),
       // 'edit_item'           => __('Edit City', 'organicity'),
       // 'update_item'         => __('Update City', 'organicity'),
       // 'search_items'        => __('Search Cities', 'organicity'),
       // 'not_found'           => __('No Cities found.', 'organicity')
    );
    $rewrite = array(
        'slug' => 'cities',
        'with_front' => false
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => true, // false, //true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'rewrite'           => $rewrite,
        'show_ui' => true,
        'has_archive'   => true,
        //'menu_position' => 6,
        //'menu_icon'     => 'dashicons-calendar-alt',
    );
    register_taxonomy('city', array('event', 'post'), $args); //array('event', 'post'), $args);
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

//    /*
//     * Fields for the Event posttype
//     */
//    $meta_boxes[] = array(
//        'title'   => 'City details',
//        'pages'   => 'city',
//        'fields'  => array(
//            array(
//                'name'        => 'City Description',
//                'id'          => $prefix . 'city_description',
//                'type'        => 'text',
//                'size'        => 50
//            ),array(
//                'name'        => 'City Test Field',
//                'id'          => $prefix . 'city_testfield',
//                'type'        => 'text',
//                'size'        => 50
//            )    //,
////            array(
////                'name'        => 'Event date',
////                'id'          => $prefix . 'event_date',
////                'type'        => 'date',
////                'js_options'  => array(
////                    'dateFormat' => 'dd-mm-yy'
////                )
////            ),
////            array(
////                'name'        => 'Event URL',
////                'id'          => $prefix . 'event_url',
////                'type'        => 'url'
////            )
//        )
//    );

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
     * Homepage specific features
     */
    $homepage_header_fields = array(
        'title'   => 'Header anchor link',
        'pages'   => 'page',
        'fields'  => array(
            array(
                'name'  => 'Link text',
                'id'    => $prefix . 'header_anchor_link_text',
                'type'  => 'text',
                'size'  => 50
            ),
            array(
                'name'  => 'Link title attribute',
                'id'    => $prefix . 'header_anchor_link_title',
                'type'  => 'text',
                'size'  => 50
            ),
            array(
                'name'  => 'Visible',
                'id'    => $prefix . 'header_anchor_link_visible',
                'type'  => 'checkbox',
                'std'   => 1
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
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    $frontpage_id = get_option('page_on_front');

    if ($post_id == $frontpage_id) {
        $meta_boxes[] = $homepage_header_fields;
        $meta_boxes[] = $homepage_event_fields;
        $meta_boxes[] = $homepage_signup_fields;
    }

    // $meta_boxes[] = $homepage_signup_fields;

    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'register_meta_boxes');







function tags_filter() {
    $tax = 'post_tag';
    $terms = get_terms( $tax );
    $count = count( $terms );

    if ( $count > 0 ): ?>
        <div class="post-tags">
            <?php
            foreach ( $terms as $term ) {
                $term_link = get_term_link( $term, $tax );
                echo '<a href="' . $term_link . '" class="tax-filter" title="' . $term->slug . '">' . $term->name . '</a> ';
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
//    wp_register_script('afp_script', get_template_directory_uri() . '/js/ajax-filter-post.js', false, null, false);
//    wp_enqueue_script('afp_script');

    //wp_enqueue_script( 'afp_script', get_template_directory_uri() . "/js/ajax-filter-post{$postfix}.js", array('jquery'), ORGANICITY_VERSION, true );


    // wp_localize_script( 'afp_script', 'afp_vars', array(
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
        'post_type' => $postType,// 'post',
        'posts_per_page' => 10,
    );


    if($_POST['taxonomy']){
        $args['tag'] = $_POST['taxonomy'];

    }else if($_POST['city']){
    $event_template = true;
        if($_POST['city'] == 'all'){
            $args['city'] = "";
        }else {
            $args['city'] = $_POST['city'];
        }
//        // WP Query
//        $args = array(
//            //'tag' => $taxonomy,
//            'city' => $taxonomy,
//            'post_type' => $postType,// 'post',
//            'posts_per_page' => 10,
//        );
    }


    if($POST['eventFilter']){
        $args['meta_key'] = 'organicity_event_date';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = DESC;

    }





//
//
//    ?><!--  <h2>TEST --><?php //echo $taxonomy . $postType ?><!--</h2>  --><?php
//
//
//    // WP Query
//    $args = array(
//        //'tag' => $taxonomy,
//        'city' => $taxonomy,
//        'post_type' => $postType,// 'post',
//        'posts_per_page' => 10,
//    );
//
//    // If taxonomy is not set, remove key from array and get all posts
//    if( !$taxonomy ) {
//        unset( $args['tag'] );
//    }

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