<h2>Add Teacher</h2>
<?php if ($error): ?><p style="color:red;"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email"></label><br>
    <label>Phone: <input type="text" name="phone"></label><br>
    <button type="submit">Add Teacher</button>
    <a href="/?controller=teachers">Cancel</a>
</form>