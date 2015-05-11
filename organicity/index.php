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
  <h1><?php _e( 'Blog', 'organicity' ); ?></h1>
  <?php //get_template_part('loop'); ?>

  <!-- custom loop to show latest 4 posts -->
  <?php if ( $posts_query->have_posts() ) : ?>

  	<!-- the loop -->
  	<?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
      <a href="<?php echo get_permalink(get_option('page_for_posts' )); ?>">
        <?php the_post_thumbnail(array(120,120)); ?>
        <span class="date"><?php the_time('j M Y'); ?></span>
  		  <h2><?php the_title(); ?></h2>
        <div class="tags"></div>
      </a>
  	<?php endwhile; ?>
  	<!-- end of the loop -->

    <!-- insert link to blog -->
    <a href="<?php echo get_permalink(get_option('page_for_posts' )); ?>">show more</a>

  <?php else : ?>
  	<p><?php _e( 'No posts to show.' ); ?></p>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>

  <?php the_content(); ?>

</main>
<?php get_footer(); ?>
