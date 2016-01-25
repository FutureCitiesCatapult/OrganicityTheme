<?php
/**
 * The template file for tools
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header();
?>

    <main role="main">
        <div class="section section--article">
            <div class="pure-g">
                <div class="pure-u-1-8"></div>
                <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-6-8 section--article--content">
                    <div class="section--article--content-wrapper l-body-typography">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <div class="tool-page">
                                <h1><?php the_title(); ?></h1>
                                <hr class="tool-page__divider">
                                <div class="tool-page__video" data-preserve-iframe-aspect-ratio>
                                    <?= wp_oembed_get(rwmb_meta('organicity_tool_video')) ?>
                                </div>
                                <div class="owl-carousel owl-theme tool-page__carousel" id="tool-image-carousel">
                                    <?php foreach (rwmb_meta('organicity_tool_images', 'type=image') as $image) : ?>
                                        <img class="tool-page__image" src="<?= $image['full_url'] ?>">
                                    <?php endforeach; ?>
                                </div>

                                <?php the_content(); ?>

                                <a href="<?= get_post_type_archive_link('tool') ?>" class="button button--full button--external">
                                    <?php _e('Back to tools', 'organicity'); ?>
                                </a>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
                <div class="pure-u-1-8"></div>
            </div>
        </div>




        <?php get_template_part('partials/signup'); ?>


    </main>
<?php get_footer(); ?>
