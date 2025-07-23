<?php
require_once __DIR__ . '/../helpers/auth.php';
class DashboardController {
    public function index() {
        require_login();
        $user = current_user();
        include __DIR__ . '/../views/dashboard.php';
    }
}