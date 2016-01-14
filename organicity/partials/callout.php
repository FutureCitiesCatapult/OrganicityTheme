<?php if (rwmb_meta('organicity_callout_visible')) : ?>
    <div class="section callout">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-1-2">
                <h2 class="callout__heading">
                    <?= rwmb_meta('organicity_callout_heading') ?>
                </h2>
                <p class="callout__detail">
                    <?= rwmb_meta('organicity_callout_description') ?>
                </p>
                <div class="callout__actions">
                    <a href="<?= rwmb_meta('organicity_callout_button_href') ?>" class="button button--full button--external">
                        <?= rwmb_meta('organicity_callout_button_text') ?>
                    </a>
                </div>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>
<?php endif; ?>
