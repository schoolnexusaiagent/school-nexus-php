<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SchoolNexus Dashboard</title>
</head>
<body>
    <h1>Welcome to SchoolNexus Dashboard</h1>
    <p>This is a placeholder. The full dashboard UI will be implemented here.</p>
    <p>Logged in as: <b><?= htmlspecialchars($user['name']) ?></b> (<?= htmlspecialchars($user['role']) ?>)</p>
    <a href="/?controller=auth&action=logout">Logout</a>
</body>
</html>