$("#search_input_box").hide();
$("#search").on("click", function () {
    $("#search_input_box").slideToggle();
    $("#search_input").focus();
	$(".navbar-toggler").addClass("collapsed");
	$(".navbar-collapse").removeClass("show");
	//$("#search").hide(500);
});
$("#close_search").on("click", function () {
    $('#search_input_box').slideUp(500);
	//$("#search").show(500);
});

/*$(".sample-audio--toggle .sample-audio--play").on("click", function () {
	$(this).parent().toggleClass("play-open");
});*/

$(".navbar-toggler").on("click", function () {
   $('#search_input_box').slideUp(500);
});
$(document).ready(function(){
    $('.owl-carousel1').owlCarousel({
        ltr:true,
      loop:false,
      loop:($(".owl-carousel1 .item").length > 1) ? true: false,
      items: 1,
      margin:0,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      smartSpeed : 2000,
      mouseDrag:false,
      dots:false,
      nav:true,
      navText:[
                      "prev",
                      "Next"
                  ],
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  });
  $('.owl-carouselproduct').owlCarousel({
    ltr:true,
  loop:false,
  //loop:($(".owl-carouselproduct .item").length > 1) ? true: false,
  items: 3,
  margin:20,
  autoplay: true,
  autoplayTimeout: 2000,
  autoplayHoverPause: true,
  smartSpeed : 2000,
  mouseDrag:false,
  dots: false,
  nav:false,
  navText:[
                  "<i class='fa fa-lg fa-chevron-left '></i>",
                  "<i class='fa fa-lg fa-chevron-right '></i>"
              ],
  responsive:{
      0:{
          items:1
      },
      600:{
          items:3
      },
      1000:{
          items:3
      }
  }
});
 $('.owl-carouselvariant').owlCarousel({
        ltr:true,
      loop:false,
      //loop:($(".owl-carouselvariant .item").length > 1) ? true: false,
      items: 4,
      margin:40,
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,
      smartSpeed : 2000,
      mouseDrag:false,
      dots:false,
      nav:true,
      navText:[
                  "<i class='fa fa-lg fa-chevron-left '></i>",
                  "<i class='fa fa-lg fa-chevron-right '></i>"
              ],
      responsive:{
          0:{
              items:1
          },
          414:{
              items:2
          },
		  992:{
              items:3
          },
          1000:{
              items:4
          }
      }
  });
});

$('.owl-fancy-carousel').owlCarousel({
    loop : true,
    margin:20,
    dots: false,
	items: 3,
	 autoplay: true,
      autoplayTimeout: 3000,
	  responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          992:{
              items:3
          }
      }
  });
  
 /* $().fancybox({
    selector : '.owl-fancy-carousel .owl-item:not(.cloned) a',
    hash   : false,
    thumbs : {
      autoStart : true
    },
    buttons : [
     "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
    ]
  });*/
  
  $(window).scroll(function() {
	var sticky = $('.header-outr'),
	scroll = $(window).scrollTop();
	headerHeight = $('.header-outr').height();
	//console.log(headerHeight);
	if (scroll > headerHeight) {
		sticky.addClass('fixed');
	}
	else {
		sticky.removeClass('fixed');
	}
});


$(document).ready(function () {
    // hide #back-top first
    $("#back-top").hide();

    var $carousel = $('#animated-carousel');
    var $backTop = $('#back-top');

    // only run scroll logic if carousel exists
    if ($carousel.length) {
        var carouselBottom = $carousel.offset().top + $carousel.outerHeight();

        $(window).scroll(function () {
            var scrollTop = $(this).scrollTop();

            if (scrollTop === 0) {
                $backTop.fadeOut();
            } else if (scrollTop > carouselBottom) {
                $backTop.fadeIn();
            } else {
                $backTop.fadeOut();
            }
        });
    } else {
        // fallback: show button only after scrolling a bit
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $backTop.fadeIn();
            } else {
                $backTop.fadeOut();
            }
        });
    }

    // smooth scroll to top
    $('#back-top a').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });
});



















CloudZoom.quickStart();


$(function() {
  const headerHeight = $('header').outerHeight() || 0; // your fixed header selector

  $('a[href*="#"]:not([href="#"])').on('click', function(e) {
    e.preventDefault();
    
    const target = $(this).attr('href');
    if ($(target).length) {
      $('html, body').animate(
        {
          scrollTop: $(target).offset().top - headerHeight
        },
        500,
        'linear'
      );
    }
  });
});