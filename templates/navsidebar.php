<?php
if (@$_SESSION['leveluser'] === 'admin') { ?>
    <header id="header" class="header fixed-top d-flex align-items-center print">

        <div class="d-flex align-items-center justify-content-between">
            <a href="dashboard.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">MYAPOTEK</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <!-- <img src="assets/img/profile-img.png" alt="Profile" class="rounded-circle"> -->
                        <i class="bi bi-person-circle"></i>
                        <span class="text-capitalize d-none d-md-block dropdown-toggle ps-2"> Hallo <?= $_SESSION['username']; ?> </span>
                    </a>
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6 class="text-capitalize"><?= $_SESSION['username']; ?></h6>
                            <span><?= $_SESSION['leveluser']; ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="?page=profile">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <?php if (isset($_SESSION['username'])) { ?>
                                <a class="dropdown-item d-flex align-items-center text-danger tombolLogout" href="functions/logout.php">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Logout</span>
                                </a>
                            <?php } else { ?>
                                <a class="dropdown-item d-flex align-items-center" href="login.php">
                                    <i class="bi bi-box-arrow-in-left"></i>
                                    <span>Login</span>
                                </a>
                            <?php } ?>
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar print">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link <?= @$_GET['page'] ? 'collapsed' : '' ?>" href="dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link <?= @$_GET['page'] === 'karyawan' || @$_GET['page'] === 'obat' || @$_GET['page'] === 'supplier' || @$_GET['page'] === 'pelanggan' || @$_GET['page'] === 'transaksi' || @$_GET['page'] === 'inserttransaksi' || @$_GET['page'] === 'detailtransaksi' ? '' : 'collapsed' ?>" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse <?= @$_GET['page'] === 'karyawan' || @$_GET['page'] === 'obat' || @$_GET['page'] === 'supplier' || @$_GET['page'] === 'pelanggan' || @$_GET['page'] === 'transaksi' || @$_GET['page'] === 'inserttransaksi' || @$_GET['page'] === 'detailtransaksi' ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="?page=karyawan" class="<?php if (@$_GET['page'] === 'karyawan') echo 'active' ?>">
                            <i class="bi bi-people-fill"></i><span>Karyawan</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=obat" class="<?php if (@$_GET['page'] === 'obat') echo 'active' ?>">
                            <i class=" bi bi-capsule"></i><span>Obat</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=supplier" class="<?php if (@$_GET['page'] === 'supplier') echo 'active' ?>">
                            <i class="bi bi-person-plus-fill"></i><span>Supplier</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=pelanggan" class="<?php if (@$_GET['page'] === 'pelanggan') echo 'active' ?>">
                            <i class="bi bi-person-fill"></i><span>Pelanggan</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=transaksi" class="<?= @$_GET['page'] === 'transaksi' || @$_GET['page'] === 'inserttransaksi' || @$_GET['page'] === 'detailtransaksi' ? 'active' : '' ?>">
                            <i class="bi bi-cash-stack"></i><span>Transaksi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link <?= @$_GET['page'] === 'registrasi' ?  '' : 'collapsed' ?>" href="?page=registrasi">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li>
            <!-- End Register Page Nav -->
        </ul>

    </aside>
    <!-- End Sidebar-->
<?php } else { ?>
    <header id="header" class="header fixed-top d-flex align-items-center print">

        <div class="d-flex align-items-center justify-content-between">
            <a href="dashboard.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">MYAPOTEK</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                        <span class="text-capitalize d-none d-md-block dropdown-toggle ps-2"> Hallo <?= $_SESSION['username']; ?> </span>
                    </a>
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6 class="text-capitalize"><?= $_SESSION['username']; ?></h6>
                            <span><?= $_SESSION['leveluser']; ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="?page=profile">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <?php if (isset($_SESSION['username'])) { ?>
                                <a class="dropdown-item d-flex align-items-center text-danger tombolLogout" href="functions/logout.php">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Logout</span>
                                </a>
                            <?php } else { ?>
                                <a class="dropdown-item d-flex align-items-center" href="login.php">
                                    <i class="bi bi-box-arrow-in-left"></i>
                                    <span>Login</span>
                                </a>
                            <?php } ?>
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar print">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link <?= @$_GET['page'] ? 'collapsed' : '' ?>" href="dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link <?= @$_GET['page'] === 'karyawan' || @$_GET['page'] === 'obat' || @$_GET['page'] === 'supplier' || @$_GET['page'] === 'pelanggan' || @$_GET['page'] === 'transaksi' || @$_GET['page'] === 'inserttransaksi' || @$_GET['page'] === 'detailtransaksi' ? '' : 'collapsed' ?>" data-bs-target="#tables-nav" data-bs-toggle="collapse">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse <?= @$_GET['page'] === 'karyawan' || @$_GET['page'] === 'obat' || @$_GET['page'] === 'supplier' || @$_GET['page'] === 'pelanggan' || @$_GET['page'] === 'transaksi' || @$_GET['page'] === 'inserttransaksi' || @$_GET['page'] === 'detailtransaksi' ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="?page=pelanggan" class="<?php if (@$_GET['page'] === 'pelanggan') echo 'active' ?>">
                            <i class="bi bi-person-fill"></i><span>Pelanggan</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=transaksi" class="<?= @$_GET['page'] === 'transaksi' || @$_GET['page'] === 'inserttransaksi' || @$_GET['page'] === 'detailtransaksi' ? 'active' : '' ?>">
                            <i class="bi bi-cash-stack"></i><span>Transaksi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li>
            <!-- End Contact Page Nav -->

        </ul>

    </aside>
    <!-- End Sidebar-->
<?php
}
?>