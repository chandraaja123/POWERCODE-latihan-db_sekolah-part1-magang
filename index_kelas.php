<html>
    <head>
        <title>
            Halaman Index Kelas
        </title>
    </head>
    <body>

        Menampilkan Data Kelas

        <br><br>
        <a href="tambah_kelas.php"> Tambah Data</a>
        <br><br>
        <table border="1"> 
            <!-- Judul Tabel -->
            <tr>
                <td>No.</td>
                <td>ID Kelas</td>
                <td>Kelas</td>
                <td>Nip</td>
                <td>Aksi</td>
            </tr>

            <!-- Isi Data Tabel --> 
            <?php
            // Panggil Koneksi
            include "koneksi.php";

            $sql     = "SELECT * FROM tb_kelas";
            $hasil   = mysqli_query($konek, $sql);
            $no      = 1;

            // Menampilkan data kelas secara berulang
            while($data = mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td> <?php echo $no++ ?> </td>
                <td> <?php echo $data['id_kelas'] ?> </td>
                <td> <?php echo $data['kelas'] ?> </td>
                <td> <?php echo $data['nip'] ?> </td>
                <td> 
                    <a href="edit_kelas.php?id_kelas=<?php echo $data['id_kelas'] ?>"> Edit</a> | 
                    <a href="hapus_kelas.php?id_kelas=<?php echo $data['id_kelas'] ?>"> Hapus</a> 
                </td>
            </tr>
            <?php } ?>

        </table>

    </body>
</html>
