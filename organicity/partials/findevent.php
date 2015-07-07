<?php if (rwmb_meta('organicity_homepage_events_section_visible')) : ?>
    <div class="section section--findevents">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-1-2">
                <h3><?php echo rwmb_meta('organicity_homepage_events_section_title'); ?></h3>
                <?php echo rwmb_meta('organicity_homepage_events_section_content'); ?>
                <a class="button button--full button--external" href="<?php echo get_post_type_archive_link('event'); ?>">
                    <?php echo rwmb_meta('organicity_homepage_events_link_text'); ?>
                </a>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>
<?php endif; ?>