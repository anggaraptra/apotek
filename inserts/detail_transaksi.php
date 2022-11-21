<?php
session_start();
include('../functions/koneksi.php');
if (@$_GET['idtransaksi']) {
    $id = $_GET['idtransaksi'];
} else {
    $id = $_SESSION['idtransaksi'];
}

$query = mysqli_query($con, "SELECT * FROM tb_transaksi WHERE idtransaksi='$id'");
$row = mysqli_fetch_assoc($query);

$idPelanggan = $row['idpelanggan'];
$queryPelanggan = mysqli_query($con, "SELECT * FROM tb_pelanggan WHERE idpelanggan='$idPelanggan'");
$rowPelanggan = mysqli_fetch_assoc($queryPelanggan);

$idKaryawan = $row['idkaryawan'];
$queryKaryawan = mysqli_query($con, "SELECT namakaryawan FROM tb_karyawan WHERE idkaryawan='$idKaryawan'");
$rowKaryawan = mysqli_fetch_assoc($queryKaryawan);

if (@$_POST['more']) {
    $namaObat = $_POST['namaObat'];
    $queryIdObat = mysqli_fetch_assoc(mysqli_query($con, "SELECT idobat, hargajual FROM tb_obat WHERE namaobat = '$namaObat'"));

    $idObat = $queryIdObat['idobat'];
    $jumlah = $_POST['jumlah'];
    $hargaSatuan = $queryIdObat['hargajual'];
    $totalHarga = $jumlah * $hargaSatuan;

    $insertTransaksi = mysqli_query($con, "INSERT INTO tb_detail_transaksi VALUES('', '$id', '$idObat', '$jumlah', '$hargaSatuan', '$totalHarga')");
}

?>

<?php if (@$_GET['page'] === 'detailtransaksi') { ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Detail Transaksi</h1>
            <nav>
                <ol class="breadcrumb print">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a>Tables</a></li>
                    <li class="breadcrumb-item"><a href="?page=transaksi">Transaksi</a></li>
                    <li class="breadcrumb-item active">Detail Transaksi</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section" id="detailTransaksi">
            <table class="table-responsive table table-borderless table-hover w-50" border="1">
                <tr>
                    <th>Tanggal Transaksi</th>
                    <td></td>
                    <td><input type="date" value="<?= $row['tgltransaksi']; ?>" readonly></td>
                </tr>
                <tr>
                    <th>Nama Pelanggan</th>
                    <td></td>
                    <td class="text-capitalize"><?= $rowPelanggan['namalengkap']; ?></td>
                </tr>
                <tr>
                    <th>Kategori Pelanggan</th>
                    <td></td>
                    <td class="text-capitalize"><?= $row['kategoripelanggan']; ?></td>
                </tr>
                <tr>
                    <th>Nama Karyawan</th>
                    <td></td>
                    <td class="text-capitalize"><?= $rowKaryawan['namakaryawan']; ?></td>
                </tr>
            </table>

            <div class="container-fluid">
                <div class="row">
                    <table class="table table-responsive table-bordered border-primary">
                        <thead>
                            <tr>
                                <th scope="col">Nama Obat</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $hasilDetail = mysqli_query($con, "SELECT * FROM tb_detail_transaksi WHERE idtransaksi = '$id'");
                            while ($rowDetail = mysqli_fetch_assoc($hasilDetail)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php
                                        $rowIdObat = $rowDetail['idobat'];
                                        $namaObat = mysqli_fetch_assoc(mysqli_query($con, "SELECT namaobat FROM tb_obat WHERE idobat = '$rowIdObat'"));
                                        echo $namaObat['namaobat'];
                                        ?>
                                    </td>
                                    <td><?= $rowDetail['jumlah']; ?></td>
                                    <td><?= number_format($rowDetail['hargasatuan'], 0, ',', '.'); ?></td>
                                    <td><?= number_format($rowDetail['totalharga'], 0, ',', '.'); ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3"><b style="float:right;">Grand Total</b></td>
                                <td>
                                    <b>
                                        <?php
                                        $grandTotal = mysqli_fetch_row(mysqli_query($con, "SELECT SUM(totalharga) FROM tb_detail_transaksi WHERE idtransaksi = '$id'"));
                                        echo number_format($grandTotal[0], 0, ',', '.');
                                        ?>
                                    </b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <!-- input total bayar  -->
                <?php
                if (@$_POST['finish']) { ?>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-4">
                                <input type="number" class="form-control" name="bayar" placeholder="Masukan jumlah bayar" required>
                                <input type="submit" class="btn btn-primary mt-2" name="simpanTransaksi" value="Simpan Transaksi">
                            </div>
                            <div class="col"></div>
                        </div>
                    </form>
                <?php } else if (@$_POST['simpanTransaksi']) { ?>
                    <?php
                    $grandTotal = mysqli_fetch_row(mysqli_query($con, "SELECT SUM(totalharga) FROM tb_detail_transaksi WHERE idtransaksi = '$id'"));
                    $totalBayar = $grandTotal[0];
                    $bayar = $_POST['bayar'];
                    $kembali = $bayar - $totalBayar;

                    mysqli_query($con, "UPDATE tb_transaksi SET totalbayar = '$totalBayar', bayar = '$bayar', kembali = '$kembali' WHERE idtransaksi = '$id'");
                    $transaksi = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tb_transaksi WHERE idtransaksi = '$id'"));
                    ?>
                    <table>
                        <tr>
                            <th>Bayar</th>
                            <td></td>
                            <td>
                                <input type="text" class="form-control" readonly value="Rp. <?= number_format($transaksi['bayar'], 0, ',', '.'); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <td></td>
                            <td>
                                <input type="text" class="form-control" readonly value="Rp. <?= number_format($totalBayar, 0, ',', '.'); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>Kembali</th>
                            <td></td>
                            <td>
                                <input type="text" class="form-control" readonly value="Rp. <?= number_format($transaksi['kembali'], 0, ',', '.'); ?>">
                            </td>
                        </tr>
                    </table>
                    <a href="?page=transaksi"><button class="btn btn-warning mt-2">Lihat Semua Transaksi</button></a>
                <?php } else { ?>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-4">
                            <form action="" method="POST">
                                <input list="listObat" name="namaObat" class="form-control" placeholder="Masukan nama obat">
                                <datalist id="listObat">
                                    <?php
                                    $query = "SELECT * FROM tb_obat";
                                    $hasil = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_assoc($hasil)) :
                                    ?>
                                        <option value="<?= $row['namaobat']; ?>">
                                        <?php endwhile; ?>
                                </datalist>
                                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah">
                                <div class="mt-2">
                                    <input type="submit" class="btn btn-warning" name="more" value="Masukan Obat">
                                    <input type="submit" class="btn btn-success" name="finish" value="Selesai">
                                </div>
                            </form>
                        </div>
                        <div class="col"></div>
                    </div>
                <?php } ?>
            </div>
        </section>

    </main>
    <!-- End #main -->
<?php } else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>MyApotek - Details Transaksi</title>
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
                            <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
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
                        <?php if (@$_SESSION['leveluser'] === 'admin') { ?>
                            <li>
                                <a href="../dashboard.php?page=karyawan">
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
                        <?php } ?>
                        <li>
                            <a href="../dashboard.php?page=pelanggan">
                                <i class="bi bi-person-fill"></i><span>Pelanggan</span>
                            </a>
                        </li>
                        <li>
                            <a class="active" href="../dashboard.php?page=transaksi">
                                <i class="bi bi-cash-stack"></i><span>Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Tables Nav -->

                <?php if (@$_SESSION['leveluser'] === 'admin') { ?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="../dashboard.php?page=registrasi">
                            <i class="bi bi-card-list"></i>
                            <span>Register</span>
                        </a>
                    </li>
                <?php } else if (@$_SESSION['leveluser'] === 'karyawan') { ?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="">
                            <i class="bi bi-envelope"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                <?php } ?>
                <!-- End Register Page Nav -->
            </ul>

        </aside>
        <!-- End Sidebar-->

        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Detail Transaksi</h1>
                <nav>
                    <ol class="breadcrumb print">
                        <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a>Tables</a></li>
                        <li class="breadcrumb-item"><a href="../dashboard.php?page=transaksi">Transaksi</a></li>
                        <li class="breadcrumb-item active">Detail Transaksi</li>
                    </ol>
                </nav>
            </div>
            <!-- End Page Title -->

            <section class="section" id="detailTransaksi">
                <table border="1">
                    <tr>
                        <td>Tanggal Transaksi</td>
                        <td></td>
                        <td><?= $row['tgltransaksi']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td></td>
                        <td><?= $rowPelanggan['namalengkap']; ?></td>
                    </tr>
                    <tr>
                        <td>Kategori Pelanggan</td>
                        <td></td>
                        <td><?= $row['kategoripelanggan']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Karyawan</td>
                        <td></td>
                        <td><?= $rowKaryawan['namakaryawan']; ?></td>
                    </tr>
                </table>

                <div class="container">
                    <div class="row">
                        <table class="table table-bordered border-primary">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $hasilDetail = mysqli_query($con, "SELECT * FROM tb_detail_transaksi WHERE idtransaksi = '$id'");
                                while ($rowDetail = mysqli_fetch_assoc($hasilDetail)) :
                                ?>
                                    <tr>
                                        <td>
                                            <?php
                                            $rowIdObat = $rowDetail['idobat'];
                                            $namaObat = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tb_obat WHERE idobat = '$rowIdObat'"));
                                            echo $namaObat['namaobat'];
                                            ?>
                                        </td>
                                        <td><?= $rowDetail['jumlah']; ?></td>
                                        <td><?= number_format($rowDetail['hargasatuan'], 0, ',', '.'); ?></td>
                                        <td><?= number_format($rowDetail['totalharga'], 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                                <tr>
                                    <td colspan="3"><b style="float:right;">Grand Total</b></td>
                                    <td>
                                        <b>
                                            <?php
                                            $grandTotal = mysqli_fetch_row(mysqli_query($con, "SELECT SUM(totalharga) FROM tb_detail_transaksi WHERE idtransaksi = '$id'"));
                                            echo number_format($grandTotal[0], 0, ',', '.');
                                            ?>
                                        </b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <!-- input total bayar  -->
                    <?php
                    if (@$_POST['finish']) { ?>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-4">
                                    <input type="number" class="form-control" name="bayar" placeholder="Masukan jumlah bayar" required>
                                    <input type="submit" class="btn btn-primary" name="simpanTransaksi" value="Simpan Transaksi">
                                </div>
                                <div class="col"></div>
                            </div>
                        </form>
                    <?php } else if (@$_POST['simpanTransaksi']) { ?>
                        <?php
                        $grandTotal = mysqli_fetch_row(mysqli_query($con, "SELECT SUM(totalharga) FROM tb_detail_transaksi WHERE idtransaksi = '$id'"));
                        $totalBayar = $grandTotal[0];
                        $bayar = $_POST['bayar'];
                        $kembali = $bayar - $totalBayar;

                        mysqli_query($con, "UPDATE tb_transaksi SET totalbayar = '$totalBayar', bayar = '$bayar', kembali = '$kembali' WHERE idtransaksi = '$id'");
                        $transaksi = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tb_transaksi WHERE idtransaksi = '$id'"));
                        ?>

                        <table class="table table-bordered border-primary">
                            <tr>
                                <td>Bayar</td>
                                <td><?= number_format($transaksi['bayar'], 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td>Total Bayar</td>
                                <td><?= number_format($transaksi['totalbayar'], 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td>Kembali</td>
                                <td><?= number_format($transaksi['kembali'], 0, ',', '.'); ?></td>
                            </tr>
                        </table>
                        <a href="../dashboard.php?page=transaksi"><button class="btn btn-warning">Lihat Semua Transaksi</button></a>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-4">
                                <form action="" method="POST">
                                    <input list="listObat" name="namaObat" class="form-control" placeholder="Masukan nama obat">
                                    <datalist id="listObat">
                                        <?php
                                        $query = "SELECT namaobat FROM tb_obat";
                                        $hasil = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_assoc($hasil)) :
                                        ?>
                                            <option value="<?= $row['namaobat']; ?>">
                                            <?php endwhile; ?>
                                    </datalist>
                                    <input type="number" class="form-control" name="jumlah" placeholder="Jumlah">
                                    <input type="submit" class="btn btn-warning" name="more" value="Masukan Obat">
                                    <input type="submit" class="btn btn-success" name="finish" value="Selesai">
                                </form>
                            </div>
                            <div class="col"></div>
                        </div>
                    <?php } ?>
                </div>
            </section>

        </main>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
<?php } ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>