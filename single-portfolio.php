<?php
/**
 * The Template for displaying all single portfolio posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

	$data = Timber::get_context();

	$pi = new PortfolioEntry();
	$data['post'] = $pi;

	if ($pi->custom_title_tag){
		$data['wp_title'] = $pi->custom_title_tag. ' - Upstatement Portfolio';
	} else {
		$data['wp_title'] = 'Upstatement Portfolio - ' .$pi->title();
	}
	if ($pi->custom_description){
		$data['meta_desc'] = $pi->custom_description;
	} else {
		$data['meta_desc'] = strip_tags($pi->get_preview(30, true, '', true));
	}
	$tiles = array('post_type' => 'portfolio', 'meta_key' => '_thumbnail_id', 'numberposts' => '-1', 'post__not_in' => array($pi->ID));
	$data['tiles'] = Timber::get_posts($tiles);
	if (post_password_required($post->ID)){
		Timber::render('single-password.twig', $data);
	} else {
		Timber::render(array('single-portfolio-'.$pi->slug.'.twig', 'single-portfolio.twig'), $data);
	}