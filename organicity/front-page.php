<?php
/**
 * The main template file
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

<?php

  $query_args = array(
    'post_type'      => 'post',
    'posts_per_page' => 4
  );
  $posts_query = new WP_Query( $query_args );

?>

<main role="main">

  <div class="section section--blog section--wide">

    <h2><?php _e( 'Blog', 'organicity' ); ?></h2>

    <div class="pure-g">

      <!-- custom loop to show latest 4 posts -->
      <?php if ( $posts_query->have_posts() ) : ?>


        <!-- the loop -->
      <div class="owl-carousel owl-theme" id="owl-demo">
            <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
                <!-- TODO: work on responsive breakdown of article 4->2->1 -->


                <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-2 pure-u-lg-1-4 item">
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
                  } elseif (has_term(null, 'post_tag')) {
                      $first_term = wp_get_post_terms($post->ID, array('post_tag'))[0];
                  }
                  ?>
                    <?php if ($first_term) : ?>
                        <a href="<?php echo get_term_link($first_term); ?>">
                            <?php echo $first_term->name; ?>
                        </a>
                    <?php endif; ?>
                </span>
                        </div>
                        <a class="feature__description" href="<?php the_permalink(); ?>">
                            <!--                <div class="feature__description__wrapper">-->
                            <?php the_title(); ?>
                            <!--                    </div>-->
                        </a>
                        <a class="feature__image" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(null, array('class' => 'pure-img')); ?>
                        </a>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
        <!-- end of the loop -->
        <?php wp_reset_postdata(); ?>
        <!-- the loop -->
        <div class="blog-large home">
        <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
          <!-- TODO: work on responsive breakdown of article 4->2->1 -->



          <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-2 pure-u-lg-1-4 item">
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
                    } elseif (has_term(null, 'post_tag')) {
                      $first_term = wp_get_post_terms($post->ID, array('post_tag'))[0];
                    }
                  ?>
                  <?php if ($first_term) : ?>
                    <a href="<?php echo get_term_link($first_term); ?>">
                      <?php echo $first_term->name; ?>
                    </a>
                  <?php endif; ?>
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

        <?php endwhile; ?>
            </div>
        <!-- end of the loop -->
        <?php wp_reset_postdata(); ?>

      </div>
      <div class="pure-g">
        <div class="pure-u-1-3 pure-u-lg-1-4"></div>
        <!-- link to blog -->
        <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-1-2">
          <a class="button button--full button--external" href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php _e('Show more', 'organicity'); ?></a>
        </div>
        <div class="pure-u-1-3 pure-u-lg-1-4"></div>
        <?php else : ?>
          <p><?php _e( 'No posts to show.', 'organicity' ); ?></p>
        <?php endif; ?>
      </div>
  </div>

  <div id="main" class="section section--main">
    <div class="pure-g">
      <div class="pure-u-1-4"></div>
        <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-1-2">
<!--      <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-6-8 section--page--content">-->
<!--          <div class="section--page--content-wrapper">-->
        <?php the_content(); ?>
<!--              </div>-->
      </div>
      <div class="pure-u-1-4"></div>
    </div>
  </div>

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

  <?php if (rwmb_meta('organicity_homepage_signup_section_visible')) : ?>
  <div class="section section--signup">
    <div class="pure-g">
      <div class="pure-u-1-4"></div>
      <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-1-2">
        <h3><?php echo rwmb_meta('organicity_homepage_signup_section_title'); ?></h3>
        <?php echo rwmb_meta('organicity_homepage_signup_section_content'); ?>
        <form class="pure-form pure-g">
            <div class="pure-u-2-3 pure-u-md-3-4">
            <input class="" type="email" placeholder="<?php echo rwmb_meta('organicity_homepage_signup_field_placeholder_text'); ?>">
            </div>
            <div class="pure-u-1-3 pure-u-md-1-4">
                <button type="submit" class="button button--bordered button--internal">

              <?php echo rwmb_meta('organicity_homepage_signup_button_text'); ?>
            </button>
                </div>
        </form>
      </div>
      <div class="pure-u-1-4"></div>
    </div>
  </div>
  <?php endif; ?>

</main>
<?php get_footer(); ?>
