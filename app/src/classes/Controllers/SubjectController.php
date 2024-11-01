<?php

namespace App\controllers;
use App\models\{SubjectModel, NoteModel};
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

        // Cần lấy thêm Student

        renderPage('/sites/subject-detail.php', [
            'subject' => $subject,
            'notes' => $notes
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
}

