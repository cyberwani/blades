<?php

		$data = Timber::get_context();
		$data['wp_title'] = 'Upstatement - Portfolio';

		$entry_manual = array();
		$entries = get_field('entries', 'option');
		if($entries){
			foreach($entries as $e){
				$entry_manual[] = $e->ID;
			}
		}
		$entry_manual = WPHelper::array_truncate($entry_manual, 3);


		$fp = new TimberPost(3251);
		$fp->squares = get_field('squares', $fp->ID);
		$billboards = array();
		foreach($fp->squares as $square){
			$bb = new TimberPost($square);
			$bb->billboard = new TimberImage($bb->billboard);
			$billboards[] = $bb;
		}
		$data['billboards'] = $billboards;

		$data['tiles'] = Timber::get_posts('post_type=portfolio&numberposts=-1');

		$data['clients'] = Timber::get_posts('post_type=portfolio&numberposts=-1');
		$portfolio_client_names = array();
		foreach($data['clients'] as $client){
			$portfolio_client_names[] = $client->client_name;
		}
		$client_list = Timber::get_post('client-list');
		$client_list = explode( "\n", $client_list->post_content);
		$client_list = array_unique($client_list);
		//array_uintersect($client_list, $portfolio_client_names);
		foreach($client_list as &$client){
			$client = trim($client);
		}
		$data['clients'] = array_merge($data['clients'], $client_list);
		$clients = array();
		foreach($data['clients'] as $client){
			if (is_string($client)){
				$client_name = $client;
				$new_client = new stdClass();
				$new_client->client_name = $client_name;
				$clients[] = $new_client;
			} else if (!$client->client_name){
				$client->client_name = $client->post_title;
				$clients[] = $client;
			} else {
				$clients[] = $client;
			}
		}
		$data['clients'] = $clients;
		WPHelper::osort($data['clients'], 'client_name');
		Timber::render('archive-portfolio.twig', $data);
	