<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(dirname($_SERVER['PHP_SELF'])) . '/style.css'; ?>">

</head>
<body>
    <div class="container">
        <h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Ini adalah halaman dashboard.</p>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
