<?php
//sesi dimulai
session_start();
//mengecek apakah username sudah diisi, jika blm dialihkan ke halaman logim
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<script>
            var i =  0;
            $(document).ready(function(){
            $('.slidertittle, #slider img').hide();
            showNextImage();
            setInterval('showNextImage()', 3000);
            });
            function showNextImage(){
            i++;
            $('#sliderImage' + i).appendTo('#slider').fadeIn(1100).delay(1100).fadeOut(1100);
            $('#tittle' + i).appendTo('#slider').fadeIn(1100).delay(1100).fadeOut(1100);
            if(i==3) i = 0;
            }
        </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styleHome.css">
    <script src="jquery-3.7.1.js"></script>
</head>
<body>
<!--header navigasi-->
<div class="header clearfix">
        <div class="container">
            ABC Hotel
            <!--untuk mengarahkan ke halaman2 yang ada pada navbar-->
            <div class="nav-links">
                <a href="home.php">Home</a>
                <a href="cek_harga.php">Cek Harga</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div id="banner">
            <img id="sliderImage1"  src="download.jpeg">
            <div class="slidertittle" id="tittle1">Gambar1</div>

            <img id="sliderImage2"  src="download.jpeg">
            <div class="slidertittle" id="tittle2">Gambar2</div>
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
