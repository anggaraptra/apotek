<?php
session_start();

require '../functions/koneksi.php';

$id = $_GET['idsupplier'];

$query = mysqli_query($con, "SELECT * FROM tb_supplier WHERE idsupplier = '$id'");

$supplier = mysqli_fetch_assoc($query);

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

        <title>Update Supplier</title>
    </head>

    <body>

        <!-- update obat -->
        <h2 class="text-center mt-5 mb-3">Update Supplier</h2>
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <form action="../functions/update/proses_update_supplier.php" method="POST">
                <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
                    <input type="hidden" name="idSupplier" value="<?= $supplier['idsupplier'] ?>">
                    <tr>
                        <td><label for="perusahaan">Perusahaan</label></td>
                        <td></td>
                        <td><input type="text" class="form-control" id="perusahaan" name="perusahaan" value="<?= $supplier['perusahaan']; ?>"></td>
                    </tr>

                    <tr>
                        <td><label for="keterangan">Keterangan</label></td>
                        <td></td>
                        <td><textarea class="form-control" name="keterangan" cols="20" rows="2" id="keterangan"><?= $supplier['keterangan']; ?></textarea></td>
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