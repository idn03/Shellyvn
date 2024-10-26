<?php

namespace App\controllers;
use App\models\{UserModel, ArchiveModel};
use PDOException;

class HomeController {
    public function showHomePage() {
        if (getPrefixUrl() !== '') {
            redirectTo('/');
        }

        $userModel = new UserModel();
		$user = $userModel->getOne($_SESSION['user']['taikhoan']);

        $archiveModel = new ArchiveModel();
        $archivements = $archiveModel->getBySomeOne($_SESSION['user']['taikhoan']);

        renderPage('/sites/home.php', [
            'user' => $user,
            'archivements' => $archivements
        ]);
    }
}