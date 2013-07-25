<?php
	global $wp_query;
	$api = false;
	if (isset($_GET['api'])){
		$api = $_GET['api'];
	}
	if (!$api){
		get_header();
	} 
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php
		
		$data = array();
		$page = 0;
		if ($wp_query->query_vars['paged']){
			$page = $wp_query->query_vars['paged'];
		}
		$data['title'] = "Blog";
		$sticky = get_option('sticky_posts');
		$sticky = PHPHelper::array_truncate($sticky, 4);
		if ($page == 0){
			$data['blog_featured'] = 	PostMaster::get_posts_info(array(	'post_type' => 'post', 
																'numberposts' => 4,
																'post__in'  => $sticky
													));
		}


		$data['blog_cron'] = 		PostMaster::get_posts_info(array(	'post_type' => 'post', 
															'numberposts' => 6,
															'post__not_in' => $sticky,
															'offset' => $page * 6
												));
		$data['blog_next'] =		PostMaster::get_posts_info(array(	'post_type' => 'post', 
															'numberposts' => 1,
															'post__not_in' => $sticky,
															'offset' => ($page+1) * 6
												));
		$next_page = $page + 1;
		if ($page == 0){
			$next_page = 2;
		}	
		if (count($data['blog_next'])){
			$data['next_button_url'] = '/blog/page/'.$next_page;
		}
		if ($api){
			render_twig('archive-blog-loop.html', $data);
		} else {
			render_twig('archive-blog.html', $data);
		}
	?>
<?php endwhile; // end of the loop. ?>

<?php if (!$api) : ?>
	
			<?php get_sidebar(); ?>
		

	<?php get_footer(); ?>

<?php endif; ?>