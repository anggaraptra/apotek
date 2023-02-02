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

if (@$_POST['hapusObatDetail']) {
    $idDetail = $_POST['idDetail'];
    $query = "DELETE FROM tb_detail_transaksi WHERE iddetailtransaksi = '$idDetail'";
    mysqli_query($con, $query);
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
                                <th scope="col"></th>
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
                                    <td class="text-center">
                                        <form action="" method="POST">
                                            <input type="hidden" name="idDetail" value="<?= $rowDetail['iddetailtransaksi'] ?>">
                                            <input type="submit" value="Batal" name="hapusObatDetail" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3"><b style="float:right;">Grand Total</b></td>
                                <td colspan="2">
                                    <b>Rp.
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
<?php } ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>