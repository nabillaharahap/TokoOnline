<?php
if($_GET){
    include "koneksi_admin.php";
    $id_transaksi=$_GET['id'];
        $update=mysqli_query($conn,"update penjualan_hp set status='Produk berhasil di Kirim' where id_penjualan = '".$id_penjualan."'") or die(mysqli_error($conn));
        echo "<script>alert('Sukses update status');location.href='histori_pembelian.php';</script>";
    }
?>