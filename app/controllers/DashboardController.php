<?php
require_once __DIR__ . '/../helpers/auth.php';
class DashboardController {
    public function index() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        // Example stats queries
        $students = $db->query("SELECT COUNT(*) FROM students WHERE school_id = $school_id")->fetchColumn();
        $teachers = $db->query("SELECT COUNT(*) FROM teachers WHERE school_id = $school_id")->fetchColumn();
        $subjects = $db->query("SELECT COUNT(*) FROM subjects WHERE school_id = $school_id")->fetchColumn();
        $fees = $db->query("SELECT SUM(total_amount) FROM fees WHERE school_id = $school_id")->fetchColumn();
        $title = 'Dashboard';
        ob_start();
        include __DIR__ . '/../views/dashboard.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
}