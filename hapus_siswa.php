<?php
// Panggil koneksi
include "koneksi.php";

// Ambil data nis dari URL
$nis = $_GET['nis'];

// Query hapus data berdasarkan nis
$sql = "delete from tb_siswa where nis='$nis'";
$hasil = mysqli_query($konek, $sql);

// Cek hasil eksekusi query
if(!$hasil){
    echo "Hapus Data Gagal";
} else {
    header("location:index_siswa.php");
}
?>