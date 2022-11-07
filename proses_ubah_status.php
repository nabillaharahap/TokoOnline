<?php
if($_POST){
    $id_penjualan=$_POST['id_penjualan'];
    $status=$_POST['status'];
        include "koneksi_admin.php";
            $update=mysqli_query($conn,"update penjualan_hp set status = '".$status."' where id_penjualan = '".$id_penjualan."'") or die(mysqli_error($conn));
            if($update){
            echo "<script>alert('Sukses update penjualan_hp');location.href='histori_pembelian.php';</script>";
            } else {
             echo "<script>alert('Gagal update penjualan_hp');location.href='histori_pembelian.php?id_penjualan=".$id_penjualan."';</script>";
        }
    } 
?>