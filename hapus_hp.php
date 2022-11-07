<?php
    if ($_GET['id_hp']) {
        include "koneksi_admin.php";
        $query_foto = mysqli_query($conn, "SELECT * FROM hp where id_hp = '".$_GET['id_hp']."'");
        $data_foto = mysqli_fetch_array($query_foto);
        
        $query_hapus = mysqli_query($conn, "DELETE FROM hp where id_hp = '".$_GET['id_hp']."'");
        unlink('foto/'.$data_foto['foto']);
        if ($query_hapus) {
            // echo "berhasil";
            echo "<script> alert('Berhasil dihapus'); location.href='daftar_hp_admin.php'; </script>";
        }
        else{
            // echo "gagal";
            echo "<script> alert ('Gagal dihapus'); location.href='daftar_hp_admin.php'; </script>";
        }
    }
    else{
        echo "id_tidak ada";
    }
?>