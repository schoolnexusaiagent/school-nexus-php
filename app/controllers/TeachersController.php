<?php
require_once __DIR__ . '/../helpers/auth.php';
class TeachersController {
    public function index() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $stmt = $db->prepare('SELECT * FROM teachers WHERE school_id = ?');
        $stmt->execute([$school_id]);
        $teachers = $stmt->fetchAll();
        $title = 'Teachers Management';
        ob_start();
        include __DIR__ . '/../views/teachers/index.php';
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
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            if ($name) {
                $stmt = $db->prepare('INSERT INTO teachers (school_id, name, email, phone, status) VALUES (?, ?, ?, ?, "active")');
                $stmt->execute([$school_id, $name, $email, $phone]);
                header('Location: /?controller=teachers'); exit;
            } else {
                $error = 'Name is required.';
            }
        }
        $title = 'Add Teacher';
        ob_start();
        include __DIR__ . '/../views/teachers/add.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
    public function edit() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $id = $_GET['id'] ?? null;
        $teacher = $db->prepare('SELECT * FROM teachers WHERE id = ? AND school_id = ?');
        $teacher->execute([$id, $school_id]);
        $teacher = $teacher->fetch();
        $error = '';
        if (!$teacher) { header('Location: /?controller=teachers'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            if ($name) {
                $stmt = $db->prepare('UPDATE teachers SET name=?, email=?, phone=? WHERE id=? AND school_id=?');
                $stmt->execute([$name, $email, $phone, $id, $school_id]);
                header('Location: /?controller=teachers'); exit;
            } else {
                $error = 'Name is required.';
            }
        }
        $title = 'Edit Teacher';
        ob_start();
        include __DIR__ . '/../views/teachers/edit.php';
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
            $stmt = $db->prepare('DELETE FROM teachers WHERE id = ? AND school_id = ?');
            $stmt->execute([$id, $school_id]);
        }
        header('Location: /?controller=teachers');
        exit;
    }
}