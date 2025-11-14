<?php
session_start();
include "koneksi.php";

if (isset($_POST['btnLogin'])) {

    $nama       = $_POST['nama'];
    $kata_kunci = $_POST['kata_kunci'];

    // Cek ke tabel tb_pengguna
    $sql   = "SELECT * FROM tb_pengguna WHERE nama='$nama' AND kata_kunci='$kata_kunci'";
    $query = mysqli_query($konek, $sql);
    $data  = mysqli_fetch_array($query);

    if ($data) {
        // Simpan session
        $_SESSION['pengguna'] = $data['nama'];
        echo "<script>alert('Login Berhasil!'); window.location='home.php';</script>";
    } else {
        echo "<script>alert('Login Gagal! Nama atau Kata Kunci salah.');</script>";
    }
}
?>

<html>
    <head>
        <title>Login Pengguna</title>
    </head>
    <body>

        <h2>🔐 Login Pengguna</h2>
        <hr>

        <form method="post">
            <table border="1" cellpadding="6">
                <tr>
                    <td>Nama Pengguna</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td>Kata Kunci</td>
                    <td><input type="password" name="kata_kunci" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnLogin" value="Login">
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>
