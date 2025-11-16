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
            Edit Data Kelas
        </title>
    </head>
    <body>
        <h3>Edit Data Kelas</h3>
        <br>

        <?php 
        // Panggil koneksi
        include "koneksi.php";

        // Jika tombol disubmit (proses update)
        if(isset($_POST["btnSimpan"])){

            // Deklarasi variabel untuk menampung data inputan
            $id_kelas   = $_POST['id_kelas'];
            $kelas      = $_POST['kelas'];
            $nip        = $_POST['nip'];

            // Query update data Kelas berdasarkan ID Kelas (dari URL)
            $sql = "UPDATE tb_kelas SET 
                        kelas        ='$kelas',
                        nip          ='$nip'
                    WHERE id_kelas   ='$_GET[id_kelas]'";

                    
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

        // Ambil data lama berdasarkan ID Kelas dari URL untuk ditampilkan di form
        $sql   = "SELECT * FROM tb_kelas WHERE id_kelas='$_GET[id_kelas]'";
        $hasil = mysqli_query($konek, $sql);
        $row   = mysqli_fetch_array($hasil);
        ?>

        <form method="post">
            <table border="1"> 
                <tr>
                    <td>ID Kelas</td>
                    <td>:</td>
                    <td>
                        <!-- ID Kelas hanya boleh angka (pattern), wajib diisi (required) -->
                        <input type="text" name="id_kelas" pattern="[0-9]{1,3}" maxlength="3" title="Hanya boleh angka!" required value="<?php echo $row['id_kelas'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><input type="text" name="kelas" required value="<?php echo $row['kelas'] ?>"></td>
                </tr>
                <tr>
                    <td>Nip</td>
                    <td>:</td>
                    <td><input type="text" name="nip" required value="<?php echo $row['nip'] ?>"></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" name="btnSimpan" value="Update Data">
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <a href="index_kelas.php">Kembali ke Menu Utama</a>
    </body>
</html>
