<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */


		$data = Timber::get_context();
		$pi = new TimberPost();
		$data['post'] = $pi;
		$template_file = 'page.twig';
		Timber::render(['page-'.$pi->post_name.'.twig', 'page.twig'], $data);
