<?php
	class PHPHelper {

		function __construct(){

		}
		
		function is_array_assoc($arr){
    		return array_keys($arr) !== range(0, count($arr) - 1);
		}


		function array_truncate($array, $len){
			if (sizeof($array) > $len) { 
   				$array = array_splice($array, 0, $len); 
 			}
 			return $array;
		}

		function array_to_object($array) {
			$obj = new stdClass;
			foreach($array as $k => $v) {
				if(is_array($v)) {
					$obj->{$k} = array_to_object($v); //RECURSION
				} else {
					$obj->{$k} = $v;
				}
			}
		  	return $obj;
		} 

	}
?>