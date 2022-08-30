<?php
require '../koneksi.php';

$id = $_GET['idpelanggan'];
$query = "DELETE FROM tb_pelanggan WHERE idpelanggan = '$id'";

$hasil = mysqli_query($con, $query);

if (!$hasil) {
    die("Gagal menghapus " . mysqli_error($con));
} else {
    echo "<script>
        alert('Data obat berhasil di hapus');
        window.location='../../view/view_pelanggan.php';
    </script>";
}
