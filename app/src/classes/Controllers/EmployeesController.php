<?php

namespace App\controllers;
use App\models\{UserModel, ArchiveModel};
use PDOException;


class EmployeesController {
    public function showHRPage() {
        $userModel = new UserModel();
        $users = $userModel->getAll();

        renderPage('/sites/employee-sites/employees.php', [
            'users'=> $users
        ]);
    }

    public function showUpdateProfilePage() {
        if (getLastPath() == 'add') {
            renderPage('/sites/employee-sites/add-employee.php', []);
        }
        else {

        }
    }
}