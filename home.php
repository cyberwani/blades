<?php

	$data = Timber::get_context();

	$data['wp_title'] = 'Upstatement - '.get_bloginfo('description');

	/* organzie the hero images */
	$data['heros'] = get_field('billboards', 'options');
	foreach($data['heros'] as &$slide){
		$slide['post'] = new TimberPost($slide['portfolio'][0]);
	}

	/* organize the promos */
	$data['promos'] = array();
	$promos = get_field('homepage_promos', 'option');
	foreach($promos as $promo){
		$promo = Timber::get_post($promo->ID);
		foreach($promo->squares as &$square){
			$square = new TimberPost($square);
		}
		$data['promos'][] = $promo;
	}

	$data['blogs'] = Timber::get_posts('post_type=post&numberposts=4');

	Timber::render('home.twig', $data);
