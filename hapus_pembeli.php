<?php
    if ($_GET['id_pembeli']) {
        include "koneksi_admin.php";
        $query_hapus = mysqli_query($conn, "DELETE FROM pembeli where id_pembeli = '".$_GET['id_pembeli']."'");
        if ($query_hapus) {
            // echo "berhasil";
            echo "<script> alert('Berhasil dihapus'); location.href='tampil_pembeli.php'; </script>";
        }
        else{
            // echo "gagal";
            echo "<script> alert ('Gagal dihapus'); location.href='tampil_pembeli.php'; </script>";
        }
    }
    else{
        echo "id_tidak ada";
    }
?>