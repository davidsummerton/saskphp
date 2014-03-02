<?php


class Auth {

	static function login($id) {

   		$_SESSION['user_id'] = $id;
   		return true;

	}

	static function logout() {

		if(isset($_SESSION['user_id'])) {
			unset($_SESSION['user_id']);
			session_destroy();
		}

	}

	static function loggedIn() {
		
		return isset($_SESSION['user_id']);
		
	}

}

?>
