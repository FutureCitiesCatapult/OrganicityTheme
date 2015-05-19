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
    <div class="pure-u-1-2">

      <h3>Follow us</h3>

        <div class="socialMedia">

            <a href="<?php echo get_option('organicity_url_facebook'); ?>"><i class="icon-facebook-squared"></i></a>
            <a href="<?php echo get_option('organicity_url_twitter'); ?>"><i class="icon-twitter"></i></a>
            <a href="<?php echo get_option('organicity_url_slideshare'); ?>"><i class="icon-slideshare"></i></a>
            <a href="<?php echo get_option('organicity_url_linkedin'); ?>"><i class="icon-linkedin-squared"></i></a>
            <a href="<?php echo get_option('organicity_url_instagram'); ?>"><i class="icon-instagramm"></i></a>
            <a href="<?php echo get_option('organicity_url_youtube'); ?>"><i class="icon-youtube-play"></i></a>
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
      <div class="pure-u-1-4"></div>
      <div class="pure-u-1-2 pure-u-lg-1-1">&copy; Organicity 2015</div>
      <div class="pure-u-1-4"></div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
<script src="http://localhost:35729/livereload.js"></script>
</body>
</html>
