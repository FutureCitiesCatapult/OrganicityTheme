<?php
/**
 * The Events template file
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

<?php

//$query_args = array(
//    'post_type'      => 'event',
//    'posts_per_page' => 4
//);
//$posts_query = new WP_Query( $query_args );


$query_args = array(
    'post_type'      => 'event',
   // 'posts_per_page' => 10,
    'meta_key' => 'organicity_event_date',
    'orderby' => 'meta_value_num',
    'order' => DESC,

);
$posts_query = new WP_Query( $query_args );
?>

<main role="main">
    <div class="section section--title">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-2">
                <h2><?php _e( 'Events', 'organicity' ); ?></h2>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>


    <div class="section section--events--city-filter">
        <div class="pure-g">
            <div class="pure-u-1-1 pure-u-md-1-4">
                <div class="city-filter-tab highlight">
                    <a href=""><?php _e('All','organicity'); ?></a>
                </div>
            </div>
            <?php city_filter() ?>
        </div>
    </div>



    <div class="section section--events">
        <div class="pure-g tagged-events">
<!--            --><?php //if ( $posts_query->have_posts() ) : ?>

            <?php if ($posts_query->have_posts()): while ($posts_query->have_posts()) : $posts_query->the_post(); ?>

                <!-- TODO: work on responsive breakdown of article 4->2->1 -->
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

            <?php endwhile; endif; ?>
            <!-- end of the loop -->
        </div>
    </div>

    <?php get_template_part('partials/signup'); ?>

</main>
<?php get_footer(); ?>
