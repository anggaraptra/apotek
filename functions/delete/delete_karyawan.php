<?php
require '../koneksi.php';

$id = $_GET['idkaryawan'];
$query = "DELETE FROM tb_karyawan WHERE idkaryawan = '$id'";

$hasil = mysqli_query($con, $query);

if (!$hasil) {
    die("Gagal menghapus " . mysqli_error($con));
} else {
    echo "<script>
        window.location='../../dashboard.php?page=karyawan';
    </script>";
}
