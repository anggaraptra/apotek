<?php
require '../koneksi.php';

// fungsi tambah obat
$idSupplier = htmlspecialchars($_POST['idSupplier']);
$namaObat = htmlspecialchars($_POST['namaObat']);
$kategori = htmlspecialchars($_POST['kategori']);
$hargaJual = htmlspecialchars($_POST['hargaJual']);
$hargaBeli = htmlspecialchars($_POST['hargaBeli']);
$stok = htmlspecialchars($_POST['stok']);
$ket = htmlspecialchars($_POST['ket']);

$query = "INSERT INTO tb_obat VALUES (
    '',
    '$idSupplier', 
    '$namaObat', 
    '$kategori', 
    '$hargaJual', 
    '$hargaBeli', 
    '$stok', 
    '$ket'
)";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Gagal memasukan data obat! " . mysqli_error($con));
} else {
    echo "<script>
    alert('Data berhasil ditambahkan!');
    document.location.href = '../../view/view_obat.php';
    </script>";
}
