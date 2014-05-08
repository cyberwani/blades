/*jshint unused:false */
/*global jQuery:true, console: true, Modernizr:true, $:false, _:false, Swiper:false, Hammer:false */
'use strict';
/*
 * Nav module for Boston.com prototype
 * by Nathan Hass c/o Upstatement (@upstatement)
 *
 */

(function($) {

	var ts,bs;

	//SET SPEED of Background Slide Show
	var AMOUNT_TO_MOVE = 1,
		ANIMATION_DELAY = 30,
		NUM_IMAGES = 30;

	//SET IMAGES of Type slider
	var	resp_imgs = [
			{
				width: 600,
				tag: '-small.jpg'
			},
			{
				width: 9999,
				tag: '.jpg'
			}
		];

	function BackgroundSlideshow(img_paths, options) {

		var _defaults = {
			scrubber: '.hlr-bg-scrubber',
			img_holder: '.hlr-bg-img',
			timeline: '.hlr-bg-timeline',
			slider: '.hlr-bg-slider',
			button: '.hlr-bg-btn',
			play_class: 'hlr-bg-playing',
			pause_class: 'hlr-bg-paused'
		};

		options = $.extend(_defaults,options);

		if(!img_paths) {
			console.error('Did not specify image paths');
			return undefined;
		} else {
			this._img_paths = img_paths;
		}

		//selectors
		this._scrubber = options.scrubber;
		this._img_holder = options.img_holder;
		this._timeline = options.timeline;
		this._slider = options.slider;
		this._button = options.button;

		//style classes
		this._play_class = options.play_class;
		this._pause_class = options.pause_class;

		this._animation_id = false;

		//init
		this.initScrubber();
		this.bindButtonEvent();
		this.bindInView();
		this.bindToResize();
		this.findWidth();
	}

	BackgroundSlideshow.prototype = {
		cacheImages: function() {
			this._img_paths.forEach(function(img_path) {
				var img = new Image();
				img.src = img_path;
			});
		},
		initScrubber: function() {
			$(this._scrubber).draggable({
				drag: $.proxy(this.updateBackground,this),
				start: $.proxy(this.pause,this),
				scroll: false,
				grid: [1,0],
				containment: this._timeline
			});

		},
		bindButtonEvent: function() {
			// var _this = this;
			$(this._button).on('click', $.proxy(this.toggleSlideshowOnClick, this));

		},
		bindInView: function() {
			var _this = this;
			$(this._img_holder).bind('inview', $.proxy(this.startSlideshowOnView, this));
		},
		bindToResize: function() {
			$(window).resize($.proxy(this.findWidth, this));
		},
		findWidth: function() {
			this._timeline_width = $(this._timeline).width() - $(this._scrubber).width();
		},
		toggleSlideshowOnClick: function(event) {
			event.preventDefault();
			if ($(this._slider).hasClass(this._pause_class)) {
				this.play();
			}
			else {
				this.pause();
			}
		},
		startSlideshowOnView: function(event, isInView, visiblePartX, visiblePartY) {
			if(visiblePartY === 'both') {
				this.play();
			}
			else if(visiblePartY !== 'top' && visiblePartY !== 'bottom'){ //change to none?
				this.pause();
			}
		},
		pause: function() {
			if(this._animation_id) {

				clearInterval(this._animation_id);

				$(this._timeline).unbind('inview');

				this._animation_id = false;

				$(this._slider).removeClass(this._play_class);
				$(this._slider).addClass(this._pause_class);
			}
		},
		play: function() {
			if(!this._animation_id)
			{
				this._animation_id = setInterval($.proxy(this.moveScrub,this), ANIMATION_DELAY);

				$(this._slider).removeClass(this._pause_class);
				$(this._slider).addClass(this._play_class);
			}
		},
		updateBackground: function() {
			var index = Math.floor(($(this._scrubber).position().left/this._timeline_width)*NUM_IMAGES);
			$(this._img_holder).attr('src', this._img_paths[index]);
		},
		moveScrub: function () {
			var $bg_scrubber = $(this._scrubber),
				left_pos = $bg_scrubber.position().left;

			if(left_pos + AMOUNT_TO_MOVE >= this._timeline_width) {
				left_pos = 0;
			}
			else {
				left_pos = left_pos + 1;
			}

			$bg_scrubber.css({
				left: left_pos
			});

			this.updateBackground();
		}
	};

	//Type Slider

	var TypeScrubber = function(options) {

		var _defaults = {
			type_container: '#hlr-type-container',
			type_mask: '.hlr-type-mask-mod',
			bind_touch_events: Modernizr.touch
		};

		options = $.extend(_defaults,options);

		this._container = options.type_container;
		this._mask = options.type_mask;
		this._bind_touch = options.bind_touch_events;

		this.bindEvents();

		return this;
	};

	TypeScrubber.prototype = {
		bindEvents: function() {
			this.bindMouseEvents();

			if(this._bind_touch) {
				this.bindTouchEvents();
			}
		},
		unbindEvents: function() {
			var $type_container = $(this._container);

			$type_container.off('mouseleave', $.proxy(this.resetScrubber, this));
			$type_container.off('mousemove', $.proxy(this.handleMove, this));

			if(this._bind_touch) {
				$type_container.off('touchmove touchstart');
				$type_container.off('touchend');
			}
		},
		bindMouseEvents: function() {
			var $type_container = $(this._container);

			$type_container.on('mouseleave', $.proxy(this.resetScrubber, this));
			$type_container.on('mousemove', $.proxy(this.handleMove, this));
		},
		bindTouchEvents: function() {
			var $type_container = $(this._container),
				_this = this;

			$type_container.on('touchmove touchstart', $.proxy(this.handleMove,this));
			$type_container.on('touchend', $.proxy(this.resetScrubber,this));
		},
		handleMove: function(event) {
			event.preventDefault();
			var scrub_pos = this.getScrubPosition(event);
			if(scrub_pos) {
				this.moveScrubber(scrub_pos);
			}
		},
		getScrubPosition: function(event) {
			return this.getOffset(event);
		},
		moveScrubber: function(scrub_pos) {
			$(this._mask).css({
				width: scrub_pos
			});
		},
		resetScrubber: function(event) {
			this.unbindEvents();
			event.preventDefault();
			$(this._mask).animate({
				'width': '50%'
			}, '2000', 'swing', $.proxy(this.bindEvents,this)).css({
				'overflow': 'visible'
			});
		},
		getOffset: function(event) {
			console.log(event.target);
			if($(event.target).is(this._container + ',' + this._container + ' img, ' + this._container + ' ' + this._mask)) {
				//event.stopImmediatePropagation();
				if(event.type === 'mousemove') {
					return event.offsetX;//$(event.target).offsetTop;
				} else if (event.type === 'touchmove' || event.type === 'touchstart') {
					return event.originalEvent.touches[0].pageX - $(this._container).offset().left;
				} else {
					console.error('Not Valid Event');
					console.log(event);
				}
			}
			return undefined;
		}
	};


	//Change if hardcode img paths
	var _setUpImgPaths = function() {
		var img_paths = [],
			img_dir = $('.hlr-bg-img').data('bg-path');

		for(var i = 1; i <= NUM_IMAGES; i++) {
			img_paths.push(img_dir + 'bg-' + i + '.jpg');
		}

		return img_paths;
	};

	//Window Bindings

	var _findResponsiveImage = function() {
		var window_width = window.innerWidth,
			desired_resp_obj;
		for(var i in resp_imgs) {
			var resp_obj = resp_imgs[i];
			if(window_width < resp_obj.width) {
				desired_resp_obj = resp_obj;
				break;
			}
		}
		$.each($('.hlr-type-imgs').find('img'), function(index, img) {
			var $img = $(img);
			var img_src = $img.data('img-src');
			$img.attr('src', img_src + desired_resp_obj.tag);
		});
	};

	// Type Character

	$('.hlr-chars-mod').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {

		if(visiblePartY === 'both') {
			var $old_seven = $('#hlr-char-oldseven'),
				$hoefler = $('#hlr-char-hoefler');

			$old_seven.addClass('hlr-char-oldseven');
			$old_seven.removeClass('start-pos');

			$hoefler.addClass('hlr-char-hoefler');
			$hoefler.removeClass('start-pos');
		}

	});

	//Run the code;

	$(window).ready(function() {
		var img_paths = _setUpImgPaths();
		_findResponsiveImage();
		ts = new TypeScrubber();
		bs = new BackgroundSlideshow(img_paths);
		console.log('ready');
	});

	$(window).load(function() {
		bs.cacheImages();
		console.log('done loading');
	});

	$(window).resize(_findResponsiveImage);


})(jQuery);
