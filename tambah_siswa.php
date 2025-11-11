<html>
    <head>
        <title>Tambah Data Siswa</title>
    </head>
    <body>

        <h3>Tambah Data Siswa</h3>

        <?php
        //  Panggil file koneksi database
        include "koneksi.php";

        // Jalankan saat tombol "Simpan" ditekan
        if (isset($_POST['proses'])) {

            // Ambil data dari form input
            $nis         = $_POST['nis'];
            $nama        = $_POST['nama'];
            $id_kelas    = $_POST['id_kelas'];
            $alamat      = $_POST['alamat'];
            $tmpt_lahir  = $_POST['tmpt_lahir'];
            $tgl_lahir   = $_POST['tgl_lahir'];
            $gender      = $_POST['gender'];
            $agama       = $_POST['agama'];
            $kd_ortu     = $_POST['kd_ortu'];
            $tgl_daftar  = $_POST['tgl_daftar'];
            
            // Cek apakah NIS sudah ada di tabel tb_kelA
            $cek = mysqli_query($konek, "SELECT * FROM tb_siswa WHERE nis='$nis'");

            // Jika NIS ditemukan, tampilkan pesan error
            if (mysqli_num_rows($cek) > 0) {
                echo "<br><b style='color:red;'>Gagal Menyimpan Data: NIS sudah terdaftar!</b>";
            } else {
                // Jika NIS belum ada, lanjut simpan data baru ke tabel tb_guru
                $sql = "INSERT INTO tb_siswa (nis, nama, id_kelas, alamat, tmpt_lahir, tgl_lahir, gender, agama, kd_ortu, tgl_daftar)
                        VALUES ('$nis', '$nama', '$id_kelas', '$alamat', '$tmpt_lahir', '$tgl_lahir', '$gender', '$agama', '$kd_ortu', '$tgl_daftar')";
                
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
                    <td>NIS</td>
                    <td>
                        <!-- NIS hanya boleh angka (pattern), wajib diisi (required) -->
                        <input type="text" name="nis" pattern="[0-9]+" title="Hanya boleh angka" required>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td> <input type="text" name="nama" required> </td>
                </tr>
                <tr>
                    <td>ID Kelas</td>
                    <td> <input type="text" name="id_kelas"> </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> <textarea name="alamat" rows="3" cols="25"></textarea> </td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td> <input type="text" name="tmpt_lahir"> </td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td> <input type="text" name="tgl_lahir"> </td>
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
                    <td>Kode Orang Tua</td>
                    <td> <input type="text" name="kd_ortu" > </td>
                </tr>
                <tr>
                    <td>Tanggal Daftar</td>
                    <td> <input type="text" name="tgl_daftar"> </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td> <input type="submit" name="proses" value="Simpan"> </td>
                </tr>
            </table>
        </form>

        <br>
        <!-- Tombol kembali ke halaman utama -->
        <a href="index_siswa.php">Kembali ke Halaman Utama</a>

        

    </body>
</html>
