<?php
/**
 * The Template for displaying all single posts.
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
		$pi->banner_image = PostMaster::get_image_path($pi->banner_image);
		$data['post'] = $pi;
		$data['comments'] = get_comments(array('post_id' => $pi->ID, 'type' => 'comment'));
		$data['respond'] = WPHelper::get_comment_form(null, $pi->ID);
		render_twig('single.html', $data);
	?>
<?php endwhile; // end of the loop. ?>

<section class="archive-blog-ftr">
	<div class="wrapper">
<?php get_sidebar(); ?>
	</div>
</section>

<?php get_footer(); ?>