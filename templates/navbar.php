<?php
if (@$_SESSION['leveluser'] === 'admin') { ?>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-uppercase fw-bolder" href="dashboard.php">Apotek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if (@$_GET['page'] === 'karyawan') echo 'active' ?>" aria-current="page" href="?page=karyawan">Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (@$_GET['page'] === 'obat') echo 'active' ?>" href="?page=obat">Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (@$_GET['page'] === 'supplier') echo 'active' ?>" href="?page=supplier">Supplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (@$_GET['page'] === 'pelanggan') echo 'active' ?>" href="?page=pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (@$_GET['page'] === 'transaksi') echo 'active' ?>" href="?page=transaksi">Transaksi</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto">
                    <div class="dropdown">
                        <span class="bi bi-person-fill dropdown-toggle text-capitalize" type="button" data-bs-toggle="dropdown"> Hallo <?= $_SESSION['leveluser']; ?> (<?= $_SESSION['username']; ?>) </span>
                        <ul class="dropdown-menu">
                            <?php if (isset($_SESSION['username'])) {
                                echo '<a href="functions/logout.php" class="dropdown-item text-danger" type="submit">Logout</a>';
                            } else {
                                echo '<a href="login.php" class="dropdown-item" type="submit">Login</a>';
                            } ?>
                        </ul>
                    </div>
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
                        <a class="nav-link <?php if (@$_GET['page'] === 'pelanggan') echo 'active' ?>" href="?page=pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (@$_GET['page'] === 'transaksi') echo 'active' ?>" href="?page=transaksi">Transaksi</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto">
                    <div class="dropdown">
                        <span class="bi bi-person-fill dropdown-toggle text-capitalize" type="button" data-bs-toggle="dropdown"> Hallo <?= $_SESSION['leveluser']; ?> (<?= $_SESSION['username']; ?>) </span>
                        <ul class="dropdown-menu">
                            <?php if (isset($_SESSION['username'])) {
                                echo '<a href="functions/logout.php" class="dropdown-item text-danger" type="submit">Logout</a>';
                            } else {
                                echo '<a href="login.php" class="dropdown-item" type="submit">Login</a>';
                            } ?>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>
<?php
}
?>