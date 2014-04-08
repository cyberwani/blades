<?php
	global $has_children;
	$has_children = array('page');

	require_once(__DIR__.'/wp/acf-blog-options.php');
	if (class_exists('Timber')){
		require_once('wp/portfolio-entry.php');
		require_once('wp/blades-site.php');
	}
	add_theme_support('menus');
	add_theme_support('post-thumbnails');

	add_filter('timber_context', function($data){
		$data['menu'] = new TimberMenu();
		return $data;
	});


	if (function_exists('register_options_page')){
		register_options_page('Look & Feel');
		register_options_page('Promos');
		register_options_page('Portfolio Entries');
	}

	function load_scripts(){
		wp_enqueue_script('jquery');
	}

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
	if (class_exists('Jigsaw')){

		Jigsaw::add_column('highlights', 'Thumb', function($pid){
	    	$data = array();
	    	$data['post'] = new TimberPost($pid);
			Timber::render('admin/portfolio-square-preview.twig', $data);
		}, -1000);

		Jigsaw::add_column('portfolio', 'Preview', function($pid){
	    	$data = array();
	    	$data['post'] = new TimberPost($pid);
			Timber::render('admin/portfolio-square-preview.twig', $data);
		}, -1000);
	}

	Timber::add_route('blog', function($params){
		$sticky = get_option('sticky_posts');
		$sticky = WPHelper::array_truncate($sticky, 4);
		$page = 0;
		$query = array('post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => $sticky, 'offset' => $page * 6);
		Timber::load_template('archive-blog.php', $query);
	});

	Timber::add_route('blog/page/:pg', function($params){
		$sticky = get_option('sticky_posts');
		$sticky = WPHelper::array_truncate($sticky, 4);
		$page = $params['pg'];
		$page -= 1;
		$page = max(0, $page);
		$query = array('post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => $sticky, 'offset' => $page * 6);
		Timber::load_template('archive-blog.php', $query);
	});

	add_action('init', function(){
		BladesSite::register_post_types();
	});
