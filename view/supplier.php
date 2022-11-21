<main id="main" class="main">
    <div class="pagetitle">
        <h1>Supplier</h1>
        <nav>
            <ol class="breadcrumb print">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a>Tables</a></li>
                <li class="breadcrumb-item active">Supplier</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section" id="supplier">
        <?php if (@$_SESSION['leveluser'] === 'admin') { ?>
            <div class="container-fluid my-4 table-responsive">
                <a class="btn btn-primary mb-2 print" data-bs-toggle="modal" data-bs-target="#modalInsertSupplier">Tambah Supplier</a>
                <table class="table table-bordered table-responsive" border='1' collspacing='0' collpadding='0'>
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Perusahaan</th>
                            <th>Keterangan</th>
                            <th class="print">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $supplier = mysqli_query($con, "SELECT * FROM tb_supplier");
                        $i = 1;
                        while ($splr = mysqli_fetch_assoc($supplier)) { ?>
                            <tr>
                                <td class='text-center'><?= $i; ?></td>
                                <td><?= $splr['perusahaan']; ?></td>
                                <td><?= $splr['keterangan']; ?></td>
                                <td class='text-center print'>
                                    <a class='btn btn-warning' href='updates/update_supplier.php?idsupplier=<?= $splr['idsupplier']; ?>'>Update</a>
                                    <a class='btn btn-danger tombolHapus' href='functions/delete/delete_supplier.php?idsupplier=<?= $splr['idsupplier']; ?>'>Delete</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php } ?>
                    </tbody>
                </table>
                <div class='text-center print'>
                    <a class="btn btn-outline-primary" onclick="window.print()">Print</a>
                </div>
            </div>

            <!-- modal insert supplier -->
            <div class=" modal fade" id="modalInsertSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Supplier</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-auto">
                            <form action="functions/insert/insert_supplier.php" method="POST" id="formInsert">
                                <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                                    <tr>
                                        <td><label for="perusahaan">Perusahaan</label></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="perusahaan" id="perusahaan" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="keterangan">Keterangan</label></td>
                                        <td>:</td>
                                        <td><textarea class="form-control" name="keterangan" cols="20" rows="2" id="keterangan" required></textarea></td>
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
                        alert('Karyawan tidak memiliki akses ke data supplier!');
                        window.location='dashboard.php';
                        </script>"
            ?>
        <?php } ?>
    </section>

</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>