<?php ?>
    <!-- TODO: work on responsive breakdown of article 4->2->1 -->


<!--    <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-2 pure-u-lg-1-4 item">-->
        <div class="feature">
            <div class="feature__meta">
                <span class="date"><?php the_time('j M Y'); ?></span>
                <span class="tags">
                  <?php
                  /*
                  * Pluck one city for the current post
                  */
                  if (has_term(null, 'city')) {
                      $first_term = wp_get_post_terms($post->ID, array('city'))[0];
                      if ($first_term) : ?>
                          <a class="icon-location" href="<?php echo get_term_link($first_term); ?>">
                              <?php echo $first_term->name; ?>
                          </a>
                      <?php endif;
                  }?>
                </span>
            </div>
            <a class="feature__wrapper" href="<?php the_permalink(); ?>">
                <div class="feature__description">
                    <?php the_title(); ?>
                </div>
                <div class="feature__image flip">
                    <?php the_post_thumbnail(array(450,250), array('class' => 'flip')); ?>
                </div>
            </a>
        </div>
<!--    </div>-->

<?php ?>