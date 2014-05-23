<?php


	$data = Timber::get_context();
	$pi = new TimberPost();
	$data['post'] = $pi;
	$data['jobs'] = get_field('jobs', $pi->ID);
	$data['wp_title'] = 'Jobs at Upstatement - Design, Development, Web Design careers';
	$data['overview'] = get_field('jobs_overview', $pi->ID);
	$data['overview'] = $data['overview'][0];
	Timber::render(array('page-'.$pi->post_name.'.twig', 'page.twig'), $data);
