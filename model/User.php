<?php

class User {
	public function login($user) {
		$_SESSION["user"] = $user;
	}

	public function logout($user) {
		session_destroy();
	}

	public function isLoggedIn() {
		return isset($_SESSION["user"]);
	}
}