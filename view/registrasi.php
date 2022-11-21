<main id="main" class="main">
    <div class="pagetitle">
        <h1>Register</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Register</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section" id="registrasi">
        <div class="container">
            <form action="functions/proses_register.php" method="POST">
                <div class="mb-3">
                    <label for="idKaryawan" class="form-label">Nama Karyawan</label>
                    <select class="form-control" name="idKaryawan" id="idKaryawan">
                        <?php
                        $queryKaryawan = "SELECT * FROM tb_karyawan WHERE idkaryawan NOT IN(SELECT idkaryawan FROM tb_login)";
                        $hasil = mysqli_query($con, $queryKaryawan);
                        $cek = mysqli_num_rows($hasil);
                        while ($row = mysqli_fetch_assoc($hasil)) {
                            if ($cek > 0) {
                        ?>
                                <option value="<?= $row['idkaryawan'] ?>"><?= $row['namakaryawan']; ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="">Semua karyawan sudah register</option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <div id="emailHelp" class="form-text">*karyawan yang belum mempunyai akun</div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="username" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="levelUser" class="form-label">Pilih level user</label>
                    <select class="form-control" name="levelUser" required id="levelUser">
                        <option value="karyawan">Karyawan</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </section>

</main>
<!-- End main -->

<!-- ======= Footer ======= -->
<!-- <footer id="footer" class="footer fixed-bottom"> -->
<!-- <div class="credits"> -->
<!-- All the links in the footer should remain intact. -->
<!-- You can delete the links only if you purchased the pro version. -->
<!-- Licensing information: https://bootstrapmade.com/license/ -->
<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
<!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
<!-- </div> -->
<!-- </footer> -->
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>