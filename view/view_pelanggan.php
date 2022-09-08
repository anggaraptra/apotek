<!-- list pelanggan -->
<section id="listPelanggan">
    <div class="container my-5">
        <h2>List Pelanggan</h2>

        <?php if ($_SESSION['leveluser'] === 'admin') { ?>
            <a class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalInsertPelanggan">Tambah Pelanggan</a>
        <?php } ?>

        <table class="table table-bordered" border='1' collspacing='0' collpadding='0'>
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Usia</th>
                    <th>Foto Resep</th>
                    <?php if ($_SESSION['leveluser'] === 'admin') { ?>
                        <th>Aksi</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $pelanggan = mysqli_query($con, "SELECT * FROM tb_pelanggan");
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
                            <td class='text-center'>
                                <a class='btn btn-warning' href='updates/update_pelanggan.php?idpelanggan=<?= $plngn['idpelanggan'] ?>'>Update</a>
                                <a class='btn btn-danger' href='functions/delete/delete_pelanggan.php?idpelanggan=<?= $plngn['idpelanggan'] ?>' onclick="return confirm('Yakin?')">Delete</a>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php $i++; ?>
                <?php } ?>
            </tbody>
            <img src="" alt="">
        </table>
    </div>
</section>

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
                    <form action="functions/insert/proses_insert_pelanggan.php" method="POST" enctype="multipart/form-data">
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
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>