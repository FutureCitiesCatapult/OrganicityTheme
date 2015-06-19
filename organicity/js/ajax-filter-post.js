//jQuery(document).ready(function($) {
//    $('.tax-filter').click( function(event) {
//
//        // Prevent defualt action - opening tag page
//        if (event.preventDefault) {
//            event.preventDefault();
//        } else {
//            event.returnValue = false;
//        }
//
//        // Get tag slug from title attirbute
//        var selecetd_taxonomy = $(this).attr('title');
//
//    });
//});


//jQuery(document).ready(function($) {
//
//    Object.size = function(obj) {
//        var size = 0, key;
//        for (key in obj) {
//            if (obj.hasOwnProperty(key)) size++;
//        }
//        return size;
//    };
//
//    var selectedTags = {};
//
//
//    $('.tax-filter').click( function(event) {
//
//        // Prevent default action - opening tag page
//        if (event.preventDefault) {
//            event.preventDefault();
//        } else {
//            event.returnValue = false;
//        }
//
//        var tagClicked = $(this).attr('title');
//        $(this).toggleClass('highlight');
//
//        if(tagClicked in selectedTags){
//            delete selectedTags[tagClicked];
//        }
//        else{
//            selectedTags[tagClicked] = true;
//        }
//
//
//        var selected_taxonomy = "";
//        var count = 0;
//
//        for(tag in selectedTags){
//            if(count==0){
//                selected_taxonomy = tag;
//            }else {
//                selected_taxonomy = selected_taxonomy + ',' + tag;
//            }
//            count = count+1;
//        }
//
//       // console.log(selected_taxonomy);
//
//        // Get tag slug from title attirbute
//       // var selected_taxonomy = $(this).attr('title')+',iot';
//
//        // After user click on tag, fade out list of posts
//        $('.tagged-posts').fadeOut();
//
//        data = {
//            action: 'filter_posts', // function to execute
//            afp_nonce: afp_vars.afp_nonce, // wp_nonce
//            taxonomy: selected_taxonomy, // selected tag
//        };
//
//        $.post( afp_vars.afp_ajax_url, data, function(response) {
//
//            if( response ) {
//                // Display posts on page
//                $('.tagged-posts').html( response );
//                // Restore div visibility
//                $('.tagged-posts').fadeIn();
//            };
////        });
////    });
//});