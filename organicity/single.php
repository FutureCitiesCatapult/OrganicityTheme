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
                                if ($city_terms) {
                                    echo "<span class='icon-location'>";
                                    $city_count = 0;
                                       foreach ($city_terms as $thisslug) {
                                           echo '<a href="' . get_site_url() . '/cities/' . $thisslug->slug . '">';
                                           if($city_count >0){ echo ', ';}
                                           echo $thisslug->name . '</a>';
                                           $city_count = $city_count +1;
                                    }
                                    echo "</span>";
                                }


                                //the_tags('',', ');

                                $posttags = get_the_tags();
                                if ($posttags) {
                                    echo "<span class='icon-tags'>";
                                    $postcount = 0;
                                    foreach($posttags as $tag) {
                                        echo '<a href="' . get_site_url() . '/blog/?tag=' . $tag->slug . '">';
                                        if($postcount > 0){ echo ', ';}
                                        echo $tag->name . '</a>';
                                        $postcount = $postcount + 1;
                                    }
                                    echo "</span>";
                                }
                                ?>
                            </p>

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




<?php ////TO DO - CHANGE THE QUERY TO PULL IN 3 RELATED BLOG POSTS OR EVENTS ?>
<!--        --><?php //if (have_posts()):?>
<!--            <div class="section section--blog section--wide">-->
<!--                <h2>--><?php //_e('Related', 'organicity' ); ?><!--</h2>-->
<!--                <div class="pure-g tagged-posts">-->
<!---->
<!--                    --><?php //while (have_posts()) : the_post(); ?>
<!--                        <div class="pure-u-1-1 pure-u-sm-1-2 pure-u-md-1-2 pure-u-lg-1-3">-->
<!--                            --><?php //get_template_part('partials/blogcard'); ?>
<!--                        </div>-->
<!--                    --><?php //endwhile; ?>
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        --><?php //endif; ?>




        <?php get_template_part('partials/signup'); ?>


    </main>
<?php get_footer(); ?>