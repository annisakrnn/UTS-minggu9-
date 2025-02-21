<?php
//memulai start
session_start();
//menghapus semua data dalam sesi
session_destroy();
header("Location: login.php");
exit();
?>
