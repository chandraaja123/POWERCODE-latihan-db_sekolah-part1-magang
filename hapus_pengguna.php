<?php
    include "koneksi.php";
    $var_id = $_GET['id'];
    $sql    = "delete from tb_pengguna where id_pengguna = '$var_id'";
    $qrydel = mysqli_query ($konek, $sql);

        if($qrydel){
            echo "Data Berhasil Dihapus👍"; 
        } else{
            echo "Data Gagal Dihapus";
        }
        echo "<br><br>
        <a href='index_pengguna.php'>Kembali ke Data Pengguna</a>";
?>