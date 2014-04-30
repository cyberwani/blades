<?php

	class BladesSite extends TimberSite {

		public static function register_post_types(){
			self::register_post_type_portfolio();
			self::register_post_type_highlights();
			self::register_post_type_promo();
			self::register_post_type_furniture();
		}

		public static function register_post_type_promo(){
			register_post_type('promos', array(
			'label' => 'Promos',
			'description' => 'Homepage Promo',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'menu_icon' => 'dashicons-align-center',
			'rewrite' => array('slug' => 'promos', 'with_front' => true),
			'query_var' => true,
			'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes'),
			'labels' => array(
				'name' => 'Promos',
				'singular_name' => 'Promo',
				'menu_name' => 'Promos',
				'add_new' => 'Add Promo',
				'add_new_item' => 'Add New Promo',
				'edit' => 'Edit',
				'edit_item' => 'Edit Promo',
				'new_item' => 'New Promo',
				'view' => 'View Promo',
				'view_item' => 'View Promo',
				'search_items' => 'Search Promos',
				'not_found' => 'No Promos Found',
				'not_found_in_trash' => 'No Promos Found in Trash',
				'parent' => 'Parent Promo',
				)
			));
		}

		public static function register_post_type_furniture(){
			register_post_type('furniture', array(
				'label' => 'Furniture',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNy4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IllvdXJfSWNvbiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAxMDAgMTAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAxMDAgMTAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik05OS44LDQxLjVjLTAuOS00LjktNi4yLTguNy0xMS40LTcuNWMtMC44LDAuMi0xLjYsMC40LTIuNCwwLjdjLTIuOSwxLjEtNS4xLDIuOS01LjksNi4zDQoJYy0wLjMsMS4zLTAuNSwyLjYtMC41LDMuOWMwLDQsMCw4LDAsMTJjMCw0LjYsMCw5LjMsMCwxMy45YzAsOC44LDAsMTcuNywwLDI2LjVjMCwxLjEsMC40LDEuNywxLjQsMmMyLjcsMC44LDUuNCwwLjksOC4xLDAuMQ0KCWMxLTAuMywxLjQtMC45LDEuNC0yYzAtMTEuNywwLTIzLjUsMC0zNS4yYzAtMC45LDAuMi0xLjgsMC41LTIuNmMxLjUtNCw0LjQtNyw2LjgtMTAuNEM5OS44LDQ2LjksMTAwLjMsNDQuMyw5OS44LDQxLjV6Ii8+DQo8cGF0aCBmaWxsPSIjRkZGRkZGIiBkPSJNMjAuNCw3MC44YzAtNC42LDAtOS4zLDAtMTMuOWMwLTQsMC04LDAtMTJjMC0xLjMtMC4yLTIuNi0wLjUtMy45Yy0wLjgtMy40LTMtNS4yLTUuOS02LjMNCgljLTAuNy0wLjMtMS41LTAuNS0yLjQtMC43QzYuNCwzMi44LDEsMzYuNiwwLjIsNDEuNWMtMC41LDIuOCwwLjEsNS40LDEuOSw3LjhjMi41LDMuMyw1LjQsNi40LDYuOCwxMC40YzAuMywwLjgsMC41LDEuOCwwLjUsMi42DQoJYzAsMTEuNywwLDIzLjUsMCwzNS4yYzAsMS4xLDAuNCwxLjgsMS40LDJjMi43LDAuNyw1LjQsMC43LDguMS0wLjFjMS0wLjMsMS40LTAuOSwxLjQtMkMyMC4zLDg4LjUsMjAuNCw3OS43LDIwLjQsNzAuOHoiLz4NCjxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik03NC4yLDU2LjNIMjUuOGMtMS40LDAtMi41LDEuMS0yLjUsMi41djEwLjhoNTMuNFY1OC44Qzc2LjcsNTcuNSw3NS42LDU2LjMsNzQuMiw1Ni4zeiIvPg0KPHJlY3QgeD0iMjMuMyIgeT0iNzIuNCIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjUzLjQiIGhlaWdodD0iMTguMyIvPg0KPHBhdGggZmlsbD0iI0ZGRkZGRiIgZD0iTTgzLDMyLjZDODEuOCwxNC43LDY3LjcsMC40LDUwLjUsMGMwLDAsMCwwLDAsMGMtMC4xLDAtMC4yLDAtMC4zLDBjLTAuMSwwLTAuMSwwLTAuMiwwYy0wLjEsMC0wLjQsMC0wLjUsMA0KCWMwLDAsMCwwLDAsMEMzMi4zLDAuNCwxOC4yLDE0LjcsMTcsMzIuNmMzLDEuNyw1LDQuMyw1LjgsNy42YzAuMSwwLjUsMC4zLDQsMC41LDYuN3Y2LjZoMi41aDQ4LjRoMi41VjQ3YzAuMS0yLjgsMC40LTYuMiwwLjUtNi43DQoJQzc4LDM2LjksNzkuOSwzNC4zLDgzLDMyLjZ6Ii8+DQo8L3N2Zz4NCg==',
				'capability_type' => 'post',
				'map_meta_cap' => true,
				'hierarchical' => false,
				'rewrite' => array('slug' => 'furniture', 'with_front' => true),
				'query_var' => true,
				'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes'),
				'labels' => array(
					'name' => 'Furniture',
					'singular_name' => 'Furniture',
					'menu_name' => 'Furniture',
					'add_new' => 'Add Furniture',
					'add_new_item' => 'Add New Furniture',
					'edit' => 'Edit',
					'edit_item' => 'Edit Furniture',
					'new_item' => 'New Furniture',
					'view' => 'View Furniture',
					'view_item' => 'View Furniture',
					'search_items' => 'Search Furniture',
					'not_found' => 'No Furniture Found',
					'not_found_in_trash' => 'No Furniture Found in Trash',
					'parent' => 'Parent Furniture',
				)
			) );
		}

		public static function register_post_type_highlights(){
			register_post_type('highlight', array(
				'label' => 'Highlights',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'post',
				'map_meta_cap' => true,
				'hierarchical' => false,
				'menu_icon' => 'dashicons-star-filled',
				'rewrite' => array('slug' => 'highlights', 'with_front' => true),
				'query_var' => true,
				'supports' => array('title','editor','revisions','thumbnail'),
				'labels' => array(
					'name' => 'Highlights',
					'singular_name' => 'Highlight',
					'menu_name' => 'Highlights',
					'add_new' => 'Add Highlight',
					'add_new_item' => 'Add New Highlight',
					'edit' => 'Edit',
					'edit_item' => 'Edit Highlight',
					'new_item' => 'New Highlight',
					'view' => 'View Highlight',
					'view_item' => 'View Highlight',
					'search_items' => 'Search Highlights',
					'not_found' => 'No Highlights Found',
					'not_found_in_trash' => 'No Highlights Found in Trash',
					'parent' => 'Parent Highlight',
				)
			));
		}

		public static function register_post_type_portfolio(){
			register_post_type('portfolio', array(
				'label' => 'Portfolio ',
				'description' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'post',
				'map_meta_cap' => true,
				'hierarchical' => true,
				'rewrite' => array('slug' => 'portfolio', 'with_front' => 0),
				'query_var' => true,
				'has_archive' => true,
				'menu_icon' => 'dashicons-portfolio',
				'supports' => array('title','editor','revisions','thumbnail','page-attributes'),
				'labels' => array(
					'name' => 'Portfolio ',
					'singular_name' => 'Portfolio Item',
					'menu_name' => 'Portfolio ',
					'add_new' => 'Add Portfolio Item',
					'add_new_item' => 'Add New Portfolio Item',
					'edit' => 'Edit',
					'edit_item' => 'Edit Portfolio Item',
					'new_item' => 'New Portfolio Item',
					'view' => 'View Portfolio Item',
					'view_item' => 'View Portfolio Item',
					'search_items' => 'Search Portfolio ',
					'not_found' => 'No Portfolio  Found',
					'not_found_in_trash' => 'No Portfolio  Found in Trash',
					'parent' => 'Parent Portfolio Item',
				)
			) );
		}

		public static function apply_admin_customizations(){
			if (class_exists('Jigsaw')){
				Jigsaw::add_column('highlights', 'Thumb', function($pid){
			    	$data = array();
			    	$data['post'] = new TimberPost($pid);
					Timber::render('admin/portfolio-square-preview.twig', $data);
				}, -1000);

				Jigsaw::add_column('portfolio', 'Preview', function($pid){
			    	$data = array();
			    	$data['post'] = new TimberPost($pid);
					Timber::render('admin/portfolio-square-preview.twig', $data);
				}, -1000);
				if (method_exists('Jigsaw', 'add_css')){
					Jigsaw::add_css('/wp-content/themes/blades/css/admin.css');
				}
			}
		}

	}
