<?php
	global $has_children;
	$has_children = array('page');

	require_once('wp/acf-blog-options.php');
	require_once('wp/portfolio-entry.php');
	require_once('wp/theme.php');
	add_theme_support('menus');
	add_theme_support( 'post-thumbnails' );

	add_action( 'widgets_init', 'arphabet_widgets_init' );

	function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'Home right sidebar',
		'id' => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}

	if (function_exists('register_options_page')){
		register_options_page('Look & Feel');
		register_options_page('Promos');
		register_options_page('Portfolio Entries');
	}

	function say_what($message = '', $suffix = ''){
		echo 'say '.$message . ' and ' . $suffix;
	}

	function get_post_info($pid = 0){
		PostMaster::get_post_info($pid);
	}

	function load_scripts(){
		wp_enqueue_script('jquery');
	}
	/*
	Timber::add_route('portfolio', function(){
		Timber::load_template('archive-portfolio.php');
	});
	*/
	add_action('ups_cron_hour', 'categorize_tweets');

	//categorize_tweets();

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

	add_action('wp_enqueue_scripts', 'load_scripts');

	update_option('siteurl', 'http://'.$_SERVER['HTTP_HOST']);
	update_option('home', 'http://'.$_SERVER['HTTP_HOST']);
