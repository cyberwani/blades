<?php
	class PortfolioEntry extends TimberPost {

		function get_layouts(){
			$layouts = get_field('layouts', $this->ID);
			foreach($layouts as &$layout){
				if (isset($layout['image'])){
					$images = $layout['image'];
					foreach($images as &$image){
						$maybe_id = $image['image']['id'];
						if (!$maybe_id){
							$maybe_id = $image['image']['ID'];
						}
						$image = new TimberImage($maybe_id);
					}
					$layout['images'] = $images;
				}
			}
			return $layouts;
		}


	}