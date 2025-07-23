<?php
require_once __DIR__ . '/../helpers/auth.php';
class SettingsController {
    public function index() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $stmt = $db->prepare('SELECT * FROM settings WHERE school_id = ?');
        $stmt->execute([$school_id]);
        $settings = $stmt->fetchAll();
        $title = 'Settings';
        ob_start();
        include __DIR__ . '/../views/settings/index.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
}