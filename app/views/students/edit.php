<h2>Edit Student</h2>
<?php if ($error): ?><p style="color:red;"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post">
    <label>Name: <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required></label><br>
    <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>"></label><br>
    <label>Phone: <input type="text" name="phone" value="<?= htmlspecialchars($student['phone']) ?>"></label><br>
    <label>Class:
        <select name="class_id" required>
            <option value="">Select Class</option>
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['id'] ?>" <?= $student['class_id'] == $class['id'] ? 'selected' : '' ?>><?= htmlspecialchars($class['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <label>Gender:
        <select name="gender">
            <option value="">Select Gender</option>
            <option value="male" <?= $student['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
            <option value="female" <?= $student['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
            <option value="other" <?= $student['gender'] == 'other' ? 'selected' : '' ?>>Other</option>
        </select>
    </label><br>
    <button type="submit">Save Changes</button>
    <a href="/?controller=students">Cancel</a>
</form>