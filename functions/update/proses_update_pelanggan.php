<?php
require '../koneksi.php';

$idPelanggan = $_POST['idPelanggan'];
$namaLengkap = $_POST['namaLengkap'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$usia = $_POST['usia'];
$fotoResep = $_FILES['fotoResep']['name'];

if ($fotoResep != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg');
    $x = explode('.', $fotoResep);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['fotoResep']['tmp_name'];
    $nama_gambar_baru = $fotoResep;

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../../assets/img/fotoresep/' . $nama_gambar_baru);

        $query = "UPDATE tb_pelanggan SET 
            namalengkap = '$namaLengkap',
            alamat = '$alamat',
            telp = '$telepon',
            usia = '$usia',
            buktifotoresep = '$nama_gambar_baru'";

        $query .= "WHERE idpelanggan = '$idPelanggan'";

        $result = mysqli_query($con, $query);

        if (!$result) {
            die("Query gagal dijalankan, " . mysqli_errno($con) . " - " . mysqli_error($con));
        } else {
            echo "<script>
                alert('Data berhasil diubah');
                window.location='../../view/view_pelanggan.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Ekstensi gambar yang boleh hanya jpg atau png');
            window.location='../../updates/update_pelanggan.php';
        </script>";
    }
} else {
    $query = "UPDATE tb_pelanggan SET
        namalengkap = '$namaLengkap',
        alamat = '$alamat',
        telp = '$telepon',
        usia = '$usia'";

    $query .= "WHERE idpelanggan = '$idPelanggan'";

    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query gagal dijalankan " . mysqli_errno($con) . " - " . mysqli_error($con));
    } else {
        echo "<script>
            alert('Data berhasil diubah');
            window.location='../../dashboard.php?page=pelanggan';
        </script>";
    }
}
