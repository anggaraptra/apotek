<?php if (@$_SESSION['leveluser'] === 'admin') { ?>
    <!-- list supplier -->
    <section id="listSupplier">
        <div class="container my-5">
            <h2>List Supplier</h2>
            <a class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalInsertSupplier">Tambah Supplier</a>
            <table class="table table-bordered" border='1' collspacing='0' collpadding='0'>
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Perusahaan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
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
                            <td class='text-center'>
                                <a class='btn btn-warning' href='updates/update_supplier.php?idsupplier=<?= $splr['idsupplier']; ?>'>Update</a>
                                <a class='btn btn-danger' href='functions/delete/delete_supplier.php?idsupplier=<?= $splr['idsupplier']; ?>' onclick="return confirm('Yakin?')">Delete</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- modal insert supplier -->
    <div class=" modal fade" id="modalInsertSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <form action="functions/insert/proses_insert_supplier.php" method="POST">
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
                    <button type="submit" class="btn btn-primary">Tambah</button>
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