<?php
require '../koneksi.php';

$namaKaryawan = htmlspecialchars($_POST['namaKaryawan']);
$alamat = htmlspecialchars($_POST['alamat']);
$telepon = htmlspecialchars($_POST['telepon']);

$query = "INSERT INTO tb_karyawan VALUES (
    '', 
    '$namaKaryawan', 
    '$alamat', 
    '$telepon'  
)";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Gagal memasukan data karyawan! " . mysqli_error($con));
} else {
    echo "<script>
    alert('Data berhasil ditambahkan!');
    document.location.href = '../../dashboard.php?page=karyawan';
    </script>";
}
