/*jshint unused:false */
/*global $:false, _:false, Swiper:false, Hammer:false */

/*
 * Nav module for Boston.com prototype
 * by Nathan Hass c/o Upstatement (@upstatement)
 *
 */

console.log('hiiii');

(function($) {

	var total_width = $('.hlr-bg-timeline').width() - $('.hlr-bg-scrubber').width();
	var num_images = 50;

	$(window).resize(function() {
		total_width = $('.hlr-bg-timeline').width() - $('.hlr-bg-scrubber').width();
		console.log(total_width);
	});

	$('.hlr-bg-scrubber').draggable({
		drag: function(event, ui) {
			console.log(($(this).position().left/total_width)*50);
		},
		scroll:false,
		//grid: [2,0],
		containment: '.hlr-bg-timeline'
	});

	// var id;

	// var func = function(event) {
	// 	$('.hlr-bg-scrubber').animate({
	// 		"left": $('.hlr-bg-scrubber').position().left + 50
	// 	});
	// };


	$('.hlr-type-imgs').on('mousemove', function(event){
		$('.hlr-type-mask').css({
			'width': event.offsetX + 'px'
		});
	});

	var $hlrSlider = $('.hlr-bg-slider');

	function hlr_playBGs() {
		// id = setInterval(func, 50);
		$hlrSlider.removeClass('hlr-bg-paused');
		$hlrSlider.addClass('hlr-bg-playing');
	}

	function hlr_pauseBGs() {
		clearInterval(id);
		$hlrSlider.removeClass('hlr-bg-playing');
		$hlrSlider.addClass('hlr-bg-paused');
	}

	$('.hlr-bg-btn').on('click', function() {
		if ($hlrSlider.hasClass('hlr-bg-paused')) {
			hlr_playBGs();
		} else {
			hlr_pauseBGs();
		}
	});


})(jQuery);
