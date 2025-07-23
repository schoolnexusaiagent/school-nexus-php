<?php
require_once __DIR__ . '/../helpers/auth.php';
class FeesController {
    public function index() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $stmt = $db->prepare('SELECT f.*, s.name as student_name, c.name as class_name FROM fees f LEFT JOIN students s ON f.student_id = s.id LEFT JOIN classes c ON f.class_id = c.id WHERE f.school_id = ?');
        $stmt->execute([$school_id]);
        $fees = $stmt->fetchAll();
        $title = 'Fees Management';
        ob_start();
        include __DIR__ . '/../views/fees/index.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
}