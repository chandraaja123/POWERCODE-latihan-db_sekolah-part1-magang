<?php
// Mulai session
session_start();

// Jika belum login, arahkan kembali ke login
if (!isset($_SESSION['pengguna'])) {
    header("Location: login.php");
    exit;
}
?>
<html>
    <head>
        <title>Halaman Utama - Database Sekolah</title>
    </head>
    <body>

    <p>Halo, <?php echo $_SESSION['pengguna']; ?> 👋</p>
    <a href="logout.php">Logout</a>

        <h2>Selamat Datang di Sekolah Milik Saya</h2>
        <hr>
        <p>Menu</p>

        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Tabel</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Data Guru</td>
                <td>Menampilkan dan mengelola data guru.</td>
                <td><a href="index_guru.php">Buka</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Data Siswa</td>
                <td>Menampilkan dan mengelola data siswa.</td>
                <td><a href="index_siswa.php">Buka</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Data Kelas</td>
                <td>Menampilkan dan mengelola data kelas.</td>
                <td><a href="index_kelas.php">Buka</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Data Orang Tua</td>
                <td>Menampilkan dan mengelola data orang tua siswa.</td>
                <td><a href="index_orangtua.php">Buka</a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Data Mata Pelajaran</td>
                <td>Menampilkan dan mengelola data mata pelajaran.</td>
                <td><a href="index_mapel.php">Buka</a></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Data Mengajar</td>
                <td>Menampilkan dan mengelola data pengajar dan jadwal.</td>
                <td><a href="index_mengajar.php">Buka</a></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Data Pengguna</td>
                <td>Menampilkan dan mengelola data pengguna sistem.</td>
                <td><a href="index_pengguna.php">Buka</a></td>
            </tr>
        </table>

    </body>
</html>
get_extension_funcs