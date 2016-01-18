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
);
$posts_query = new WP_Query( $query_args );
?>

<main role="main">
    <div class="section section--title">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-2">
                <h2><?php _e( 'Tools', 'organicity' ); ?></h2>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>

    <hr />

    <div class="section tools-list">
        <?php if ($posts_query->have_posts()): while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
            <a href="#" class="tools-list__tool">
                <div class="tools-list__title"><?= rwmb_meta('organicity_tool_label') ?></div>
                <div class="tools-list__graphic-wrapper">
                    <img class="tools-list__graphic" src="<?= wp_get_attachment_url(rwmb_meta('organicity_tool_graphic_small_outline')) ?>" />
                    <img class="tools-list__graphic tools-list__graphic--hover" src="<?= wp_get_attachment_url(rwmb_meta('organicity_tool_graphic_small_filled')) ?>" />
                </div>
            </a>
        <?php endwhile; endif; ?>
    </div>

    <!-- this classless div is here to let us track nth-child -->
    <div>
        <?php if ($posts_query->have_posts()) : ?>
            <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                <?php if (!rwmb_meta('organicity_tool_is_full_width')) { continue; } ?>
                <div class="finished-tool__background">
                    <div class="section finished-tool">
                        <div class="finished-tool__graphic-wrapper">
                            <img class="finished-tool__graphic" src="<?= wp_get_attachment_url(rwmb_meta('organicity_tool_graphic_big')) ?>" alt="" />
                        </div>
                        <h2 class="finished-tool__heading"><?php the_title() ?></h2>
                        <div class="finished-tool__description">
                            <?= rwmb_meta('organicity_tool_short_description') ?>
                        </div>
                        <div class="finished-tool__actions button-pair">
                            <div class="pure-g">
                                <div class="button-pair__left pure-u-1-2">
                                    <a href="<?= rwmb_meta('organicity_tool_link_href') ?>" class="button button-pair__button button--external" target="_blank">
                                        <span class="icon-external"></span>
                                        Open tool
                                        <span class="offscreen">(opens in new tab)</span>
                                    </a>
                                </div>
                                <div class="button-pair__right pure-u-1-2">
                                    <a href="<?php the_permalink() ?>" class="button button-pair__button button--external">View details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            <div class="tools-page__coming-soon">
                <h2 class="tools-page__coming-soon-title">
                    <?php _e( 'Coming soon', 'organicity' ); ?>
                </h3>
                <p class="tools-page__coming-soon-body">
                    Somehow this content must be made editable. Somehow this content must be made editable. Somehow this content must be made editable.
                </p>
                <hr>
            </div>

            <div class="tools-page__previews">
                <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                    <?php if (rwmb_meta('organicity_tool_is_full_width')) { continue; } ?>
                    <div class="preview-tool">
                        <div class="preview-tool__graphic-wrapper">
                            <img class="preview-tool__graphic" src="<?= wp_get_attachment_url(rwmb_meta('organicity_tool_graphic_big')) ?>" alt="" />
                        </div>
                        <h3 class="preview-tool__heading"><?php the_title() ?></h2>
                        <div class="preview-tool__description">
                            <?= rwmb_meta('organicity_tool_short_description') ?>
                        </div>
                        <div class="preview-tool__actions">
                            <a href="<?php the_permalink() ?>" class="button button--external button--small">Find out more</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>


    <?php get_template_part('partials/signup'); ?>

</main>
<?php get_footer(); ?>
