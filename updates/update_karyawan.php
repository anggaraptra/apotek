<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

require '../functions/koneksi.php';

$id = $_GET['idkaryawan'];

$query = mysqli_query($con, "SELECT * FROM tb_karyawan WHERE idkaryawan = '$id'");

$karyawan = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <title>Update Karyawan</title>
</head>

<body>

    <!-- update obat -->
    <form action="../functions/update/proses_update_karyawan.php" method="POST">
        <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
            <input type="hidden" name="idKaryawan" value="<?= $karyawan['idkaryawan'] ?>">
            <tr>
                <td><label for="namaKaryawan">Nama Karyawan</label></td>
                <td></td>
                <td><input type="text" class="form-control" id="namaKaryawan" name="namaKaryawan" value="<?= $karyawan['namakaryawan']; ?>"></td>
            </tr>

            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td></td>
                <td><textarea class="form-control" name="alamat" cols="20" rows="2" id="alamat"><?= $karyawan['alamat']; ?></textarea></td>
            </tr>

            <tr>
                <td><label for="telepon">Telepon</label></td>
                <td></td>
                <td> <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $karyawan['telp']; ?>"></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" class="btn btn-primary">Update</button></td>
            </tr>
        </table>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../package/js/script.js"></script>
</body>

</html>