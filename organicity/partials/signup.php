<?php

$frontpage_id = get_option('page_on_front');

if (rwmb_meta('organicity_homepage_signup_section_visible',[],$frontpage_id)) : ?>
    <div class="section section--signup">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-1-2">
                <h3><?php echo rwmb_meta('organicity_homepage_signup_section_title',[],$frontpage_id); ?></h3>
                <?php echo rwmb_meta('organicity_homepage_signup_section_content',[],$frontpage_id); ?>

                <!-- Begin MailChimp Signup Form -->
                <div id="mc_embed_signup">
                    <form action="//catapult.us10.list-manage.com/subscribe/post?u=a87578bfbbd5bbac99d4c0363&amp;id=f364e5a45e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <div class="mc-field-group">
                                <label for="mce-EMAIL"></label>
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;">
                                <input type="text" name="b_a87578bfbbd5bbac99d4c0363_f364e5a45e" tabindex="-1" value="">
                            </div>
                            <div class="clear submit-button">
                                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button  button--bordered button--internal">
                            </div>
                        </div>


                    </form>
                </div>
                <!--End mc_embed_signup-->
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>
<?php endif; ?>