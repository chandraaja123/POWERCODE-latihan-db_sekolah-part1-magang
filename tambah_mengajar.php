<html>
    <head>
        <title>Tambah Data Mengajar</title>
    </head>
    <body>

        <h3>Tambah Data Mengajar</h3>

        <!-- Form untuk input data guru baru -->
        <form method="post" action="">
            <table>
                <tr>
                    <td>ID Mengajar</td>
                    <td>
                        <!-- ID Mengajar hanya boleh angka (pattern), wajib diisi (required) -->
                        <input type="text" name="id_mengajar" pattern="[0-9]{1,3}" maxlength="3" title="Hanya boleh angka" required>
                    </td>
                </tr>
                <tr>
                    <td>Nip</td>
                    <td> <input type="text" name="nip" required> </td>
                </tr>
                <tr>
                    <td>ID Mapel</td>
                    <td>
                         <input type="text" name="id_mapel" required> 
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td> <input type="submit" name="proses" value="Simpan"> </td>
                </tr>
            </table>
        </form>

        <br>
        <!-- Tombol kembali ke halaman utama -->
        <a href="index_mengajar.php">Kembali ke Halaman Utama</a>

        <?php
        //  Panggil file koneksi database
        include "koneksi.php";

        // Jalankan saat tombol "Simpan" ditekan
        if (isset($_POST['proses'])) {

            // Ambil data dari form input
            $id_mengajar        = $_POST['id_mengajar'];
            $nip      = $_POST['nip'];
            $id_mapel      = $_POST['id_mapel'];

            // Cek apakah ID Mengajar sudah ada di tabel tb_mengajar
            $cek = mysqli_query($konek, "SELECT * FROM tb_mengajar WHERE id_mengajar='$id_mengajar'");

            // Jika NIP ditemukan, tampilkan pesan error
            if (mysqli_num_rows($cek) > 0) {
                echo "<br><b style='color:red;'>Gagal Menyimpan Data: ID Mengajar sudah terdaftar!</b>";
            } else {
                // Jika ID Mengajar belum ada, lanjut simpan data baru ke tabel tb_mengajar
                $sql = "INSERT INTO tb_mengajar (id_mengajar, nip, id_mapel)
                        VALUES ('$id_mengajar', '$nip', '$id_mapel')";
                
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

    </body>
</html>
