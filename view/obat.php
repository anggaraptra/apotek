<main id="main" class="main">
    <div class="pagetitle">
        <h1>Obat</h1>
        <nav>
            <ol class="breadcrumb print">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a>Tables</a></li>
                <li class="breadcrumb-item active">Obat</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section" id="obat">
        <?php if (@$_SESSION['leveluser'] === 'admin') { ?>
            <div class="container-fluid my-4 table-responsive">
                <a class="btn btn-primary mb-2 print" data-bs-toggle="modal" data-bs-target="#modalInsertObat">Tambah Obat</a>
                <table class="table table-bordered table-responsive" border='1' collspacing='0' collpadding='0'>
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>ID Supplier</th>
                            <th>Nama Obat</th>
                            <th>Kategori</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Stok</th>
                            <th>Keterangan</th>
                            <th class="print">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $obat = mysqli_query($con, "SELECT * FROM tb_obat");
                        $i = 1;
                        while ($obt = mysqli_fetch_assoc($obat)) { ?>
                            <tr id='<?= $obt['idobat'] ?>'>
                                <td class='text-center'><?= $i ?></td>
                                <td data-target='idsupplier'><?= $obt['idsupplier'] ?></td>
                                <td data-target='namaobat'><?= $obt['namaobat'] ?></td>
                                <td data-target='kategoriobat'><?= $obt['kategoriobat'] ?></td>
                                <td class="text-end" data-target='hargajual'><?= $obt['hargajual'] ?></td>
                                <td class="text-end" data-target='hargabeli'><?= $obt['hargabeli'] ?></td>
                                <td data-target='stok_obat'><?= $obt['stok_obat'] ?></td>
                                <td data-target='keterangan'><?= $obt['keterangan'] ?></td>
                                <td class='text-center print'>
                                    <a class='btn btn-warning' data-role='updateObat' href='updates/update_obat.php?idobat=<?= $obt['idobat'] ?>'>Update</a>
                                    <a class='btn btn-danger tombolHapus' href='functions/delete/delete_obat.php?idobat=<?= $obt['idobat'] ?>'>Delete</a>
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

            <!-- modal insert obat -->
            <div class="modal fade" id="modalInsertObat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-auto">
                            <form action="functions/insert/insert_obat.php" method="POST" id="formInsert">
                                <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                                    <tr>
                                        <td><label for="idSupplier">ID Supplier</label></td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            $query = "SELECT * FROM tb_supplier";
                                            $result = mysqli_query($con, $query);
                                            ?>
                                            <select class="form-control" name="idSupplier" id="idSupplier" required>
                                                <option value=""></option>
                                                <?php while ($data = mysqli_fetch_assoc($result)) : ?>
                                                    <option value="<?= $data['idsupplier'] ?>"><?= $data["idsupplier"] . " - " . $data['perusahaan'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="namaObat">Nama Obat</label></td>
                                        <td>:</td>
                                        <td><input class="form-control" type="text" name="namaObat" id="namaObat" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="kategoriObat">Kategori Obat</label></td>
                                        <td>:</td>
                                        <td><input class="form-control" type="text" name="kategori" id="kategoriObat" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="hargaJual">Harga Jual</label></td>
                                        <td>:</td>
                                        <td><input class="form-control" type="number" name="hargaJual" id="hargaJual" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="hargaBeli">Harga Beli</label></td>
                                        <td>:</td>
                                        <td><input class="form-control" type="number" name="hargaBeli" id="hargaBeli" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="stokObat">Stok Obat</label></td>
                                        <td>:</td>
                                        <td><input class="form-control" type="number" name="stok" id="stokObat" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="keterangan">Keterangan</label></td>
                                        <td>:</td>
                                        <td><textarea class="form-control" name="ket" cols="20" rows="5" id="keterangan" required></textarea></td>
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
        alert('Karyawan tidak memiliki akses ke data obat!');
        window.location='dashboard.php';
    </script>"
            ?>
        <?php } ?>
    </section>

</main>
<!-- End main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>