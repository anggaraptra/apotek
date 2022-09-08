<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

// membuat variabel untuk menampung data dari form pelanggan
$namaLengkap = $_POST['namaLengkap'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$usia = $_POST['usia'];
$fotoResep = $_FILES['fotoResep']['name'];

// cek dulu jika ada gambar produk jalankan coding ini
if ($fotoResep != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $x = explode('.', $fotoResep);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['fotoResep']['tmp_name'];
    $nama_gambar_baru = $fotoResep;

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../../assets/img/fotoresep/' . $nama_gambar_baru);

        $query = "INSERT INTO tb_pelanggan VALUES (
            '',
            '$namaLengkap',
            '$alamat',
            '$telepon',
            '$usia',
            '$nama_gambar_baru'
        )";

        $result = mysqli_query($con, $query);

        if (!$result) {
            die("Query gagal dijalankan " . mysqli_errno($con) . " - " . mysqli_error($con));
        } else {
            echo "<script>
                alert('Data berhasil ditambahkan');
                window.location='../../dashboard.php?page=pelanggan';
            </script>";
        }
    } else {
        echo "<script>
            alert('Ekstensi gambar yang boleh hanya jpg, png, jpeg');
            window.location='../../dashboard.php?page=pelanggan';
        </script>";
    }
} else {
    $query = "INSERT INTO tb_pelanggan VALUES (
        '',
        '$namaLengkap',
        '$alamat',
        '$telepon',
        '$usia',
        null
    )";

    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query gagal dijalankan " . mysqli_errno($con) . " - " . mysqli_error($con));
    } else {
        echo "<script>
            alert('Data berhasil ditambahkan');
            window.location='../../dashboard.php?page=pelanggan';
        </script>";
    }
}
