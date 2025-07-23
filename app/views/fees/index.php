<h2>Fees Management</h2>
<a href="/?controller=fees&action=add" class="btn">+ Add Fee Record</a>
<table border="0" cellpadding="8" cellspacing="0" style="width:100%;background:#fff;margin-top:20px;">
    <thead>
        <tr>
            <th>Student</th>
            <th>Class</th>
            <th>Fee Type</th>
            <th>Total Amount</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($fees as $fee): ?>
        <tr>
            <td><?= htmlspecialchars($fee['student_name']) ?></td>
            <td><?= htmlspecialchars($fee['class_name']) ?></td>
            <td><?= htmlspecialchars($fee['fee_type']) ?></td>
            <td><?= htmlspecialchars($fee['total_amount']) ?></td>
            <td><?= htmlspecialchars($fee['due_date']) ?></td>
            <td><?= htmlspecialchars($fee['status']) ?></td>
            <td>
                <a href="/?controller=fees&action=view&id=<?= $fee['id'] ?>">👁️</a>
                <a href="/?controller=fees&action=edit&id=<?= $fee['id'] ?>">✏️</a>
                <a href="/?controller=fees&action=delete&id=<?= $fee['id'] ?>" onclick="return confirm('Delete this fee record?')">🗑️</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>