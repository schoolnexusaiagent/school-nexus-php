<h2>Terms Management</h2>
<a href="/?controller=terms&action=add" class="btn">+ Add Term</a>
<table border="0" cellpadding="8" cellspacing="0" style="width:100%;background:#fff;margin-top:20px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Academic Session</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($terms as $term): ?>
        <tr>
            <td><?= htmlspecialchars($term['name']) ?></td>
            <td><?= htmlspecialchars($term['academic_session']) ?></td>
            <td><?= htmlspecialchars($term['start_date']) ?></td>
            <td><?= htmlspecialchars($term['end_date']) ?></td>
            <td><?= htmlspecialchars($term['status']) ?></td>
            <td>
                <a href="/?controller=terms&action=edit&id=<?= $term['id'] ?>">Edit</a>
                <a href="/?controller=terms&action=delete&id=<?= $term['id'] ?>" onclick="return confirm('Delete this term?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>