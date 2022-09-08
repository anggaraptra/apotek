<?php
require '../koneksi.php';

$id = $_GET['idsupplier'];
$query = "DELETE FROM tb_supplier WHERE idsupplier = '$id'";

$hasil = mysqli_query($con, $query);

if (!$hasil) {
    die("Gagal menghapus " . mysqli_error($con));
} else {
    echo "<script>
        alert('Data supplier berhasil di hapus');
        window.location='../../dashboard.php?page=supplier';
    </script>";
}
