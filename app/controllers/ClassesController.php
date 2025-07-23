<?php
require_once __DIR__ . '/../helpers/auth.php';
class ClassesController {
    public function index() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $stmt = $db->prepare('SELECT * FROM classes WHERE school_id = ?');
        $stmt->execute([$school_id]);
        $classes = $stmt->fetchAll();
        $title = 'Classes Management';
        ob_start();
        include __DIR__ . '/../views/classes/index.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
}