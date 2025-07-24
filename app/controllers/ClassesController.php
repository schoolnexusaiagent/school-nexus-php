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
    public function add() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            if ($name) {
                $stmt = $db->prepare('INSERT INTO classes (school_id, name, description) VALUES (?, ?, ?)');
                $stmt->execute([$school_id, $name, $description]);
                header('Location: /?controller=classes'); exit;
            } else {
                $error = 'Name is required.';
            }
        }
        $title = 'Add Class';
        ob_start();
        include __DIR__ . '/../views/classes/add.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
    public function edit() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $id = $_GET['id'] ?? null;
        $class = $db->prepare('SELECT * FROM classes WHERE id = ? AND school_id = ?');
        $class->execute([$id, $school_id]);
        $class = $class->fetch();
        $error = '';
        if (!$class) { header('Location: /?controller=classes'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            if ($name) {
                $stmt = $db->prepare('UPDATE classes SET name=?, description=? WHERE id=? AND school_id=?');
                $stmt->execute([$name, $description, $id, $school_id]);
                header('Location: /?controller=classes'); exit;
            } else {
                $error = 'Name is required.';
            }
        }
        $title = 'Edit Class';
        ob_start();
        include __DIR__ . '/../views/classes/edit.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
    public function delete() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $db->prepare('DELETE FROM classes WHERE id = ? AND school_id = ?');
            $stmt->execute([$id, $school_id]);
        }
        header('Location: /?controller=classes');
        exit;
    }
}