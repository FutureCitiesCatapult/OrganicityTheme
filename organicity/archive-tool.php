<?php
/**
 * The Tools template file
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

<?php



$query_args = array(
    'post_type'      => 'tool',
    'posts_per_page' => -1
);
$posts_query = new WP_Query( $query_args );
?>

<main role="main">
    <div class="section section--title section--title--tools-page">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-2">
                <h2><?php _e( 'Tools', 'organicity' ); ?></h2>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>

    <div class="section section--page section--tools-description">
        <div class="pure-g">
            <div class="pure-u-1-8"></div>
            <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-6-8 section--page--content">
                <div class="section--page--content-wrapper section--tools-description__content-wrapper l-body-typography">
                    <?= wpautop(get_theme_mod('tools_description_text', '')); ?>
                </div>
            </div>
            <div class="pure-u-1-8">
            </div>
        </div>
    </div>

    <div class="section tools-list">
        <?php if ($posts_query->have_posts()): while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
            <a href="#tool_<?php the_id() ?>" class="tools-list__tool">
                <div class="tools-list__title"><?= rwmb_meta('organicity_tool_label') ?></div>
                <div class="tools-list__graphic-wrapper">
                    <img class="tools-list__graphic" src="<?= wp_get_attachment_url(rwmb_meta('organicity_tool_graphic_small_outline')) ?>" />
                    <img class="tools-list__graphic tools-list__graphic--hover" src="<?= wp_get_attachment_url(rwmb_meta('organicity_tool_graphic_small_filled')) ?>" />
                </div>
            </a>
        <?php endwhile; endif; ?>
    </div>

    <?php if ($posts_query->have_posts()) : ?>
        <!-- this classless div is here to let us track nth-child -->
        <div>
            <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                <?php if (!rwmb_meta('organicity_tool_is_full_width')) { continue; } ?>
                <?php get_template_part('partials/finished-tool'); ?>
            <?php endwhile; ?>
        </div>

        <div class="tools-page__coming-soon">
            <h2 class="tools-page__coming-soon-title">
                <?php _e( 'Coming soon', 'organicity' ); ?>
            </h3>
            <div class="tools-page__coming-soon-body">
                <?= wpautop(get_theme_mod('tools_coming_soon_text', '')); ?>
            </div>
            <hr>
        </div>

        <div class="tools-page__previews">
            <div class="tools-page__preview-row">
                <?php /* We use our own counter as we can't rely on WP's post_number
                         reflecting the post's number in the list — because we're filtering
                         out tools with organicity_tool_is_full_width set */
                      $i = 0; ?>
                <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                    <?= ($i++ % 3 == 0) ?
                        '</div><div class="tools-page__preview-row">' : '' ?>
                    <?php if (rwmb_meta('organicity_tool_is_full_width')) { continue; } ?>
                    <?php get_template_part('partials/preview-tool'); ?>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>


    <?php get_template_part('partials/signup'); ?>

</main>
<?php get_footer(); ?>
