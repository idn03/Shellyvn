<?php

namespace App\controllers;
use App\models\{SubjectModel, NoteModel, StudentModel};
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

        renderPage('/sites/subjects.php', [
            'subjects'=> $subjects
        ]);
    }

    public function showSubjectDetailPage() {
        $subjectCode = getLastPath();

        $subjectModel = new SubjectModel();
        $subject = $subjectModel->getOne($subjectCode);

        $noteModel = new NoteModel();
        $notes = $noteModel->getAll($subjectCode);

        $studentModel = new StudentModel();
        $students = $studentModel->getAll($subjectCode);

        renderPage('/sites/subject-detail.php', [
            'subject' => $subject,
            'notes' => $notes,
            'students' => $students
        ]);
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

            renderPage('/sites/subjects.php', [
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

