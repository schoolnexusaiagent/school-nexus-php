<h2>Teachers Management</h2>
<a href="/?controller=teachers&action=add" class="btn">+ Add Teacher</a>
<table border="0" cellpadding="8" cellspacing="0" style="width:100%;background:#fff;margin-top:20px;">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($teachers as $teacher): ?>
        <tr>
            <td><img src="/images/avatar.png" alt="avatar" width="32" height="32"></td>
            <td><?= htmlspecialchars($teacher['name']) ?></td>
            <td><?= htmlspecialchars($teacher['email']) ?></td>
            <td><?= htmlspecialchars($teacher['phone']) ?></td>
            <td><?= htmlspecialchars(ucfirst($teacher['status'])) ?></td>
            <td>
                <a href="/?controller=teachers&action=view&id=<?= $teacher['id'] ?>">👁️</a>
                <a href="/?controller=teachers&action=edit&id=<?= $teacher['id'] ?>">✏️</a>
                <a href="/?controller=teachers&action=delete&id=<?= $teacher['id'] ?>" onclick="return confirm('Delete this teacher?')">🗑️</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>