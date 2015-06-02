<?php
/**
 * The template file for blog posts
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

    <main role="main">
        <div class="section">
            <div class="pure-g">
                <div class="pure-u-1-4"></div>
                <div class="pure-u-1-2">

                    <!-- WordPress Loop -->
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <div class="entry <?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>">
                            <span class="date"><?php the_time('j M Y'); ?></span>
                        <h2><?php the_title(); ?></h2>
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
<!--                            </div>-->



<!--                    <span class="tags">-->
<!--                  --><?php
//                  /*
//                  * Pluck one city or regular tag for the current post
//                  */
//                  if (has_term(null, 'city')) {
//                      $city_terms = wp_get_post_terms($post->ID, array('city'));
//                  }
//                  if (has_term(null, 'post_tag')) {
//                      $post_terms = wp_get_post_terms($post->ID, array('post_tag'));
//                  }
//                  ?>
<!--                        --><?php //if ($city_terms) :
//                            foreach( $city_terms as $thisslug ):?>
<!--                                --><?php //echo $thisslug->slug . ' ';?>
<!--                            --><?php //endforeach; ?>
<!--                        --><?php //endif; ?>
<!--                        --><?php //if ($post_terms) :
//                            foreach( $post_terms as $thisslug ):?>
<!--                                --><?php //echo $thisslug->name . ' ';?>
<!--                            --><?php //endforeach; ?>
<!--                        --><?php //endif; ?>
<!--                </span>-->
<!--                    --><?php //the_content(); ?>







<!--                    </div>-->
               <?php endwhile; else: ?>

                    <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
                <?php endif; ?>
                <ul class="navigationarrows">
                    <li class="previous"><?php previous_post_link(' Previous post:<br /> &laquo; %link'); ?> <?php if(!get_adjacent_post(false, '', true)) { echo '<span>&laquo;Previous</span>'; } // if there are no older articles ?></li>
                    <li class="next"><?php next_post_link('Next post: <br /> %link &raquo;'); ?> <?php if(!get_adjacent_post(false, '', false)) { echo '<span>Next post:</span>'; } // if there are no newer articles ?> </li>
                </ul>
                            </div>
                <!-- End WordPress Loop -->

                </div>

                <div class="pure-u-1-4"></div>
            </div>
        </div>

        <div class="section">
            <div class="pure-g"></div>
        </div>

    </main>
<?php get_footer(); ?>