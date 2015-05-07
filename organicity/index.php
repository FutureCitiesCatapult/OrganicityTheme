<?php
/**
 * The main template file
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

<main role="main">
 <h1><?php _e( 'Latest Posts', 'organicity' ); ?></h1>
 <?php get_template_part('loop'); ?>
</main>
<?php get_footer(); ?>
