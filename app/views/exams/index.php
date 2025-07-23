<h2>Exams Management</h2>
<a href="/?controller=exams&action=add" class="btn">+ Add Exam</a>
<table border="0" cellpadding="8" cellspacing="0" style="width:100%;background:#fff;margin-top:20px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Total Marks</th>
            <th>Duration</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($exams as $exam): ?>
        <tr>
            <td><?= htmlspecialchars($exam['name']) ?></td>
            <td><?= htmlspecialchars($exam['class_name']) ?></td>
            <td><?= htmlspecialchars($exam['subject_name']) ?></td>
            <td><?= htmlspecialchars($exam['total_marks']) ?></td>
            <td><?= htmlspecialchars($exam['duration']) ?></td>
            <td><?= htmlspecialchars($exam['date']) ?></td>
            <td><?= htmlspecialchars($exam['status']) ?></td>
            <td>
                <a href="/?controller=exams&action=edit&id=<?= $exam['id'] ?>">Edit</a>
                <a href="/?controller=exams&action=delete&id=<?= $exam['id'] ?>" onclick="return confirm('Delete this exam?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>