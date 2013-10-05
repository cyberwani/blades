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
	$data['people'] = get_field('person', $pi->ID);
	$data['wp_title'] = 'About Upstatement';
	Timber::render('page-about.twig', $data);
