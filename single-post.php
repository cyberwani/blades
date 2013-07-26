<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */


		$data = Timber::get_context();
		$pi = new TimberPost();
		$pi->banner_image = PostMaster::get_image_path($pi->banner_image);
		$data['post'] = $pi;
		$data['comments'] = get_comments(array('post_id' => $pi->ID, 'type' => 'comment'));
		$data['respond'] = WPHelper::get_comment_form(null, $pi->ID);
		$data['sidebar'] = Timber::get_sidebar();
		render_twig('single.twig', $data);