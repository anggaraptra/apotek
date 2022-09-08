<?php
require '../koneksi.php';

$id = $_GET['idpelanggan'];
$query = "DELETE FROM tb_pelanggan WHERE idpelanggan = '$id'";

$hasil = mysqli_query($con, $query);

if (!$hasil) {
    die("Gagal menghapus " . mysqli_error($con));
} else {
    echo "<script>
        alert('Data pelanggan berhasil di hapus');
        window.location='../../dashboard.php?page=pelanggan';
    </script>";
}
