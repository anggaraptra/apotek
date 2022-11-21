<?php
session_start();
if (!isset($_SESSION['leveluser'])) {
    header("Location: login.php");
    exit;
}
require 'functions/koneksi.php';
require 'templates/header.php';
require 'templates/navsidebar.php';
require 'halaman.php';
require 'templates/footer.php';
