<?php
error_reporting(0);

switch (@$_GET['page']) {
    case "karyawan":
        include 'view/view_karyawan.php';
        break;
    case "obat":
        include 'view/view_obat.php';
        break;
    case "pelanggan":
        include 'view/view_pelanggan.php';
        break;
    case "supplier":
        include 'view/view_supplier.php';
        break;
    case "transaksi":
        include 'view/view_transaksi.php';
        break;
    default:
        include 'view/home.php';
        break;
}
