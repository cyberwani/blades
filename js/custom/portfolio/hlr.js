/*jshint unused:false */
/*global $:false, _:false, Swiper:false, Hammer:false */

/*
 * Nav module for Boston.com prototype
 * by Nathan Hass c/o Upstatement (@upstatement)
 *
 */
(function($) {

	var $hlrSlider = $('.hlr-bg-slider');

	function hlr_playBGs() {
		$hlrSlider.removeClass('hlr-bg-paused');
		$hlrSlider.addClass('hlr-bg-playing');
	}

	function hlr_pauseBGs() {
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
