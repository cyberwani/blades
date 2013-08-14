<?php

	$data = Timber::get_context();

	/* Get the billboarded tiles and stick them on the homepage */
	$data['wp_title'] = 'Upstatement - '.get_bloginfo('description');
	$data['promos'] = array();
	$promos = get_field('homepage_promos', 'option');
	foreach($promos as $promo){
		$promo = Timber::get_post($promo->ID);
		foreach($promo->squares as &$square){
			$square = new TimberPost($square);
		}
		$data['promos'][] = $promo;
	}
	/* Get the stuff for the form */
	$data['form'] = new TimberPost(27);
	$data['form']->actions = array(
			array('link'=>'#url:trigger-form-contact', 'name' => 'Hire us for your project')
	);
	$data['blogs'] = Timber::get_posts('post_type=post&numberposts=4');

	Timber::render('home.twig', $data);
