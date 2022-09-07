<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<?php require 'functions/koneksi.php'; ?>
<?php require 'templates/header.php'; ?>
<?php require 'templates/navbar.php'; ?>
<?php require 'templates/halaman.php'; ?>

<?php require 'templates/footer.php'; ?>