<?php
/**
 * The main template file
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

<?php

$faqs_query_args = array(
    'post_type'      => 'faq',
    'posts_per_page' => -1
);
$faqs_query = new WP_Query( $faqs_query_args );

?>

<main role="main">

    <div class="section section--blog section--wide">
        <h2><?php _e( 'Open Call', 'organicity' ); ?></h2>
        <h3><?php _e( 'FAQs', 'organicity' ); ?></h3>

        <div class="pure-g">
            <!-- loop to show all FAQs -->
            <?php if ( $faqs_query->have_posts() ) : ?>

            <div class="blog-large home">
                <?php while ( $faqs_query->have_posts() ) : $faqs_query->the_post(); ?>
                    <?php get_template_part('partials/faq'); ?>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>

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
