<?php
require '../koneksi.php';

$id = $_GET['idobat'];
$query = "DELETE FROM tb_obat WHERE idobat = '$id'";

$hasil = mysqli_query($con, $query);

if (!$hasil) {
    die("Gagal menghapus " . mysqli_error($con));
} else {
    echo "<script>
        window.location='../../dashboard.php?page=obat';
    </script>";
}
