<?php
/**
 * The blog template file
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header();



$query_args = array(
    'post_type'      => 'post',
    'posts_per_page' => -1
);



$tag_query = get_query_var('tag');
$tag_present = false;
if(get_query_var('tag')) {
    $query_args['tag'] = get_query_var('tag');
    $tag_present = true;
}


$posts_query = new WP_Query( $query_args );

?>

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
                <button href="" id="filter-menu-button"
                    <?php if($tag_present){ echo ' class="active"';} ?>
                    ><?php ($tag_present ? _e( 'Reset', 'organicity' ):_e( 'Filter', 'organicity' )); ?></button>



            </div>
            <div class="pure-u-1-4"></div>
        </div>
        <div id="filter-menu" <?php if($tag_present){ echo ' class="active"';} ?>>
            <?php tags_filter($tag_query) ?></div>
    </div>

    <div class="section section--blog section--wide">
        <div class="tagged-posts-wrapper">
        <div class="pure-g tagged-posts">
            <?php if ($posts_query->have_posts()): while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-2 pure-u-lg-1-3">
                    <?php get_template_part('partials/blogcard'); ?>
                </div>
            <?php endwhile; ?>
        </div>
            </div>

        <div class="pure-g">
            <div class="pure-u-1-3 pure-u-lg-1-4"></div>
            <!-- link to blog -->
            <div class="pure-u-1-1 pure-u-md-1-3 pure-u-lg-1-2">

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
