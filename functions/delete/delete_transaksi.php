<?php
require '../koneksi.php';

$id = $_GET['idtransaksi'];
$query = "DELETE FROM tb_transaksi WHERE idtransaksi = '$id'";

$hasil = mysqli_query($con, $query);

if (!$hasil) {
    die("Gagal menghapus " . mysqli_error($con));
} else {
    echo "<script>
        alert('Data transaksi berhasil di hapus');
        window.location='../../dashboard.php?page=transaksi';
    </script>";
}
