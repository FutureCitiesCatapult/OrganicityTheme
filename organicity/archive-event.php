<?php
/**
 * The Events template file
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

<main role="main">
  <div class="section">
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

            <span class="date"><?php echo date("d.m.Y", strtotime(rwmb_meta('organicity_event_date')); ?></span>

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

</main>
<?php get_footer(); ?>
