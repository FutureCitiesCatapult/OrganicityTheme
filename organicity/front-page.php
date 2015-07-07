<?php
/**
 * The main template file
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

    <div class="section section--blog section--wide">
        <h2><?php _e( 'Blog', 'organicity' ); ?></h2>

        <div class="pure-g">
            <!-- custom loop to show latest 4 posts -->
            <?php if ( $posts_query->have_posts() ) : ?>

            <div class="owl-carousel owl-theme" id="owl-demo">
                <?php while ( $posts_query->have_posts() ) : $posts_query->the_post();?>
                    <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-2 pure-u-lg-1-4 item">
                    <?php get_template_part('partials/blogcard'); ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>


            <div class="blog-large home">
                <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
                    <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-2 pure-u-lg-1-4 item">
                        <?php get_template_part('partials/blogcard'); ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>

        </div>

        <div class="pure-g">
            <div class="pure-u-1-3 pure-u-lg-1-4"></div>
            <!-- link to blog -->
            <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-1-2">
                <a class="button button--full button--external" href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php _e('Show more', 'organicity'); ?></a>
            </div>
            <div class="pure-u-1-3 pure-u-lg-1-4"></div>
            <?php else : ?>
                <p><?php _e( 'No posts to show.', 'organicity' ); ?></p>
            <?php endif; ?>
        </div>
    </div>


    <div id="main" class="section section--main">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-1-2">
                <?php the_content(); ?>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>

    <?php get_template_part('partials/findevent'); ?>

    <?php get_template_part('partials/signup'); ?>

</main>
<?php get_footer(); ?>
