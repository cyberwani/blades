<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */


		$data = Timber::get_context();
		$data['post'] = new TimberPost();
		$data['sidebar'] = Timber::get_sidebar('sidebar.php');
		Timber::render('single.twig', $data);

