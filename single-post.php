<?php

	$data = Timber::get_context();
	$pi = new TimberPost();
	if (isset($pi->banner_image)){
		$pi->banner_image = new TimberImage($pi->banner_image);
	}
	$data['post'] = $pi;
	if ($pi->custom_title_tag){
		$data['wp_title'] = $pi->custom_title_tag. ' - Upstatement Blog';
	} else {
		$data['wp_title'] = $pi->get_title() . ' - Upstatement Blog';
	}
	if ($pi->custom_description){
		$data['meta_desc'] = $pi->custom_description;
	} else {
		$data['meta_desc'] = strip_tags($pi->get_preview(30, true, '', true));
	}
	$data['sidebar'] = Timber::get_sidebar();

	Timber::render('single.twig', $data);

	