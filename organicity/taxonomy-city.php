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
    <div class="section section--title">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-2">
                <h2><?php echo $city_name; ?></h2>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>
<!--<h2>--><?php //echo $city_name; ?><!--</h2>-->

    <div class="section section--jumbo">
<!--        <img src="" alt=""/>-->
        </div>
    <div class="section">

    </div>

    <div class="section section--events--city-filter">
        <div class="pure-g">
<!--            Posts and events from --><?php //echo $city_name; ?><!--:-->
            <?php get_template_part('loop'); ?>
            </div>
        </div>





</main>
<?php get_footer(); ?>
