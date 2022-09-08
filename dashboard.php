<?php
session_start();
if (!isset($_SESSION['leveluser'])) {
    header("Location: login.php");
    exit;
}
require 'functions/koneksi.php';
require 'templates/header.php';
require 'templates/navbar.php';
require 'halaman.php';
require 'templates/footer.php';
