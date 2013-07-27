<?php

	$data = Timber::get_context();
	global $wp_query;
	$api = false;
	if (isset($_GET['api'])){
		$api = $_GET['api'];
	}
	$data['base'] = 'base.twig';
	if ($api){
		$data['base'] = 'base-blank.twig';
	} 
	$data['wp_title'] = 'Upstatement - Blog';
	$page = 0;
	if ($wp_query->query_vars['paged']){
		$page = $wp_query->query_vars['paged'];
	}
	
	$sticky = get_option('sticky_posts');
	$sticky = PHPHelper::array_truncate($sticky, 4);
	if ($page == 0){
		$featured_query = array('post_type' => 'post', 'numberposts' => 4, 'post__in'  => $sticky);
		$data['blog_featured'] = Timber::get_posts($featured_query);
	}

	$cron_query = array('post_type' => 'post', 'numberposts' => 6, 'post__not_in' => $sticky, 'offset' => $page * 6);
	$data['blog_cron'] = Timber::get_posts($cron_query);

	$next_query = array('post_type' => 'post', 'numberposts' => 1, 'post__not_in' => $sticky, 'offset' => ($page+1) * 6);
	$data['blog_next'] = Timber::get_posts($next_query);

	$data['tags'] = Timber::get_terms('tax=tags&orderby=count&number=20');
	shuffle($data['tags']);
	$data['tags'] = WPHelper::array_truncate($data['tags'], 10);

	$next_page = $page + 1;
	if ($page == 0){
		$next_page = 2;
	}	
	if (count($data['blog_next'])){
		$data['next_button_url'] = '/blog/page/'.$next_page;
	}
	if ($api){
		Timber::render('archive-blog-loop.twig', $data);
	} else {
		$data['sidebar'] = Timber::get_sidebar('sidebar.php');
		Timber::render('archive-blog.twig', $data);
	}