<?php
require_once __DIR__ . '/../helpers/auth.php';
class StudentsController {
    public function index() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $stmt = $db->prepare('SELECT s.*, c.name as class_name FROM students s LEFT JOIN classes c ON s.class_id = c.id WHERE s.school_id = ?');
        $stmt->execute([$school_id]);
        $students = $stmt->fetchAll();
        $title = 'Students Management';
        ob_start();
        include __DIR__ . '/../views/students/index.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
    public function add() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $classes = $db->query("SELECT * FROM classes WHERE school_id = $school_id")->fetchAll();
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $class_id = $_POST['class_id'] ?? null;
            $gender = $_POST['gender'] ?? null;
            if ($name && $class_id) {
                $stmt = $db->prepare('INSERT INTO students (school_id, class_id, name, email, phone, gender, status) VALUES (?, ?, ?, ?, ?, ?, "active")');
                $stmt->execute([$school_id, $class_id, $name, $email, $phone, $gender]);
                header('Location: /?controller=students'); exit;
            } else {
                $error = 'Name and class are required.';
            }
        }
        $title = 'Add Student';
        ob_start();
        include __DIR__ . '/../views/students/add.php';
        $content = ob_get_clean();
        include __DIR__ . '/../views/layout.php';
    }
    public function edit() {
        require_login();
        $user = current_user();
        $db = get_db();
        $school_id = $user['school_id'];
        $id = $_GET['id'] ?? null;
        $student = $db->prepare('SELECT * FROM students WHERE id = ? AND school_id = ?');
        $student->execute([$id, $school_id]);
        $student = $student->fetch();
        $classes = $db->query("SELECT * FROM classes WHERE school_id = $school_id")->fetchAll();
        $error = '';
        if (!$student) { header('Location: /?controller=students'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $class_id = $_POST['class_id'] ?? null;
            $gender = $_POST['gender'] ?? null;
            if ($name && $class_id) {
                $stmt = $db->prepare('UPDATE students SET name=?, email=?, phone=?, class_id=?, gender=? WHERE id=? AND school_id=?');
                $stmt->execute([$name, $email, $phone, $class_id, $gender, $id, $school_id]);
                header('Location: /?controller=students'); exit;
            } else {
                $error = 'Name and class are required.';
            }
        }
        $title = 'Edit Student';
        ob_start();
        include __DIR__ . '/../views/students/edit.php';
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
            $stmt = $db->prepare('DELETE FROM students WHERE id = ? AND school_id = ?');
            $stmt->execute([$id, $school_id]);
        }
        header('Location: /?controller=students');
        exit;
    }
}