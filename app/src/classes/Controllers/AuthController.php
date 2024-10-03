<?php

namespace App\controllers;
use App\models\UserModel;
use PDOException;

class AuthController {
    private $rules;

	public function __construct()
	{
		$this->rules = [
			'username' => ['required' => 'Please enter your username'],
			'password' => ['required' => 'Please enter your password']
		];
	}

    public function showLoginPage() {
		try {
			renderPage('/login.php', []);
		} catch (PDOException $e) {
			redirectTo(
				'/', 
				[
					'status' => 'danger',
					'message' => 'Please try again'
				]
			);
		}
	}
}