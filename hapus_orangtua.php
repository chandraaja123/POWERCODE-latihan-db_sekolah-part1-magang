<?php
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: login.php");
    exit;
}
?>


<?php
// Panggil koneksi
include "koneksi.php";

// Ambil data kd_ortu dari URL
$kd = $_GET['kd_ortu'];

// Query hapus data berdasarkan kd_ortu
$sql = "delete from tb_orangtua where kd_ortu='$kd'";
$hasil = mysqli_query($konek, $sql);


// Cek hasil eksekusi query
if(!$hasil){
    echo "Hapus Data Gagal";
} else {
    header("location:index_orangtua.php");
}
?>
