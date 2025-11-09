<html>
    <head>
        <title>
            Edit Data Pengguna
        </title>
    </head>
    <body>
        Edit Data Pengguna
        <br></br>
        <?php 

         include "koneksi.php";

        if(isset($_POST["btnSimpan"])){

            // Deklarasi Variabel Untuk Menampung Data Inputan
            $nama       = $_POST["nama"];
            $kata_kunci = $_POST["kata_kunci"];

            // Query Simpan Data
            $sql    = "update tb_pengguna set nama='$nama', kata_kunci='$kata_kunci' where id_pengguna='$_GET[id]'";

            // Eksklusi Perintah SQL dan Cek Koneksi ke Database
            $qrySimpan  = mysqli_query ($konek, $sql);

            // Cek Berhasil Atau Gagal Simpan
            if($qrySimpan){
                echo "Data Berhasil Disimpan";
            } else {
                echo "Data Gagal Disimpan";
            }
        }  

        // Menampilkan Data Dari Database
        $sql    = "select * from tb_pengguna where id_pengguna ='$_GET[id]'";
        $hasil  = mysqli_query($konek, $sql);
        $row    = mysqli_fetch_array($hasil);


        ?>
        <form extion="" method="post">
            <table border="1"> 
                <tr>
                    <td>Nama Pengguna</td>
                    <td>:</td>
                    <td><input type="text" name="nama" required value ="<?php echo $row['nama'] ?>"></td>
                </tr>
                <tr>
                    <td>Kata Kunci</td>
                    <td>:</td>
                    <td><input type="text" name="kata_kunci" required value ="<?php echo $row['kata_kunci'] ?>"></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" name="btnSimpan" value="Simpan Data"></td>
                </tr>
            </table>
        </form>
        <br></br>
        <a href="index_pengguna.php"> Back</a>
    </body>
</html>