<?php if (@$_SESSION['leveluser'] === 'admin') { ?>
    <div class="container-fluid my-5 text-center">
        <h1>Hallo Admin, Selamat Datang di Dashboard Apotek!</h1>
        <p>Gunakan navigasi di atas untuk pindah halaman</p>
    </div>
<?php } else { ?>
    <div class="container-fluid my-5 text-center">
        <h1>Hallo Karyawan, Selamat Datang di Dashboard Apotek!</h1>
        <p>Gunakan navigasi di atas untuk pindah halaman</p>
    </div>
<?php } ?>