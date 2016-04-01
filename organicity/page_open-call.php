<?php
/**
 * Template Name: Open Call Page
 *
 * @package Organicity
 * @since 0.1.0
 */
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<main role="main">
    <div class="section rich-title">
        <div class="pure-g">
            <div class="pure-u-1-4"></div>
            <div class="pure-u-1-1 pure-u-lg-1-2">
                <h2 class="rich-title__heading">
                    <?= rwmb_meta('organicity_open_call_heading') ?>
                </h2>
                <p class="rich-title__detail">
                    <?= rwmb_meta('organicity_open_call_short_description') ?>
                </p>
                <div class="pure-g button-pair">
                    <div class="pure-u-1-1 pure-u-sm-1-2 button-pair__left">
                        <a href="<?= rwmb_meta('organicity_open_call_apply_button_href') ?>" class="button button--external button-pair__button">
                            <?= rwmb_meta('organicity_open_call_apply_button_text') ?>
                        </a>
                    </div>
                    <div class="pure-u-1-1 pure-u-sm-1-2 button-pair__right">
                        <a href="<?= rwmb_meta('organicity_open_call_download_button_href') ?>" class="button button--external button-pair__button l-button-icon">
                            <?= rwmb_meta('organicity_open_call_download_button_text') ?>
                            <span class="icon icon-download">
                                <span class="offscreen">(PDF)</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="pure-u-1-4"></div>
        </div>
    </div>

    <?php if (rwmb_meta('organicity_open_call_languages_visible')): ?>
        <div class="section language-selector">
            <div class="pure-g">
                <div class="pure-u-1-4"></div>
                <div class="pure-u-1-1 pure-u-lg-1-2">
                    <a href="<?= get_page_link(rwmb_meta('organicity_open_call_language_1_link')) ?>" class="language-selector__link <?= is_page(rwmb_meta('organicity_open_call_language_1_link')) ? 'is-active' : '' ?>">
                        <span class="offscreen">Read this page in</span>
                        <?= rwmb_meta('organicity_open_call_language_1_name') ?>
                    </a>
                    <a href="<?= get_page_link(rwmb_meta('organicity_open_call_language_2_link')) ?>" class="language-selector__link <?= is_page(rwmb_meta('organicity_open_call_language_2_link')) ? 'is-active' : '' ?>">
                        <span class="offscreen">Read this page in</span>
                        <?= rwmb_meta('organicity_open_call_language_2_name') ?>
                    </a>
                    <a href="<?= get_page_link(rwmb_meta('organicity_open_call_language_3_link')) ?>" class="language-selector__link <?= is_page(rwmb_meta('organicity_open_call_language_3_link')) ? 'is-active' : '' ?>">
                        <span class="offscreen">Read this page in</span>
                        <?= rwmb_meta('organicity_open_call_language_3_name') ?>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="section section--page">
        <div class="pure-g">
            <div class="pure-u-1-8"></div>
            <div class="pure-u-1-1 pure-u-md-1-1 pure-u-lg-6-8 section--page--content">
                <div class="section--page--content-wrapper l-body-typography">
                    <?php the_content(); ?>
                    <div class="open-call-cta">
                        <div class="pure-g button-pair">
                            <div class="pure-u-1-1 pure-u-sm-1-2 button-pair__left">
                                <a href="<?= rwmb_meta('organicity_open_call_apply_button_href') ?>" class="button button--external button-pair__button">
                                    <?= rwmb_meta('organicity_open_call_apply_button_text') ?>
                                </a>
                            </div>
                            <div class="pure-u-1-1 pure-u-sm-1-2 button-pair__right">
                                <a href="<?= rwmb_meta('organicity_open_call_download_button_href') ?>" class="button button--external button-pair__button l-button-icon">
                                    <?= rwmb_meta('organicity_open_call_download_button_text') ?>
                                    <span class="icon icon-download">
                                        <span class="offscreen">(PDF)</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pure-u-1-8"></div>
        </div>
    </div>

    <div class="section section--helpdesk">
        <div class="helpdesk__content">
            <h3 class="helpdesk__heading">
                <?= rwmb_meta('organicity_open_call_helpdesk_title') ?>
            </h3>
            <p class="helpdesk__detail">
                <?= rwmb_meta('organicity_open_call_helpdesk_description') ?>
            </p>
            <div class="helpdesk__actions">
                <a href="<?= rwmb_meta('organicity_open_call_helpdesk_button_href') ?>" class="helpdesk__button button button--bordered">
                    <?= rwmb_meta('organicity_open_call_helpdesk_button_text') ?>
                </a>
            </div>
        </div>
    </div>
</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
