(function ($, root, undefined) {

		$(document).ready(function(){
			// APPRARITION
			var delay = 0;
			 $('.apparition').each(function() {
			   var $li = $(this);
			   setTimeout(function() {
				 $li.addClass('animation-fade-up');
			 }, delay+=200); // delay 100 ms
			 });

    // RESIZE HEADER SCROLLTOP

    $(window).scroll(function(){
      var $header = $('.header');
			var $menu_section = $('.menu-section');
      var $logo_img = $('.logo-img');
      if ($(this).scrollTop() > 40){
        if(!$header.hasClass('resize-menu') && !$logo_img.hasClass('resize-logo')) {
            $header.addClass('resize-menu');
						// $menu_section.css({"height": 60});
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

					// SUB MENU header
					$('#menu-item-147').click(function() {
						$('.sub-menu').toggleClass('translate-submenu');
						$('.submenu-chevron').toggleClass('submenu-chevron-rotate');
						$('.menu-container').toggleClass('header-menu-bkg');
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

      }).resize();
		// END RESIZE

		/** HOME PAGE **/

		// * SLIDER HOME * //

		// SLIDER VIDEO
        var slideWrapper = $(".main-slider"),
            iframes = slideWrapper.find(".embed-player"),
            lazyImages = slideWrapper.find(".slide-image"),
            lazyCounter = 0;

        // POST commands to YouTube or Vimeo API
        function postMessageToPlayer(player, command) {
            if (player == null || command == null) return;
            player.contentWindow.postMessage(JSON.stringify(command), "*");
        }

        // When the slide is changing
        function playPauseVideo(slick, control) {
            var currentSlide, slideType, startTime, player, video;

            currentSlide = slick.find(".slick-current");
            slideType = currentSlide.attr("class").split(" ")[1];
            player = currentSlide.find("iframe").get(0);
            startTime = currentSlide.data("video-start");

            if (slideType === "vimeo") {
                switch (control) {
                    case "play":
                        if (
                            startTime != null &&
                            startTime > 0 &&
                            !currentSlide.hasClass("started")
                        ) {
                            currentSlide.addClass("started");
                            postMessageToPlayer(player, {
                                method: "setCurrentTime",
                                value: startTime
                            });
                        }
                        postMessageToPlayer(player, {
                            method: "play",
                            value: 1
                        });
                        break;
                    case "pause":
                        postMessageToPlayer(player, {
                            method: "pause",
                            value: 1
                        });
                        break;
                }
            } else if (slideType === "youtube") {
                switch (control) {
                    case "play":
                        postMessageToPlayer(player, {
                            event: "command",
                            func: "mute"
                        });
                        postMessageToPlayer(player, {
                            event: "command",
                            func: "playVideo"
                        });
                        break;
                    case "pause":
                        postMessageToPlayer(player, {
                            event: "command",
                            func: "pauseVideo"
                        });
                        break;
                }
            } else if (slideType === "video") {
                video = currentSlide.children("video").get(0);
                if (video != null) {
                    if (control === "play") {
                        video.play();
                    } else {
                        video.pause();
                    }
                }
            }
        }
        // Resize player
        function resizePlayer(iframes, ratio) {
            if (!iframes[0]) return;
            var win = $(".main-slider"),
                width = win.width(),
                playerWidth,
                height = win.height(),
                playerHeight,
                ratio = ratio || 16 / 9;

            iframes.each(function() {
                var current = $(this);
                if (width / ratio < height) {
                    playerWidth = Math.ceil(height * ratio);
                    current
                        .width(playerWidth)
                        .height(height)
                        .css({
                            left: (width - playerWidth) / 2,
                            top: 0
                        });
                } else {
                    playerHeight = Math.ceil(width / ratio);
                    current
                        .width(width)
                        .height(playerHeight)
                        .css({
                            left: 0,
                            top: (height - playerHeight) / 2
                        });
                }
            });
        }

        // DOM Ready
        $(function() {
            // Initialize
            slideWrapper.on("init", function(slick) {
                slick = $(slick.currentTarget);
                setTimeout(function() {
                    playPauseVideo(slick, "play");
                }, 1000);
                resizePlayer(iframes, 16 / 9);
            });
            slideWrapper.on("beforeChange", function(event, slick) {
                slick = $(slick.$slider);
                playPauseVideo(slick, "pause");
            });
            slideWrapper.on("afterChange", function(event, slick) {
                slick = $(slick.$slider);
                playPauseVideo(slick, "play");
            });
            slideWrapper.on("lazyLoaded", function(
                event,
                slick,
                image,
                imageSource
            ) {
                lazyCounter++;
                if (lazyCounter === lazyImages.length) {
                    lazyImages.addClass("show");
                    // slideWrapper.slick("slickPlay");
                }
            });

            //start the slider
            slideWrapper.slick({
                fade: true,
                autoplaySpeed: 8000,
                autoplay: true,
                pauseOnDotsHover: false,
                pauseOnHover: false,
                pauseOnFocus: false,
                lazyLoad: "progressive",
                speed: 600,
                arrows: false,
                dots: true,
                cssEase: "cubic-bezier(0.87, 0.03, 0.41, 0.9)"
            });
        });

        // Resize event
        $(window).on("resize.slickVideoPlayer", function() {
            resizePlayer(iframes, 16 / 9);
        });

		// END HOME SLIDER

		// SLIDER BLOG HOME PAGE

			$('.home-blog-slider').slick({
			  infinite: true,
        	  autoplay: false,
			  		slidesToShow: 1,
			  		slidesToScroll: 1,
        	  arrows: true
			});
		// SLIDER + FANCY BOX SINGLE Product
		// Init fancyBox
			$().fancybox({
			  selector : '.slider-thumb-product .slick-slide:not(.slick-cloned)',
			  hash : false
			});
			// Init Slick
			$('.slider-thumb-product').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
			infinite: true,
		  arrows: true,
		  fade: true,
		  asNavFor: '.slider-thumb-nav',
			autoplay: true
			});
			$('.slider-thumb-nav').slick({
			  slidesToShow: 3,
			  slidesToScroll: 1,
			  asNavFor: '.slider-thumb-product',
			  dots: false,
			  centerMode: true,
			  focusOnSelect: true
			});

			// SLIDER + FANCY BOX PAGE MAGASIN
			$().fancybox({
			  selector : '.mag-slider .slick-slide:not(.slick-cloned)',
			  hash : false
			});
			// Init Slick
			$('.mag-slider').slick({
				slidesToShow: 3,
		  	slidesToScroll: 1,
				infinite: true,
			  arrows: true,
				autoplay: false,
				responsive: [
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
					]
				});

		});
})(jQuery, this);
