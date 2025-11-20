<?php
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: login.php");
    exit;
}

$pesan = "";
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
                    $pesan = "<p style='color: green;'>✅ Data Berhasil Disimpan</p>";
                } else {
                    $pesan = "<p style='color: red;'>❌ Data Gagal Disimpan: " . mysqli_error($konek) . "</p>";
                }
            }  

            // Ambil data lama berdasarkan ID Kelas dari URL untuk ditampilkan di form
            $sql   = "SELECT * FROM tb_kelas WHERE id_kelas='$_GET[id_kelas]'";
            $hasil = mysqli_query($konek, $sql);
            $row   = mysqli_fetch_array($hasil);
        ?>

        <form method="post">
            <table border="1"> 
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
        <a href="index_kelas.php">Kembali</a>

        <!-- Pesan ditampilkan DI SINI -->
        <?php 
            if ($pesan != "") {
                echo "<br>" . $pesan;
            }
        ?>

    </body>
</html>
