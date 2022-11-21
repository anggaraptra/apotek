<?php
session_start();

$user = $_POST['username'];
$password = $_POST['password'];

require 'koneksi.php';

$query = "SELECT * FROM tb_login WHERE `username` = '$user'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$cekPass = password_verify($password, $row['password']);

if ($cekPass > 0) {
    $_SESSION['username'] = $user;
    $_SESSION['leveluser'] = $row['leveluser'];
    $_SESSION['idkaryawan'] = $row['idkaryawan'];
    header('Location: ../dashboard.php');
} else {
    echo "<script>
    alert('Login failed!');
    location.href='../login.php';
    </script>";
}
