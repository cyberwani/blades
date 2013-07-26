<?php


	$data = Timber::get_context();
	$pi = new TimberPost();
	$data['post'] = $pi;
	$data['jobs'] = get_field('jobs', $pi->ID);

	$template_file = 'page.twig';
	if (file_exists(__DIR__.'/views/page-'.$pi->post_name.'.twig')){
		$template_file = 'page-'.$pi->post_name.'.twig';
	} 
	Timber::render($template_file, $data);
