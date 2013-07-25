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


get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php
		$data = array();
		$pi = PostMaster::get_post_info(get_the_ID());
		$data['post'] = $pi;
		$template_file = 'page-person.html';
		$data['post']->links = get_field('links');
		foreach($data['post']->links as &$link){
			$link['class'] = 'ss-social';
			if ($link['icon'] == 'home'){
				$link['class'] = ' ';
			}
		}
		$data['post']->image_src = PostMaster::get_image_path($pi->image);
		$data['post']->image_mobile_src = PostMaster::get_image_path($pi->image_mobile);
		render_twig($template_file, $data);
	?>
<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>