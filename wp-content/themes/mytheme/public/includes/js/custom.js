/**
 * Exoplanet Custom JS
 *
 * @package Exoplanet
 *
 * Distributed under the MIT license - http://opensource.org/licenses/MIT
 */

function isMobile() {
    var match = window.matchMedia || window.msMatchMedia;
    if(match) {
        var mq = match("(pointer:coarse)");
        return mq.matches;
    }
    return false;
}


jQuery(document).ready(function($){
 // Defining a function to set size for .slide and page title padding if we have a very large primary menu
    function fullscreen(){
        var exoplanetwidth = jQuery(window).width();
        var exoplanetheight = jQuery(window).height();
        exoplanetwidth = parseInt(exoplanetwidth);
        exoplanetheight = parseInt(exoplanetheight);
        console.log(exoplanetwidth);

        console.log(exoplanetheight);
        if ( exoplanetheight > 460 ) {
            console.log(1)
            var exoplanetheight2 = exoplanetheight;
        } else {
            console.log(2)
            var exoplanetheight2 = 460;
        }

        var masthead = $('#masthead').height();
        var headertitle = $('.header-title').height();
        masthead = parseInt(masthead);
        headertitle = parseInt(headertitle);

        var headerheight = masthead + headertitle + 135;

        if( $('.main-header').length ) {
            $('.main-header').css({
                'padding-top' : masthead + 'px',
                'min-height' : headerheight + 'px'
            });
        } else {
            if ( $('#home-slider-section').length ) {

            } else {
                $('.custom-post-type-header').css({
                    'padding-top' : masthead + 'px',
                    'display' : 'block'
                });
            }
        }

    }
  
    // fullscreen();

  // Run the function in case of window resize
  // jQuery(window).resize(function() {
  //     //  fullscreen();         
  //   });

});


jQuery(function($){
    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        if( scrollTop > 0 ){
            $('.menubar').addClass('scrolled');
        }else{
            $('.menubar').removeClass('scrolled');
        }
        $('.main-header').css('background-position', 'center ' + (scrollTop / 2) + 'px');
    });

    // $('.menu > ul').superfish({
    //     delay:       500,                            
    //     animation:   {opacity:'show',height:'show'},  
    //     speed:       'fast'                         
    // });

    // $('.toggle-nav').click(function(){
    //  $('#site-navigation').slideToggle('slow');
    //     $( '.menubar' ).toggleClass( "hmenu" );
    // });

    $('.vw_search-box span i').click(function(){
        $(".vw_serach_outer").slideDown(700);
    });

    $('.closepop i').click(function(){
        $(".vw_serach_outer").slideUp(700);
    });

    var habout_inner= $('.about-inner').outerHeight();
    var hwhychoose= $('.whychoose_us').outerHeight();
    if(habout_inner < hwhychoose){
        $('.whychoose_us').css({"height": habout_inner, "overflow-y": "scroll"});
    }

 //    $(window).scroll(function(){
 //    	var scrollTop = $(window).scrollTop();
 //    	if( scrollTop > 0 ){
 //    		$('.menubar').addClass('scrolled');
 //    	}else{
 //    		$('.menubar').removeClass('scrolled');
 //    	}
 //        $('.main-header').css('background-position', 'center ' + (scrollTop / 2) + 'px');
 //    });

 //    $('.menu > ul').superfish({
	// 	delay:       500,                            
	// 	animation:   {opacity:'show',height:'show'},  
	// 	speed:       'fast'                         
	// });

    // $('.toggle-nav').click(function(){
    // 	$('#site-navigation').slideToggle('slow');
    //     $( '.menubar' ).toggleClass( "hmenu" );
    // });

    $('.vw_search-box span i').click(function(){
        $(".vw_serach_outer").slideDown(700);
    });

    $('.closepop i').click(function(){
        $(".vw_serach_outer").slideUp(700);
    });

    var habout_inner= $('.about-inner').outerHeight();
    var hwhychoose= $('.whychoose_us').outerHeight();
    if(habout_inner < hwhychoose){
        $('.whychoose_us').css({"height": habout_inner, "overflow-y": "scroll"});
    }

});




/* Mobile responsive Menu*/

function openNav() {
  document.getElementById("vw_mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("vw_mySidenav").style.width = "0";
}

jQuery('document').ready(function(){
    
//   carousel-inner

  	var owl = jQuery('#vw_slider #carouselExampleIndicators .carousel-innerx');
        owl.owlCarousel({
        margin: 10,
        nav: true,
        // autoplay : true,
        lazyLoad: true,
        // autoplayTimeout: 3000,
        loop: false,
        // navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
          1000: {
            items: 1
          }
        },
        autoplayHoverPause : true,
        mouseDrag: true
    });

    var owl = jQuery('#attorney .owl-carousel');
        owl.owlCarousel({
        margin: 10,
        nav: true,
        autoplay : true,
        lazyLoad: true,
        autoplayTimeout: 3000,
        loop: false,
        navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        },
        autoplayHoverPause : true,
        mouseDrag: true
    });


    var owl = jQuery('#attorney .owl-carousel');
        owl.owlCarousel({
        margin: 10,
        nav: true,
        autoplay : true,
        lazyLoad: true,
        autoplayTimeout: 3000,
        loop: false,
        navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        },
        autoplayHoverPause : true,
        mouseDrag: true
    });

    var owl = jQuery('#latest_post .owl-carousel');
        owl.owlCarousel({
        margin: 10,
        nav: true,
        autoplay : true,
        lazyLoad: true,
        autoplayTimeout: 3000,
        loop: false,
        navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        },
        autoplayHoverPause : true,
        mouseDrag: true
    });

    var owl = jQuery('#testimonials .owl-carousel');
        owl.owlCarousel({
        margin: 10,
        nav: true,
        autoplay : true,
        lazyLoad: true,
        autoplayTimeout: 3000,
        loop: false,
        navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 2
          }
        },
        autoplayHoverPause : true,
        mouseDrag: true
    });

  var $itswork_autoloop =""
  if(jQuery("#itwork-loop").text()=='true')
   {
     itswork_autoloop=true;
   }else{
     itswork_autoloop=false;
   };      
    var owl = jQuery('#how_it_work .owl-carousel');
        owl.owlCarousel({
        margin: 10,
        nav: true,
        autoplay : true,
        lazyLoad: true,
        autoplayTimeout: 3000,
        loop:itswork_autoloop,
        loop: true,
        navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        },
        autoplayHoverPause : true,
        mouseDrag: true
    });

  var $itswork_autoloop =""
  if(jQuery("#key_to_success").text()=='true')
   {
     itswork_autoloop=true;
   }else{
     itswork_autoloop=false;
   };          
    var owl = jQuery('#key_to_success .owl-carousel');
        owl.owlCarousel({
        margin: 10,
        nav: true,
        autoplay : true,
        lazyLoad: true,
        autoplayTimeout: 3000,
       loop: true,
        navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 4
          }
        },
        autoplayHoverPause : true,
        mouseDrag: true
    });
  var $itswork_autoloop =""
  if(jQuery("#our_clients").text()=='true')
   {
     itswork_autoloop=true;
   }else{
     itswork_autoloop=false;
   };     
    var owl = jQuery('#our_clients .owl-carousel');
        owl.owlCarousel({
        margin: 10,
        nav: true,
        autoplay : true,
        lazyLoad: true,
        autoplayTimeout: 3000,
        loop: true,
        navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 4
          }
        },
        autoplayHoverPause : true,
        mouseDrag: true
    });

    if(!isMobile()){
        $('.menu-item-has-children').hover(function(){

            $(this).children('ul.sub-menu').css({
                "opacity":"0",
                "display":"block",
            }).show().animate({opacity:1});
              
        },function(){

            $(this).children('ul.sub-menu').css({
                "opacity":"1",
                "display":"none",
            }).show().animate({opacity:0});
              
        });
    }

    jQuery('a.accordion-toggle').click(function() {
        jQuery("i", this).toggleClass("fas fa-plus fas fa-times");
    });
        


});