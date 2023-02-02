<?php
session_start();
include('../functions/koneksi.php');
if (@$_POST['simpanLangganan']) {
    $namaPelanggan = $_POST['namaPelanggan'];
    $queryIdPelanggan = mysqli_query($con, "SELECT idpelanggan FROM tb_pelanggan WHERE namalengkap = '$namaPelanggan'");
    $rowPelanggan = mysqli_fetch_assoc($queryIdPelanggan);

    $idPelanggan = $rowPelanggan['idpelanggan'];
    $idKaryawan = $_SESSION['idkaryawan'];
    $tglTransaksi = date("Y-m-d");
    $kategoriPelanggan = 'langganan';

    $queryInsert = mysqli_query($con, "INSERT INTO tb_transaksi VALUES('', '$idPelanggan', '$idKaryawan', '$tglTransaksi', '$kategoriPelanggan', '0', '0', '0')");

    $queryTransaksi = mysqli_query($con, "SELECT LAST_INSERT_ID()");
    $hasilIdTransaksi = mysqli_fetch_row($queryTransaksi);
    $_SESSION['idtransaksi'] = $hasilIdTransaksi[0];

    if (!$hasilIdTransaksi) {
        die("Gagal! " . mysqli_error($con));
    } else {
        echo "<script>
            window.location='dashboard.php?page=detailtransaksi';
        </script>";
    }
}

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item"><a href="?page=transaksi">Transaksi</a></li>
                <li class="breadcrumb-item active">Tambah Transaksi</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard" id="insertTransaksi">
        <form action="" method="POST">
            <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                <tr>
                    <td><label for="">Kategori Pelanggan</label></td>
                    <td></td>
                    <td>
                        <select name="kategoriPelanggan" id="" class="form-control">
                            <option value="langganan">Langganan</option>
                            <option value="umum">Umum</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary">Next</button>
                    </td>
                </tr>
        </form>

        <?php if (@$_POST['kategoriPelanggan'] === 'langganan') { ?>
            <form action="" method="POST">
                <tr>
                    <td><label for="listPelanggan">Nama Pelanggan</label></td>
                    <td></td>
                    <td>
                        <input class="form-control" list="listPelanggan" name="namaPelanggan" required>
                        <datalist id="listPelanggan">
                            <?php
                            $query = "SELECT namalengkap FROM tb_pelanggan WHERE namalengkap != 'umum'";
                            $result = mysqli_query($con, $query);
                            ?>
                            <?php while ($data = mysqli_fetch_assoc($result)) : ?>
                                <option value="<?= $data['namalengkap'] ?>">
                                <?php endwhile; ?>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-primary" name="simpanLangganan" value="Detail">
                    </td>
                </tr>
                </table>
            </form>
        <?php } else if (@$_POST['kategoriPelanggan'] === 'umum') { ?>
            <?php
            $idPelanggan = '1814';
            $idKaryawan = $_SESSION['idkaryawan'];
            $tglTransaksi = date("Y-m-d");
            $kategoriPelanggan = 'umum';

            $queryInsert = mysqli_query($con, "INSERT INTO tb_transaksi VALUES('', '$idPelanggan', '$idKaryawan', '$tglTransaksi', '$kategoriPelanggan', '0', '0', '0')");

            $queryTransaksi = mysqli_query($con, "SELECT LAST_INSERT_ID()");
            $hasilIdTransaksi = mysqli_fetch_row($queryTransaksi);
            $_SESSION['idtransaksi'] = $hasilIdTransaksi['0'];

            if (!$hasilIdTransaksi) {
                die("Gagal" . mysqli_error($con));
            } else {
                echo "
                    <script>
                        window.location='dashboard.php?page=detailtransaksi';
                    </script>
                ";
            }
            ?>
        <?php } ?>
    </section>

</main>
<!-- End main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>