<?php

	$data = Timber::get_context();
	$pi = new TimberPost();
	if (isset($pi->banner_image)){
		$pi->banner_image = new TimberImage($pi->banner_image);
	}
	$data['post'] = $pi;
	$data['wp_title'] = $pi->get_title() . ' - Upstatement Blog';
	$data['comment_form'] = InkwellComments::get_dsq_comments($pid);
	$data['sidebar'] = Timber::get_sidebar();
	Timber::render('single.twig', $data);