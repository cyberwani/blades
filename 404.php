<?php
	$data = Timber::get_context();
	//$data['post'] = PostMaster::get_post_info(2611);
	Timber::render('404.twig', $data);


