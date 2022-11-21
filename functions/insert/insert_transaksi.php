<?php
require '../koneksi.php';

$idPelanggan = $_POST['idPelanggan'];
$idKasir = $_POST['idKasir'];
$tglTransaksi = $_POST['tglTransaksi'];
$katPelanggan = htmlspecialchars($_POST['katPelanggan']);
$totalBayar = $_POST['totalBayar'];
$bayar = $_POST['bayar'];
$kembali = $_POST['kembali'];

$query = "INSERT INTO tb_transaksi VALUES (
    '',
    '$idPelanggan',
    '$idKasir',
    '$tglTransaksi',
    '$katPelanggan',
    '$totalBayar',
    '$bayar',
    '$kembali'
)";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Gagal memasukan data transaksi!" . mysqli_error($con));
} else {
    echo "<script>
    document.location.href = '../../dashboard.php?page=transaksi';
    </script>";
}
