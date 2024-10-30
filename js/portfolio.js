jQuery(document).ready(function($){
$(document).ready(function(){
 $("a[data-gal^='prettyPhoto[gallery]']").prettyPhoto({
   animation_speed: 'fast', 
   slideshow: 5000, 
   autoplay_slideshow: false, 
   opacity: 0.80, 
   show_title: true, 
   allow_resize: true, 
   default_width: 500,
   default_height: 344,
   counter_separator_label: '/', 
   theme: 'dark_square', 
   horizontal_padding: 20, 
   hideflash: false, 
   wmode: 'opaque', 
   autoplay: true, 
   modal: false, 
   deeplinking: true, 
   overlay_gallery: true, 
   social_tools: false
 });

});

$(window).load(function(){
 $('div#portfolio_thumbs ul li').hover(
   function(){ 
     $('div#portfolio_thumbs ul li').addClass('opactiyReduce');
     $(this).removeClass('opactiyReduce');
     return false;
   },
   function(){
     $('div#portfolio_thumbs ul li').removeClass('opactiyReduce');
     return false;
   }
 );
 function loadNextItem(){
   var source2 = $('#control_buttons a#next').attr("href");
   $('div#portfolio_item').slideUp(300, function(){
     $('div#item_container').empty();
     $('div#item_container').append('<div class="loading" style="display: none;"></div>');
     $('div.loading').slideDown(500);
     $('div#item_container').delay(2500).queue(function( nxt ) {
       $(this).load(source2, function(){
         $('#item_slider').flexslider({ controlNav: false, prevText: "<", nextText: ">" });
         $('div#portfolio_item').slideDown(500, function(){
           $('#item_video iframe').css('visibility','visible');
           $('#control_buttons a#next').click(function(){
                     loadNextItem();
                     return false;
           });
           $('#control_buttons a#prev').click(function(){
                     loadPrevItem();
                     return false;
           });
           $('#control_buttons a#close').click(function(){
                     $('div#portfolio_item').slideUp(300, function(){
                               $('div#item_container').empty();
                               $("div#filter_wrapper").slideDown(300);
                     });
           return false;
           });
         });
       });
     nxt();
     });
  });
}
     
function loadPrevItem(){
 var source3 = $('#control_buttons a#prev').attr("href");
 $('div#portfolio_item').slideUp(300, function(){
   $('div#item_container').empty();
   $('div#item_container').append('<div class="loading" style="display: none;"></div>');
   $('div.loading').slideDown(500);
   $('div#item_container').delay(2000).queue(function( nxt ) {
     $(this).load(source3, function(){
       $('#item_slider').flexslider({ controlNav: false, prevText: "<", nextText: ">" });
       $('div#portfolio_item').slideDown(500, function(){
         $('#item_video iframe').css('visibility','visible');
         $('#control_buttons a#next').click(function(){
                   loadNextItem();
                   return false;
         });
         $('#control_buttons a#prev').click(function(){
                   loadPrevItem();
                   return false;
         });
         $('#control_buttons a#close').click(function(){
                   $('div#portfolio_item').slideUp(300, function(){
                             $('div#item_container').empty();
                             $("div#filter_wrapper").slideDown(300);
                   });
         return false;
         });
       });
     });
   nxt();
   });
 });

}
$("div#portfolio_thumbs ul li a.more_info").click(function(){
 var source = $(this).attr("href");
 $('div#filter_wrapper').slideUp(300, function(){
   $('div#item_container').append('<div class="loading"></div>');
    $('html, body').animate({scrollTop: ($('#item_container').offset().top - 80)},'slow', function(){
     $('div#item_container').load(source, function(){
       $('div.loading').remove();
       $('#item_slider').flexslider({ controlNav: false, prevText: "<", nextText: ">" });
       $('div#portfolio_item').slideDown(500, function(){
         $('#item_video iframe').css('visibility','visible');
         $('#control_buttons a#next').click(function(){
                   loadNextItem();
                   return false;
         });
         $('#control_buttons a#prev').click(function(){
                   loadPrevItem();
                   return false;
         });
         $('#control_buttons a#close').click(function(){
                   $('div#portfolio_item').slideUp(300, function(){
                             $('div#item_container').empty();
                             $("div#filter_wrapper").slideDown(300);
                   });
         return false;
         });//End: click()
       });//End:slideDown()
     });//End:load()
   });//End:animate()
 });//End:slideUp

return false;
});

});

});