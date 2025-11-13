<html>
    <head>
        <title>
            Halaman Index Orang Tua
        </title>
    </head>
    <body>

        Menampilkan Data Orang Tua

        <br><br>
        <a href="tambah_orangtua.php"> Tambah Data</a>
        <br><br>
        <table border="1"> 
            <!-- Judul Tabel -->
            <tr>
                <td>No.</td>
                <td>Kode Orang Tua</td>
                <td>Nama Orang Tua</td>
                <td>Alamat Orang Tua</td>
                <td>Telepon Orang Tua</td>
                <td>Pekerjaan Orang Tua</td>
                <td>Agama Orang Tua</td>
                <td>Status Orang Tua</td>
                <td>Aksi</td>
            </tr>

            <!-- Isi Data Tabel --> 
            <?php
            // Panggil Koneksi
            include "koneksi.php";

            $sql     = "SELECT * FROM tb_orangtua";
            $hasil   = mysqli_query($konek, $sql);
            $no      = 1;

            // Menampilkan data orang tua secara berulang
            while($data = mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td> <?php echo $no++ ?> </td>
                <td> <?php echo $data['kd_ortu'] ?> </td>
                <td> <?php echo $data['nama'] ?> </td>
                <td> <?php echo $data['alamat'] ?> </td>
                <td> <?php echo $data['telp'] ?> </td>
                <td> <?php echo $data['pekerjaan'] ?> </td>
                <td> <?php echo $data['agama'] ?> </td>
                <td> <?php echo $data['status'] ?> </td>
                
                <td> 
                    <a href="edit_orangtua.php?kd_ortu=<?php echo $data['kd_ortu'] ?>"> Edit</a> | 
                    <a href="hapus_orangtua.php?kd_ortu=<?php echo $data['kd_ortu'] ?>"> Hapus</a> 
                </td>
            </tr>

            <?php } ?>

        </table>

    </body>
</html>
