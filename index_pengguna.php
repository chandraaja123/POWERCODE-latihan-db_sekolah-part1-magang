<html>
    <head>
        <title>
            Halaman index
        </title>
    </head>
    <body>

        Menampilkan Data Pengguna

        <br><br>
        <a href="tambah_pengguna.php"> Tambah Data</a>
        <br><br>
        <table border="1"> 
            <!-- Judul Tebel -->
            <tr>
                <td>No.</td>
                <td>Nama</td>
                <td>Kata Kunci</td>
                <td>Aksi</td>
            </tr>

            <!-- Isi Data Tabel --> 
            <?php
            // Panggil Koneksi
            include "koneksi.php";

            $sql     ="select * from tb_pengguna";
            $hasil   = mysqli_query($konek, $sql);
            $no      = 1;

            // Untuk Menampilkan Data Secara Berulang Sesuai Data Yang Ada di Database
            while($data=mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td> <?php echo $no++ ?> </td>
                <td> <?php echo $data ['nama'] ?> </td>
                <td> <?php echo $data ['kata_kunci'] ?> </td>
                <td> <a href="edit_pengguna.php?id=<?php echo $data ['id_pengguna'] ?>"> Edit</a> | <a href="hapus_pengguna.php?id=<?php echo $data ['id_pengguna'] ?>"> Hapus</a> </td>
            </tr>
            <?php } ?>

        </table>

    </body>


</html>