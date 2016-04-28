<div class="pure-u-1-1">
    <div class="event">
        <div class="event__meta">
            <span class="date"><?php echo date("d.m.Y", strtotime(rwmb_meta('organicity_event_date'))); ?></span>

        </div>
        <div class="event__content">

            <h4><?php the_title(); ?></h4>

            <h5><?php echo rwmb_meta('organicity_event_location')?></h5>


            <?php the_content(__('Read more'));?>
        </div>
        <div class="event__right">
            <a class="button button--external " href="<?php echo rwmb_meta('organicity_event_url'); ?>" target="_blank">
                Event Details
            </a>
        </div>
    </div>
</div>
