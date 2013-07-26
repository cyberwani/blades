<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

	

			function get_homepage_tiles($where, $count = 0){
				$posts = Timber::get_posts('post_type=portfolio&numberposts=-1');
				$arr = array();
				foreach($posts as $bb){
					if ($bb->homepage_appearance){
						foreach($bb->homepage_appearance as $appear){
							if ($appear == $where){
								$arr[] = $bb;
							}
						}
					}
				}
				if ($count && $count < count($arr)){
					$arr = array_splice($arr, 0, $count);

				}
				return $arr;
			}
			$data = Timber::get_context();

			/* Get the billboarded tiles and stick them on the homepage */

			$data['billboards'] = get_homepage_tiles('billboard', 3);
			$data['billboards'] = PostMaster::get_related_posts_on_field($data['billboards'], 'billboard');
			$data['promos'] = array();
			$promos = get_field('homepage_promos', 'option');
			foreach($promos as $promo){
				$promo = Timber::get_post($promo->ID);
				foreach($promo->squares as &$square){
					$square = new TimberPost($square);
				}
				$data['promos'][] = $promo;
			}
			
			/* Now fetch the tiles in the middle of the page */
			$data['tiles'] = get_homepage_tiles('featured', 4);

			/* Get the stuff for the form */
			$fid = 27;
			$data['form'] = get_post($fid);
			$data['form']->actions = array(
					array('link'=>'#url:trigger-form-contact', 'name' => 'Hire us for your project')
			);

			$data['blogs'] = Timber::get_posts('post_type=post&numberposts=4');
			$tweets = Timber::get_posts('post_type=tweets&meta_key=tweet_type&meta_value=status');
			$tweets = array_splice($tweets, 0, 1);	

			$data['tweets'] = $tweets;
			render_twig('home.twig', $data);
