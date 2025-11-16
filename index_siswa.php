<?php
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: login.php");
    exit;
}
?>


<html>
    <head>
        <title>
            Halaman Index Siswa
        </title>
    </head>
    <body>

        Menampilkan Data Siswa

        <br><br>
        <a href="tambah_siswa.php"> Tambah Data</a>
        <br><br>
        <table border="1"> 
            <!-- Judul Tabel -->
            <tr>
                <td>No.</td>
                <td>NIS</td>
                <td>Nama</td>
                <td>ID Kelas</td>
                <td>Alamat</td>
                <td>Tempat Lahir</td>
                <td>Tanggal Lahir</td>
                <td>Gender</td>
                <td>Agama</td>
                <td>Kode Orang Tua</td>
                <td>Tanggal Daftar</td>
                <td>Aksi</td>
            </tr>

            <!-- Isi Data Tabel --> 
            <?php
            // Panggil Koneksi
            include "koneksi.php";

            $sql     = "SELECT * FROM tb_siswa";
            $hasil   = mysqli_query($konek, $sql);
            $no      = 1;

            // Menampilkan data siswa secara berulang
            while($data = mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td> <?php echo $no++ ?> </td>
                <td> <?php echo $data['nis'] ?> </td>
                <td> <?php echo $data['nama'] ?> </td>
                <td> <?php echo $data['id_kelas'] ?> </td>
                <td> <?php echo $data['alamat'] ?> </td>
                <td> <?php echo $data['tmpt_lahir'] ?> </td>
                <td> <?php echo $data['tgl_lahir'] ?> </td>
                <td> <?php echo $data['gender'] ?> </td>
                <td> <?php echo $data['agama'] ?> </td>
                <td> <?php echo $data['kd_ortu'] ?> </td>
                <td> <?php echo $data['tgl_daftar'] ?> </td>
                <td> 
                    <a href="edit_siswa.php?nis=<?php echo $data['nis'] ?>"> Edit</a> | 
                    <a href="hapus_siswa.php?nis=<?php echo $data['nis'] ?>"> Hapus</a> 
                </td>
            </tr>
            <?php } ?>

        </table>

        <br>
        <a href="home.php">Kembali ke Menu Utama</a>
    </body>
</html>
