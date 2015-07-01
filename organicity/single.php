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
                <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-6-8 section--article--content">
                    <div class="section--article--content-wrapper">
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

                            <div class="share-buttons">
                                Share
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank"  class="social-facebook"><i class="icon-facebook-squared"></i></a>
                                <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>%20<?php echo the_permalink(); ?>%20%40Organicity%5Feu" target="_blank" class="social-twitter"><i class="icon-twitter"></i></a>
                                <a href="https://plus.google.com/share?url=<?php echo the_permalink(); ?>" target="_blank"  class="social-gplus"><i class="icon-gplus"></i></a>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink(); ?>&title=<?php the_title(); ?>&source=<?php echo the_permalink(); ?>" target="_blank" class="social-linkedin" ><i class="icon-linkedin-squared"></i></a>

                            </div>


                            <?php endwhile; else: ?>

                                <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- End WordPress Loop -->

                </div>

                <div class="pure-u-1-8"></div>
            </div>
        </div>

<!--        <div class="section">-->
<!--            <div class="pure-g">-->
<!--                <div class="pure-u-1-4"></div>-->
<!--                <div class="pure-u-1-2"></div>-->
<!--                <div class="pure-u-1-4"></div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="section">-->
<!--            <div class="pure-g">-->
<!--                <div class="pure-u-1-4"></div>-->
<!--                <div class="pure-u-1-2"></div>-->
<!--                <div class="pure-u-1-4"></div>-->
<!--            </div>-->
<!--        </div>-->


        <?php
        $frontpage_id = get_option('page_on_front');

        if (rwmb_meta('organicity_homepage_signup_section_visible',[],$frontpage_id)) : ?>
            <div class="section section--signup">
                <div class="pure-g">
                    <div class="pure-u-1-4"></div>
                    <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-1-2">
                        <h3><?php echo rwmb_meta('organicity_homepage_signup_section_title',[],$frontpage_id); ?></h3>
                        <?php echo rwmb_meta('organicity_homepage_signup_section_content',[],$frontpage_id); ?>
                        <form class="pure-form pure-g">
                            <div class="pure-u-2-3 pure-u-md-3-4">
                                <input class="" type="email" placeholder="<?php echo rwmb_meta('organicity_homepage_signup_field_placeholder_text',[],$frontpage_id); ?>">

                                </div>
                            <div class="pure-u-1-3 pure-u-md-1-4">
                            <button type="submit" class="button button--bordered button--internal">
                                    <?php echo rwmb_meta('organicity_homepage_signup_button_text',[],$frontpage_id); ?>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="pure-u-1-4"></div>
                </div>
            </div>
        <?php endif; ?>



    </main>
<?php get_footer(); ?>