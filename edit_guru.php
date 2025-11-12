<html>
    <head>
        <title>
            Edit Data Guru
        </title>
    </head>
    <body>
        <h3>Edit Data Guru</h3>
        <br>

        <?php 
        // Panggil koneksi
        include "koneksi.php";

        // Jika tombol disubmit (proses update)
        if(isset($_POST["btnSimpan"])){

            // Deklarasi variabel untuk menampung data inputan
            $nama        = $_POST["nama"];
            $alamat      = $_POST["alamat"];
            $tmpt_lahir  = $_POST["tmpt_lahir"];
            $gender      = $_POST["gender"];
            $agama       = $_POST["agama"];
            $telp        = $_POST["telp"];
            $pendidikan  = $_POST["pendidikan"];
            $status      = $_POST["status"];

            // Query update data guru berdasarkan NIP (dari URL)
            $sql = "UPDATE tb_guru SET 
                        nama='$nama',
                        alamat='$alamat',
                        tmpt_lahir='$tmpt_lahir',
                        gender='$gender',
                        agama='$agama',
                        telp='$telp',
                        pendidikan='$pendidikan',
                        status='$status'
                    WHERE nip='$_GET[nip]'";

            // Eksekusi query dan cek hasilnya
            $qrySimpan = mysqli_query($konek, $sql);

            if($qrySimpan){
                echo "Data Berhasil Disimpan";
            } else {
                echo "Data Gagal Disimpan";
            }
        }  

        // Ambil data lama berdasarkan NIP dari URL untuk ditampilkan di form
        $sql   = "SELECT * FROM tb_guru WHERE nip='$_GET[nip]'";
        $hasil = mysqli_query($konek, $sql);
        $row   = mysqli_fetch_array($hasil);
        ?>

        <form method="post">
            <table border="1"> 
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td><input type="text" name="nip" required value="<?php echo $row['nip'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama" required value="<?php echo $row['nama'] ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><textarea name="alamat" rows="3" cols="25"><?php echo $row['alamat'] ?></textarea></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td><input type="text" name="tmpt_lahir" required value="<?php echo $row['tmpt_lahir'] ?>"></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td>
                        <select name="gender">
                            <option value="Laki-laki" <?php if($row['gender']=="Laki-laki"){echo "selected";} ?>>Laki-laki</option>
                            <option value="Perempuan" <?php if($row['gender']=="Perempuan"){echo "selected";} ?>>Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>
                        <select name="agama">
                            <option value="Islam" <?php if($row['agama']=="Islam"){echo "selected";} ?>>Islam</option>
                            <option value="Kristen" <?php if($row['agama']=="Kristen"){echo "selected";} ?>>Kristen</option>
                            <option value="Katolik" <?php if($row['agama']=="Katolik"){echo "selected";} ?>>Katolik</option>
                            <option value="Hindu" <?php if($row['agama']=="Hindu"){echo "selected";} ?>>Hindu</option>
                            <option value="Buddha" <?php if($row['agama']=="Buddha"){echo "selected";} ?>>Buddha</option>
                            <option value="Konghucu" <?php if($row['agama']=="Konghucu"){echo "selected";} ?>>Konghucu</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td><input type="text" name="telp" value="<?php echo $row['telp'] ?>"></td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td>:</td>
                    <td><input type="text" name="pendidikan" value="<?php echo $row['pendidikan'] ?>"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><input type="text" name="status" value="<?php echo $row['status'] ?>"></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" name="btnSimpan" value="Update Data">
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <a href="index_guru.php">Kembali ke Menu Utama</a>
    </body>
</html>
