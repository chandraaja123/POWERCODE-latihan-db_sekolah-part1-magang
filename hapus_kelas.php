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

// Ambil data id_kelas dari URL
$id_kelas = $_GET['id_kelas'];

// Query hapus data berdasarkan id_kelas
$sql = "delete from tb_kelas where id_kelas='$id_kelas'";
$hasil = mysqli_query($konek, $sql);

// Cek hasil eksekusi query
if(!$hasil){
    echo "Hapus Data Gagal";
} else {
    header("location:index_kelas.php");
}
?>
