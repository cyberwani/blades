/*jshint unused:false */
/*global $:false, _:false, Swiper:false, Hammer:false */

/*
 * Nav module for Boston.com prototype
 * by Nathan Hass c/o Upstatement (@upstatement)
 *
 */
(function($) {

	// Initialize Swiper
	function initBcomSwiper() {

		// Swiper Video Commands
		function stopSwiperVideos() {
			var $swiperVideos = $('.bcom-feat-img');
			$swiperVideos[0].pause();
		}
		function playSwiperVideo(swiper) {
			var active = swiper.activeSlide();
				$video = $(active).find('.bcom-feat-img');
			$video[0].play();
		}

		// Controls transition & timeout speeds
		var speedOrigin = 10,
			speedButton = speedOrigin + 100;

		// Creates Image Swiper
		var bcomSwiper = $('.swiper-img-mod').swiper({
			mode:'horizontal',
			speed: speedOrigin,
			calculateHeight: true,
            onSlideChangeEnd: function() {
                $('.bcom-feat-mod').removeClass('transition-active');
                var slide = bcomSwiper.activeSlide();
            },
		    onSlideNext:function(swiper){
		    	stopSwiperVideos();
		    	playSwiperVideo(swiper);
				bcomSwiper_caption.swipeNext();
		    },
		    onSlidePrev:function(swiper){
		    	stopSwiperVideos();
		    	playSwiperVideo(swiper);
				bcomSwiper_caption.swipePrev();
		    }
		});

		// Creates Caption Swiper
		var bcomSwiper_caption = $('.swiper-caption-mod').swiper({
			mode:'horizontal',
			speed: speedOrigin,
			simulateTouch: false,
			calculateHeight: true
		});

		$('.bcom-feat-prev').on('click', function() {
            $('.bcom-feat-mod').addClass('transition-active');
            setTimeout(function(){
				bcomSwiper.swipePrev();
            }, speedButton);
		});
		$('.bcom-feat-next').on('click', function() {
            $('.bcom-feat-mod').addClass('transition-active');
            setTimeout(function(){
				bcomSwiper.swipeNext();
            }, speedButton);		
        });


		// Creates Card Swiper
		var bcomCardSwiper = $('.swiper-container').swiper({
			//Your options here:
			mode:'horizontal',
			slidesPerView: 'auto',
			loop: true,
			loopedSlides: 10,
			centeredSlides: true,
			keyboardControl: true,
			onImagesReady: function(swiper) {
				swiper.swipeNext();
				swiper.swipePrev();
			}
		});
		$('.bcom-card-btn-next').click(function() {
				bcomCardSwiper.swipeNext();
		});
		$('.bcom-card-btn-prev').click(function() {
				bcomCardSwiper.swipePrev();
		});

	} // bcom_swiper

	initBcomSwiper();



	// window.setInterval(triggerNextFast, 7000);
	if (!$.support.transition)
	    $.fn.transition = $.fn.animate;
		// triggerNextFast();

		'use strict';

		// browser button stuff
		var wHeight = $(window).height();

		$(window).on('resize', function(){
			if(!$('html').hasClass('touch')){
				resizeThings();
			}
			heightsOnSize();
		});

		function resizeThings() {
			var wHeight = $(window).height();
			$('.bcom-stream-section').css('max-height', (wHeight) + 'px');
		}


		var filterh;
		var streamButtonh;
		var stream1h;
		var stream2h;
		var stream3h;
		var stream4h;
		var stream5h;
		var stream6h;
		var stream7h;


	// Everything in a set timeout so we can get element heights
	function heightsOnSize() {
		filterh = $('.stream-img-filter').height();
		streamButtonh = $('.stream-img-button').height();
		stream3h = $('.stream-img-3').height();
		stream4h = $('.stream-img-4').height();
		stream5h = $('.stream-img-5').height();
		stream6h = $('.stream-img-6').height();
		stream7h = $('.stream-img-7').height();

		if($(window).width() > 600) {
			stream1h = (filterh);
		} else {
			stream1h = (0);
		}
	}

	function heightsOnClick() {
		stream2h = $('.stream-img-2').height();
	}

	function getHeights() {
		heightsOnClick();
		heightsOnSize();
		console.log('new heights');

	}

	setTimeout(function() {

		// Section Stream Animations

		var $streamMod = $('.bcom-stream-section');
		var $streamImgMod = $('.stream-img-mod');

		getHeights();

		// Stream init function

		function streamInit() {
			console.log(streamButtonh);
			$streamImgMod.css('margin-top', (stream1h - streamButtonh) + 'px');
			$streamMod.addClass('stream');
		}

		var streamClass = 'stream-sh-1 stream-sh-2 stream-sh-3 stream-sh-4 stream-sh-5 stream-sh-6 stream-sh-7';

		var streamAnims = [
			function() {
				noClick();
				$streamMod.removeClass('hide-button show-video stream-sh-2 stream-sh-3 stream-sh-4 stream-sh-5 stream-sh-6 stream-sh-7 focus button-active');
				$streamImgMod.transition({
					'margin-top': (stream1h - streamButtonh) + 'px',
				}, 1000, function(){
					$streamMod.addClass('stream-sh-1');
					addClick();
				});
			},
			function() {
				noClick();
				setTimeout(function() {
					$streamMod.addClass('stream-sh-2 focus');
				}, 500);
				$streamMod.removeClass(streamClass);
				$streamImgMod.transition({
					'margin-top': stream1h + 'px',
				}, 500);
				setTimeout(function() {
					$streamMod.addClass('hide-button');
					$streamImgMod.transition({
						'margin-top': stream1h + 'px',
					}, 1000, function(){
						addClick();
					});
				}, 2000);
			},
			function() {
				noClick();
				setTimeout(function() {
					$streamMod.addClass('stream-sh-3');
				}, 500);
				$streamMod.removeClass(streamClass);
				$streamImgMod.transition({
					'margin-top':  ( stream1h - stream2h ) + 'px',
				}, 1000, function(){
					addClick();
				});
			},
			function() {
				noClick();
				setTimeout(function() {
					$streamMod.addClass('stream-sh-4');
				}, 500);
				$streamMod.removeClass(streamClass);
				$streamMod.removeClass('show-video');
				$streamImgMod.transition({
					'margin-top': ( stream1h - stream2h - stream3h ) + 'px',
				}, 1000, function(){
					addClick();
				});
				$streamMod.addClass('show-video');
			},
			function() {
				noClick();
				setTimeout(function() {
					$streamMod.addClass('stream-sh-5');
				}, 500);
				$streamMod.removeClass(streamClass);
				$streamImgMod.transition({
					'margin-top': ( stream1h - stream2h - stream3h - stream4h ) + 'px',
				}, 1000, function(){
					addClick();
				});
				$streamMod.removeClass('show-video');
			},
			function() {
				noClick();
				setTimeout(function() {
					$streamMod.addClass('stream-sh-6');
				}, 500);
				$streamMod.removeClass(streamClass);
				$streamImgMod.transition({
					'margin-top': ( stream1h - stream2h - stream3h - stream4h - stream5h ) + 'px',
				}, 1000, function(){
					addClick();
				});
			},
			function() {
				noClick();
				setTimeout(function() {
					$streamMod.addClass('stream-sh-7');
				}, 500);
				$streamMod.removeClass(streamClass);
				$streamImgMod.transition({
					'margin-top': ( stream1h - stream2h - stream3h - stream4h - stream5h - stream6h ) + 'px',
				}, 1000, function(){
					addClick();
				});
				$streamMod.addClass('hide-button');
			}
		]

		// Advance animation

		var streamPointer = 0;

		function advanceStreamPointer() {
			streamPointer++;
			if(streamPointer > (streamAnims.length - 1)) {
				streamPointer = 0;
			}
		}

		function advanceStreamAnim() {
				heightsOnClick();
				streamAnims[streamPointer]();
				advanceStreamPointer();
		}


		if($(window).width() > 600) {
			$('.device-content-mod').one('inview', function(event, isInView) {
			  	if (isInView) {
					setTimeout(function() {
						$('.bcom-stream-section').addClass('side-by-side');
						setTimeout(function() {
							$('.bcom-stream-section').addClass('stream-sh-1');
						}, 200);
						setTimeout(function() {
							advanceStreamAnim();
						}, 700);
					}, 1000);
				}
			});
		} else if($(window).width() < 600) {
			$('.bcom-stream-section').addClass('side-by-side')
			advanceStreamAnim();
		}


		// Stream anims
		function noClick() {
			$streamMod.addClass('noclick');
			$streamMod.removeClass('yesclick');
		}
		function addClick() {
			$streamMod.removeClass('noclick');
			$streamMod.addClass('yesclick');
		}

		$('.bcom-stream-section').on('click', function() {
			if (!$('.bcom-stream-section').hasClass('noclick')) {
				advanceStreamAnim();
			}
		});

		// Inits
		streamInit();

	}, 1000);
	resizeThings();

})(jQuery);
