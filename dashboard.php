<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Real Estate System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background: #f4f6f9; color: #333; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>! 👋</h1>
    <p>Role: <strong><?php echo ucfirst($_SESSION['role']); ?></strong></p>
    <br>
    <a href="auth/logout.php" style="padding: 10px 20px; background: #e63946; color: white; text-decoration: none; border-radius: 8px;">Logout</a>
</body>
</html>