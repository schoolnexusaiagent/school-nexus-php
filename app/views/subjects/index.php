<h2>Subjects Management</h2>
<a href="/?controller=subjects&action=add" class="btn">+ Add Subject</a>
<table border="0" cellpadding="8" cellspacing="0" style="width:100%;background:#fff;margin-top:20px;">
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Description</th>
            <th>Credits</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($subjects as $subject): ?>
        <tr>
            <td><?= htmlspecialchars($subject['code']) ?></td>
            <td><?= htmlspecialchars($subject['name']) ?></td>
            <td><?= htmlspecialchars($subject['description']) ?></td>
            <td><?= htmlspecialchars($subject['credits']) ?></td>
            <td>
                <a href="/?controller=subjects&action=edit&id=<?= $subject['id'] ?>">Edit</a>
                <a href="/?controller=subjects&action=delete&id=<?= $subject['id'] ?>" onclick="return confirm('Delete this subject?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>