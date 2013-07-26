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

		
	$page = 0;
	if ($wp_query->query_vars['paged']){
		$page = $wp_query->query_vars['paged'];
	}
	$data['title'] = "Blog";
	$sticky = get_option('sticky_posts');
	$sticky = PHPHelper::array_truncate($sticky, 4);
	if ($page == 0){
		$data['blog_featured'] = 	Timber::get_posts(array(	'post_type' => 'post', 
															'numberposts' => 4,
															'post__in'  => $sticky
												));
	}


	$data['blog_cron'] = 		Timber::get_posts(array(	'post_type' => 'post', 
														'numberposts' => 6,
														'post__not_in' => $sticky,
														'offset' => $page * 6
											));
	$data['blog_next'] =		Timber::get_posts(array(	'post_type' => 'post', 
														'numberposts' => 1,
														'post__not_in' => $sticky,
														'offset' => ($page+1) * 6
											));
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