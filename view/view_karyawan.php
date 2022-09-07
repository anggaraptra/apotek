<?php
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
?>
<!-- karyawan -->
<section id="karyawan">
    <div class="container my-5">
        <h2>Karyawan</h2>
        <a class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalInsertKaryawan">Tambah Data Karyawan</a>
        <table class="table table-bordered" border='1' collspacing='0' collpadding='0'>
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $karyawan = mysqli_query($con, "SELECT * FROM tb_karyawan");
                $i = 1;
                while ($kry = mysqli_fetch_assoc($karyawan)) { ?>
                    <tr>
                        <td class='text-center'><?= $i ?></td>
                        <td><?= $kry['namakaryawan'] ?></td>
                        <td><?= $kry['alamat'] ?></td>
                        <td><?= $kry['telp'] ?></td>
                        <td class='text-center'>
                            <a class='btn btn-warning' href='updates/update_karyawan.php?idkaryawan=<?= $kry['idkaryawan'] ?>'>Update</a>
                            <a class='btn btn-danger' href='functions/delete/delete_karyawan.php?idkaryawan=<?= $kry['idkaryawan'] ?>' onclick="return confirm('Yakin?')">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<!-- modal insert karyawan -->
<div class="modal fade" id="modalInsertKaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-auto">
                <form action="functions/insert/proses_insert_karyawan.php" method="POST" enctype="multipart/form-data">
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
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>