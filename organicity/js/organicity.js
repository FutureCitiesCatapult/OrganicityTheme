/*! Organicity - v0.1.0 - 2015-06-08
 * http://www.organicity.eu
 * Copyright (c) 2015 Future Cities Catapult */
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
});
