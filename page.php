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

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php
		$data = array();
		$pi = PostMaster::get_post_info(get_the_ID());
		$data['post'] = $pi;
		$template_file = 'page.html';
		if (file_exists(__DIR__.'/views/page-'.$pi->post_name.'.html')){
			$template_file = 'page-'.$pi->post_name.'.html';
		} 
		render_twig($template_file, $data);
	?>
<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>