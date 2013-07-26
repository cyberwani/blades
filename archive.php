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
<?php 
	if ( have_posts() ){ 
		$data = array();
		$page = 0;
		$next_page = 0;
		//print_r($wp_query);
		if ($wp_query->query_vars['paged']){
			$page = $wp_query->query_vars['paged'];
		}
		$data['title'] = "Archive ";
		if (is_date()){
			$data['title'] .= 'for '.get_the_time('F, Y');
		}
		if (is_category()){
			$data['title'] .= 'for posts tagged '.single_cat_title('', false);
		}
		if (is_tag()){
			$data['title'] .= 'for posts tagged '.single_tag_title('', false);
		}
		$data['blog_cron'] = array();
		
		if ($wp_query->max_num_pages > 1){
			$next_page = $page + 1;
			if ($page == 0){
				$next_page = 2;
			}	
			if ($next_page > $wp_query->max_num_pages){
				$next_page = 0;
			}
		}
		while ( have_posts() ) {
			the_post(); 
			$data['blog_cron'][] = PostMaster::get_post_info(get_the_ID());
		}
		if ($next_page){
			$str = $wp_query->query_vars['year'];
			if ($wp_query->query_vars['monthnum']){
				$str .= '/'.$wp_query->query_vars['monthnum'];
			}
			$data['next_button_url'] = '/blog/'.$str.'/page/'.$next_page;
		} else {
			$data['next_button_url'] = '';
		}
		if ($api){
			Timber::render('archive-blog-loop.twig', $data);
		} else {
			Timber::render('archive-blog.twig', $data);
		}
	}
	
?>

<?php if (!$api) : ?>
	<section class="archive-blog-ftr">
		<div class="wrapper">
			<?php get_sidebar(); ?>
		</div>
	</section>

	<?php get_footer(); ?>

<?php endif; ?>