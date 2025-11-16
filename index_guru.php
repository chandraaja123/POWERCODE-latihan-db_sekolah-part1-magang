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
        <title>
            Halaman Index Guru
        </title>
    </head>
    <body>

        Menampilkan Data Guru

        <br><br>
        <a href="tambah_guru.php"> Tambah Data</a>
        <br><br>
        <table border="1"> 
            <!-- Judul Tabel -->
            <tr>
                <td>No.</td>
                <td>NIP</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Tempat/Tanggal Lahir</td>
                <td>Gender</td>
                <td>Agama</td>
                <td>Telepon</td>
                <td>Pendidikan</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>

            <!-- Isi Data Tabel --> 
            <?php
            // Panggil Koneksi
            include "koneksi.php";

            $sql     = "SELECT * FROM tb_guru";
            $hasil   = mysqli_query($konek, $sql);
            $no      = 1;

            // Menampilkan data guru secara berulang
            while($data = mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td> <?php echo $no++ ?> </td>
                <td> <?php echo $data['nip'] ?> </td>
                <td> <?php echo $data['nama'] ?> </td>
                <td> <?php echo $data['alamat'] ?> </td>
                <td> <?php echo $data['tmpt_lahir'] ?> </td>
                <td> <?php echo $data['gender'] ?> </td>
                <td> <?php echo $data['agama'] ?> </td>
                <td> <?php echo $data['telp'] ?> </td>
                <td> <?php echo $data['pendidikan'] ?> </td>
                <td> <?php echo $data['status'] ?> </td>
                <td> 
                    <a href="edit_guru.php?nip=<?php echo $data['nip'] ?>"> Edit</a> | 
                    <a href="hapus_guru.php?nip=<?php echo $data['nip'] ?>"> Hapus</a> 
                </td>
            </tr>
            <?php } ?>

        </table>

        <br>
        <a href="home.php">Kembali ke Menu Utama</a>
    </body>
</html>
