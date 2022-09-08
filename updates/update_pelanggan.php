<?php
session_start();

require '../functions/koneksi.php';

$id = $_GET['idpelanggan'];

$query = mysqli_query($con, "SELECT * FROM tb_pelanggan WHERE idpelanggan = '$id'");

$pelanggan = mysqli_fetch_assoc($query);

if (@$_SESSION['leveluser'] === 'admin') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../assets/css/style.css">

        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <title>Update Pelanggan</title>
    </head>

    <body>

        <!-- update obat -->
        <h2 class="text-center mt-5 mb-3">Update Pelanggan</h2>
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <form action="../functions/update/proses_update_pelanggan.php" method="POST" enctype="multipart/form-data">
                <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                    <input type="hidden" name="idPelanggan" value="<?= $pelanggan['idpelanggan'] ?>">
                    <tr>
                        <td><label for="namaLengkap">Nama</label></td>
                        <td></td>
                        <td><input type="text" class="form-control" id="namaLengkap" name="namaLengkap" value="<?= $pelanggan['namalengkap']; ?>"></td>
                    </tr>

                    <tr>
                        <td><label for="alamat">Alamat</label></td>
                        <td></td>
                        <td><textarea class="form-control" name="alamat" cols="20" rows="2" id="alamat"><?= $pelanggan['alamat']; ?></textarea></td>
                    </tr>

                    <tr>
                        <td><label for="telepon">Telepon</label></td>
                        <td></td>
                        <td> <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $pelanggan['telp']; ?>"></td>
                    </tr>

                    <tr>
                        <td><label for="usia">Usia</label></td>
                        <td></td>
                        <td> <input type="number" class="form-control" id="usia" name="usia" value="<?= $pelanggan['usia']; ?>"></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><img src="../assets/img/fotoresep/<?= $pelanggan['buktifotoresep'] ?>" alt=""></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="file" class="form-control" name="fotoResep"></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><button type="submit" class="btn btn-primary">Update</button></td>
                    </tr>
                </table>
            </form>
        </div>

        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/js/script.js"></script>
    </body>

    </html>
<?php } else {
    header('Location: ../dashboard.php');
    exit;
} ?>