<?php
error_reporting(0);

switch (@$_GET['page']) {
    case "karyawan":
        include 'view/karyawan.php';
        break;
    case "obat":
        include 'view/obat.php';
        break;
    case "pelanggan":
        include 'view/pelanggan.php';
        break;
    case "supplier":
        include 'view/supplier.php';
        break;
    case "transaksi":
        include 'view/transaksi.php';
        break;
    case "registrasi":
        include 'view/registrasi.php';
        break;
    case "profile":
        include 'view/profile.php';
        break;
    case "inserttransaksi":
        include 'inserts/insert_transaksi.php';
        break;
    case "detailtransaksi":
        include 'inserts/detail_transaksi.php';
        break;
    default:
        include 'view/home.php';
        break;
}
