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

                    <?php if (get_option('organicity_url_facebook')):?>
                    <div class="pure-u-1-3 pure-u-md-1-6 socialMediaIcon">
                        <a href="<?php echo get_option('organicity_url_facebook'); ?>">
                            <img src="<?php bloginfo('template_directory'); ?>/images/icon-facebook.png" alt="">
                            <div class="socialMediaIconLabel"><span class="offscreen">Facebook</span> Global</div>
                        </a>
                    </div>
                    <?php endif;?>

                    <?php if (get_option('organicity_url_facebook_aarhus')):?>
                        <div class="pure-u-1-3 pure-u-md-1-6 socialMediaIcon">
                            <a href="<?php echo get_option('organicity_url_facebook_aarhus'); ?>">
                                <img src="<?php bloginfo('template_directory'); ?>/images/icon-facebook.png" alt="">
                                <div class="socialMediaIconLabel"><span class="offscreen">Facebook</span> Aarhus</div>
                            </a>
                        </div>
                    <?php endif;?>

                    <?php if (get_option('organicity_url_facebook_london')):?>
                    <div class="pure-u-1-3 pure-u-md-1-6 socialMediaIcon">
                        <a href="<?php echo get_option('organicity_url_facebook_london'); ?>">
                            <img src="<?php bloginfo('template_directory'); ?>/images/icon-facebook.png" alt="">
                            <div class="socialMediaIconLabel"><span class="offscreen">Facebook</span> London</div>
                        </a>
                    </div>
                    <?php endif;?>

                    <?php if (get_option('organicity_url_facebook_santander')):?>
                    <div class="pure-u-1-3 pure-u-md-1-6 socialMediaIcon">
                        <a href="<?php echo get_option('organicity_url_facebook_santander'); ?>">
                            <img src="<?php bloginfo('template_directory'); ?>/images/icon-facebook.png" alt="">
                            <div class="socialMediaIconLabel"><span class="offscreen">Facebook</span> Santander</div>
                        </a>
                    </div>
                    <?php endif;?>

                    <?php if (get_option('organicity_url_twitter')):?>
                    <div class="pure-u-1-3 pure-u-md-1-6 socialMediaIcon">
                        <a  href="<?php echo get_option('organicity_url_twitter'); ?>">
                            <img src="<?php bloginfo('template_directory'); ?>/images/icon-twitter.png" alt="">
                            <div class="socialMediaIconLabel">Twitter</div>
                        </a>
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

                <p class="eu-disclosure">
                    <?php _e("This project has received funding from the European Union's Horizon 2020 research and innovation program under the grant agreement No. 645198", 'organicity') ?>
                </p>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>
    <div class="section section--copyright">
        <div class="pure-g">
            <div class="pure-u-1-1">&copy; Organicity 2015</div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<script src="http://localhost:35729/livereload.js"></script>
</body>
</html>
