<?php
	$data = Timber::get_context();
	$data['meta_desc'] = 'Upstatement is a small, cross-disciplinary firm that solves problems through design, code, and rapid prototyping.';
	$data['wp_title'] = 'Upstatement - '.get_bloginfo('description');

	/* organzie the hero images */
	$data['heros'] = get_field('billboards', 'options');
	foreach($data['heros'] as &$slide){
		$slide['post'] = new TimberPost($slide['portfolio'][0]);
	}

	/* organize the promos */
	$promos = get_field('homepage_promos', 'option');
	$data['promos'] = Timber::get_posts($promos);

	$data['blogs'] = Timber::get_posts('post_type=post&numberposts=4');
	$highlights = get_field('highlights', 'options');
	$data['highlights'] = Timber::get_posts($highlights);

	Timber::render('home.twig', $data);
