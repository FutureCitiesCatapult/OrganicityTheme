<?php
/**
 * The default template file
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

    </main>
<?php get_footer(); ?>