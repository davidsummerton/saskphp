<?php

class Auth {

	public static function login($id) {

   		$_SESSION['user_id'] = $id;
   		return true;

	}

	public static function logout() {

		if(isset($_SESSION['user_id'])) {
			unset($_SESSION['user_id']);
			session_destroy();
		}

	}

	public static function loggedIn() {
		
		return isset($_SESSION['user_id']);
		
	}

}

?>
