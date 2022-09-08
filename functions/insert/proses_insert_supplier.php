<?php
require '../koneksi.php';

$perusahaan = htmlspecialchars($_POST['perusahaan']);
$keterangan = htmlspecialchars($_POST['keterangan']);

$query = "INSERT INTO tb_supplier VALUES (
    '',
    '$perusahaan',
    '$keterangan'
)";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Gagal memasukan data supplier! " . mysqli_error($con));
} else {
    echo "<script>
    alert('Data berhasil ditambahkan!');
    document.location.href = '../../dashboard.php?page=supplier';
    </script>";
}
