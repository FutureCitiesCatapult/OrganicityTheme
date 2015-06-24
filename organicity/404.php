<?php
/**
 * The template file for 404 errors
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>
    <main role="main">
        <div class="section section--title">
            <div class="pure-g">
                <div class="pure-u-1-4"></div>
                <div class="pure-u-1-2">
                    <h2><?php _e( 'Page Not Found', 'organicity' ); ?></h2>
                </div>
                <div class="pure-u-1-4"></div>
            </div>
        </div>

        <div class="section section--article">
            <div class="pure-g">
                <div class="pure-u-1-4"></div>
                <div class="pure-u-1-2">
                    <p> <?php _e( "The page you were looking for appears to have been moved, deleted or does not exist.", 'organicity' ); ?></p>
                    <a class="button button--full button--external" href="/" title="<?php _e('Organicity - link to homepage', 'organicity'); ?>">
                        <?php _e( 'Return to Home', 'organicity' ); ?>
                    </a>

                </div>
                <div class="pure-u-1-4"></div>
            </div>
        </div>

    </main>
<?php get_footer(); ?>