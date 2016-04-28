<?php
/**
 * The Events template file
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

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
            <?php render_events(); ?>
        </div>
    </div>

    <?php get_template_part('partials/signup'); ?>

</main>
<?php get_footer(); ?>
