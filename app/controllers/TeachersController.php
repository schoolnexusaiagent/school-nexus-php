<?php
require_once __DIR__ . '/../helpers/auth.php';
class TeachersController {
    public function index() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $stmt = $db->prepare('SELECT * FROM teachers WHERE school_id = ?');
        $stmt->execute([$school_id]);
        $teachers = $stmt->fetchAll();
        $title = 'Teachers Management';
        ob_start();
        include __DIR__ . '/../views/teachers/index.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
}