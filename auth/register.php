<?php
require_once 'database.php';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $query)) {
        $success = "Pendaftaran berhasil. Silakan login.";
    } else {
        $error = "Pendaftaran gagal: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars(dirname($_SERVER['PHP_SELF'])) . '/style.css'; ?>">

</head>
<body>
    <div class="container">
        <h2>Daftar</h2>
        <?php 
        if (isset($error)) { echo "<p class='error'>$error</p>"; }
        if (isset($success)) { echo "<p class='success'>$success</p>"; }
        ?>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
    </div>
</body>
</html>
