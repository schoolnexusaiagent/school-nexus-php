<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - SchoolNexus</title>
</head>
<body>
    <h2>Login to SchoolNexus</h2>
    <?php if (isset($error)): ?>
        <p style="color:red;"> <?= htmlspecialchars($error) ?> </p>
    <?php endif; ?>
    <form method="post">
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>