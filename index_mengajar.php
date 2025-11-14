<html>
    <head>
        <title>
            Halaman Index Mengajar
        </title>
    </head>
    <body>

        Menampilkan Data Mengajar

        <br><br>
        <a href="tambah_mengajar.php"> Tambah Data</a>
        <br><br>
        <table border="1"> 
            <!-- Judul Tabel -->
            <tr>
                <td>No.</td>
                <td>ID Mengajar</td>
                <td>Nip</td>
                <td>ID Mapel</td>
                <td>Aksi</td>
            </tr>

            <!-- Isi Data Tabel --> 
            <?php
            // Panggil Koneksi
            include "koneksi.php";

            $sql     = "SELECT * FROM tb_mengajar";
            $hasil   = mysqli_query($konek, $sql);
            $no      = 1;

            // Menampilkan data mengajar secara berulang
            while($data = mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td> <?php echo $no++ ?> </td>
                <td> <?php echo $data['id_mengajar'] ?> </td>
                <td> <?php echo $data['nip'] ?> </td>
                <td> <?php echo $data['id_mapel'] ?> </td>
                <td> 
                    <a href="edit_mengajar.php?id_mengajar=<?php echo $data['id_mengajar'] ?>"> Edit</a> | 
                    <a href="hapus_mengajar.php?id_mengajar=<?php echo $data['id_mengajar'] ?>"> Hapus</a> 
                </td>
            </tr>
            <?php } ?>

        </table>

        <br>
        <a href="home.php">Kembali ke Menu Utama</a>
    </body>
</html>
