<?php

namespace App\controllers;
use App\models\{UserModel, SubjectModel};
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

        // Cần lấy thêm Note + Student

        renderPage('/sites/subject-detail.php', [
            'subject' => $subject
        ]);
    }

    public function showCudPage() {

    }
}