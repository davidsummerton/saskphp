<?php

class System {

	static function isPost() {
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}

	static function isGet() {
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

	static function redirect($url) {
		header( 'Location: '.$url ) ;
		exit();
	}
	
	static function cleanseString($string) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}

	static function paginate($data,$page=1,$per_page=5) {
		  $min = (($page*$per_page)-$per_page)+1;
		  $max = $page*$per_page;
		  $count = 1;
		  $page_data = array();
		  foreach($data as $item) {
		    if($count >= $min && $count <= $max) {
		      $page_data[] = $item;
		    }
		    $count++;
		  }
		  $pages = ceil(count($data)/$per_page);
		  return array(
		    'page_data'=>$page_data,
		    'pages'=>$pages,
		    'page'=>$page
		  );
	}


}

?>
