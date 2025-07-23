<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'SchoolNexus') ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>SchoolNexus</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="/?controller=dashboard">Dashboard</a></li>
            <li><a href="/?controller=students">Students</a></li>
            <li><a href="/?controller=teachers">Teachers</a></li>
            <li><a href="/?controller=classes">Classes</a></li>
            <li><a href="/?controller=subjects">Subjects</a></li>
            <li><a href="/?controller=terms">Terms</a></li>
            <li><a href="/?controller=exams">Exams</a></li>
            <li><a href="/?controller=fees">Fees Collection</a></li>
            <li><a href="/?controller=settings">Settings</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="topbar">
            <span>Welcome, <?= htmlspecialchars($user['name'] ?? '') ?></span>
            <a href="/?controller=auth&action=logout">Logout</a>
        </div>
        <div class="content">
            <?php if (isset($content)) echo $content; ?>
        </div>
    </div>
</body>
</html>