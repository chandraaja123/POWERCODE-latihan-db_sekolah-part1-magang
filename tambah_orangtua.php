<html>
    <head>
        <title>Tambah Data Orang Tua</title>
    </head>
    <body>

        <h3>Tambah Data Orang Tua</h3>

        <!-- Form untuk input data guru baru -->
        <form method="post" action="">
            <table border="1">
                <tr>
                    <td>Kode Orang Tua</td>
                    <td>
                        <!-- kode orang tua hanya boleh angka (pattern), wajib diisi (required) -->
                        <input type="text" name="kd_ortu" pattern="[0-9]+" maxlength="8" title="Hanya boleh angka" required>
                    </td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td>
                    <td> <input type="text" name="nama" required> </td>
                </tr>
                <tr>
                    <td>Alamat Orang Tua</td>
                    <td>
                         <input type="text" name="alamat" required> 
                    </td>
                </tr>
                <tr>
                    <td>Telepon Orang Tua</td>
                    <td>
                         <input type="text" name="telp" required> 
                    </td>
                </tr>
                <tr>
                    <td>Pekerjaan Orang Tua</td>
                    <td>
                         <input type="text" name="pekerjaan" required> 
                    </td>
                </tr>
                <tr>
                    <td>Agama Orang Tua</td>
                    <td>
                         <input type="text" name="agama" required> 
                    </td>
                </tr>
                <tr>
                    <td>Status Orang Tua</td>
                    <td>
                         <input type="text" name="status" required> 
                    </td>
                </tr>

                <tr>
                    <td> <input type="submit" name="proses" value="Simpan"> </td>
                </tr>
            </table>
        </form>

        <br>
        <!-- Tombol kembali ke halaman utama -->
        <a href="index_orangtua.php">Kembali ke Halaman Utama</a>

        <?php
        //  Panggil file koneksi database
        include "koneksi.php";

        // Jalankan saat tombol "Simpan" ditekan
        if (isset($_POST['proses'])) {

            // Ambil data dari form input
            $kd_ortu    = $_POST['kd_ortu'];
            $nama       = $_POST['nama'];
            $alamat     = $_POST['alamat'];
            $telp       = $_POST['telp'];
            $pekerjaan  = $_POST['pekerjaan'];
            $agama      = $_POST['agama'];
            $status     = $_POST['status'];

            // Cek apakah Kode Orang Tua sudah ada di tabel tb_orangtua
            $cek = mysqli_query($konek, "SELECT * FROM tb_orangtua WHERE kd_ortu='$kd_ortu'");

            // Jika NIP ditemukan, tampilkan pesan error
            if (mysqli_num_rows($cek) > 0) {
                echo "<br><b style='color:red;'>Gagal Menyimpan Data: Kd Ortu sudah terdaftar!</b>";
            } else {
                // Jika Kode Orang Tua belum ada, lanjut simpan data baru ke tabel tb_orangtua
                $sql = "INSERT INTO tb_orangtua (kd_ortu, nama, alamat, telp, pekerjaan, agama, status)
                        VALUES ('$kd_ortu', '$nama', '$alamat', '$telp', '$pekerjaan', '$agama', '$status')";
                
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
