/*jshint unused:false */
/*global $:false, _:false, Swiper:false, Hammer:false */

/*
 * Nav module for Boston.com prototype
 * by Nathan Hass c/o Upstatement (@upstatement)
 *
 */

(function($) {

	//Background Slide Show

	//CONTROL SPEED
	var amount_to_move = 1,
		animation_delay = 30; //Change this one first

	var NUM_IMAGES = 30,
		img_paths = [],
		resp_imgs = [
			{
				width: 600,
				tag: '-small.jpg'
			},
			{
				width: 9999,
				tag: '.jpg'
			}
		];

	var	$bg_scrubber = $('.hlr-bg-scrubber'),
		$bg_img_holder = $('.hlr-bg-img'),
		$bg_timeline = $('.hlr-bg-timeline'),
		$bg_slider = $('.hlr-bg-slider'),
		$bg_button = $('.hlr-bg-btn'),
		$type_mask = $('.hlr-type-mask-mod'),
		$type_container = $('#hlr-type-container');

	var total_width,
		animation_id;


	//helper functions
	var onResizeFn = function() {
		total_width = $bg_timeline.width() - $bg_scrubber.width();

		window_width = window.innerWidth;
		for(var i in resp_imgs) {
			resp_obj = resp_imgs[i];
			if(window_width < resp_obj.width) {
				$.each($type_container.find('img'),function(index, img) {
					$img = $(img);
					var img_src = $img.data('img-src');
					$img.attr('src', img_src + resp_obj.tag);
				});
				break;
			}
		}
	};

	var setUpImgPaths = function() {
		var img_dir = $bg_img_holder.data('bg-path');
		for(var i = 1; i <= NUM_IMAGES; i++) {
			img_paths.push(img_dir + 'bg-' + i + '.jpg');
		}
	};

	var preloadImages = function(img_arr) {
		img_arr.forEach(function(img_path) {
			var img = new Image();
			img.src = img_path;
		});
	};

	var updateBackgroundOnScrub = function() {
		var index = Math.floor(($bg_scrubber.position().left/total_width)*NUM_IMAGES);
		$bg_img_holder.attr('src', img_paths[index]);
	};

	var animateScrubbing = function() {
		var left_pos = $bg_scrubber.position().left;
		if(left_pos + amount_to_move >= total_width)
			left_pos = 0;
		else
			left_pos = left_pos + 1;

		$bg_scrubber.css({
			left: left_pos
		});
		updateBackgroundOnScrub();
	};

	var hlr_playBGs = function() {
		if(!animation_id)
		{
			animation_id = setInterval(animateScrubbing, animation_delay);
			$bg_slider.removeClass('hlr-bg-paused');
			$bg_slider.addClass('hlr-bg-playing');
		}
	};

	var hlr_pauseBGs = function() {
		if(animation_id)
			clearInterval(animation_id);
			$bg_timeline.unbind('inview');
			animation_id = false;
			$bg_slider.removeClass('hlr-bg-playing');
			$bg_slider.addClass('hlr-bg-paused');
	};

	var pressBGButton = function() {
		if ($bg_slider.hasClass('hlr-bg-paused')) {
			hlr_playBGs();
		} else {
			hlr_pauseBGs();
		}
	};

	$bg_scrubber.draggable({
		drag: updateBackgroundOnScrub,
		start: hlr_pauseBGs,
		scroll:false,
		grid: [1,0],
		containment: '.hlr-bg-timeline'
	});

	//event bindings
	$(window).ready(function() {
		console.log('ready');
		onResizeFn();
	})

	$(window).load(function() {
		onResizeFn();
		setUpImgPaths();
		preloadImages(img_paths);
		console.log('finished preloading');
	});

	$(window).resize(onResizeFn);

	$bg_img_holder.bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
		if(visiblePartY === 'both')
			hlr_playBGs();
		else
			hlr_pauseBGs();
	});

	$('.hlr-chars-mod').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
		if(visiblePartY === 'both') {
			$('#hlr-char-oldseven').addClass('hlr-char-oldseven');
			$('#hlr-char-oldseven').removeClass('start-pos');
			$('#hlr-char-hoefler').addClass('hlr-char-hoefler');
			$('#hlor-char-hoefler').removeClass('start-pos');
		}
	});


	$bg_button.on('click', pressBGButton);

	//Type Slider



	var typeResetSize = function(event) {
		$type_mask.css({
			'width': '50%'
		});
	};

	var typeChangeSize = function(event){
		var offset = event.offsetX;
		console.log(offset);
		if(offset >= $type_container.width())
			offset = $type_container.width();
		else if (event.offsetX <= 0)
			offset = 0;
		$type_mask.css({
			'width': offset
		});
	};

	var typeChangeSizeForTouch = function(event) {
		var offset = event.originalEvent.touches[0].pageX - $type_container.offset().left;
		if(offset <= $type_container.width() && offset >= 0) {
			$type_mask.css({
				'width': offset
			});
		}
	};

	$type_container.bind('mouseleave', typeResetSize);

	$type_container.bind('mousemove', typeChangeSize);

	if(Modernizr.touch) {
		var type_container_node = document.getElementById('hlr-type-container');
		$type_container.on('touchmove touchstart', typeChangeSizeForTouch);
		$type_container.on('touchend', typeResetSize);
	}

})(jQuery);
