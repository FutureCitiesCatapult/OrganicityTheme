<?php
/**
 * The blog template file
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

<main role="main">
    <div class="section section--title">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-2">
                <h2><?php _e( 'Blog', 'organicity' ); ?></h2>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>
    <div class="section section--filter section--wide">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-2">
                <button href="" id="filter-menu-button"><?php _e( 'Filter', 'organicity' ); ?></button>



            </div>
            <div class="pure-u-1-4"></div>
        </div>
        <div id="filter-menu"><?php tags_filter() ?></div>
    </div>

    <div class="section section--blog section--wide">

        <div class="pure-g tagged-posts">

            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                <!-- TODO: work on responsive breakdown of article 4->2->1 -->
                <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-2 pure-u-lg-1-3">
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
                      <a class="icon-location" href="<?php echo get_term_link($first_term); ?>">
                          <?php echo $first_term->name; ?>
                      </a>
                  <?php endif;

              }
//              elseif (has_term(null, 'post_tag')) {
//                  $first_term = wp_get_post_terms($post->ID, array('post_tag'))[0];
//                  if ($first_term) : ?>
<!--                      <a href="" class="tax-filter" title="--><?php //echo $first_term->slug; ?><!--">-->
<!--                          --><?php //echo $first_term->name; ?>
<!--                      </a>-->
<!--                  --><?php //endif;
//              }
              ?>
            </span>
                        </div>
                        <a class="feature__wrapper" href="<?php the_permalink(); ?>">
                            <div class="feature__description">
                                <!--                <div class="feature__description__wrapper">-->
                                <?php the_title(); ?>
                                <!--                    </div>-->
                            </div>
                            <div class="feature__image flip">
                                <?php the_post_thumbnail(null, array('class' => 'flip')); ?>
                            </div>
                        </a>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
        <!-- end of the loop -->
        <div class="pure-g">
            <div class="pure-u-1-3 pure-u-lg-1-4"></div>
            <!-- link to blog -->
            <div class="pure-u-1-1 pure-u-md-1-3 pure-u-lg-1-2">
                <a class="button button--full button--external" href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php _e('Show more', 'organicity'); ?></a>
            </div>
            <div class="pure-u-1-3 pure-u-lg-1-4"></div>

            <?php else : ?>
                <p><?php _e( 'No posts to show.', 'organicity' ); ?></p>
            <?php endif; ?>

        </div>

    </div>
    </div>

</main>
<?php get_footer(); ?>
