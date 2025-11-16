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

// Ambil data id_mapel dari URL
$id_mapel = $_GET['id_mapel'];

// Query hapus data berdasarkan id_mapel
$sql = "delete from tb_mapel where id_mapel='$id_mapel'";
$hasil = mysqli_query($konek, $sql);

// Cek hasil eksekusi query
if(!$hasil){
    echo "Hapus Data Gagal";
} else {
    header("location:index_mapel.php");
}
?>
