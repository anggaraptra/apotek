<!-- list transaksi -->
<section id="transaksi">
    <div class="container my-5">
        <h2>List Transaksi</h2>

        <?php if ($_SESSION['leveluser'] === 'admin') { ?>
            <a class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalInsertTransaksi">Tambah Transaksi</a>
        <?php } ?>

        <table class="table table-bordered" border='1' collspacing='0' collpadding='0'>
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>Id Kasir</th>
                    <th>Tanggal Transaksi</th>
                    <th>Kategori Pelanggan</th>
                    <th>Total Bayar</th>
                    <th>Bayar</th>
                    <th>Kembali</th>
                    <?php if ($_SESSION['leveluser'] === 'admin') { ?>
                        <th>Aksi</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $transaksi = mysqli_query($con, "SELECT * FROM tb_transaksi");
                $i = 1;
                while ($trnksi = mysqli_fetch_assoc($transaksi)) { ?>
                    <tr>
                        <td class='text-center'><?= $i ?></td>
                        <td><?= $trnksi['idpelanggan'] ?></td>
                        <td><?= $trnksi['idkasir'] ?></td>
                        <td><?= $trnksi['tgltransaksi'] ?></td>
                        <td><?= $trnksi['kategoripelanggan'] ?></td>
                        <td><?= $trnksi['totalbayar'] ?></td>
                        <td><?= $trnksi['bayar'] ?></td>
                        <td><?= $trnksi['kembali'] ?></td>
                        <?php if ($_SESSION['leveluser'] === 'admin') { ?>
                            <td class='text-center'>
                                <a class='btn btn-warning' href='updates/update_transaksi.php?idtransaksi=<?= $trnksi['idtransaksi'] ?>'>Update</a>
                                <a class='btn btn-danger' href='functions/delete/delete_transaksi.php?idtransaksi=<?= $trnksi['idtransaksi'] ?>' onclick="return confirm('Yakin?')">Delete</a>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php $i++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<!-- modal insert transaksi -->
<?php if ($_SESSION['leveluser'] === 'admin') { ?>
    <div class="modal fade" id="modalInsertTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <form action="functions/insert/proses_insert_transaksi.php" method="POST">
                        <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                            <tr>
                                <td><label for="idPelanggan">ID Pelanggan</label></td>
                                <td>:</td>
                                <td>
                                    <?php
                                    $query = "SELECT * FROM tb_pelanggan";
                                    $result = mysqli_query($con, $query);
                                    ?>
                                    <select class="form-control" name="idPelanggan" id="idPelanggan" required>
                                        <option value=""></option>
                                        <?php while ($data = mysqli_fetch_assoc($result)) : ?>
                                            <option value="<?= $data['idpelanggan'] ?>"><?= $data["idpelanggan"] . " - " . $data['namalengkap'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="idKasir">ID Kasir</label></td>
                                <td>:</td>
                                <td><input class="form-control" type="number" name="idKasir" id="idKasir" required></td>
                            </tr>
                            <tr>
                                <td><label for="tglTransaksi">Tanggal Transaksi</label></td>
                                <td>:</td>
                                <td><input class="form-control" type="date" name="tglTransaksi" id="tglTransaksi" required></td>
                            </tr>
                            <tr>
                                <td><label for="katPelanggan">Kategori Pelanggan</label></td>
                                <td>:</td>
                                <td><input class="form-control" type="text" name="katPelanggan" id="katPelanggan" required></td>
                            </tr>
                            <tr>
                                <td><label for="totalBayar">Total Bayar</label></td>
                                <td>:</td>
                                <td><input class="form-control" type="number" name="totalBayar" id="totalBayar" required></td>
                            </tr>
                            <tr>
                                <td><label for="bayar">Bayar</label></td>
                                <td>:</td>
                                <td><input class="form-control" type="number" name="bayar" id="bayar" required></td>
                            </tr>
                            <tr>
                                <td><label for="kembali">Kembali</label></td>
                                <td>:</td>
                                <td><input class="form-control" type="number" name="kembali" id="kembali" required></td>
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