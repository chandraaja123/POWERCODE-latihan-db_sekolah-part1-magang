<html>
    <head>
        <title>
            Edit Data Mapel
        </title>
    </head>
    <body>
        <h3>Edit Data Mapel</h3>
        <br>

        <?php 
        // Panggil koneksi
        include "koneksi.php";

        // Jika tombol disubmit (proses update)
        if(isset($_POST["btnSimpan"])){

            // Deklarasi variabel untuk menampung data inputan
            $id_mapel         = $_POST['id_mapel'];
            $mapel        = $_POST['mapel'];

            // Query update data mapel berdasarkan ID Mapel (dari URL)
            $sql = "UPDATE tb_mapel SET 
                        mapel      ='$mapel'
                    WHERE id_mapel ='$_GET[id_mapel]'";

            // Eksekusi query dan cek hasilnya
            $qrySimpan = mysqli_query($konek, $sql);

            if($qrySimpan){
                echo "Data Berhasil Disimpan";
            } else {
                echo "Data Gagal Disimpan";
            }
        }  

        // Ambil data lama berdasarkan ID Mapel dari URL untuk ditampilkan di form
        $sql   = "SELECT * FROM tb_mapel WHERE id_mapel='$_GET[id_mapel]'";
        $hasil = mysqli_query($konek, $sql);
        $row   = mysqli_fetch_array($hasil);
        ?>

        <form method="post">
            <table border="1"> 
                <tr>
                    <td>ID Mapel</td>
                    <td>:</td>
                    <td><input type="text" name="id_mapel" readonly value="<?php echo $row['id_mapel'] ?>"></td>
                </tr>
                <tr>
                    <td>Mapel</td>
                    <td>:</td>
                    <td><input type="text" name="mapel" required value="<?php echo $row['mapel'] ?>"></td>
                </tr>
                
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" name="btnSimpan" value="Update Data">
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <a href="index_mapel.php">Kembali ke Menu Utama</a>
    </body>
</html>
