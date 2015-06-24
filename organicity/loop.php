



<?php

if (have_posts()): while (have_posts()) : the_post();

    if ( 'post' == get_post_type() ):?> <!-- is_singular( 'event' ) ):?>-->

    <!-- TODO: work on responsive breakdown of article 4->2->1 -->
    <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-2 pure-u-lg-1-3"> <!-- id="post-<?php the_ID(); ?>" <?php post_class(); ?>>-->
        <div class="feature">
            <div class="feature__meta">
                <span class="date"><?php the_time('j M Y'); ?></span>
            <span class="tags">
              <?php
              /*
              * Pluck one city or regular tag for the current post
              */
              if (has_term(null, 'city')) {
                  $first_term = wp_get_post_terms($post->ID, array('city'))[0];
                  if ($first_term): ?>
                      <a href="<?php echo get_term_link($first_term); ?>">
                          <?php echo $first_term->name; ?>
                      </a>
                  <?php endif;

              } elseif (has_term(null, 'post_tag')) {
                  $first_term = wp_get_post_terms($post->ID, array('post_tag'))[0];
                  if ($first_term) : ?>
                      <a href="" class="tax-filter" title="<?php echo $first_term->slug; ?>">
                          <?php echo $first_term->name; ?>
                      </a>
                  <?php endif;
              }
              ?>
            </span>
            </div>
            <a class="feature__description" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
            <a class="feature__image" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(null, array('class' => 'pure-img')); ?>
            </a>
        </div>
    </div>
        <?php endif?>

<?php endwhile; ?>
<?php else : ?>
    <p><?php _e( 'No posts to show.', 'organicity' ); ?></p>
<?php endif; ?>

