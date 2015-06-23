<?php
/**
 * The template file for blog posts
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header();
?>

    <main role="main">
        <div class="section section--article">
            <div class="pure-g">
                <div class="pure-u-1-8"></div>
<!--                <span class="section--article--content">-->
<!--                <div class="pure-u-1-8"></div>-->
                <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-6-8 section--article--content">
                    <div class="section--article--content-wrapper">
<!--                    <div class="pure-u-1-4"></div>-->
                    <!-- WordPress Loop -->
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <div class="entry <?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>">
                            <span class="date"><?php the_time('j M Y'); ?></span>
                        <h1><?php the_title(); ?></h1>
                        <hr/>
                        <p class="blogtags">
                        <?php if (has_term(null, 'city')) {
                                                 $city_terms = wp_get_post_terms($post->ID, array('city'));
                                              }
                        if ($city_terms) :
                            foreach( $city_terms as $thisslug ):?>
                            <?php echo $thisslug->slug . ', ';?>
                            <?php endforeach; ?>
                            <?php endif;
                             the_tags('',', '); ?> </p>

                            <?php
                                if(has_post_thumbnail()){
                                    the_post_thumbnail( 'instance-name' );
                                }else{

                                }
                            ?>

                                <?php the_content(__('Read more'));?>
                            <hr/>


               <?php endwhile; else: ?>

                    <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
                <?php endif; ?>
<!--                <ul class="navigationarrows">-->
<!--                    <li class="previous">--><?php //previous_post_link(' Previous post:<br /> &laquo; %link'); ?><!-- --><?php //if(!get_adjacent_post(false, '', true)) { echo '<span>&laquo;Previous</span>'; } // if there are no older articles ?><!--</li>-->
<!--                    <li class="next">--><?php //next_post_link('Next post: <br /> %link &raquo;'); ?><!-- --><?php //if(!get_adjacent_post(false, '', false)) { echo '<span>Next post:</span>'; } // if there are no newer articles ?><!-- </li>-->
<!--                </ul>-->
                            </div>
                        </div>
                <!-- End WordPress Loop -->
<!--                    <div class="pure-u-1-4"></div>-->
                </div>
<!--                    <div class="pure-u-1-8"></div>-->
<!--                    </span>-->
                <div class="pure-u-1-8"></div>
            </div>
        </div>

        <div class="section">
            <div class="pure-g">
                <div class="pure-u-1-4"></div>
                <div class="pure-u-1-2"></div>
                <div class="pure-u-1-4"></div>
            </div>
        </div>

        <div class="section">
            <div class="pure-g">
                <div class="pure-u-1-4"></div>
                <div class="pure-u-1-2"></div>
                <div class="pure-u-1-4"></div>
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