<div class="preview-tool__background">
    <div id="tool_<?php the_id() ?>" class="preview-tool">
        <div class="preview-tool__graphic-wrapper">
            <img class="preview-tool__graphic" src="<?= wp_get_attachment_url(rwmb_meta('organicity_tool_graphic_big')) ?>" alt="" />
        </div>
        <h3 class="preview-tool__heading"><?php the_title() ?></h2>
        <div class="preview-tool__description">
            <?= rwmb_meta('organicity_tool_short_description') ?>
        </div>
        <div class="preview-tool__actions">
            <a href="<?php the_permalink() ?>" class="button button--external preview-tool__action" data-internal-scroll-focus-target>
                Find out more
            </a>
        </div>
    </div>
</div>
