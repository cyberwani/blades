<?php
/**
 * The Template for displaying all single portfolio posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

		$data = Timber::get_context();
		
		$pi = PostMaster::get_post_info(get_the_ID()); 
		$content = get_portfolio_info($pi); //to send the layouts/content to twig, just appends it to the post_info object you retireved with get_post_info, we'll send it all under 'post'.
		$data['post'] = $content;
		$tiles = array('post_type' => 'portfolio', 'meta_key' => '_thumbnail_id', 'numberposts' => '-1', 'post__not_in' => array($pi->ID));
		$data['tiles'] = PostMaster::get_posts_info($tiles);
		$data['post']->billboard_src = PostMaster::get_image_path($data['post']->billboard);
		render_twig('single-portfolio.html', $data);
	?>
<?php endwhile; // end of the loop. ?>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>