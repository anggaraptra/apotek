<?php
require '../koneksi.php';

$id = $_POST['idTransaksi'];

$idPelanggan = $_POST['idPelanggan'];
$idKasir = $_POST['idKasir'];
$tglTransaksi = $_POST['tglTransaksi'];
$katPelanggan = $_POST['katPelanggan'];
$totalBayar = $_POST['totalBayar'];
$bayar = $_POST['bayar'];
$kembali = $_POST['kembali'];

$query = "UPDATE tb_transaksi SET 
        idpelanggan = '$idPelanggan',
        idkasir = '$idKasir',
        tgltransaksi = '$tglTransaksi',
        kategoripelanggan = '$katPelanggan',
        totalbayar = '$totalBayar',
        bayar = '$bayar',
        kembali = '$kembali'
    WHERE idtransaksi = '$id'";

$hasil = mysqli_query($con, $query);

if (!$hasil) {
    die("Gagal mengedit data transaksi, " . mysqli_error($con, $hasil));
} else {
    echo "<script>
        window.location='../../dashboard.php?page=transaksi';
    </script>";
}
