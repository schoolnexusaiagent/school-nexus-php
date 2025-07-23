<h2>Classes Management</h2>
<a href="/?controller=classes&action=add" class="btn">+ Add Class</a>
<table border="0" cellpadding="8" cellspacing="0" style="width:100%;background:#fff;margin-top:20px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($classes as $class): ?>
        <tr>
            <td><?= htmlspecialchars($class['name']) ?></td>
            <td><?= htmlspecialchars($class['description']) ?></td>
            <td>
                <a href="/?controller=classes&action=view&id=<?= $class['id'] ?>">👁️</a>
                <a href="/?controller=classes&action=edit&id=<?= $class['id'] ?>">✏️</a>
                <a href="/?controller=classes&action=delete&id=<?= $class['id'] ?>" onclick="return confirm('Delete this class?')">🗑️</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>