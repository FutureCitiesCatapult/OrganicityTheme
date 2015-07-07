<?php
/**
 * The blog template file
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
                <h2><?php _e( 'Blog', 'organicity' ); ?></h2>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>
    <div class="section section--filter section--wide">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-2">
                <button href="" id="filter-menu-button"><?php _e( 'Filter', 'organicity' ); ?></button>



            </div>
            <div class="pure-u-1-4"></div>
        </div>
        <div id="filter-menu"><?php tags_filter() ?></div>
    </div>

    <div class="section section--blog section--wide">

        <div class="pure-g tagged-posts">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-2 pure-u-lg-1-3">
                    <?php get_template_part('partials/blogcard'); ?>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="pure-g">
            <div class="pure-u-1-3 pure-u-lg-1-4"></div>
            <!-- link to blog -->
            <div class="pure-u-1-1 pure-u-md-1-3 pure-u-lg-1-2">
                <a class="button button--full button--external" href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php _e('Show more', 'organicity'); ?></a>
            </div>
            <div class="pure-u-1-3 pure-u-lg-1-4"></div>

            <?php else : ?>
                <p><?php _e( 'No posts to show.', 'organicity' ); ?></p>
            <?php endif; ?>

        </div>

    </div>
    </div>

</main>
<?php get_footer(); ?>
