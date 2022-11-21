<main id="main" class="main">
    <div class="pagetitle">
        <h1>Karyawan</h1>
        <nav>
            <ol class="breadcrumb print">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a>Tables</a></li>
                <li class="breadcrumb-item active">Karyawan</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section" id="karyawan">
        <?php
        session_start();
        if ($_SESSION['leveluser'] === 'admin') { ?>
            <div class="container-fluid my-4 table-responsive">
                <a class="btn btn-primary mb-2 print" data-bs-toggle="modal" data-bs-target="#modalInsertKaryawan">Tambah Karyawan</a>
                <table class="table table-bordered table-responsive" border='1' collspacing='0' collpadding='0'>
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th class="print">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $karyawan = mysqli_query($con, "SELECT * FROM tb_karyawan WHERE namakaryawan != 'admin'");
                        $i = 1;
                        while ($kry = mysqli_fetch_assoc($karyawan)) { ?>
                            <tr>
                                <td class='text-center'><?= $i ?></td>
                                <td><?= $kry['namakaryawan'] ?></td>
                                <td><?= $kry['alamat'] ?></td>
                                <td><?= $kry['telp'] ?></td>
                                <td class='text-center print'>
                                    <a class='btn btn-warning' href='updates/update_karyawan.php?idkaryawan=<?= $kry['idkaryawan'] ?>'>Update</a>
                                    <a class='btn btn-danger tombolHapus' href='functions/delete/delete_karyawan.php?idkaryawan=<?= $kry['idkaryawan'] ?>'>Delete</a>
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

            <!-- modal insert karyawan -->
            <div class="modal fade" id="modalInsertKaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-auto">
                            <form action="functions/insert/insert_karyawan.php" method="POST" id="formInsert">
                                <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                                    <tr>
                                        <td><label for="namaKaryawan">Nama Karyawan</label></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="namaKaryawan" id="namaKaryawan" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="alamat">Alamat</label></td>
                                        <td>:</td>
                                        <td><textarea class="form-control" name="alamat" cols="20" rows="2" id="alamat" required></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><label for="telepon">Telepon</label></td>
                                        <td>:</td>
                                        <td><input class="form-control" type="number" name="telepon" id="telepon" required></td>
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
        <?php } else { ?>
            <?php echo "<script>
        alert('Karyawan tidak memiliki akses ke data karyawan!');
        window.location='dashboard.php';
    </script>"
            ?>
        <?php } ?>
    </section>

</main>
<!-- End main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>