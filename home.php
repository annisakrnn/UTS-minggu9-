<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styleHome.css">
</head>
<body>
<div class="header clearfix">
        <div class="container">
            ABC Hotel
            <div class="nav-links">
                <a href="home.php">Home</a>
                <a href="cek_harga.php">Cek Harga</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div class="banner">
        <img src="download.jpeg" alt="Gambar">
    </div>

    <div class="profile container">
        <h2>Hotel Profile</h2>
        <p>Hotel ABC dengan fasilitas bintang 10 akan memanjakan keinginan anda untuk berlibur</p>
    </div>

    <div class="footer">
        Website Footer
    </div>

</body>
</html>
