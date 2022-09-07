<?php if (@$_SESSION['leveluser'] === 'admin') { ?>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-uppercase fw-bolder" href="index.php?page=dashboard">Apotek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?page=karyawan">Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=obat">Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=supplier">Supplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=transaksi">Transaksi</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto">
                    <?php if (isset($_SESSION['username'])) {
                        echo '<a href="functions/logout.php" class="btn btn-outline-warning" type="submit">Logout</a>';
                    } else {
                        echo '<a href="login.php" class="btn btn-outline-primary" type="submit">Login</a>';
                    } ?>
                </form>
            </div>
        </div>
    </nav>
<?php } else { ?>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-uppercase fw-bolder" href="index.php?page=dashboard">Apotek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=transaksi">Transaksi</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto">
                    <?php if (isset($_SESSION['username'])) {
                        echo '<a href="functions/logout.php" class="btn btn-outline-warning" type="submit">Logout</a>';
                    } else {
                        echo '<a href="login.php" class="btn btn-outline-primary" type="submit">Login</a>';
                    } ?>
                </form>
            </div>
        </div>
    </nav>
<?php
}
?>