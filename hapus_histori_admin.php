<?php 
    if($_GET['id_penjualan']){
        include "koneksi_admin.php";
        $qry_hapus=mysqli_query($conn,"delete from penjualan_hp where id_penjualan='".$_GET['id_penjualan']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus produk');location.href='histori_pembelian.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus produk');location.href='histori_pembelian.php';</script>";
        }
    }
?>