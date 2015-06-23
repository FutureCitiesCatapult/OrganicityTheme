<?php
/**
 * The Events template file
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
        <h2><?php _e( 'Events', 'organicity' ); ?></h2>
      </div>
      <div class="pure-u-1-4"></div>
    </div>
  </div>

  <div class="section section--blog">

    <div class="pure-g">

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

      <!-- TODO: work on responsive breakdown of article 4->2->1 -->
      <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-3 pure-u-lg-1-4">
        <div class="feature">
          <div class="feature__meta">
            <span class="date"><?php echo date("d.m.Y", strtotime(rwmb_meta('organicity_event_date'))); ?></span>

          </div>
          <a class="feature__description" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
          <a class="feature__image" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(null, array('class' => 'pure-img')); ?>
          </a>
        </div>
      </div>

    <?php endwhile; endif; ?>
    <!-- end of the loop -->
    </div>
  </div>

    <?php
    $frontpage_id = get_option('page_on_front');

    if (rwmb_meta('organicity_homepage_signup_section_visible',[],$frontpage_id)) : ?>
        <div class="section section--signup">
            <div class="pure-g">
                <div class="pure-u-1-4"></div>
                <div class="pure-u-1-2">
                    <h3><?php echo rwmb_meta('organicity_homepage_signup_section_title',[],$frontpage_id); ?></h3>
                    <?php echo rwmb_meta('organicity_homepage_signup_section_content',[],$frontpage_id); ?>
                    <form class="pure-form">
                        <fieldset>
                            <input class="" type="email" placeholder="<?php echo rwmb_meta('organicity_homepage_signup_field_placeholder_text',[],$frontpage_id); ?>">
                            <button type="submit" class="button button--bordered button--internal">
                                <?php echo rwmb_meta('organicity_homepage_signup_button_text',[],$frontpage_id); ?>
                            </button>
                        </fieldset>
                    </form>
                </div>
                <div class="pure-u-1-4"></div>
            </div>
        </div>
    <?php endif; ?>

</main>
<?php get_footer(); ?>
