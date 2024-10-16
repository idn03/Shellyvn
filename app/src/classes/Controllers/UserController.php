<?php

namespace App\controllers;
use App\models\{UserModel};
use PDOException;

class UserController {
    public function showProfilePage() {
        $userModel = new UserModel();
		$user = $userModel->getOne($_SESSION['user']['taikhoan']);
        
        renderPage('/sites/profile.php', [
            'user'=> $user
        ]);
    }
}