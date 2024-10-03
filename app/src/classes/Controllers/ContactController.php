<?php

namespace App\controllers;
use App\models\{UserModel};
use PDOException;

class ContactController {
    public function showContactPage() {
        
        $userModel = new UserModel();
		$user = $userModel->getOne($_SESSION['user']['taikhoan']);

        renderPage('/sites/contact.php', [
            'user'=> $user
        ]);
    }
}