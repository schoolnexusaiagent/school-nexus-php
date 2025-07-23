<?php
function is_logged_in() {
    return isset($_SESSION['user']);
}

function current_user() {
    return $_SESSION['user'] ?? null;
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: /?controller=auth&action=login');
        exit;
    }
}