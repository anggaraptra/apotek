<?php
require '../functions/koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../package/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <title>Obat</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-uppercase fw-bolder" href="index.php">Apotek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="view_karyawan.php">Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#listObat">Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_supplier.php">Supplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_pelanggan.php">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_transaksi.php">Transaksi</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto">
                    <a href="../login.php" class="btn btn-outline-primary" type="submit">Login</a>
                </form>
            </div>
        </div>
    </nav>

    <!-- list obat -->
    <section id="listObat">
        <div class="container my-5">
            <h2>List Obat</h2>
            <a class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalInsertObat">Tambah Obat</a>
            <table class="table table-bordered" border='1' collspacing='0' collpadding='0'>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $obat = mysqli_query($con, "SELECT * FROM tb_obat");
                    $i = 1;
                    while ($obt = mysqli_fetch_assoc($obat)) {
                        echo "<tr id='" . $obt['idobat'] . "'>";
                        echo "<td class='text-center'>" . $i . "</td>";
                        echo "<td data-target='idsupplier'>" . $obt['idsupplier'] . "</td>";
                        echo "<td data-target='namaobat'>" . $obt['namaobat'] . "</td>";
                        echo "<td data-target='kategoriobat'>" . $obt['kategoriobat'] . "</td>";
                        echo "<td data-target='hargajual'>" . $obt['hargajual'] . "</td>";
                        echo "<td data-target='hargabeli'>" . $obt['hargabeli'] . "</td>";
                        echo "<td data-target='stok_obat'>" . $obt['stok_obat'] . "</td>";
                        echo "<td data-target='keterangan'>" . $obt['keterangan'] . "</td>";
                        echo "<td class='text-center'> 
                        <a class='btn btn-warning' data-id='" . $obt['idobat'] . "' data-role='updateObat' href='../updates/update_obat.php?idobat=" . $obt['idobat'] . "'>Update</a>
                        <a class='btn btn-danger' href='../functions/delete/delete_obat.php?idobat=" . $obt['idobat'] . "'>Delete</a>  
                        </td>";
                        echo "</tr>";
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- modal insert obat -->
    <div class="modal fade" id="modalInsertObat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <form action="../functions/insert/proses_insert_obat.php" method="POST">
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
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../package/js/script.js"></script>
</body>

</html>