<?php

namespace App\controllers;
use App\models\{HashtagModel, PostModel, UserModel, CommentModel};
use PDOException;

class HomeController {
    public function showHomePage() {
        renderPage('/sites/home.php', []);
    }
}