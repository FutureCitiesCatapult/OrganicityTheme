<?php
/**
 * The FAQs template file
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

<?php
$cargs = array(
        'child_of'      => 0,
        'orderby'       => 'name',
        'order'         => 'ASC',
        'hide_empty'    => 1,
        'taxonomy'      => 'faq_group', //change this to any taxonomy
    );
?>

<main role="main" id="main">

    <div class="section section--title">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-2">
                <h2><?php _e( 'Frequently Asked Questions', 'organicity' ); ?></h2>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>

    <div class="section section--faqs">
        <div class="pure-g">
            <div class="pure-u-1-8"></div>
            <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-6-8 section--page--content">
                <?php foreach (get_categories($cargs) as $tax) :
                    $args = array(
                            'post_type'         => 'faq',
                            'post_status'       => 'publish',
                            'posts_per_page'    => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy'  => 'faq_group',
                                    'field'     => 'slug',
                                    'terms'     => $tax->slug
                                )
                            )
                        );

                    $group_faqs = new WP_Query($args);
                    if ( $group_faqs->have_posts() ) : ?>
                        <div class="faq-group">
                            <h3 class="faq-group__heading"><?php echo $tax->name; ?></h3>
                            <?php while ( $group_faqs->have_posts() ) : $group_faqs->the_post(); ?>
                                <?php get_template_part('partials/faq'); ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="pure-u-1-8"></div>
            </div>
        </div>
    </div>

    <?php wp_reset_query(); ?>

    <?php get_template_part('partials/findevent'); ?>

    <?php get_template_part('partials/signup'); ?>

</main>
<?php get_footer(); ?>
