<?php

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
	$data['wp_title'] = 'Upstatement - '.get_bloginfo('description');
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

	/* Get the stuff for the form */
	$data['form'] = new TimberPost(27);
	$data['form']->actions = array(
			array('link'=>'#url:trigger-form-contact', 'name' => 'Hire us for your project')
	);

	$data['blogs'] = Timber::get_posts('post_type=post&numberposts=4');
	//$tweets = Timber::get_posts('post_type=tweets&meta_key=tweet_type&meta_value=status');
	//$tweets = array_splice($tweets, 0, 1);	

	//$data['tweets'] = $tweets;
	Timber::render('home.twig', $data);
