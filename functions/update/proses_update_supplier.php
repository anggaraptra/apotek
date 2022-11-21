<?php
require '../koneksi.php';

$id = $_POST['idSupplier'];

$perusahaan = $_POST['perusahaan'];
$keterangan = $_POST['keterangan'];

$query = "UPDATE tb_supplier SET 
        perusahaan = '$perusahaan',
        keterangan = '$keterangan'
    WHERE idsupplier = '$id'";

$hasil = mysqli_query($con, $query);

if (!$hasil) {
    die("Gagal mengedit data supplier, " . mysqli_error($con, $hasil));
} else {
    echo "<script>
        window.location='../../dashboard.php?page=supplier';
    </script>";
}
