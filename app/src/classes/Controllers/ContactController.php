<?php

namespace App\controllers;
use App\models\{UserModel, ContactModel};
use PDOException;

class ContactController {
    public function showContactPage() {
        $userModel = new UserModel();
		$user = $userModel->getOne($_SESSION['user']['taikhoan']);

        renderPage('/sites/contact.php', [
            'user'=> $user
        ]);
    }

    public function showContactAdminPage() {
        $userModel = new UserModel();
		$user = $userModel->getOne($_SESSION['user']['taikhoan']);

        $contactModel = new ContactModel();
        $contacts = $contactModel->getAll();

        renderPage('/sites/contact.php', [
            'user'=> $user,
            'contacts' => $contacts
        ]);
    }

    public function create() {
        $data = [];
        $data['noidunglh'] = $_POST['des'];
        $data['loailh'] = (String)$_POST['problem'];
        $data['taikhoan'] = $_SESSION['user']['taikhoan'];

        $contactModel = new ContactModel();
        $contactModel->create($data);

        redirectTo('/contact', [
			'status' => 'success',
			'message' => 'Posted successfully.'
		]);
    }
}