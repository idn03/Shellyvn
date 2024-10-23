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

	public function login() {
		try {

			$username = $_POST['taikhoan'];
			$password = $_POST['matkhau'];

			$userModel = new UserModel();
			$user = $userModel->getOne($username);
			
			if (!$user || !($password == $user['matkhau'])) {
				redirectTo(
					'/',
					[
						'status' => 'failed',
						'form' => ['username' => $username],
						'message' => 'Account or password is incorrect'
					]
				);
				return;
			}

			setIntoSession('user', [
				'taikhoan' => $username,
				'hoten' => $user['hoten'],
				'gioitinh' => $user['gioitinh'],
				'ngaysinh' => $user['ngaysinh'],
                'chuyennganh' => $user['chuyennganh'],
				'loaitk' => $user['loaitk'],
			]);
			// setIntoSession('isdisabled','disabled');

			redirectTo('/', [
				'status' => 'success',
				'message' => 'You are now logged in'
			]);
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
	public function logout() {
		removeFromSession('user');
		redirectTo('/login', [
			'status' => 'success',
			'message' => 'You are logged out, see you later'
		]);
	}
}