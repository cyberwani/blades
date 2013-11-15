<?php
	$data = Timber::get_context();
	$data['meta_desc'] = 'Upstatement is a boutique, cross-disciplinary design firm that solves problems through design, code, and rapid prototyping.';
	$data['wp_title'] = 'Upstatement - '.get_bloginfo('description');

	/* organzie the hero images */
	$data['heros'] = get_field('billboards', 'options');
	foreach($data['heros'] as &$slide){
		$slide['post'] = new TimberPost($slide['portfolio'][0]);
	}
	$data['rand'] = rand();

	/* organize the promos */
	$promos = get_field('homepage_promos', 'option');
	$data['promos'] = Timber::get_posts($promos);

	$data['blogs'] = Timber::get_posts('post_type=post&numberposts=3');
	$highlights = get_field('highlights', 'options');
	$data['highlights'] = array_chunk(Timber::get_posts($highlights), 2);
	$data['logo_pond'] = get_field('logo_pond', 'options');

	Timber::render('home-new.twig', $data, 600);
