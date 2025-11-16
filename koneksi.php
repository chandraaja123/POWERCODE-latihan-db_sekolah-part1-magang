<?php
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: login.php");
    exit;
}
?>


<?php
//deklarasi variabel
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "db_sekolah";

// buat koneksi
$konek      = new mysqli ($servername, $username, $password, $dbname);

// cek koneksi
if($konek->connect_error){
    die("Koneksi gagal: " . $konek->connect_error);
}


?>