<?php
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: login.php");
    exit;
}
?>


<html>
    <head>
        <title>Tambah Data Kelas</title>
    </head>
    <body>

        <h3>Tambah Data Kelas</h3>

        <!-- Form untuk input data guru baru -->
        <form method="post" action="">
            <table>
                <tr>
                    <td>ID Kelas</td>
                    <td>
                        <!-- ID Kelas hanya boleh angka (pattern), wajib diisi (required) -->
                        <input type="text" name="id_kelas" pattern="[0-9]{1,3}" maxlength="3" title="Hanya boleh angka" required>
                    </td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td> <input type="text" name="kelas" required> </td>
                </tr>
                <tr>
                    <td>nip</td>
                    <td>
                         <input type="text" name="nip" required> 
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
        <a href="index_kelas.php">Kembali ke Halaman Utama</a>

        <?php
        //  Panggil file koneksi database
        include "koneksi.php";

        // Jalankan saat tombol "Simpan" ditekan
        if (isset($_POST['proses'])) {

            // Ambil data dari form input
            $id_kelas        = $_POST['id_kelas'];
            $kelas        = $_POST['kelas'];
            $nip      = $_POST['nip'];

            // Cek apakah ID Kelas sudah ada di tabel tb_kelas
            $cek = mysqli_query($konek, "SELECT * FROM tb_kelas WHERE id_kelas='$id_kelas'");

            // Jika NIP ditemukan, tampilkan pesan error
            if (mysqli_num_rows($cek) > 0) {
                echo "<br><b style='color:red;'>Gagal Menyimpan Data: ID Kelas sudah terdaftar!</b>";
            } else {
                // Jika ID Kelas belum ada, lanjut simpan data baru ke tabel tb_kelas
                $sql = "INSERT INTO tb_kelas (id_kelas, kelas, nip)
                        VALUES ('$id_kelas', '$kelas', '$nip')";
                
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
