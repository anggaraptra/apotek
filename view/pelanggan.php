<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pelanggan</h1>
        <nav>
            <ol class="breadcrumb print">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a>Tables</a></li>
                <li class="breadcrumb-item active">Pelanggan</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section" id="pelanggan">
        <div class="container-fluid my-4 table-responsive">

            <?php if ($_SESSION['leveluser'] === 'admin') { ?>
                <a class="btn btn-primary mb-2 print" data-bs-toggle="modal" data-bs-target="#modalInsertPelanggan">Tambah Pelanggan</a>
            <?php } ?>

            <table class="table table-bordered table-responsive" border='1' collspacing='0' collpadding='0'>
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Usia</th>
                        <th>Foto Resep</th>
                        <?php if ($_SESSION['leveluser'] === 'admin') { ?>
                            <th class="print">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pelanggan = mysqli_query($con, "SELECT * FROM tb_pelanggan WHERE namalengkap != 'umum'");
                    $i = 1;
                    while ($plngn = mysqli_fetch_assoc($pelanggan)) { ?>
                        <tr>
                            <td class='text-center'><?= $i ?></td>
                            <td><?= $plngn['namalengkap'] ?></td>
                            <td><?= $plngn['alamat'] ?></td>
                            <td><?= $plngn['telp'] ?></td>
                            <td><?= $plngn['usia'] ?></td>
                            <td><img src='assets/img/fotoresep/<?= $plngn['buktifotoresep'] ?>' alt='' class='rounded' width='150px' height='200px'></td>
                            <?php if ($_SESSION['leveluser'] === 'admin') { ?>
                                <td class='text-center print'>
                                    <a class='btn btn-warning' href='updates/update_pelanggan.php?idpelanggan=<?= $plngn['idpelanggan'] ?>'>Update</a>
                                    <a class='btn btn-danger tombolHapus' href='functions/delete/delete_pelanggan.php?idpelanggan=<?= $plngn['idpelanggan'] ?>'>Delete</a>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php $i++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class='text-center print'>
                <a class="btn btn-outline-primary" onclick="window.print()">Print</a>
            </div>
        </div>

        <!-- modal insert pelanggan -->
        <?php if ($_SESSION['leveluser'] === 'admin') { ?>
            <div class="modal fade" id="modalInsertPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-auto">
                            <form action="functions/insert/insert_pelanggan.php" method="POST" enctype="multipart/form-data" id="formInsert">
                                <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                                    <tr>
                                        <td><label for="namaLengkap">Nama Lengkap</label></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="namaLengkap" id="namaLengkap" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="alamat">Alamat</label></td>
                                        <td>:</td>
                                        <td>
                                            <textarea class="form-control" name="alamat" cols="20" rows="2" id="alamat" required></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="telepon">Telepon</label></td>
                                        <td>:</td>
                                        <td><input class="form-control" type="number" name="telepon" id="telepon" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="usia">Usia</label></td>
                                        <td>:</td>
                                        <td><input class="form-control" type="number" name="usia" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="fotoResep">Bukti Foto Resep</label></td>
                                        <td>:</td>
                                        <td><input class="form-control" type="file" name="fotoResep" id="fotoResep" required></td>
                                    </tr>
                                </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary tombolInsert">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>

</main>
<!-- End main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>