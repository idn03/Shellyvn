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

    public function showCudPage() {
        
    }
}