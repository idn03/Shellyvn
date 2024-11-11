<?php

namespace App\controllers;
use App\models\{UserModel, ArchiveModel};
use PDOException;

class UserController {
    public function showProfilePage() {
        $userModel = new UserModel();
		$user = $userModel->getOne($_SESSION['user']['taikhoan']);

        $archiveModel = new ArchiveModel();
        $archivements = $archiveModel->getBySomeOne($_SESSION['user']['taikhoan']);
        
        renderPage('/sites/profile.php', [
            'user'=> $user,
            'archivements' => $archivements
        ]);
    }

    public function create() {
        $userModel = new UserModel();

        if (isHarassment($_POST['taikhoan'])) {
            redirectTo('/employees', [
                'status' => 'failed',
                'message' => 'Username is not allowed. ARE YOU CRAZY?'
            ]);
    
            return;
        }
        
        if (strcmp($_POST['matkhau'], $_POST['xn-matkhau']) != 0) {
            $_SESSION['form']['taikhoan'] = $_POST['taikhoan'];
            $_SESSION['form']['hoten'] = $_POST['hoten'];
            $_SESSION['form']['gioitinh'] = (int)$_POST['gioitinh'];
            $_SESSION['form']['ngaysinh'] = $_POST['ngaysinh'];
            $_SESSION['form']['chuyennganh'] = $_POST['chuyennganh'];
            $_SESSION['form']['loaitk'] = $_POST['loaitk'];


            redirectTo('/employees/add', [
                'status' => 'failed',
                'message' => 'The confirm password is incorret'
            ]);

            return;
        }

        $users = $userModel->getAll();
        foreach ($users as $user) {
            if (strcmp($user['taikhoan'], $_POST['taikhoan']) === 0) {
                $_SESSION['form']['taikhoan'] = $_POST['taikhoan'];
                $_SESSION['form']['hoten'] = $_POST['hoten'];
                $_SESSION['form']['gioitinh'] = (int)$_POST['gioitinh'];
                $_SESSION['form']['ngaysinh'] = $_POST['ngaysinh'];
                $_SESSION['form']['chuyennganh'] = $_POST['chuyennganh'];
                $_SESSION['form']['loaitk'] = $_POST['loaitk'];

                redirectTo('/employees/add', [
                    'status' => 'failed',
                    'message' => 'Username has been existed'
                ]);
    
                return;
            }
        }

        $data = [];
        $data['taikhoan'] = $_POST['taikhoan'];
        $data['matkhau'] = $_POST['matkhau'];
        $data['hoten'] = $_POST['hoten'];
        $data['gioitinh'] = (int)$_POST['gioitinh'];
        $data['ngaysinh'] = $_POST['ngaysinh'];
        $data['chuyennganh'] = $_POST['chuyennganh'];
        $data['loaitk'] = $_POST['loaitk'];

        try {
            $userModel->create([
                'taikhoan' => $data['taikhoan'],
                'matkhau' => $data['matkhau'],
                'hoten' => $data['hoten'],
                'gioitinh' => $data['gioitinh'],
                'ngaysinh' => $data['ngaysinh'],
                'chuyennganh' => $data['chuyennganh'],
                'loaitk' => $data['loaitk'],
            ]);

            redirectTo('/employees', [
                'status' => 'success',
                'message' => 'New employee has been added'
            ]);
        } catch (PDOException $e) {
			redirectTo('/employees/add', [
				'status' => 'failed',
				'message' => $e
			]);
		}
    }

    public function editInfo() {
        $userModel = new UserModel();

        if (isHarassment($_POST['taikhoan'])) {
            redirectTo('/profile', [
                'status' => 'failed',
                'message' => 'Username is not allowed. ARE YOU CRAZY?'
            ]);
    
            return;
        }

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
                $user = $userModel->getOne($_POST['taikhoan']);
                $currentAvatarPath = $_SERVER['DOCUMENT_ROOT'] . "/imgs/avatars/" . $user['avatar'];
                if (file_exists($currentAvatarPath) && is_file($currentAvatarPath)) {
                    unlink($currentAvatarPath);
                }

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

    public function changePassword() {
        $userModel = new UserModel();
        $data = [];
        $data['taikhoan'] = $_POST['taikhoan'];
        $data['new_matkhau'] = $_POST['matkhau'];
        $data['xn_matkhau'] = $_POST['xn-matkhau'];

        try {
            if (strcmp($data['xn_matkhau'], $data['new_matkhau']) === 0) {
                $userModel->changePassword([
                    'matkhau' => $data['new_matkhau'],
                    'taikhoan' => $data['taikhoan'],
                ]);
    
                redirectTo('/profile', [
                    'status' => 'success',
                    'message' => 'Your password has been updated successfully'
                ]);
            }
            else {
                redirectTo('/profile', [
                    'status' => 'failed',
                    'message' => 'The confirm password is incorret'
                ]);
            }
        } catch (PDOException $e) {
			redirectTo('/profile', [
				'status' => 'failed',
				'message' => $e
			]);
		}
    }
    
    public function delete() {
        $userModel = new UserModel();
        $username = $_POST['taikhoan'];
        
        try {
            $userModel->delete($username);

            redirectTo('/employees', [
                'status' => 'success',
                'message' => $username . ' has been deleted successfully'
            ]);
        } catch (PDOException $e) {
			redirectTo('/employees', [
				'status' => 'failed',
				'message' => $e
			]);
		}
    }

    public function addArchivement() {
        $archiveModel = new ArchiveModel();
        $data = [];
        $data['tenthanhtuu'] = $_POST['tenthanhtuu'];
        $data['ngaycap'] = $_POST['ngaycap'];
        $data['mota'] = $_POST['mota'];
        $data['icon'] = $_POST['icon'];
        $data['taikhoan'] = $_POST['taikhoan'];

        try {
            $archiveModel->create([
                'tenthanhtuu' => $data['tenthanhtuu'],
                'ngaycap' => $data['ngaycap'],
                'mota' => $data['mota'],
                'icon' => $data['icon'],
                'taikhoan' => $data['taikhoan'],
            ]);

            redirectTo('/profile', [
                'status' => 'success',
                'message' => 'Archivement unlocked'
            ]);
        } catch (PDOException $e) {
			redirectTo('/profile', [
				'status' => 'failed',
				'message' => $e
			]);
		}
    }
}