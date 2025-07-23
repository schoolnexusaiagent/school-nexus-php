<h2>Add Student</h2>
<?php if ($error): ?><p style="color:red;"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email"></label><br>
    <label>Phone: <input type="text" name="phone"></label><br>
    <label>Class:
        <select name="class_id" required>
            <option value="">Select Class</option>
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['id'] ?>"><?= htmlspecialchars($class['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <label>Gender:
        <select name="gender">
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </label><br>
    <button type="submit">Add Student</button>
    <a href="/?controller=students">Cancel</a>
</form>