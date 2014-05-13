<?php
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
		register_options_page('Homepage');
		register_options_page('Site Info');
	}

	function load_scripts(){
		wp_enqueue_script('jquery');
	}

	add_action('wp_enqueue_scripts', 'load_scripts');

	update_option('siteurl', 'http://'.$_SERVER['HTTP_HOST']);
	update_option('home', 'http://'.$_SERVER['HTTP_HOST']);


	Timber::add_route('blog', function($params){
		$sticky = get_option('sticky_posts');
		$sticky = TimberHelper::array_truncate($sticky, 4);
		$page = 0;
		$query = array('post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => $sticky, 'offset' => $page * 6);
		Timber::load_template('archive-blog.php', $query);
	});

	Timber::add_route('blog/page/:pg', function($params){
		$sticky = get_option('sticky_posts');
		$sticky = TimberHelper::array_truncate($sticky, 4);
		$page = $params['pg'];
		$page -= 1;
		$page = max(0, $page);
		$query = array('post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => $sticky, 'offset' => $page * 6);
		Timber::load_template('archive-blog.php', $query);
	});

	BladesSite::register_post_types();
	BladesSite::apply_admin_customizations();

	add_action('init', function(){
		BladesSite::register_post_types();
	});

	if (class_exists('ChainsawDashboard')){
		$dashboard = new ChainsawDashboard('wp-content/themes/blades/blades-dashboard.json');
	}
