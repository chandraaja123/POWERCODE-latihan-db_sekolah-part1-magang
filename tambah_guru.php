<?php
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: login.php");
    exit;
}
?>


<html>
    <head>
        <title>Tambah Data Guru</title>
    </head>
    <body>

        <h3>Tambah Data Guru</h3>

        <!-- Form untuk input data guru baru -->
        <form method="post" action="">
            <table>
                <tr>
                    <td>NIP</td>
                    <td>
                        <!-- NIP hanya boleh angka (pattern), wajib diisi (required) -->
                        <input type="text" name="nip" pattern="[0-9]+" title="Hanya boleh angka" required>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td> <input type="text" name="nama" required> </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> <textarea name="alamat" rows="3" cols="25"></textarea> </td>
                </tr>
                <tr>
                <td>Tempat/Tanggal Lahir</td>
                    <td> <input type="text" name="tmpt_lahir"> </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <select name="gender">
                            <option value="">-- Pilih Gender --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>
                        <select name="agama">
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td> <input type="text" name="telp" pattern="[0-9]+" title="Hanya boleh angka"> </td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td> <input type="text" name="pendidikan"> </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td> <input type="text" name="status"> </td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input type="submit" name="proses" value="Simpan"> </td>
                </tr>
            </table>
        </form>

        <br>
        <!-- Tombol kembali ke halaman utama -->
        <a href="index_guru.php">Kembali ke Halaman Utama</a>

        <?php
        //  Panggil file koneksi database
        include "koneksi.php";

        // Jalankan saat tombol "Simpan" ditekan
        if (isset($_POST['proses'])) {

            // Ambil data dari form input
            $nip         = $_POST['nip'];
            $nama        = $_POST['nama'];
            $alamat      = $_POST['alamat'];
            $tmpt_lahir  = $_POST['tmpt_lahir'];
            $gender      = $_POST['gender'];
            $agama       = $_POST['agama'];
            $telp        = $_POST['telp'];
            $pendidikan  = $_POST['pendidikan'];
            $status      = $_POST['status'];

            // Cek apakah NIP sudah ada di tabel tb_guru
            $cek = mysqli_query($konek, "SELECT * FROM tb_guru WHERE nip='$nip'");

            // Jika NIP ditemukan, tampilkan pesan error
            if (mysqli_num_rows($cek) > 0) {
                echo "<br><b style='color:red;'>Gagal Menyimpan Data: NIS sudah terdaftar!</b>";
            } else {
                // Jika NIP belum ada, lanjut simpan data baru ke tabel tb_guru
                $sql = "INSERT INTO tb_guru (nip, nama, alamat, tmpt_lahir, gender, agama, telp, pendidikan, status)
                        VALUES ('$nip', '$nama', '$alamat', '$tmpt_lahir', '$gender', '$agama', '$telp', '$pendidikan', '$status')";
                
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
