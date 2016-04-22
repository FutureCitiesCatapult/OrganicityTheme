<?php
/**
 * The Events template file
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

<?php



$query_args = array(
    'post_type'      => 'event',
    'meta_key' => 'organicity_event_date',
    'meta_type' => 'DATE',
    'orderby' => 'meta_value',
    'order' => 'DESC',
    'posts_per_page' => -1
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
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-2">
                <button href="" id="city-filter-menu-button"><?php _e( 'Filter', 'organicity' ); ?></button>
            </div>
            <div class="pure-u-1-4"></div>
        </div>

        <div class="pure-g" id="events--city-menu">
            <div class="pure-u-1-1 pure-u-md-1-4">
                <div class="city-filter-tab highlight">
                    <a href="" class="city-filter" title="all"><?php _e('All','organicity'); ?></a>
                </div>
            </div>
            <?php city_filter() ?>
        </div>
    </div>



    <div class="section section--events">
        <div class="pure-g tagged-events">


            <?php if ($posts_query->have_posts()): while ($posts_query->have_posts()) : $posts_query->the_post(); ?>


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

            <?php endwhile; ?>
            <?php else: ?>
                <h2>No events upcoming</h2>
            <?php endif; ?>
            <!-- end of the loop -->
        </div>
    </div>

    <?php get_template_part('partials/signup'); ?>

</main>
<?php get_footer(); ?>
