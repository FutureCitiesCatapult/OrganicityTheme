// Add useragent attribute to html tag to let us css browser sniff
var doc = document.documentElement;
doc.setAttribute('data-useragent', navigator.userAgent);

jQuery(document).ready(function($) {

    // settings for the carousel on the home page
    $("#owl-demo").owlCarousel({
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true
    });

    $("#tool-image-carousel").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoHeight: true
    });


    // scrolls the page to hot links within that page
    $('a[href^="#"]').on('click', function (event) {
        var target = $($(this).attr('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000, 'swing', function() {
                if (target.is('[data-internal-scroll-focus-target]')) {
                    target.focus();
                } else {
                    target.find('[data-internal-scroll-focus-target]').focus();
                }
            });
        }
    });


    // Opens the hamburger menu
    $('a[href="#menuExpand"]').click(function(e) {
        $(".menu").toggleClass("menuOpen");
        $(".menu-wrapper").toggleClass("active");
        e.preventDefault();
    });


    // to return the size of an object (dictionary)
    Object.size = function(obj) {
        var size = 0, key;
        for (key in obj) {
            if (obj.hasOwnProperty(key)) size++;
        }
        return size;
    };


    // current selected tags
    var selectedTags = {};

    function opencloseFilterMenu(event) {
        $("#filter-menu").toggleClass("active");
        $("#filter-menu-button").toggleClass("active");
    }


    // Setting up the filter menu
    $("#filter-menu-button").click(function(e) {
        $("#filter-menu-button").html($("#filter-menu-button").html() == 'Filter' ? 'Reset':'Filter');

        // if currently open, upon clicking the filter/reset it removes all the highlights
        if($("#filter-menu").hasClass("active")){
            get_blog_posts(e);
            $(".tax-filter").removeClass("highlight");
        }
        opencloseFilterMenu(event);
    });


    $("#city-filter-menu-button").click(function(e) {
        $("#city-filter-menu-button").html($("#city-filter-menu-button").html() == 'Filter' ? 'Close':'Filter');
        $("#events--city-menu").toggleClass("active");
        $("#city-filter-menu-button").toggleClass("active");
    });


    // AJAX filter for blog posts
    function get_blog_posts(event) {
        // Prevent default action - opening tag page
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }

        var tagClicked = $(this).attr('title');
        $(this).toggleClass('highlight');

        if (typeof tagClicked !== typeof undefined && tagClicked !== false) {
            if (tagClicked in selectedTags) {
                delete selectedTags[tagClicked];
            } else {
                selectedTags[tagClicked] = true;
            }

            var selected_taxonomy = "";
            var count = 0;

            for (tag in selectedTags) {
                if (count == 0) {
                    selected_taxonomy = tag;
                } else {
                    selected_taxonomy = selected_taxonomy + ',' + tag;
                }
                count = count + 1;
            }
        }else{
            selectedTags = {};
        }

        // After user click on tag, fade out list of posts
        $('.tagged-posts').fadeOut();

        var data = {
            action: 'filter_posts', // function to execute
            afp_nonce: afp_vars.afp_nonce, // wp_nonce
            taxonomy: selected_taxonomy, // selected tag
        };

        $.post( afp_vars.afp_ajax_url, data, function(response) {

            if( response ) {
                // Display posts on page
                $('.tagged-posts').html( response );
                // Restore div visibility
                $('.tagged-posts').fadeIn();
            };
        });
    }


    // AJAX filter for blog posts
    function get_event_posts(event) {
        // Prevent default action - opening tag page
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }

        var tagClicked = $(this).attr('title');
        $(".city-filter-tab").removeClass('highlight');
        $(".city-filter").removeClass('highlight');
        if(!$(this).hasClass('highlight')){
            $(this).addClass('highlight');
        }

        var selected_taxonomy = "";

        if (typeof tagClicked !== typeof undefined && tagClicked !== false) {
            selected_taxonomy = tagClicked;
        }

        // After user click on tag, fade out list of posts, keeping the
        // height static to avoid the footer jumping in awkwardly
        $('.tagged-events').animate({opacity: 0}, 400, 'swing', function() {
            var data = {
                action: 'filter_posts', // function to execute
                afp_nonce: afp_vars.afp_nonce, // wp_nonce
                city: selected_taxonomy, // selected tag
                postType: 'event'
            };

            $.post( afp_vars.afp_ajax_url, data, function(response) {
                if( response ) {
                    // Display posts on page
                    $('.tagged-events').html( response );
                    // Restore div visibility and re-set height to auto again
                    $('.tagged-events').animate({opacity: 1}, 400, 'swing');
                };
            });
        });
    }



    $('.tax-filter').click(get_blog_posts);
    $('.city-filter').click(get_event_posts);

    $('.js-faq').each(function(i, faqElement) {
        var toggling = false,
            $faqElement = $(faqElement),
            $faqButton = $faqElement.find('.js-faq-button'),
            $faqContent = $faqElement.find('.js-faq-content');
        $faqElement.removeClass('is-open');
        $faqContent.hide();
        $faqButton.attr('aria-expanded', 'false');

        $faqElement.on('click', '.js-faq-expand-handle', function() {
            if (toggling) { return; }
            toggling = true;
            $faqContent.slideToggle(400, function() { toggling = false; });
            $faqElement.toggleClass('is-open');
            if ($faqButton.attr('aria-expanded') == 'true') {
                $faqButton.attr('aria-expanded', 'false')
            } else {
                $faqButton.attr('aria-expanded', 'true')
                $faqContent.focus();
            }
        });
    });

    $('[data-preserve-iframe-aspect-ratio] iframe').each(function(i, iframe) {
        var $iframe = $(iframe),
            naturalHeight = $iframe.prop('height'),
            naturalWidth = $iframe.prop('width'),
            currentWidth = $iframe.outerWidth();
            newHeight = naturalHeight * (currentWidth/naturalWidth);
        $iframe.css({height: newHeight});
    });

    if (window.localStorage.getItem('cookies-notice-dismissed')) {
        $('.js-cookie-notice').hide();
    }

    $('.js-dismiss-cookie-notice').click(function() {
        $('.js-cookie-notice').fadeOut();
        window.localStorage.setItem('cookies-notice-dismissed', true);
    });
});
