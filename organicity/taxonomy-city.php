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
            <?php if (have_posts()): while (have_posts()) : the_post();
                if ( 'event' == get_post_type() ):?>

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
                                <a class="button " href="<?php echo rwmb_meta('organicity_event_url'); ?>" target="_blank">
                                    Event Details
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif?>
            <?php endwhile; endif; ?>
            <!-- end of the loop -->
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
