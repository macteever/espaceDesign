(function ($, root, undefined) {

		$(document).ready(function(){



    // RESIZE HEADER SCROLLTOP

    $(window).scroll(function(){
      var $header = $('.header');
			var $menu_section = $('.menu-section');
      var $logo_img = $('.logo-img');
      if ($(this).scrollTop() > 40){
        if(!$header.hasClass('resize-menu') && !$logo_img.hasClass('resize-logo')) {
            $header.addClass('resize-menu');
						$menu_section.css({"height": 60});
            $logo_img.addClass('resize-logo');
        }
      }
      else{
        if($header.hasClass('resize-menu') || $logo_img.hasClass('resize-logo')) {
            $header.removeClass('resize-menu');
            $logo_img.removeClass('resize-logo');
        }
      }
    });

    // MENU CATEGORY SUB MENU WOOCOMMERCE

    // $(document).ready(function(){
    //   $("#menu-menu-categories .menu-item-type-custom > a").click(function(){
    //     var target = $(this).parent().children("#menu-menu-categories .sub-menu");
    //     $(target).slideToggle();
    //   });
    // });

    // PAGE LOADER

    $(document).ready(function(){
        $(".page-loader").fadeOut(1000,'swing');
     });

    // MARGIN NEGATIVE DYNAMIC

    $( window ).resize(function() {
        var marg_neg = $('.p-b-80').height() + $('.test-slider').height() + $('.img-slider').height();

        $('#tarifs').css('margin-top', -marg_neg);
    });


    // MENU BURGER
      // Object variables for event handlers
      var triggers = ({
          menuBtn : $('#menu-btn')/*,*/
          // Add here...
      });

      triggers.menuBtn.click(function() {
        $("body").toggleClass("responsive");
        $(".nav-mobile").fadeToggle("slow");
        $("#header-sticky").css('background-color','transparent');
        $(this).toggleClass('open');
        $(this).find("button").toggleClass('menu-open');

        });

      // ADD class anim with Delay
          $('#menu-btn').click(function() {
              if ( $('body').hasClass( "responsive" ) ) {
                  $('.nav-mobile li').removeClass('animation-fade-out')
                  var delay = 0;
                   $('.nav-mobile li').each(function() {
                     var $li = $(this);
                     setTimeout(function() {
                       $li.addClass('animation-fade-up');
                     }, delay+=100); // delay 100 ms
                   });
              }
              else {
                  setTimeout(function() {
                      $('.nav-mobile li').removeClass('animation-fade-up');
                  }, 800);

              }
          });
          $('ul>li>a').click(function() {
           // $('body').removeClass('responsive');
           $('.nav-mobile').css('display', 'none');
           $('#menu-btn > button').toggleClass('menu-open');
          });

// START RESIZE
      $(window).on("load resize", function () {

          //**** HOME PAGE ****/

          var about_img_height = $('.home-about-right').height();
          var about_img_width = $('.home-about-right').outerWidth();

          $('.home-about-cadre').css('width', about_img_width);
          $('.home-about-cadre').css('height', about_img_height);

          $(window).scroll(function(){
               if ($(this).scrollTop() > 200){
                  $('.home-about-cadre').addClass('cadre-anim');
                }
                else
                  if ($('.home-about-cadre').hasClass('cadre-anim')) {
                    $('.home-about-cadre').removeClass('cadre-anim');
                  }

            });


      /*  CONTAINER FULL WIDTH TEXT GRID */

         var w_container = $('.container').width();
         var w_window =$( window ).width();
         $('.text-container').css("width", w_container/2);
         $('.text-container-left').css("width", w_container/2);
         $('.text-container-left').css("margin-left",(w_window - w_container)/2);
         $('.text-container-left-p').css("padding-left",(w_window - w_container)/2);

         $('.text-container4').css('width', w_container/3);
         $('.text-container4-left').css("width", w_container/3);
         $('.text-container4-left').css("margin-left",(w_window - w_container)/2);

         $('.text-container5').css('width', w_container/2.4);
         $('.text-container5-left').css("width", w_container/2.4);
         $('.text-container5-left').css("margin-left",(w_window - w_container)/2);

          $('.text-container5-5').css('width', w_container/2.18);
         $('.text-container5-5-left').css("width", w_container/2.18);
         $('.text-container5-5-left').css("margin-left",(w_window - w_container)/2);

         $('.text-container4-padding').css('width', w_container/3);
         $('.text-container4-left-padding').css("width", (w_container/3) + (w_window - w_container)/2);
         $('.text-container4-left-padding').css("padding-left",(w_window - w_container)/2);


         var wf_container = $('.container-fluid').width();
         $('.text-container-fluid').css("width", wf_container/2);

      }).resize();
// END RESIZE


		// SLIDER BLOG HOME PAGE

			$('.blog-slider').slick({

			  infinite: true,
        autoplay: false,
			  slidesToShow: 1,
			  slidesToScroll: 1,
        arrows: false
			});

      $('.blog-prev').click(function(){
      $('.blog-slider').slick('slickPrev');
    });
      $('.blog-next').click(function(){
      $('.blog-slider').slick('slickNext');
    });

      // SLIDER PAGE BLOG

      $('.subheader-blog-slider').slick({
        infinite: true,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false
      });


		// // SMOOTH SCROLL

  //       var $root = $("html, body");
  //       $("a").click(function() {
  //           var href = $.attr(this, "href");
  //           $root.animate({
  //               scrollTop: $(href).offset().top
  //           }, 700, function () {
  //               window.location.hash = href;
  //           });
  //           return false;
  //       });

		});
})(jQuery, this);
