<?php
/**
 * The template for displaying the footer.
 *
 * @package Organicity
 * @since 0.1.0
 */
?>

<footer>
    <div class="section section--footer">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-1-2">

                <h3>Follow us</h3>

                <div class="pure-g socialMedia">


                    <?php if (get_option('organicity_url_facebook') !== ""):?>
                    <div class="pure-u-1-3 pure-u-md-1-6 socialMediaIcon">
                        <a href="<?php echo get_option('organicity_url_facebook'); ?>"><i class="icon-facebook-squared"></i></a>
                    </div>
                    <?php endif;?>


                    <?php if (get_option('organicity_url_twitter') !== ""):?>
                    <div class="pure-u-1-3 pure-u-md-1-6 socialMediaIcon">
                        <a href="<?php echo get_option('organicity_url_twitter'); ?>"><i class="icon-twitter"></i></a>
                    </div>
                    <?php endif;?>

                    <?php if (get_option('organicity_url_slideshare') !== ""):?>
                    <div class="pure-u-1-3 pure-u-md-1-6 socialMediaIcon">
                    <a href="<?php echo get_option('organicity_url_slideshare'); ?>"><i class="icon-slideshare"></i></a>
                    </div>
                    <?php endif;?>

                    <?php if (get_option('organicity_url_linkedin') !== ""):?>
                    <div class="pure-u-1-3 pure-u-md-1-6 socialMediaIcon">
                    <a href="<?php echo get_option('organicity_url_linkedin'); ?>"><i class="icon-linkedin-squared"></i></a>
                    </div>
                    <?php endif;?>

                    <?php if (get_option('organicity_url_instagram') !== ""):?>
                    <div class="pure-u-1-3 pure-u-md-1-6 socialMediaIcon">
                    <a href="<?php echo get_option('organicity_url_instagram'); ?>"><i class="icon-instagramm"></i></a>
                    </div>
                    <?php endif;?>

                    <?php if (get_option('organicity_url_youtube') !== ""):?>
                    <div class="pure-u-1-3 pure-u-md-1-6 socialMediaIcon">
                    <a href="<?php echo get_option('organicity_url_youtube'); ?>"><i class="icon-youtube-play"></i></a>
                    </div>
                    <?php endif;?>



</div>
                <hr/>
                <div class="logos">
                    <img
                        class=""
                        src="<?php bloginfo('template_directory'); ?>/images/logo_eu.png"
                        alt="<?php _e('European Commission', 'organicity'); ?>"
                        />
                </div>

            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>
    <div class="section section--copyright">
        <div class="pure-g">
<!--            <div class="pure-u-1-4"></div>-->
            <div class="pure-u-1-1">&copy; Organicity 2015</div>
<!--            <div class="pure-u-1-4"></div>-->
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<script src="http://localhost:35729/livereload.js"></script>
</body>
</html>
