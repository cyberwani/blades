<?php
/*
Template Name: Person
*/
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
	$data['wp_title'] = $pi->title() . ' - About Upstatement';
	$data['post']->links = get_field('links');
	foreach($data['post']->links as &$link){
		$link['class'] = 'ss-social';
		if ($link['icon'] == 'home'){
			$link['class'] = ' ';
		}
	}
	$data['post']->image = new TimberImage($pi->image);
	$data['post']->image_mobile = new TimberImage($pi->image_mobile);
	Timber::render(array('page-person-'.$pi->post_name.'.twig', 'page-person.twig'), $data);
