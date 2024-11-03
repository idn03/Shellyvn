<?php

namespace App\controllers;
use App\models\{StudentModel};
use PDOException;

class StudentController {
    public function create() {
        $data = [];
        $data['sdt_hocvien'] = $_POST['sdt_hocvien'];
        $data['tenhocvien'] = $_POST['tenhocvien'];
        $data['gioitinh_hocvien'] = $_POST['gioitinh_hocvien'];
        $data['trinhdo_hocvien'] = $_POST['trinhdo_hocvien'];
        $data['ma_mon'] = $_POST['ma_mon'];

        try {
            $studentModel = new StudentModel();
            $studentModel->create($data);
            redirectTo('/subjects/' . $_POST['ma_mon'], [
                'status' => 'success',
                'message' => 'A new student has been added'
            ]);
        }
        catch (PDOException $e){
            redirectTo('/subjects/' . $_POST['ma_mon'], [
                'status' => 'failed',
                'message' => 'Failed to create note.'
            ]);
		}
    }
}