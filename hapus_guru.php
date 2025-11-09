<?php
// Panggil koneksi
include "koneksi.php";

// Ambil data nip dari URL
$nip = $_GET['nip'];

// Query hapus data berdasarkan nip
$sql = "delete from tb_guru where nip='$nip'";
$hasil = mysqli_query($konek, $sql);

// Cek hasil eksekusi query
if(!$hasil){
    echo "Hapus Data Gagal";
} else {
    header("location:index_guru.php");
}
?>
