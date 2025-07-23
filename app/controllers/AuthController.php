<?php
class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $db = get_db();
            $stmt = $db->prepare('SELECT * FROM users WHERE email = ? AND status = "active" LIMIT 1');
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            if ($user && $user['password'] === $password) { // In production, use password_hash
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'school_id' => $user['school_id']
                ];
                header('Location: /?controller=dashboard');
                exit;
            } else {
                $error = 'Invalid credentials.';
            }
        }
        include __DIR__ . '/../views/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: /?controller=auth&action=login');
        exit;
    }
}