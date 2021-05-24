
/* ========================================== Start Of Menu Active Class ========================================== */
jQuery("ul li a").filter(function(){
  return this.href == location.href.replace(/#.*/, "");
}).closest("li").addClass("active");
/* ========================================== End Of Menu Active Class ========================================== */


/* ========================================== Start Of Toggle Javascript  ========================================== */
jQuery(document).ready(function () {
    jQuery(".toggle").click(function () {
        jQuery("header").toggleClass("toggle-open");
    });
});
/* ========================================== End Of Toggle Javascript ========================================== */


/* ========================================== Start Of Drop Down Menu Javascript  ========================================== */
  jQuery(function(){
    var children=jQuery('.menu li a').filter(function(){return jQuery(this).nextAll().length>0})
    jQuery('<i class="fa fa-angle-down toggle-link" aria-hidden="true"></i>').insertAfter(children)
    jQuery('.menu .toggle-link').click(function (e) {
      jQuery(this).next().toggleClass('active');
        return false;
    });
  })
/* ========================================== End Of Drop Down Menu Javascript ========================================== */


/* ========================================== Start Of Slick Slider Javascript  ========================================== */
jQuery('.plans-slider').slick({
    infinite: true,
    arrows: true,
    dots: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,

            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,

            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
/* ========================================== End Of Slick Slider Javascript ========================================== */


/* ========================================== Start Of Preloader Loader Javascript  ========================================== */
jQuery(window).on('load', function () {
    jQuery('#status').fadeOut();
    jQuery('#preloader').delay(350).fadeOut('slow');
    jQuery('body').delay(350).css({
        'overflow': 'visible'
    });
})
/* ========================================== End Of Preloader Loader Javascript ========================================== */


/* ========================================== Start Of Header Fixed Javascript ========================================== */
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() >= 100) {
        jQuery('header').addClass('fixed-header');

    } else {
        jQuery('header').removeClass('fixed-header');

    }
});
/* ========================================== End Of Header Fixed Javascript ========================================== */



/* ========================================== Start Of Back To Top Javascript ========================================== */
jQuery(document).ready(function () {
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 300) {
            jQuery('#back-to-top').fadeIn();
        } else {
            jQuery('#back-to-top').fadeOut();
        }
    });
    jQuery('#back-to-top').click(function () {
        jQuery('#back-to-top').tooltip('hide');
        jQuery('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    jQuery('#back-to-top').tooltip('show');
});
/* ========================================== End Of Back To Top Javascript ========================================== */



/* ========================================== Start Of Set Background Image Javascript  ========================================== */
function setbg(){
  jQuery(".bgset").each(function(){
    var theBg = jQuery(this).find(".bgimgset").attr("src"); 
    jQuery(this).css('background-image', 'url(' + theBg + ')');
  });
}
setbg();
/* ========================================== End Of Set Background Image Javascript ========================================== */



/* ========================================== Start Of Lightbox Simple Javascript  ========================================== */
jQuery('.lightboxvideolink').simpleLightbox();
/* ========================================== End Of Lightbox Simple Javascript ========================================== */



/* ========================================== Start Of Wow Javascript  ========================================== */
new WOW().init();
/* ========================================== End Of Wow Javascript ========================================== */



/* ========================================== Start Of Match Height Javascript  ========================================== */
function MatchHeight() {
  jQuery('.match')
    .matchHeight({})
  ;
}
jQuery(document).ready(function() {
  MatchHeight(); 
});
/* ========================================== End Of Match Height Javascript ========================================== */




/* ========================================== Start Of Smooth Scroll Javascript  ========================================== */
  jQuery('.smooth-scroll a').click(function() 
  {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) 
    {
      
      var target = jQuery(this.hash),
      headerHeight = jQuery(".fixed-header").height() + 5; // Get fixed header height
            
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
              
      if (target.length) 
      {
        jQuery('html,body').animate({
          scrollTop: target.offset().top - headerHeight
        }, 500);
        return false;
      }
    }
  });
/* ========================================== End Of Smooth Scroll Javascript ========================================== */


/* ========================================== Start Of Isotope Javascript  ========================================== */
jQuery('.grid').isotope({
  itemSelector: '.grid-item',
  masonry: {
    columnWidth: 100
  }
});
/* ========================================== End Of Isotope Javascript ========================================== */




(function() {
  
  jQuery(".panel").on("show.bs.collapse hide.bs.collapse", function(e) {
    if (e.type=='show'){
      jQuery(this).addClass('active');
    }else{
      jQuery(this).removeClass('active');
    }
  });  

}).call(this);




 jQuery(document).ready(function () {
    jQuery(".pricing-toggle input").click(function () {
      jQuery(".pricing-table").toggleClass("add");
    });
  });