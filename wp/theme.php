<?php

class TimberTheme {
	
	function __construct(){
		add_action('wp_enqueue_scripts', function(){
			wp_dequeue_style('simple-share-css');
		}, 100);
	}
}

new TimberTheme();