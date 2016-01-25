<?php
/**
 * The template file for Event page
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

    <main role="main">
        <div class="section section--article">
            <div class="pure-g">
                <div class="pure-u-1-8"></div>
                <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-6-8 section--article--content">
                    <div class="section--article--content-wrapper l-body-typography">
                        <!-- WordPress Loop -->
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <div class="entry <?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>">
                            <span class="date"><?php echo date("d.m.Y", strtotime(rwmb_meta('organicity_event_date'))); ?></span>
                            <h1><?php the_title(); ?></h1>

                            <p class="blogtags">
                                <?php echo rwmb_meta('organicity_event_location')?>
                            </p>
                            <hr/>

                            <?php
                            if(has_post_thumbnail()){
                                the_post_thumbnail( 'instance-name' );
                            }else{

                            }
                            ?>

                            <?php the_content(__('Read more'));?>
                            <hr/>
                            <a class="button button--full button--external" href="<?php echo rwmb_meta('organicity_event_url'); ?>" target="_blank">
                                Event Details
                            </a>



                            <?php endwhile; else: ?>

                                <p> <?php _e('Sorry, no events matched your criteria.'); ?> </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- End WordPress Loop -->

                </div>

                <div class="pure-u-1-8"></div>
            </div>
        </div>

        <?php get_template_part('partials/signup'); ?>


    </main>
<?php get_footer(); ?>
