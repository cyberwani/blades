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
	$people = get_field('person', $pi->ID);
	$data['people'] = array();
	foreach($people as $person){
		$person = PHPHelper::array_to_object($person);
		if (strlen($person->image)){
			$person->image = PostMaster::get_path($person->image);
		} 
		if (strlen($person->face)){
			$person->face = PostMaster::get_path($person->face);
		}
		$data['people'][] = $person;
	}
	render_twig('page-about.twig', $data);
