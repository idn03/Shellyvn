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

    public function editInfo() {
        $userModel = new UserModel();
        $data = [];
        $data['taikhoan'] = $_POST['taikhoan'];
        $data['hoten'] = $_POST['hoten'];
        $data['gioitinh'] = (int)$_POST['gioitinh'];
        $data['ngaysinh'] = $_POST['ngaysinh'];
        $data['chuyennganh'] = $_POST['chuyennganh'];
        $data['loaitk'] = $_POST['loaitk'];
        $data['avatar_name'] = $_POST['avatar'];

        try {
            if (!empty($_FILES['avatar_file']['name'])) {
                $avatarName = uniqid() . $_FILES['avatar_file']['name'];
                $avatarTemp = $_FILES['avatar_file']['tmp_name'];
                $avatarPath = $_SERVER['DOCUMENT_ROOT'] . "/imgs/avatars/" . $avatarName;
    
                move_uploaded_file($avatarTemp, $avatarPath);
    
                $data['avatar_name'] = $avatarName;
                $_SESSION['user']['avatar'] = $avatarName;
            }
    
            $userModel->editInfo([
                'avatar' => $data['avatar_name'],
                'taikhoan' => $data['taikhoan'],
                'hoten' => $data['hoten'],
                'gioitinh' => $data['gioitinh'],
                'ngaysinh' => $data['ngaysinh'],
                'chuyennganh' => $data['chuyennganh'],
                'loaitk' => $data['loaitk'],
            ]);
            
            redirectTo('/profile', [
                'status' => 'success',
                'message' => 'Your profile has been updated successfully'
            ]);
        } catch (PDOException $e) {
			redirectTo('/profile', [
				'status' => 'failed',
				'message' => $e
			]);
		}
    }
}