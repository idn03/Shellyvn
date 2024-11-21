<?php

namespace App\controllers;
use App\models\{UserModel, AchieveModel};
use PDOException;

class HomeController {
    public function showHomePage() {
        if (getPrefixUrl() !== '') {
            redirectTo('/');
        }

        $userModel = new UserModel();
		$user = $userModel->getOne($_SESSION['user']['taikhoan']);

        $achieveModel = new AchieveModel();
        $achievements = $achieveModel->getBySomeOne($_SESSION['user']['taikhoan']);

        renderPage('/sites/home.php', [
            'user' => $user,
            'achievements' => $achievements
        ]);
    }
}