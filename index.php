<?php

require_once('sask.php');


/*
*	Feel free to delete this class and
*	create your own!
*/

class Hello extends Sask {

	public function world() {

		echo "Hello World!";

	}

}


//	Initialize the router
$router->route();
