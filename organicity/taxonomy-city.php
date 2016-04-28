<?php
/**
 * Cities taxonomy landing page
 * Shows all content assigned to a particular city
 * Rendered when calling /cities/city_name URLs
 *
 * @package Organicity
 * @since 0.1.0
 */


get_header(); ?>
<?php

$city_name = get_queried_object()->name;
$queried_object = get_queried_object();

?>

<main role="main">

    <div class="section section--title">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-2">
                <h2><?php echo $city_name; ?></h2>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>


    <div class="section section--jumbo">
        <div class="jumbo-image-wrapper">
            <?php do_action('taxonomy_image_plugin_print_image_html','large'); ?>
        </div>
    </div>


    <div class="section section--page section--city">
        <div class="pure-g">
            <div class="pure-u-1-8"></div>
            <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-6-8 section--page--content">
                <div class="section--page--content-wrapper l-body-typography">
                    <?php echo $queried_object->description;?>
                </div>
            </div>
            <div class="pure-u-1-8">
            </div>
        </div>
    </div>



    <div class="section section--events section--city-subtitle">
        <h2><?php echo $city_name; _e(' Events', 'organicity' ); ?></h2>

        <div class="pure-g">
            <?php render_events($city_name); ?>
        </div>
    </div>




    <div class="section section--blog section--wide section--city-subtitle">
        <h2><?php _e('Blog', 'organicity' ); ?></h2>
        <div class="pure-g tagged-posts">
            <?php get_template_part('partials/loop'); ?>
        </div>
    </div>



</main>
<?php get_footer(); ?>
