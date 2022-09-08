<?php
require '../koneksi.php';

$id = $_POST['idObat'];

$idsupplier = $_POST['idSupplier'];
$nama = $_POST['namaObat'];
$kategori = $_POST['kategoriObat'];
$jual = $_POST['hargaJual'];
$beli = $_POST['hargaBeli'];
$stok = $_POST['stokObat'];
$ket = $_POST['ket'];

$query = "UPDATE tb_obat SET 
        idsupplier = '$idsupplier',
        namaobat='$nama',
        kategoriobat='$kategori',
        hargajual='$jual',
        hargabeli='$beli',
        stok_obat='$stok',
        keterangan='$ket'
    WHERE idobat='$id'";

$hasil = mysqli_query($con, $query);

if (!$hasil) {
    die("Gagal mengedit data obat, " . mysqli_error($con, $hasil));
} else {
    echo "<script>
        alert('Data obat berhasil diupdate!');
        window.location='../../dashboard.php?page=obat';
    </script>";
}
