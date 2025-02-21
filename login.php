<?php
session_start(); //Mulai session
//$validUsername = "admin"; //variabel validasi
//$validPassword = "admin123"; //variabel validasi
//pengelolaan data post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    //validasi input
    if (empty($username) || empty($password)) {
        $error = "Semua field harus diisi.";
    } elseif (strlen($password) < 5) {
        $error = "Password minimal 5 karakter.";
        } elseif (!preg_match('/[0-9]/', $password)) {
    //} elseif (!preg_match('', $password)) {
        $error = "Password harus terdiri dari angka.";
    //verifikasi dan redirect
    //} elseif ($username === $validUsername && $password === $validPassword) {
        //$_SESSION['username'] = $username
    } else {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    //} else {
        //$error = "Username atau password salah.";
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
        <!--login form-->
        <div class="login-box">
            <form id="loginForm" method="POST" action="login.php">
                <h2>Mohon login terlebih dahulu</h2>
                <?php if (isset($error)): ?>
                    <p class="text-danger"><?php echo $error; ?></p><!--jika error baris ini dijalankan-->
                <?php endif; ?><!--untuk menutup if agar lebih mudah dibava didalam php-->
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
    <!--footer-->
    <div class="footer">
        Website Footer
    </div>
</body>
</html>
