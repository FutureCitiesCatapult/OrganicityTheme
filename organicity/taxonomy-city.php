<?php
/**
 * Cities taxonomy landing page
 * Shows all content assigned to a particular city
 * Rendered when calling /cities/city_name URLs
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>
<?php
  
  $city_name = get_queried_object()->name;

?>

<main role="main">
<h2><?php echo $city_name; ?></h2>

Posts and events from <?php echo $city_name; ?>:
<?php get_template_part('loop'); ?>

</main>
<?php get_footer(); ?>
