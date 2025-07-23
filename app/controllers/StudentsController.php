<?php
require_once __DIR__ . '/../helpers/auth.php';
class StudentsController {
    public function index() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $stmt = $db->prepare('SELECT s.*, c.name as class_name FROM students s LEFT JOIN classes c ON s.class_id = c.id WHERE s.school_id = ?');
        $stmt->execute([$school_id]);
        $students = $stmt->fetchAll();
        $title = 'Students Management';
        ob_start();
        include __DIR__ . '/../views/students/index.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
}