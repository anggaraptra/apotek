<?php
session_start();

require 'koneksi.php';

$idKaryawan = $_POST['idKaryawan'];
$username = $_POST['username'];
$password = $_POST['password'];
$levelUser = $_POST['levelUser'];

$pwEncript = password_hash($password, PASSWORD_DEFAULT);

$queryCekUser = "SELECT * FROM tb_login WHERE username = '$username'";
$hasilUser = mysqli_query($con, $queryCekUser);
$cekRowUser = mysqli_num_rows($hasilUser);


if ($cekRowUser > 0) {
    echo "<script>
        alert('Data sudah ada, silahkan register kembali!');
        window.location='../dashboard.php?page=registrasi';
    </script>";
} else {
    $query = "INSERT INTO tb_login VALUE ('$username', '$password', '$levelUser', '$idKaryawan')";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Gagal register " . mysqli_error($con));
    } else {
        echo "<script>
            alert('Berhasil registrasi, anda bisa login dengan akun yang sudah terdaftar!');
            window.location='../dashboard.php';
        </script>";
    }
}
