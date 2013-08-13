<?php


	$data = Timber::get_context();
	$pi = new TimberPost();
	$data['post'] = $pi;
	$data['jobs'] = get_field('jobs', $pi->ID);

	Timber::render(['page-'.$pi->post_name.'.twig', 'page.twig'], $data);
