<?php
	global $has_children;
	$has_children = array('page');
	include('functions/functions-theme-preview.php');
	//include('functions/functions-custom-menus.php');

	include('acf/acf-blog-options.php');

	if (function_exists('register_options_page')){
		register_options_page('Look & Feel');
		register_options_page('Promos');
		register_options_page('Portfolio Entries');
	}

	function get_post_info($pid = 0){
		PostMaster::get_post_info($pid);
	}

	function get_portfolio_info($pi){
		if (is_numeric($pi)){
			$pi = get_post_info($pi);
		}
		$pi->layouts = get_field('layouts', $pi->ID);
		return $pi;
	}



	function load_scripts(){
		wp_enqueue_script('jquery');
		Inkwell::load_script('js/libs/jquery.pjax.js', array('jquery'));
		Inkwell::load_script('js/plugins.js', array('jquery'));
		wp_enqueue_script('iosSlider', THEME_ABS.'/js/libs/jquery.iosslider.min.js', array('jquery'), false, true);
		wp_enqueue_script('easing', THEME_ABS.'/js/libs/jquery.easing-1.3.js', array('jquery'), false, true);
		wp_enqueue_script('scrollto', THEME_ABS.'/js/libs/jquery.scrollto.min.js', array('jquery'), false, true);
		//wp_enqueue_script('exregexp', THEME_ABS.'/js/libs/xregexp.js', null, false, true);
		wp_enqueue_script('localscroll', THEME_ABS.'/js/libs/jquery.localscroll.js', array('jquery'), false, true);
		wp_enqueue_script('syntax-js', THEME_ABS.'/js/libs/sh/scripts/shCore.js', null, false, true);
		wp_enqueue_script('syntax-hl-twig', THEME_ABS.'/js/libs/sh/scripts/shBrushTwig.js', array('syntax-js'), false, true);
		wp_enqueue_script('syntax-hl-php', THEME_ABS.'/js/libs/sh/scripts/shBrushPhp.js', array('syntax-js'), false, true);
		wp_enqueue_script('lazyload', THEME_ABS.'/js/libs/jquery.lazyload.min.js', null, false, true);
		wp_enqueue_script('blades', THEME_ABS.'/js/blades.js?cache=no', array('jquery'), false, true);
		wp_enqueue_script('modernizr', THEME_ABS.'/js/libs/modernizr.min.js', null, false, true);
		
		wp_enqueue_style('syntax-css', THEME_ABS.'/js/libs/sh/styles/shCore.css');
		wp_enqueue_style('syntax-css-default', THEME_ABS.'/js/libs/sh/styles/shThemeDefault.css');


		//wp_enqueue_style('bladescss', THEME_ABS.'/wp-content/themes/_design/_css/screen.css');
		//wp_enqueue_style('bladescss', THEME_ABS.'/wp-content/themes/_design/_css/screen.css');
		
	}

	register_activation_hook(__FILE__, 'my_activation');
	add_action('ups_cron_hour', 'categorize_tweets');

	function my_activation() {
		wp_schedule_event( time(), 'hourly', 'ups_cron_hour');
	}
	categorize_tweets();
	function categorize_tweets(){
		global $wpdb;
		$query = "SELECT post_title, ID FROM $wpdb->posts WHERE menu_order = '0' AND post_type = 'tweets'";
		$results = $wpdb->get_results($query, OBJECT);
		foreach($results as $tweet){
			$letter = strtolower(substr($tweet->post_title, 0, 1));
			$value = 'status';
			if ($letter == '@'){
				$value = 'reply';
			} else if ($letter == 'r'){
				$value = 'retweet';
			} 
			$tweet->menu_order = 1;
			wp_update_post($tweet);
			update_post_meta($tweet->ID, 'tweet_type', $value);
		}
	}

	function get_resized_image($src, $w, $h = 0, $ratio = 0, $append = ''){
		if (isset($w) && $h == 0){
			$base = basename($src);
			$src = '/resize/timthumb.php/'.$base.'?src='.$src.'&amp;w='.$w . $append;
			//$src = '/resize/'.$w.'x'.$h.'/r'.$src.$append;
			if ($ratio){
				$ratio = explode(':', $ratio);
				$h = ($w/$ratio[0]) * $ratio[1];
				$src .= '&h='.$h;
			}
		} else if (isset($w) && isset($h)){
			$base = basename($src);
			$src = '/resize/timthumb.php/'.$base.'?src='.$src.'&amp;w='.$w.'&amp;h='.$h.'&amp;'.$append;
			//$src = '/resize/'.$w.'x'.$h.'/r'.$src.$append;
		}
		return $src;
	}

	add_action('wp_enqueue_scripts', 'load_scripts');

	update_option('siteurl', 'http://'.$_SERVER['HTTP_HOST']);
	update_option('home', 'http://'.$_SERVER['HTTP_HOST']);
