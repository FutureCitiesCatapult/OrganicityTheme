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
    'post_type' => 'post'
  );
  $posts_query = new WP_Query( $query_args );

?>

<main role="main">
  <h1><?php _e( 'Blog', 'organicity' ); ?></h1>
  <?php //get_template_part('loop'); ?>

  <?php if ( $posts_query->have_posts() ) : ?>

  	<!-- pagination here -->

  	<!-- the loop -->
  	<?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
  		<h2><?php the_title(); ?></h2>
  	<?php endwhile; ?>
  	<!-- end of the loop -->

  	<!-- pagination here -->



  <?php else : ?>
  	<p><?php _e( 'No posts to show.' ); ?></p>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>

</main>
<?php get_footer(); ?>
