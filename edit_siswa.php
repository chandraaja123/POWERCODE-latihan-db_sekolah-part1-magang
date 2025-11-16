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
            Edit Data Siswa
        </title>
    </head>
    <body>
        <h3>Edit Data Siswa</h3>
        <br>

        <?php 
        // Panggil koneksi
        include "koneksi.php";

        // Jika tombol disubmit (proses update)
        if(isset($_POST["btnSimpan"])){

            // Deklarasi variabel untuk menampung data inputan
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

            // Query update data siswa berdasarkan NIS (dari URL)
            $sql = "UPDATE tb_siswa SET 
                        nama        ='$nama',
                        id_kelas    ='$id_kelas',
                        alamat      ='$alamat',
                        tmpt_lahir  ='$tmpt_lahir',
                        tgl_lahir   ='$tgl_lahir',
                        gender      ='$gender',
                        agama       ='$agama',
                        kd_ortu     ='$kd_ortu',
                        tgl_daftar  ='$tgl_daftar'
                    WHERE nis       ='$_GET[nis]'";

            // Eksekusi query dan cek hasilnya
            $qrySimpan = mysqli_query($konek, $sql);

            if($qrySimpan){
                echo "Data Berhasil Disimpan";
            } else {
                echo "Data Gagal Disimpan";
            }
        }  

        // Ambil data lama berdasarkan NIS dari URL untuk ditampilkan di form
        $sql   = "SELECT * FROM tb_siswa WHERE nis='$_GET[nis]'";
        $hasil = mysqli_query($konek, $sql);
        $row   = mysqli_fetch_array($hasil);
        ?>

        <form method="post">
            <table border="1"> 
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><input type="text" name="nis" readonly value="<?php echo $row['nis'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama" required value="<?php echo $row['nama'] ?>"></td>
                </tr>
                <tr>
                    <td>ID Kelas</td>
                    <td>:</td>
                    <td><input type="text" name="id_kelas" readonly value="<?php echo $row['id_kelas'] ?>"></td>
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
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><input type="text" name="tgl_lahir" readonly value="<?php echo $row['tgl_lahir'] ?>"></td>
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
                    <td>Kode Orang Tua</td>
                    <td>:</td>
                    <td><input type="text" name="kd_ortu" value="<?php echo $row['kd_ortu'] ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal Daftar</td>
                    <td>:</td>
                    <td><input type="text" name="tgl_daftar" value="<?php echo $row['tgl_daftar'] ?>"></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" name="btnSimpan" value="Update Data">
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <a href="index_siswa.php">Kembali ke Menu Utama</a>
    </body>
</html>
