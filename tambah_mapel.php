<?php
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: login.php");
    exit;
}
?>


<html>
    <head>
        <title>Tambah Data Mapel</title>
    </head>
    <body>

        <h3>Tambah Data Mapel</h3>

        <?php
        //  Panggil file koneksi database
        include "koneksi.php";

        // Jalankan saat tombol "Simpan" ditekan
        if (isset($_POST['proses'])) {

            // Ambil data dari form input
            $id_mapel = $_POST['id_mapel'];
            $mapel    = $_POST['mapel'];
            
            // Cek apakah NIS sudah ada di tabel tb_kelA
            $cek = mysqli_query($konek, "SELECT * FROM tb_mapel WHERE id_mapel='$id_mapel'");

            // Jika NIS ditemukan, tampilkan pesan error
            if (mysqli_num_rows($cek) > 0) {
                echo "<br><b style='color:red;'>Gagal Menyimpan Data: NIS sudah terdaftar!</b>";
            } else {
                // Jika ID Mapel belum ada, lanjut simpan data baru ke tabel tb_mapel
                $sql = "INSERT INTO tb_mapel (id_mapel, mapel)
                        VALUES ('$id_mapel' ,'$mapel')";
                
                $hasil = mysqli_query($konek, $sql);

                // Tampilkan pesan hasil proses simpan
                if ($hasil) {
                    echo "<br>✅ Data berhasil disimpan.";
                } else {
                    echo "<br>❌ Gagal Menyimpan Data: " . mysqli_error($konek);
                }
            }
        }
        ?>

        <!-- Form untuk input data guru baru -->
        <form method="post" action="">
            <table>
                <tr>
                    <td>ID Mapel</td>
                    <td> <input type="text" name="id_mapel" required> </td>
                </tr>
                <tr>
                    <td>Mapel</td>
                    <td> <input type="text" name="mapel"> </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td> <input type="submit" name="proses" value="Simpan"> </td>
                </tr>
            </table>
        </form>

        <br>
        <!-- Tombol kembali ke halaman utama -->
        <a href="index_mapel.php">Kembali ke Halaman Utama</a>

        

    </body>
</html>
