<?php
require '../koneksi.php';

$id = $_GET['idtransaksi'];
mysqli_query($con, "DELETE FROM tb_detail_transaksi WHERE idtransaksi = '$id'");

$query = "DELETE FROM tb_transaksi WHERE idtransaksi = '$id'";

$hasil = mysqli_query($con, $query);

if (!$hasil) {
    die("Gagal menghapus " . mysqli_error($con));
} else {
    echo "<script>
        window.location='../../dashboard.php?page=transaksi';
    </script>";
}
