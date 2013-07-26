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
		$tiles = array('post_type' => 'portfolio', 'meta_key' => '_thumbnail_id', 'numberposts' => '-1', 'post__not_in' => array($pi->ID));
		$data['tiles'] = Timber::get_posts($tiles);
		$data['post']->billboard_src = PostMaster::get_image_path($data['post']->billboard);
		Timber::render('single-portfolio.twig', $data);
	