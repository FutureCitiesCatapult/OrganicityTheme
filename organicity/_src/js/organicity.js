/**
 * Organicity
 * http://www.organicity.eu
 *
 * Copyright (c) 2015 Future Cities Catapult
 */

// ( function( window, undefined ) {
//	'use strict';
//
//  console.log('Organicity!');
//
// } )( this );


jQuery(document).ready(function($) {
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
});
