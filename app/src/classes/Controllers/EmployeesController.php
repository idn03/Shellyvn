<?php

namespace App\controllers;
use App\models\{UserModel, AchieveModel, SubjectModel};
use PDOException;


class EmployeesController {
    public function showHRPage() {
        $userModel = new UserModel();
        $users = $userModel->getAll();

        $numRow = count($users);

        if (isset($_GET['page'])) {
            $rowsPerPage = 4;
            $page = $_GET['page'] - 1;

            $start = $rowsPerPage * $page;
            $end = $rowsPerPage + $start;

            $usersInPage = $userModel->getPagination($start, $end);

            renderPage('/sites/employee-sites/employees.php', [
                'users'=> $usersInPage,
            ]);

            return;
        }

        renderPage('/sites/employee-sites/employees.php', [
            'users'=> $users
        ]);
    }

    public function showUpdateProfilePage() {
        if (getLastPath() == 'add') {
            renderPage('/sites/employee-sites/add-employee.php', []);
        }
        else {
            $username = getLastPath();
            $userModel = new UserModel();
            $user = $userModel->getOne($username);

            $achieveModel = new AchieveModel();
            $achieves = $achieveModel->getBySomeOne($username);

            $subjectModel = new SubjectModel();
            $subjects = $subjectModel->getBySomeOne($username);

            renderPage('/sites/employee-sites/edit-employee.php', [
                'user' => $user,
                'subjects' => $subjects,
                'achieves' => $achieves,
            ]);
        }
    }

    public function edit() {
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
                $user = $userModel->getOne($_POST['taikhoan']);
                if ($user['avatar'] != 'default-avatar.png') {
                    $currentAvatarPath = $_SERVER['DOCUMENT_ROOT'] . "/imgs/avatars/" . $user['avatar'];
                    if (file_exists($currentAvatarPath) && is_file($currentAvatarPath)) {
                        unlink($currentAvatarPath);
                    }
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
            
            redirectTo('/employees/' . $data['taikhoan'], [
                'status' => 'success',
                'message' => 'User ' . $data['taikhoan'] . ' has been updated successfully'
            ]);
        } catch (PDOException $e) {
			redirectTo('/employees/' . $data['taikhoan'], [
				'status' => 'failed',
				'message' => $e
			]);
		}
    }
}