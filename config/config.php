<?php
// Load environment variables
function env($key, $default = null) {
    static $env = null;
    if ($env === null) {
        $env = [];
        if (file_exists(__DIR__ . '/../.env')) {
            foreach (file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
                if (strpos(trim($line), '#') === 0) continue;
                list($k, $v) = array_map('trim', explode('=', $line, 2));
                $env[$k] = $v;
            }
        }
    }
    return $env[$key] ?? $default;
}

// Database connection
function get_db() {
    static $pdo = null;
    if ($pdo === null) {
        $host = env('DB_HOST', 'localhost');
        $db   = env('DB_NAME', 'schoolnexus');
        $user = env('DB_USER', 'root');
        $pass = env('DB_PASS', '');
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    return $pdo;
}