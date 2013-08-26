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
	$data['wp_title'] = 'Upstatement - Portfolio - ' .$pi->title();
	$tiles = array('post_type' => 'portfolio', 'meta_key' => '_thumbnail_id', 'numberposts' => '-1', 'post__not_in' => array($pi->ID));
	$data['tiles'] = Timber::get_posts($tiles);
	if (isset($pi->billboard) && strlen($pi->billboard) > 0){
		$billboard = new TimberImage($pi->billboard);
		$data['post']->billboard_src = $billboard->get_src();
	}
	Timber::render(array('single-portfolio-'.$pi->slug.'.twig', 'single-portfolio.twig'), $data);
