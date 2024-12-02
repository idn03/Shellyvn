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
            $student = $studentModel->getOne($data['sdt_hocvien']);

            if (count($student) != 0) 
                $studentModel->create($data);
            else {
                $studentModel->reCreate([
                    'sdt_hocvien' => $data['sdt_hocvien'],
                    'ma_mon' => $data['ma_mon']
                ]);
            }
                

            redirectTo('/subjects/' . $_POST['ma_mon'], [
                'status' => 'success',
                'message' => 'A new student has been added'
            ]);
        } catch (PDOException $e){
            redirectTo('/subjects/' . $_POST['ma_mon'], [
                'status' => 'failed',
                'message' => 'Failed to create student'
            ]);
		}
    }

    public function edit() {
        $data = [];
        $data['sdt_hocvien'] = $_POST['sdt_hocvien'];
        $data['tenhocvien'] = $_POST['tenhocvien'];
        $data['gioitinh_hocvien'] = (int)$_POST['gioitinh_hocvien'];
        $data['trinhdo_hocvien'] = $_POST['trinhdo_hocvien'];

        try {
            $studentModel = new StudentModel();
            if (isset($_POST['diem'])) {
                $data['ma_mon'] = $_POST['ma_mon'];
                $data['diem'] = (int)$_POST['diem'];

                $studentModel->graded([
                    'sdt_hocvien' => $data['sdt_hocvien'],
                    'ma_mon' => $data['ma_mon'],
                    'diem' => $data['diem'],
                ]);
            }

            $studentModel->edit([
                'sdt_hocvien' => $data['sdt_hocvien'],
                'tenhocvien' => $data['tenhocvien'],
                'gioitinh_hocvien' => $data['gioitinh_hocvien'],
                'trinhdo_hocvien' => $data['trinhdo_hocvien'],
            ]);

            redirectTo('/subjects/' . $_POST['ma_mon'], [
                'status' => 'success',
                'message' => 'Student information has been updated'
            ]);
        } catch (PDOException $e){
            redirectTo('/subjects/' . $_POST['ma_mon'], [
                'status' => 'failed',
                'message' => 'Failed to edit student information' . $e
            ]);
		}
    }

    public function delete() {
        $studentModel = new StudentModel();
        
        try {
            $studentPhone = $_POST['sdt_hocvien'];
            $studentModel->delete($studentPhone);

            redirectTo('/subjects/' . $_POST['ma_mon'], [
                'status' => 'success',
                'message' => 'Student has been deleted'
            ]);
        } catch (PDOException $e){
            redirectTo('/subjects/' . $_POST['ma_mon'], [
                'status' => 'failed',
                'message' => 'Failed to delete student' . $e
            ]);
		}
    }
}