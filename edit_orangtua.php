<html>
    <head>
        <title>
            Edit Data Orang Tua
        </title>
    </head>
    <body>
        <h3>Edit Data Orang Tua</h3>
        <br>

        <?php 
        // Panggil koneksi
        include "koneksi.php";

        // Jika tombol disubmit (proses update)
        if(isset($_POST["btnSimpan"])){

            // Deklarasi variabel untuk menampung data inputan
            $kd_ortu   = $_POST['kd_ortu'];
            $nama      = $_POST['nama'];
            $alamat    = $_POST['alamat'];
            $telp      = $_POST['telp'];
            $pekerjaan = $_POST['pekerjaan'];
            $agama     = $_POST['agama'];
            $status    = $_POST['status'];

            // Query update data Orang Tua berdasarkan kd_ortu (dari URL)
            $sql = "UPDATE tb_orangtua SET 
                        nama        ='$nama',
                        alamat      ='$alamat',
                        telp        ='$telp',
                        pekerjaan   ='$pekerjaan',
                        agama       ='$agama',
                        status      ='$status'
                    WHERE kd_ortu  ='$_GET[kd_ortu]'";

                    
            // Eksekusi query dan cek hasilnya
            $qrySimpan = mysqli_query($konek, $sql);

            if($qrySimpan){
                echo "Data Berhasil Disimpan";
            } else {
                echo "Data Gagal Disimpan. |" . mysqli_error($konek);
            }

            // Cek isi query sebelum dijalankan
            echo $sql; // ini buat debugging, nanti tampil di browser
        }  
               

        // Ambil data lama berdasarkan kd_ortu dari URL untuk ditampilkan di form
        $sql   = "SELECT * FROM tb_orangtua WHERE kd_ortu='$_GET[kd_ortu]'";
        $hasil = mysqli_query($konek, $sql);
        $row   = mysqli_fetch_array($hasil);
        ?>

        <!-- Form untuk input data guru baru -->
        <form method="post">
            <table border="1">
                <tr>
                    <td>Kode Orang Tua</td>
                    <td>
                        <!-- kode orang tua hanya boleh angka (pattern), wajib diisi (required) -->
                        <input type="text" name="kd_ortu" pattern="[0-9]+" maxlength="8" title="Hanya boleh angka" required readonly value="<?php echo $row['kd_ortu'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td>
                    <td> 
                        <input type="text" name="nama" required value="<?php echo $row['nama'] ?>"> 
                    </td>
                </tr>
                <tr>
                    <td>Alamat Orang Tua</td>
                    <td>
                         <input type="text" name="alamat" required value="<?php echo $row['alamat'] ?>"> 
                    </td>
                </tr>
                <tr>
                    <td>Telepon Orang Tua</td>
                    <td>
                         <input type="text" name="telp" required value="<?php echo $row['alamat'] ?>"> 
                    </td>
                </tr>
                <tr>
                    <td>Pekerjaan Orang Tua</td>
                    <td>
                         <input type="text" name="pekerjaan" required value="<?php echo $row['alamat'] ?>"> 
                    </td>
                </tr>
                <tr>
                    <td>Agama Orang Tua</td>
                    <td>
                         <input type="text" name="agama" required value="<?php echo $row['alamat'] ?>"> 
                    </td>
                </tr>
                <tr>
                    <td>Status Orang Tua</td>
                    <td>
                         <input type="text" name="status" required value="<?php echo $row['alamat'] ?>"> 
                    </td>
                </tr>

                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" name="btnSimpan" value="Update Data">
                    </td>
                </tr>
            </table>
        </form>

        <br>
        <a href="index_orangtua.php">Kembali ke Menu Utama</a>
    </body>
</html>
