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
            Edit Data Mengajar
        </title>
    </head>
    <body>
        <h3>Edit Data Mengajar</h3>
        <br>

        <?php 
        // Panggil koneksi
        include "koneksi.php";

        // Jika tombol disubmit (proses update)
        if(isset($_POST["btnSimpan"])){

            // Deklarasi variabel untuk menampung data inputan
            $id_mengajar   = $_POST['id_mengajar'];
            $nip      = $_POST['nip'];
            $id_mapel        = $_POST['id_mapel'];

            // Query update data Mengajar berdasarkan ID Mengajar (dari URL)
            $sql = "UPDATE tb_Mengajar SET 
                        nip         ='$nip',
                        id_mapel    ='$id_mapel'
                    WHERE id_mengajar  ='$_GET[id_mengajar]'";

                    
            // Eksekusi query dan cek hasilnya
            $qrySimpan = mysqli_query($konek, $sql);

            if($qrySimpan){
                echo "Data Berhasil Disimpan";
            } else {
                echo "Data Gagal Disimpan. |" . mysqli_error($konek);
            }
        }  
// Cek isi query sebelum dijalankan
echo $sql; // ini buat debugging, nanti tampil di browser

        // Ambil data lama berdasarkan ID Mengajar dari URL untuk ditampilkan di form
        $sql   = "SELECT * FROM tb_mengajar WHERE id_mengajar='$_GET[id_mengajar]'";
        $hasil = mysqli_query($konek, $sql);
        $row   = mysqli_fetch_array($hasil);
        ?>

        <form method="post">
            <table border="1"> 
                <tr>
                    <td>ID Mengajar</td>
                    <td>:</td>
                    <td>
                        <!-- ID Mengajar hanya boleh angka (pattern), wajib diisi (required) -->
                        <input type="text" name="id_mengajar" pattern="[0-9]{1,3}" maxlength="3" title="Hanya boleh angka!" required value="<?php echo $row['id_mengajar'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nip</td>
                    <td>:</td>
                    <td><input type="text" name="nip" required value="<?php echo $row['nip'] ?>"></td>
                </tr>
                <tr>
                    <td>ID Mapel</td>
                    <td>:</td>
                    <td><input type="text" name="id_mapel" required value="<?php echo $row['id_mapel'] ?>"></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" name="btnSimpan" value="Update Data">
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <a href="index_mengajar.php">Kembali ke Menu Utama</a>
    </body>
</html>
