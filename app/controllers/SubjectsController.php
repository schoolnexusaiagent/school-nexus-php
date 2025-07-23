<?php
require_once __DIR__ . '/../helpers/auth.php';
class SubjectsController {
    public function index() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $stmt = $db->prepare('SELECT * FROM subjects WHERE school_id = ?');
        $stmt->execute([$school_id]);
        $subjects = $stmt->fetchAll();
        $title = 'Subjects Management';
        ob_start();
        include __DIR__ . '/../views/subjects/index.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
}