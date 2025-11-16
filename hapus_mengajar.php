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

// Ambil data id_mengajar dari URL
$id_mengajar = $_GET['id_mengajar'];

// Query hapus data berdasarkan id_mengajar
$sql = "delete from tb_mengajar where id_mengajar='$id_mengajar'";
$hasil = mysqli_query($konek, $sql);

// Cek hasil eksekusi query
if(!$hasil){
    echo "Hapus Data Gagal";
} else {
    header("location:index_mengajar.php");
}
?>
