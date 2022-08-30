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

    <title>Pelanggan</title>
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
                        <a class="nav-link" href="view_obat.php">Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_supplier.php">Supplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#listPelanggan">Pelanggan</a>
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

    <!-- list pelanggan -->
    <section id="listPelanggan">
        <div class="container my-5">
            <h2>List Pelanggan</h2>
            <a class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalInsertPelanggan">Tambah Pelanggan</a>
            <table class="table table-bordered" border='1' collspacing='0' collpadding='0'>
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Usia</th>
                        <th>Foto Resep</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pelanggan = mysqli_query($con, "SELECT * FROM tb_pelanggan");
                    $i = 1;
                    while ($plngn = mysqli_fetch_assoc($pelanggan)) {
                        echo "<tr>";
                        echo "<td class='text-center'>" . $i . "</td>";
                        echo "<td>" . $plngn['namalengkap'] . "</td>";
                        echo "<td>" . $plngn['alamat'] . "</td>";
                        echo "<td>" . $plngn['telp'] . "</td>";
                        echo "<td>" . $plngn['usia'] . "</td>";
                        echo "<td>" . $plngn['buktifotoresep'] . "</td>";
                        echo "<td class='text-center'> 
                        <a class='btn btn-warning' href='../updates/update_pelanggan.php?idpelanggan=" . $plngn['idpelanggan'] . "'>Update</a>
                        <a class='btn btn-danger' href='../functions/delete/delete_pelanggan.php?idpelanggan=" . $plngn['idpelanggan'] . "'>Delete</a>  
                        </td>";
                        echo "</tr>";
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- modal insert pelanggan -->
    <div class="modal fade" id="modalInsertPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <form action="../functions/insert/proses_insert_karyawan.php" method="POST" enctype="multipart/form-data">
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

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../package/js/script.js"></script>
</body>

</html>