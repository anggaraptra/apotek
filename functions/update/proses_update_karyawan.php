<?php
require '../koneksi.php';

$id = $_POST['idKaryawan'];

$namaKaryawan = $_POST['namaKaryawan'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

$query = "UPDATE tb_karyawan SET 
        namakaryawan = '$namaKaryawan',
        alamat = '$alamat',
        telp = '$telepon'
    WHERE idkaryawan = '$id'";

$hasil = mysqli_query($con, $query);

if (!$hasil) {
    die("Gagal mengedit data karyawan, " . mysqli_error($con, $hasil));
} else {
    echo "<script>
        alert('Data karyawan berhasil diupdate!');
        window.location='../../view/view_karyawan.php';
    </script>";
}
