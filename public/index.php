<?php
session_start();
require_once __DIR__ . '/../config/config.php';

// Simple router (controller and action via query params)
$controller = $_GET['controller'] ?? 'dashboard';
$action = $_GET['action'] ?? 'index';

$controllerFile = __DIR__ . '/../app/controllers/' . ucfirst($controller) . 'Controller.php';
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $class = ucfirst($controller) . 'Controller';
    if (class_exists($class)) {
        $ctrl = new $class();
        if (method_exists($ctrl, $action)) {
            $ctrl->$action();
            exit;
        }
    }
}
// 404 fallback
http_response_code(404);
echo 'Page not found.';