/*jshint unused:false */
/*global $:false, _:false, Swiper:false, Hammer:false */
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

		this._scrubber = options.scrubber;
		this._img_holder = options.img_holder;
		this._timeline = options.timeline;
		this._slider = options.slider;
		this._button = options.button;

		this._play_class = options.play_class;
		this._pause_class = options.pause_class;

		this._animation_id = false;

		this.initScrubber();
		this.bindButtonEvent();
		this.bindInView();
		this.bindToResize();
		this.findWidth();
		//return this;
	};

	BackgroundSlideshow.prototype = {
		cacheImages: function() {
			this._img_paths.forEach(function(img_path) {
				var img = new Image();
				img.src = img_path;
			});
		},
		initScrubber: function() {
			var _this = this;
			$(_this._scrubber).draggable({
				drag: function() {
					_this.updateBackground();
				},
				start: function() {
					_this.pause()
				},
				scroll: false,
				grid: [1,0],
				containment: _this._timeline
			});

		},
		findWidth: function() {
			this._timeline_width = $(this._timeline).width() - $(this._scrubber).width();
		},
		bindButtonEvent: function() {
			var _this = this;
			$(this._button).on('click', function(event) {
				event.preventDefault();
				if ($(_this._slider).hasClass(_this._pause_class)) {
					_this.play();
				}
				else {
					_this.pause();
				}
			});

		},
		bindInView: function() {
			var _this = this;
			$(this._img_holder).bind('inview', function(event, isInView, visiblePartX, visiblePartY) {

				if(visiblePartY === 'both') {
					_this.play();
				}
				else {
					_this.pause();
				}

			});

		},
		bindToResize: function() {
			$(window).resize(this.findWidth);
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
				this._animation_id = setInterval(this.moveScrub, ANIMATION_DELAY, this);

				$(this._slider).removeClass(this._pause_class);
				$(this._slider).addClass(this._play_class);
			}
		},
		updateBackground: function() {
			var index = Math.floor(($(this._scrubber).position().left/this._timeline_width)*NUM_IMAGES);
			$(this._img_holder).attr('src', this._img_paths[index]);
		},
		moveScrub: function (_this) {
			var $bg_scrubber = $(_this._scrubber),
				left_pos = $bg_scrubber.position().left;

			if(left_pos + AMOUNT_TO_MOVE >= _this._timeline_width) {
				left_pos = 0;
			}
			else {
				left_pos = left_pos + 1;
			}

			$bg_scrubber.css({
				left: left_pos
			});

			_this.updateBackground();
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

		this._type_container = options.type_container;
		this._type_mask = options.type_mask;

		this.bindMouseEvents();

		if(options.bind_touch_events) {
			this.bindTouchEvents();
		}

		return this;
	};

	TypeScrubber.prototype = {
		bindMouseEvents: function() {
			var $type_container = $(this._type_container),
				_this = this;

			$type_container.bind('mouseleave', function(event) {
				_this.resetScrubber(event);
			});
			$type_container.bind('mousemove', function(event) {
				_this.handleMove(event);
			});
		},
		bindTouchEvents: function() {
			var $type_container = $(this._type_container),
				_this = this;

			$type_container.on('touchmove touchstart', function(event) {
					_this.handleMove(event);
			});
			$type_container.on('touchend', function(event) {
				_this.resetScrubber(event);
			});
		},
		handleMove: function(event) {
			event.preventDefault();
			var scrub_pos = this.getScrubPosition(event);
			this.moveScrubber(scrub_pos);
		},
		getScrubPosition: function(event) {
			return this.getOffset(event);
		},
		moveScrubber: function(scrub_pos) {
			$(this._type_mask).css({
				width: scrub_pos
			});
		},
		resetScrubber: function(event) {
			event.preventDefault();
			$(this._type_mask).css({
				'width': '50%'
			});
		},
		getOffset: function(event) {
			if(event.type === 'mousemove') {
				return event.offsetX;
			} else if (event.type === 'touchmove' || event.type === 'touchstart') {
				return event.originalEvent.touches[0].pageX - $(this._container).offset().left;
			} else {
				console.error('Not Valid Event');
				console.log(event);
				return 0;
			}
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
		$.each($('#hlr-type-container').find('img'), function(index, img) {
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

	$(window).ready(function() {
		var img_paths = _setUpImgPaths();
		ts = new TypeScrubber();
		bs = new BackgroundSlideshow(img_paths);
		console.log('ready');
		_findResponsiveImage();
	});

	$(window).load(function() {
		bs.cacheImages();
		console.log('done loading');
	});

	$(window).resize(_findResponsiveImage);


})(jQuery);
