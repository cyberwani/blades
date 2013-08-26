<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php 
	$data['title'] = 'Search Results for: ' . get_search_query();
	$data['blog_cron'] = array();
	while ( have_posts() ) : the_post(); ?>
		<?php
			$data['blog_cron'][] = PostMaster::get_post_info(get_the_ID());
		?>
	<?php endwhile; // End the loop. Whew. ?>
<?php else : ?>
					<h2><?php _e( 'Nothing Found', 'boilerplate' ); ?></h2>
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'boilerplate' ); ?></p>
					<?php get_search_form(); ?>
<?php endif; ?>
<?php
	Timber::render('archive-blog.html', $data);
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
