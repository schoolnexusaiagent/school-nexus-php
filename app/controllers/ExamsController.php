<?php
require_once __DIR__ . '/../helpers/auth.php';
class ExamsController {
    public function index() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $stmt = $db->prepare('SELECT e.*, c.name as class_name, s.name as subject_name FROM exams e LEFT JOIN classes c ON e.class_id = c.id LEFT JOIN subjects s ON e.subject_id = s.id WHERE e.school_id = ?');
        $stmt->execute([$school_id]);
        $exams = $stmt->fetchAll();
        $title = 'Exams Management';
        ob_start();
        include __DIR__ . '/../views/exams/index.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
}