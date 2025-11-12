<html>
    <head>
        <title>
            Halaman Index Mapel
        </title>
    </head>
    <body>

        Menampilkan Data Mapel

        <br><br>
        <a href="tambah_mapel.php"> Tambah Data</a>
        <br><br>
        <table border="1"> 
            <!-- Judul Tabel -->
            <tr>
                <td>No.</td>
                <td>ID Mapel</td>
                <td>Mapel</td>
                <td>Aksi</td>
            </tr>

            <!-- Isi Data Tabel --> 
            <?php
            // Panggil Koneksi
            include "koneksi.php";

            $sql     = "SELECT * FROM tb_mapel";
            $hasil   = mysqli_query($konek, $sql);
            $no      = 1;

            // Menampilkan data Mapel secara berulang
            while($data = mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td> <?php echo $no++ ?> </td>
                <td> <?php echo $data['id_mapel'] ?> </td>
                <td> <?php echo $data['mapel'] ?> </td>
                <td> 
                    <a href="edit_mapel.php?id_mapel=<?php echo $data['id_mapel'] ?>"> Edit</a> | 
                    <a href="hapus_mapel.php?id_mapel=<?php echo $data['id_mapel'] ?>"> Hapus</a> 
                </td>
            </tr>
            <?php } ?>

        </table>

    </body>
</html>
