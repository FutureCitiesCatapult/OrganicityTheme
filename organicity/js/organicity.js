/*! Organicity - v0.1.0 - 2015-06-18
 * http://www.organicity.eu
 * Copyright (c) 2015 Future Cities Catapult */
// ( function( window, undefined ) {
//	'use strict';
//
//  console.log('Organicity!');
//
// } )( this );


jQuery(document).ready(function($) {

   // $("#owl-example").owlCarousel();

    $("#owl-demo").owlCarousel({

        //navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true

        // "singleItem:true" is a shortcut for:
        // items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });

    $('a[href^="#"]').on('click', function (event) {

        var target = $($(this).attr('href'));

        if (target.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });


//    $(function() {
      $("a[href=#menuExpand]").click(function(e) {
      //$("button[class=cmn-toggle-switch]").click(function(e) {
          $(".menu").toggleClass("menuOpen");
          $(".menu-wrapper").toggleClass("active");

            //$(".cmn-toggle-switch").toggleClass("active");

           // $(".menuIcon").toggleClass("active");
            e.preventDefault();
        });
//    });
 //$("#owl-example").owlCarousel();

});

