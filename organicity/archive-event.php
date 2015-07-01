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
    'post_type'      => 'post',
    'posts_per_page' => 4
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


<!--    <div id="filter-menu">--><?php //city_filter() ?><!--</div>-->


    <div class="section section--events--city-filter">
        <div class="pure-g">
            <div class="pure-u-1-1 pure-u-md-1-4">
                <div class="city-filter-tab">
                    <a href="">All</a>
                </div>
            </div>
            <?php city_filter() ?>
<!--            <div class="pure-u-1-1 pure-u-md-1-4">-->
<!--                <div class="city-filter-tab">-->
<!--                    <a href="">Aarhus</a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="pure-u-1-1 pure-u-md-1-4">-->
<!--                <div class="city-filter-tab">-->
<!--                    <a href="">London</a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="pure-u-1-1 pure-u-md-1-4">-->
<!--                <div class="city-filter-tab">-->
<!--                    <a href="">Santander</a>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>



    <div class="section section--events">
        <div class="pure-g tagged-events">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

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

    <?php
    $frontpage_id = get_option('page_on_front');

    if (rwmb_meta('organicity_homepage_signup_section_visible',[],$frontpage_id)) : ?>
        <div class="section section--signup">
            <div class="pure-g">
                <div class="pure-u-1-4"></div>
                <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-1-2">
                    <h3><?php echo rwmb_meta('organicity_homepage_signup_section_title',[],$frontpage_id); ?></h3>
                    <?php echo rwmb_meta('organicity_homepage_signup_section_content',[],$frontpage_id); ?>
                    <form class="pure-form pure-g">
                        <div class="pure-u-2-3 pure-u-md-3-4">
                            <input class="" type="email" placeholder="<?php echo rwmb_meta('organicity_homepage_signup_field_placeholder_text',[],$frontpage_id); ?>">
                        </div>
                        <div class="pure-u-1-3 pure-u-md-1-4">
                            <button type="submit" class="button button--bordered button--internal">
                                <?php echo rwmb_meta('organicity_homepage_signup_button_text',[],$frontpage_id); ?>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="pure-u-1-4"></div>
            </div>
        </div>
    <?php endif; ?>

</main>
<?php get_footer(); ?>
