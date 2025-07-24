<h2>Edit Teacher</h2>
<?php if ($error): ?><p style="color:red;"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post">
    <label>Name: <input type="text" name="name" value="<?= htmlspecialchars($teacher['name']) ?>" required></label><br>
    <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($teacher['email']) ?>"></label><br>
    <label>Phone: <input type="text" name="phone" value="<?= htmlspecialchars($teacher['phone']) ?>"></label><br>
    <button type="submit">Save Changes</button>
    <a href="/?controller=teachers">Cancel</a>
</form>