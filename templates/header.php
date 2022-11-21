<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>
    <?= @$_GET['page'] ? '' : 'MyApotek - Dashboard' ?>
    <?php if (@$_GET['page'] === 'karyawan') echo 'MyApotek - Karyawan' ?>
    <?php if (@$_GET['page'] === 'obat') echo  'MyApotek - Obat' ?>
    <?php if (@$_GET['page'] === 'pelanggan') echo 'MyApotek - Pelanggan' ?>
    <?php if (@$_GET['page'] === 'supplier') echo 'MyApotek - Supplier' ?>
    <?php if (@$_GET['page'] === 'transaksi') echo 'MyApotek - Transaksi' ?>
    <?php if (@$_GET['page'] === 'registrasi') echo 'MyApotek - Register' ?>
    <?php if (@$_GET['page'] === 'profile') echo 'MyApotek - Users / Profile' ?>
    <?php if (@$_GET['page'] === 'inserttransaksi') echo 'MyApotek - Tambah Transaksi' ?>
    <?php if (@$_GET['page'] === 'detailtransaksi') echo 'MyApotek - Details Transaksi' ?>
  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/vendor/sweetalert/sweetalert2.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>