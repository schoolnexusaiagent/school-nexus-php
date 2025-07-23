<?php
require_once __DIR__ . '/../helpers/auth.php';
class TermsController {
    public function index() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $stmt = $db->prepare('SELECT * FROM terms WHERE school_id = ?');
        $stmt->execute([$school_id]);
        $terms = $stmt->fetchAll();
        $title = 'Terms Management';
        ob_start();
        include __DIR__ . '/../views/terms/index.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
}