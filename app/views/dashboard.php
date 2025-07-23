<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SchoolNexus Dashboard</title>
</head>
<body>
    <h1>Welcome to SchoolNexus Dashboard</h1>
    <h2>Dashboard</h2>
<div style="display:flex;gap:20px;margin-bottom:30px;">
    <div style="background:#7c3aed;color:#fff;padding:20px;border-radius:8px;min-width:180px;">
        <div style="font-size:32px;font-weight:bold;"><?= $students ?></div>
        <div>Total Students</div>
    </div>
    <div style="background:#2563eb;color:#fff;padding:20px;border-radius:8px;min-width:180px;">
        <div style="font-size:32px;font-weight:bold;"><?= $teachers ?></div>
        <div>Total Teachers</div>
    </div>
    <div style="background:#059669;color:#fff;padding:20px;border-radius:8px;min-width:180px;">
        <div style="font-size:32px;font-weight:bold;">UGX <?= number_format($fees) ?></div>
        <div>Fees Collections</div>
    </div>
    <div style="background:#f59e42;color:#fff;padding:20px;border-radius:8px;min-width:180px;">
        <div style="font-size:32px;font-weight:bold;"><?= $subjects ?></div>
        <div>Total Subjects</div>
    </div>
</div>
<div style="display:flex;gap:30px;">
    <div style="flex:1;background:#fff;padding:20px;border-radius:8px;">
        <h3>Students by Gender</h3>
        <div style="height:180px;display:flex;align-items:center;justify-content:center;">[Pie Chart Placeholder]</div>
    </div>
    <div style="flex:1;background:#fff;padding:20px;border-radius:8px;">
        <h3>Fee Collections by Class</h3>
        <div style="height:180px;display:flex;align-items:center;justify-content:center;">[Bar Chart Placeholder]</div>
    </div>
</div>
    <p>Logged in as: <b><?= htmlspecialchars($user['name']) ?></b> (<?= htmlspecialchars($user['role']) ?>)</p>
    <a href="/?controller=auth&action=logout">Logout</a>
</body>
</html>