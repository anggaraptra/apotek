<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

require '../functions/koneksi.php';

$id = $_GET['idtransaksi'];

$query = mysqli_query($con, "SELECT * FROM tb_transaksi WHERE idtransaksi = '$id'");

$transaksi = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <title>Update Transaksi</title>
</head>

<body>

    <!-- update obat -->
    <form action="../functions/update/proses_update_transaksi.php" method="POST">
        <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
            <input type="hidden" name="idTransaksi" value="<?= $transaksi['idtransaksi'] ?>">
            <tr>
                <td><label for="idPelanggan">ID Pelanggan</label></td>
                <td></td>
                <td>
                    <?php
                    $query = "SELECT * FROM tb_pelanggan";
                    $result = mysqli_query($con, $query);
                    ?>
                    <select class="form-control" name="idPelanggan" required id="idPelanggan">
                        <?php while ($pelanggan = mysqli_fetch_assoc($result)) : ?>
                            <?php if ($pelanggan['idpelanggan'] == $transaksi['idpelanggan']) : ?>
                                <option selected value="<?= $transaksi['idpelanggan'] ?>"><?= $transaksi['idpelanggan'] . " - " . $pelanggan['namalengkap'] ?></option>
                                <?php continue ?>
                            <?php endif ?>
                            <option value="<?= $pelanggan['idpelanggan'] ?>"><?= $pelanggan['idpelanggan'] . " - " . $pelanggan['namalengkap'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="idKasir">ID Kasir</label></td>
                <td></td>
                <td> <input type="number" class="form-control" id="idKasir" name="idKasir" value="<?= $transaksi['idkasir']; ?>"></td>
            </tr>

            <tr>
                <td><label for="tglTransaksi">Tgl Transaksi</label></td>
                <td></td>
                <td> <input type="date" class="form-control" id="tglTransaksi" name="tglTransaksi" value="<?= $transaksi['tgltransaksi']; ?>"></td>
            </tr>

            <tr>
                <td><label for="katPelanggan">Kategori Pelanggan</label></td>
                <td></td>
                <td> <input type="text" class="form-control" id="katPelanggan" name="katPelanggan" value="<?= $transaksi['kategoripelanggan']; ?>"></td>
            </tr>

            <tr>
                <td><label for="totalBayar">Total Bayar</label></td>
                <td></td>
                <td> <input type="number" class="form-control" id="totalBayar" name="totalBayar" value="<?= $transaksi['totalbayar']; ?>"></td>
            </tr>

            <tr>
                <td><label for="bayar">Bayar</label></td>
                <td></td>
                <td> <input type="number" class="form-control" id="bayar" name="bayar" value="<?= $transaksi['bayar']; ?>"></td>
            </tr>

            <tr>
                <td><label for="kembali">Kembali</label></td>
                <td></td>
                <td> <input type="number" class="form-control" id="kembali" name="kembali" value="<?= $transaksi['kembali']; ?>"></td>
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