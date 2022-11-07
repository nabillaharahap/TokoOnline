<?php
if($_GET){
    include "koneksi_admin.php";
    $id_penjualan=$_GET['id'];
        $update=mysqli_query($conn,"update penjualan_hp set status='Produk Sudah di Confirm' where id_penjualan = '".$id_penjualan."'") or die(mysqli_error($conn));
        echo "<script>alert('Sukses update status');location.href='histori_pembelian.php';</script>";
    }
?>