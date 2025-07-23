<h2>Students Management</h2>
<a href="/?controller=students&action=add" class="btn">+ Add Student</a>
<table border="0" cellpadding="8" cellspacing="0" style="width:100%;background:#fff;margin-top:20px;">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Class</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><img src="/images/avatar.png" alt="avatar" width="32" height="32"></td>
            <td><?= htmlspecialchars($student['name']) ?></td>
            <td><?= htmlspecialchars($student['email']) ?></td>
            <td><?= htmlspecialchars($student['phone']) ?></td>
            <td><?= htmlspecialchars($student['class_name']) ?></td>
            <td><?= htmlspecialchars(ucfirst($student['status'])) ?></td>
            <td>
                <a href="/?controller=students&action=view&id=<?= $student['id'] ?>">👁️</a>
                <a href="/?controller=students&action=edit&id=<?= $student['id'] ?>">✏️</a>
                <a href="/?controller=students&action=delete&id=<?= $student['id'] ?>" onclick="return confirm('Delete this student?')">🗑️</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>