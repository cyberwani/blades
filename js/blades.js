var upSite;

;(function($) {

	function UpSite() {
		this.createSlider();
		this.bindHandlers();
		this.initAPI();
		this.initClassFixing();
		this.initSyntaxHighlighting();
	}

	UpSite.prototype.initSyntaxHighlighting = function(){
		SyntaxHighlighter.defaults['toolbar'] = true;

		SyntaxHighlighter.all();
	};

	UpSite.prototype.initAPI = function(){
		var $newButton = $('.api-next').first();
		var $oldButton = $('.api-next').last();
		this.setAPIButtons($newButton, $oldButton);
	};

	UpSite.prototype.initClassFixing = function(){
		var first_last = new Array('table tr', 'table td', 'dl dt', 'ul li', '.table_container .table_default');
		for (var i=0; i<first_last.length; i++){
			var f = first_last[i];
			$(f+":first-child").addClass("first");
			$(f+":last-child").addClass("last");
		}
		$("table tr:odd").addClass("odd");
		//nth-child fixes for media-grid
		$(".media-block:nth-child(2n+3)").addClass("n3");
		$(".media-block:nth-child(3n+4)").addClass("n4");
		$(".media-block:nth-child(4n+5)").addClass("n5");
		$(".media-block:nth-child(5n+6)").addClass("n6");
	};

	UpSite.prototype.bindHandlers = function() {
		//$('body').pjax('a');
		$('.hp-slide-trigger').on('click', this.slideTarget);
		$('#archive-blog').on('click', '.blog-load-more', $.proxy(this.loadFromAPI, this));
		$('.cover-overview').localScroll();

		$('img[data-src]').unveil(1000);

		$('#comment').on('focus', function(e){
			var $this = $(e.currentTarget);
			var $commentMod = $this.closest('.respond');
			var $fields = $commentMod.find('#respond');
			$commentMod.addClass('comment-active');
			$fields.slideDown();
		});

		$(window).load(this.resizeTwitter);
	};

	UpSite.prototype.resizeTwitter = function(){
		$('#twitter-widget-0').attr('width', '600');
	};

	UpSite.prototype.loadFromAPI = function(e){
		e.preventDefault();
		var $button = $(e.currentTarget);
		var $target = $($button.data('target'));
		var items = $button.data('api-items');
		var THIS = this;
		$.get($button.attr('href')+'?api=true', function(data){
			$data = $(data);
			var $items = $data.filter(items);
			var $newButton = $data.filter('.api-next');
			var $oldButton = $target.next('.api-next');
			THIS.setAPIButtons($newButton, $oldButton);
			$target.append($items);
		});
	};

	UpSite.prototype.setAPIButtons = function($newButton, $oldButton){
		$oldButton.after($newButton);
		$oldButton.remove();
	};

	UpSite.prototype.slideTarget = function(e){
		var $this = $(e.currentTarget);
		var targetSlide = $this.data('target');
		var slideQuery = '.hp-slide[data-name="'+targetSlide+'"]';
		var $slide = $(slideQuery);
		// $('.hp-slide').css('opacity', '0');
		$slide.css('opacity', '1');
		console.log($slide);
		console.log(targetSlide);
	};

	UpSite.prototype.createSlider = function(){
		$('.cover').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			keyboardControls: true,
			navNextSelector: $('.slidenav .next'),
			navPrevSelector: $('.slidenav .prev'),
			infiniteSlider: true,
			onSliderLoaded: slideText,
			onSlideChange: slideText,
			//and many more things, see website for documentation http://iosscripts.com/iosslider/
		});
	};

	//Holiday Video delivery
	var holidayVideo = '<iframe src="//player.vimeo.com/video/81147811?autoplay=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	
	$('.holiday-play-btn').on('click', function(){
		$('.vimeo-target-div').toggleClass('active');
		$('.holiday-2k13-banner').toggleClass('active');
		$('.vimeo-movie-container').html(holidayVideo);
	});

	//Mobile nav toggling action-action-action
	$(".nav-toggle-m").click(function(){
	  	console.log('clicked');
	    $("#access").toggleClass("visible");
	});

	function slideText(args) {
		var o = args.currentSlideObject;
		var sliderMessage = $(o).find('.slider-message-hidden').html();
		var sliderID = $(o).attr('id');
		var sliderIDmsg = sliderID+'-msg';
		var s = $(o).data('service');
		var $msg = $("#cover-msg");
		var $msgMod = $("#cover-msg").closest('.h1');
		$msg.hide();
		$msgMod.removeAttr('id');
		$msgMod.attr('id', sliderIDmsg);
		$msg.html(sliderMessage);
		$msg.fadeIn();
	}

	upSite = new UpSite();

})(jQuery);