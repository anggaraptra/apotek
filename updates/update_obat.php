<?php
require '../functions/koneksi.php';

$id = $_GET['idobat'];

$query = mysqli_query($con, "SELECT * FROM tb_obat WHERE idobat = '$id'");

$obat = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <title>Update Obat</title>
</head>

<body>

    <!-- update obat -->
    <form action="../functions/update/proses_update_obat.php" method="POST">
        <table border='0' collspacing='0' collpadding='0' cellpadding='2' cellspacing='0'>
            <input type="hidden" name="idObat" value="<?= $row['idobat'] ?>">
            <tr>
                <td><label for="idSupplier">ID Supplier</label></td>
                <td></td>
                <td>
                    <?php
                    $query = "SELECT * FROM tb_supplier";
                    $result = mysqli_query($con, $query);
                    ?>
                    <select class="form-control" name="idSupplier" required id="idSupplier">
                        <?php while ($supplier = mysqli_fetch_assoc($result)) : ?>
                            <?php if ($supplier['idsupplier'] == $obat['idsupplier']) : ?>
                                <option selected value="<?= $obat['idsupplier'] ?>"><?= $obat['idsupplier'] . " - " . $supplier['perusahaan'] ?></option>
                                <?php continue ?>
                            <?php endif ?>
                            <option value="<?= $supplier['idsupplier'] ?>"><?= $supplier['idsupplier'] . " - " . $supplier['perusahaan'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="namaObat">Nama Obat</label></td>
                <td></td>
                <td><input type="text" class="form-control" id="namaObat" name="namaObat" value="<?= $obat['namaobat']; ?>"></td>
            </tr>

            <tr>
                <td><label for="kategori">Kategori Obat</label></td>
                <td></td>
                <td> <input type="text" class="form-control" id="kategori" name="kategoriObat" value="<?= $obat['kategoriobat']; ?>"></td>
            </tr>

            <tr>
                <td><label for="hargaJual">Harga Jual</label></td>
                <td></td>
                <td> <input type="text" class="form-control" id="hargaJual" name="hargaJual" value="<?= $obat['hargajual']; ?>"></td>
            </tr>

            <tr>
                <td><label for="hargaBeli">Harga Beli</label></td>
                <td></td>
                <td> <input type="text" class="form-control" id="hargaBeli" name="hargaBeli" value="<?= $obat['hargabeli'] ?>"></td>
            </tr>

            <tr>
                <td><label for="stokObat">Stok Obat</label></td>
                <td></td>
                <td> <input type="text" class="form-control" id="stokObat" name="stokObat" value="<?= $obat['stok_obat']; ?>"></td>
            </tr>

            <tr>
                <td><label for="keterangan">Keterangan</label></td>
                <td></td>
                <td><textarea name="ket" class="form-control" id="keterangan" cols="30" rows="10"><?= $obat['keterangan']; ?></textarea></td>
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