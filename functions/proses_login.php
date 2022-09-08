<?php
session_start();

$user = $_POST['username'];
$password = $_POST['password'];

include 'koneksi.php';

$query = "SELECT * FROM tb_login WHERE `username` = '$user' AND `password` = '$password';";

$result = mysqli_query($con, $query);

$row = mysqli_num_rows($result);

if ($row > 0) {
    $data = mysqli_fetch_assoc($result);

    $_SESSION['username'] = $user;
    $_SESSION['leveluser'] = $data['leveluser'];
    header('Location: ../dashboard.php');
} else {
    echo "<script>
    alert('Login failed!');
    location.href='../login.php';
    </script>";
}
