<div class="faq js-faq is-open">
    <div class="faq__header js-faq-expand-handle">
        <h4 class="faq__question"><?php the_title(); ?></h4>
        <button class="faq__toggle-icon js-faq-button" aria-expanded="true" aria-controls="faq_answer_<?php the_ID() ?>">
            <span class="offscreen sr-open">Open answer</span>
            <span class="offscreen sr-close">Close answer</span>
        </button>
    </div>
    <div class="faq__content js-faq-content" id="faq_answer_<?php the_ID() ?>" role="region" tabindex="-1">
        <div class="faq__answer">
            <?php the_content() ?>
        </div>
    </div>
</div>
