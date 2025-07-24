<h2>Add Class</h2>
<?php if (!empty($error)): ?><p style="color:red;"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Description: <input type="text" name="description"></label><br>
    <button type="submit">Add Class</button>
    <a href="/?controller=classes">Cancel</a>
</form>