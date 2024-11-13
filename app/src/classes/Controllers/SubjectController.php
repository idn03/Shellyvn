<?php

namespace App\controllers;
use App\models\{SubjectModel, NoteModel, StudentModel, UserModel};
use PDOException;

class SubjectController {
    public function showSubjectsPage() {
        if (isAdmin()) {
            $subjectModel = new SubjectModel();
            $subjects = $subjectModel->getAll();
        }
        else {
            $subjectModel = new SubjectModel();
            $subjects = $subjectModel->getBySomeOne($_SESSION['user']['taikhoan']);
        }

        foreach ($subjects as $subject) {
            $noteModel = new NoteModel();
            $notes = $noteModel->getAll($subject['ma_mon']);
            $_SESSION[$subject['ma_mon']]['note'] = count($notes);

            $studentModel = new StudentModel();
            $students = $studentModel->getAll($subject['ma_mon']);
            $_SESSION[$subject['ma_mon']]['student'] = count($students);
        }

        renderPage('/sites/subject-sites/subjects.php', [
            'subjects'=> $subjects
        ]);
    }

    public function showSubjectDetailPage() {
        $subjectCode = getLastPath();
        $_SESSION['ma_mon'] = $subjectCode;

        $subjectModel = new SubjectModel();
        $subject = $subjectModel->getOne($subjectCode);

        $noteModel = new NoteModel();
        $notes = $noteModel->getAll($subjectCode);

        $studentModel = new StudentModel();
        $students = $studentModel->getAll($subjectCode);

        renderPage('/sites/subject-sites/subject-detail.php', [
            'subject' => $subject,
            'notes' => $notes,
            'students' => $students
        ]);
    }

    public function showUpdateSubjectPage() {
        $userModel = new UserModel();
        $users = $userModel->getAll();

        if (getLastPath() === 'edit') {
            $subjectModel = new SubjectModel();
            $subject = $subjectModel->getOne($_SESSION['ma_mon']);

            renderPage('/sites/subject-sites/edit-subject.php', [
                'subject' => $subject
            ]);
            return;
        }

        renderPage('/sites/subject-sites/add-subject.php', [
            'users' => $users
        ]);
    }

    public function create() {
        $subjectModel = new SubjectModel();
        $currentSubjects = $subjectModel->getAll();

        if (isHarassment($_POST['ma_mon'])) {
            redirectTo('/subjects', [
                'status' => 'failed',
                'message' => 'The subject code is not allowed. ARE YOU CRAZY?'
            ]);
    
            return;
        }

        if (strtotime($_POST['ngaykt']) < strtotime($_POST['ngaybd'])) {
            redirectTo('/subjects/add', [
                'status' => 'failed',
                'message' => 'The subject finish date must be after the beginning date'
            ]);

            return;
        }

        foreach ($currentSubjects as $subject) {
            if ($_POST['ma_mon'] === $subject['ma_mon']) {
                redirectTo('/subjects/add', [
                    'status' => 'failed',
                    'message' => 'The subject code has been existed'
                ]);
    
                return;
            }
        }

        $data = [];
        $data['ma_mon'] = $_POST['ma_mon'];
        $data['tenmon'] = $_POST['tenmon'];
        $data['ngaybd'] = $_POST['ngaybd'];
        $data['ngaykt'] = $_POST['ngaykt'];
        $data['cover'] = $_POST['cover'];
        $data['taikhoan'] = $_POST['taikhoan'];

        try {
            $subjectModel->create([
                'ma_mon' => $data['ma_mon'],
                'tenmon' => $data['tenmon'],
                'ngaybd' => $data['ngaybd'],
                'ngaykt' => $data['ngaykt'],
                'cover' => $data['cover'],
                'taikhoan' => $data['taikhoan'],
            ]);
            
            redirectTo('/subjects', [
                'status' => 'success',
                'message' => 'New Subject has been created'
            ]);
        } catch (PDOException $e) {
			redirectTo('/subjects', [
				'status' => 'failed',
				'message' => $e
			]);
		}
    }

    public function edit() {
        $subjectModel = new SubjectModel();

        if (isHarassment($_POST['ma_mon'])) {
            redirectTo('/subjects', [
                'status' => 'failed',
                'message' => 'The subject code is not allowed. ARE YOU CRAZY?'
            ]);
    
            return;
        }

        if (strtotime($_POST['ngaykt']) < strtotime($_POST['ngaybd'])) {
            redirectTo('/subjects/edit', [
                'status' => 'failed',
                'message' => 'The subject finish date must be after the beginning date'
            ]);

            return;
        }

        $data = [];
        $data['ma_mon'] = $_POST['ma_mon'];
        $data['tenmon'] = $_POST['tenmon'];
        $data['ngaybd'] = $_POST['ngaybd'];
        $data['ngaykt'] = $_POST['ngaykt'];
        $data['cover'] = $_POST['cover'];

        try {
            $subjectModel->edit([
                'ma_mon' => $data['ma_mon'],
                'tenmon' => $data['tenmon'],
                'ngaybd' => $data['ngaybd'],
                'ngaykt' => $data['ngaykt'],
                'cover' => $data['cover'],
            ]);
            
            redirectTo('/subjects/' . $_POST['ma_mon'], [
                'status' => 'success',
                'message' => 'Subject is updated'
            ]);
        } catch (PDOException $e) {
			redirectTo('/subjects', [
				'status' => 'failed',
				'message' => $e
			]);
		}
    }

    public function mark() {
        $subjectModel = new SubjectModel();
        $data = [];
        $data['ma_mon'] = $_POST['ma_mon'];
        $data['ghim'] = $_POST['ghim'];
        
        try {
            $subjectModel->mark([
                'ma_mon' => $data['ma_mon'],
                'ghim' => $data['ghim'],
            ]);

            $message = '';
            if ((int)$_POST['ghim'] == 1) {
                $message = $data['ma_mon'] . ' has been marked';
            } else {
                $message = $data['ma_mon'] . ' has been unmarked';
            }

            redirectTo('/subjects/' . $data['ma_mon'], [
                'status' => 'success',
                'message' => $message,
            ]);
        } catch (PDOException $e) {
			redirectTo('/subjects/' . $data['ma_mon'], [
				'status' => 'failed',
				'message' => $e
			]);
		}
    }

    public function search() {
        $subjectModel = new SubjectModel();
        
        try {
            $queryResult = $subjectModel->getOne($_GET['search']);

            if ($queryResult == false) {
                redirectTo('/subjects', [
                    'status' => 'failed',
                    'message' => 'There are no result with ' . $_GET['search']
                ]);
            }
                
            $noteModel = new NoteModel();
            $notes = $noteModel->getAll($queryResult['ma_mon']);
            $_SESSION[$queryResult['ma_mon']]['note'] = count($notes);

            $studentModel = new StudentModel();
            $students = $studentModel->getAll($queryResult['ma_mon']);
            $_SESSION[$queryResult['ma_mon']]['student'] = count($students);

            renderPage('/sites/subject-sites/subjects.php', [
                'subjects'=> $queryResult
            ]);
        } catch (PDOException $e) {
			redirectTo('/subjects', [
				'status' => 'failed',
				'message' => 'Something went wrong'
			]);
		}
    }
}

