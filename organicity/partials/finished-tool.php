<div class="finished-tool__background">
    <div id="tool_<?php the_id() ?>" class="section finished-tool">
        <div class="finished-tool__graphic-wrapper">
            <img class="finished-tool__graphic" src="<?= wp_get_attachment_url(rwmb_meta('organicity_tool_graphic_big')) ?>" alt="" />
        </div>
        <h2 class="finished-tool__heading"><?php the_title() ?></h2>
        <div class="finished-tool__description">
            <?= rwmb_meta('organicity_tool_short_description') ?>
        </div>
        <div class="finished-tool__actions button-pair">
            <div class="pure-g">
                <div class="pure-u-1-1 pure-u-sm-1-2 button-pair__left">
                    <a href="<?= rwmb_meta('organicity_tool_link_href') ?>" class="button button-pair__button button--external" target="_blank" data-internal-scroll-focus-target>
                        <span class="icon-external"></span>
                        Open tool
                        <span class="offscreen">(opens in new tab)</span>
                    </a>
                </div>
                <div class="pure-u-1-1 pure-u-sm-1-2 button-pair__right">
                    <a href="<?php the_permalink() ?>" class="button button-pair__button button--external">View details</a>
                </div>
            </div>
        </div>
    </div>
</div>
