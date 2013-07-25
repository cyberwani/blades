<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
			<article id="post-0" class="post error404 not-found" role="main">
				<?php
					$data['post'] = PostMaster::get_post_info(2611);
					render_twig('404.html', $data);
				?>
			</article>
<?php get_footer(); ?>
