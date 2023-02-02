<main id="main" class="main">
    <div class="pagetitle">
        <h1>Transaksi</h1>
        <nav>
            <ol class="breadcrumb print">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a>Tables</a></li>
                <li class="breadcrumb-item active">Transaksi</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section" id="transaksi">
        <div class="container-fluid my-4 table-responsive">
            <a class="btn btn-primary mb-2 print" href="?page=inserttransaksi">Tambah Transaksi</a>

            <table class="table table-bordered table-responsive" border='1' collspacing='0' collpadding='0'>
                <thead class="text-center">
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Kategori Pelanggan</th>
                        <th>Total Bayar (Rp)</th>
                        <th>Bayar (Rp)</th>
                        <th>Kembali (Rp)</th>
                        <th class="print">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $transaksi = mysqli_query($con, "SELECT * FROM tb_transaksi INNER JOIN tb_pelanggan USING(idpelanggan) INNER JOIN tb_karyawan USING(idkaryawan) ORDER BY idtransaksi ASC");
                    $i = 1;
                    while ($trnksi = mysqli_fetch_assoc($transaksi)) { ?>
                        <tr>
                            <td><?= $trnksi['idtransaksi'] ?></td>
                            <td><?= $trnksi['namalengkap'] ?></td>
                            <td><?= $trnksi['namakaryawan'] ?></td>
                            <td><?= $trnksi['tgltransaksi'] ?></td>
                            <td><?= $trnksi['kategoripelanggan'] ?></td>
                            <td class="text-end">
                                <?= number_format($trnksi['totalbayar'], 0, ',', '.'); ?>
                            <td class="text-end">
                                <?= number_format($trnksi['bayar'], 0, ',', '.'); ?>
                            </td>
                            <td class="text-end">
                                <?= number_format($trnksi['kembali'], 0, ',', '.'); ?>
                            </td>
                            <td class='text-center print'>
                                <a class='btn btn-warning' href='dashboard.php?page=detailtransaksi&idtransaksi=<?= $trnksi['idtransaksi'] ?>'>Detail</a>
                                <a class='btn btn-danger tombolHapus' href='functions/delete/delete_transaksi.php?idtransaksi=<?= $trnksi['idtransaksi'] ?>'>Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class='text-center print'>
                <a class="btn btn-outline-primary" onclick="window.print()">Print</a>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>