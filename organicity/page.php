<?php
/**
 * The template file for pages
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
                <h2><?php the_title(); ?></h2>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>

    <div class="section section--page">
        <div class="pure-g">
            <div class="pure-u-1-8"></div>
            <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-6-8 section--page--content">
                <div class="section--page--content-wrapper">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
            <div class="pure-u-1-8">
            </div>
        </div>
    </div>


</main>
<?php get_footer(); ?>
