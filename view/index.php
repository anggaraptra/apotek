<?php
session_start();
// if (!isset($_SESSION['username'])) {
//     header("Location: ../login.php");
//     exit;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../package/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <title>Apotek</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-uppercase fw-bolder" href="">Apotek</a>
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
                        <a class="nav-link" href="view_pelanggan.php">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_transaksi.php">Transaksi</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto">
                    <?php if (isset($_SESSION['username'])) {
                        echo '<a href="../functions/logout.php" class="btn btn-outline-warning" type="submit">Logout</a>';
                    } else {
                        echo '<a href="../login.php" class="btn btn-outline-primary" type="submit">Login</a>';
                    } ?>
                </form>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../package/js/script.js"></script>
</body>

</html>