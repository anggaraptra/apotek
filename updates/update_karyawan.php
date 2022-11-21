<?php
session_start();

require '../functions/koneksi.php';

$id = $_GET['idkaryawan'];

$query = mysqli_query($con, "SELECT * FROM tb_karyawan WHERE idkaryawan = '$id'");

$karyawan = mysqli_fetch_assoc($query);

if (@$_SESSION['leveluser'] === 'admin') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>MyApotek - Update Karyawan</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="../assets/img/favicon.png" rel="icon">
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <link href="../assets/css/style.css" rel="stylesheet">

    </head>

    <body>
        <header id="header" class="header fixed-top d-flex align-items-center print">

            <div class="d-flex align-items-center justify-content-between">
                <a href="../dashboard.php" class="logo d-flex align-items-center">
                    <img src="../assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">MYAPOTEK</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div>
            <!-- End Logo -->

            <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="POST" action="#">
                    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <!-- End Search Bar -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                    <!-- End Search Icon-->

                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i>
                            <span class="text-capitalize d-none d-md-block dropdown-toggle ps-2"> Hallo <?= $_SESSION['username']; ?> </span>
                        </a>
                        <!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6 class="text-capitalize"><?= $_SESSION['username']; ?></h6>
                                <span><?= $_SESSION['leveluser']; ?></span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="../dashboard.php?page=profile">
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <?php if (isset($_SESSION['username'])) { ?>
                                    <a class="dropdown-item d-flex align-items-center text-danger tombolLogout" href="../functions/logout.php">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Logout</span>
                                    </a>
                                <?php } else { ?>
                                    <a class="dropdown-item d-flex align-items-center" href="../login.php">
                                        <i class="bi bi-box-arrow-in-left"></i>
                                        <span>Login</span>
                                    </a>
                                <?php } ?>
                            </li>

                        </ul>
                        <!-- End Profile Dropdown Items -->
                    </li>
                    <!-- End Profile Nav -->

                </ul>
            </nav>
            <!-- End Icons Navigation -->

        </header>
        <!-- End Header -->

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar print">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="../dashboard.php">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->

                <li class="nav-heading">Pages</li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="active" href="../dashboard.php?page=karyawan">
                                <i class="bi bi-people-fill"></i><span>Karyawan</span>
                            </a>
                        </li>
                        <li>
                            <a href="../dashboard.php?page=obat">
                                <i class=" bi bi-capsule"></i><span>Obat</span>
                            </a>
                        </li>
                        <li>
                            <a href="../dashboard.php?page=supplier">
                                <i class="bi bi-person-plus-fill"></i><span>Supplier</span>
                            </a>
                        </li>
                        <li>
                            <a href="../dashboard.php?page=pelanggan">
                                <i class="bi bi-person-fill"></i><span>Pelanggan</span>
                            </a>
                        </li>
                        <li>
                            <a href="../dashboard.php?page=transaksi">
                                <i class="bi bi-cash-stack"></i><span>Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Tables Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="../dashboard.php?page=registrasi">
                        <i class="bi bi-card-list"></i>
                        <span>Register</span>
                    </a>
                </li>
                <!-- End Register Page Nav -->
            </ul>

        </aside>
        <!-- End Sidebar-->

        <!-- update karyawan -->
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Update Karyawan</h1>
                <nav>
                    <ol class="breadcrumb print">
                        <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a>Tables</a></li>
                        <li class="breadcrumb-item active"><a href="../dashboard.php?page=karyawan">Karyawan</a></li>
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </nav>
            </div>
            <!-- End Page Title -->

            <section class="section" id="updateKaryawan">
                <div class="container my-4">
                    <form action="../functions/update/proses_update_karyawan.php" method="POST" id="formUpdate">
                        <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                            <input type="hidden" name="idKaryawan" value="<?= $karyawan['idkaryawan'] ?>">
                            <tr>
                                <td><label for="namaKaryawan">Nama Karyawan</label></td>
                                <td></td>
                                <td><input type="text" class="form-control" id="namaKaryawan" name="namaKaryawan" value="<?= $karyawan['namakaryawan']; ?>"></td>
                            </tr>

                            <tr>
                                <td><label for="alamat">Alamat</label></td>
                                <td></td>
                                <td><textarea class="form-control" name="alamat" cols="20" rows="2" id="alamat"><?= $karyawan['alamat']; ?></textarea></td>
                            </tr>

                            <tr>
                                <td><label for="telepon">Telepon</label></td>
                                <td></td>
                                <td> <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $karyawan['telp']; ?>"></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td><button type="submit" class="btn btn-primary tombolUpdate">Update</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </section>

        </main>
        <!-- End main -->

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/chart.js/chart.min.js"></script>
        <script src="../assets/vendor/echarts/echarts.min.js"></script>
        <script src="../assets/vendor/quill/quill.min.js"></script>
        <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>
        <script src="../assets/vendor/sweetalert/sweetalert2.all.min.js"></script>

        <!-- Template Main JS File -->
        <script src="../assets/js/jquery-3.6.0.min.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="../assets/js/script.js"></script>
    </body>

    </html>
<?php } else {
    header('Location: ../dashboard.php');
    exit;
} ?>