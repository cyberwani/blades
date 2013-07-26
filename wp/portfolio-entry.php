<?php
	class PortfolioEntry extends TimberPost {

		function layouts(){
			$pi->layouts = get_field('layouts', $this->ID);
		}

	}