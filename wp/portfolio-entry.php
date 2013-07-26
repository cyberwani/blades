<?php
	class PortfolioEntry extends TimberPost {
		
		function get_layouts(){
			$layouts = get_field('layouts', $this->ID);
			foreach($layouts as &$layout){
				if (isset($layout['image'])){
					$images = $layout['image'];
					foreach($images as &$image){
						$image = new TimberImage($image['image']['id']);
					}
					$layout['images'] = $images;
				}
			}
			return $layouts;
		}


	}