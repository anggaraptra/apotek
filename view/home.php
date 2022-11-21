<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <?php if (@$_SESSION['leveluser'] === 'admin') { ?>
            <div class="container-fluid my-4 text-center">
                <h1>Hallo Admin, Selamat Datang di Dashboard Apotek!</h1>
                <p>Gunakan navigasi di samping untuk pindah halaman</p>
            </div>
        <?php } else { ?>
            <div class="container-fluid my-5 text-center">
                <h1>Hallo Karyawan, Selamat Datang di Dashboard Apotek!</h1>
                <p>Gunakan navigasi di samping untuk pindah halaman</p>
            </div>
        <?php } ?>
    </section>

</main>
<!-- End main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>