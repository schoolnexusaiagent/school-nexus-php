<h2>Settings</h2>
<a href="/?controller=settings&action=add" class="btn">+ Add Setting</a>
<table border="0" cellpadding="8" cellspacing="0" style="width:100%;background:#fff;margin-top:20px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Value</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($settings as $setting): ?>
        <tr>
            <td><?= htmlspecialchars($setting['name']) ?></td>
            <td><?= htmlspecialchars($setting['value']) ?></td>
            <td>
                <a href="/?controller=settings&action=edit&id=<?= $setting['id'] ?>">Edit</a>
                <a href="/?controller=settings&action=delete&id=<?= $setting['id'] ?>" onclick="return confirm('Delete this setting?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>