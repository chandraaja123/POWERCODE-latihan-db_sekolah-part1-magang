<html>
    <head>
        <title>
            Tambah Data Pengguna
        </title>
    </head>
    <body>
        Tambah Data Pengguna
        <br></br>
        <?php 
        if(isset($_POST["btnSimpan"])){
            include "koneksi.php";

            // Deklarasi Variabel Untuk Menampung Data Inputan
            $nama       = $_POST["nama"];
            $kata_kunci = $_POST["kata_kunci"];

            // Query Simpan Data
            $sql    = "insert into tb_pengguna (nama, kata_kunci) values ('$nama', '$kata_kunci')";

            // Eksklusi Perintah SQL dan Cek Koneksi ke Database
            $qrySimpan  = mysqli_query ($konek, $sql);

            // Cek Berhasil Atau Gagal Simpan
            if($qrySimpan){
                echo "Data Berhasil Disimpan";
            } else {
                echo "Data Gagal Disimpan";
            }
        }  
        ?>
        <form extion="" method="post">
            <table border="1"> 
                <tr>
                    <td>Nama Pengguna</td>
                    <td>:</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td>Kata Kunci</td>
                    <td>:</td>
                    <td><input type="text" name="kata_kunci" required></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" name="btnSimpan" value="Simpan Data"></td>
                </tr>
            </table>
        </form>
        <br></br>
        <a href="index_pengguna.php"> Kembali ke Menu Utama</a>
    </body>
</html>