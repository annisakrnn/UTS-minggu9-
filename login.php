<?php
session_start();
$validUsername = "admin";
$validPassword = "admin123"; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Semua field harus diisi.";
    } elseif (strlen($password) < 5) {
        $error = "Password minimal 5 karakter.";
    } elseif (!preg_match('/\d/', $password)) {
        $error = "Password harus terdiri dari huruf dan angka.";
    } elseif ($username === $validUsername && $password === $validPassword) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Hotel - Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="container">
        <div class="header text-center">
            <h1>ABC Hotel</h1>
        </div>
        <div class="login-box">
            <form id="loginForm" method="POST" action="login.php">
                <h2>Mohon login terlebih dahulu</h2>
                <?php if (isset($error)): ?>
                    <p class="text-danger"><?php echo $error; ?></p>
                <?php endif; ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
    <div class="footer">
        Website Footer
    </div>
</body>
</html>
