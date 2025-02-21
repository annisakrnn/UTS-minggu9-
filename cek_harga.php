<?php
//memulai sesi
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
//menyimpan nilai harga
$harga_per_hari = [
    "Standard" => 300000,
    "Deluxe" => 400000,
    "Superior" => 500000
];
//menyimpan harga
$diskon_member = 0.1; 
$diskon_hut = 100000; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lantai = $_POST['lantai'];
    $tipe = $_POST['type'];
    $jumlah_hari = $_POST['jumlah_hari'];
    $diskon = $_POST['diskon'];
//menghitung harga
    $harga_per_hari_tipe = $harga_per_hari[$tipe];
    $total = $harga_per_hari_tipe * $jumlah_hari;

    if ($lantai == 6) {
        $total += 50000; 
    }
//menghitung diskon
    if ($diskon == "Member") {
        $total_diskon = $total * $diskon_member;
    } elseif ($diskon == "Promo HUT") {
        $total_diskon = $diskon_hut;
    } else {
        $total_diskon = 0;
    }
//menghitung total akhir jjika mendapat diskon
    $total_bayar = $total - $total_diskon;
}
?>
<!--form isi-->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Harga</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="stylecek_harga.css">
</head>
<body>
    <div class="container">
        <h1>ABC Hotel</h1>
        </div>
        <div class="login-box">
        <form method="POST" action="cek_harga.php">
            <div class="form-group">
                <label for="lantai">Lantai</label>
                <input type="number" class="form-control" id="lantai" name="lantai" >
                </div>
            <div class="form-group">
                <label for="type">Tipe</label>
                <select class="form-control" id="type" name="type" >
                    <option value="Standard">Standard</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Superior">Superior</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_hari">Jumlah Hari</label>
                <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" >
            </div>
            <div class="form-group">
                <label for="diskon">Diskon</label>
                <select class="form-control" id="diskon" name="diskon">
                    <option value="Tidak Ada">Tidak Ada</option>
                    <option value="Member">Member</option>
                    <option value="Promo HUT">Promo HUT</option>
                </select>
                </div>
            </div>
            </div>
            <button type="submit" class="btn btn-primary">CHECK</button>
        </form>
<!--penghitungan-->
        <?php if (isset($total_bayar)): ?>
        <h3>Total Transaksi: Rp <?php echo number_format($total, 0, ',', '.'); ?></h3>
        <h3>Total Diskon: Rp <?php echo number_format($total_diskon, 0, ',', '.'); ?></h3>
        <h3>Yang Harus Dibayar: Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></h3>
        <?php endif; ?>
    </div>
    <div class="footer">
        Website Footer
    </div>
</body>
</html>
