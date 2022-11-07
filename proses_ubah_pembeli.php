<?php
    $id_pembeli = $_POST['id_pembeli'];
    $nama_pembeli = $_POST["nama_pembeli"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_kota = $_POST['id_kota'];
    
    include "koneksi_admin.php";
    $input = mysqli_query($conn, "UPDATE pembeli SET nama_pembeli='".$nama_pembeli."', tanggal_lahir='".$tanggal_lahir."', gender='".
        $gender."', alamat='".$alamat."',
    username='".$username."', password='".md5($password)."', id_kota='".$id_kota."' 
    where id_pembeli = '".$id_pembeli."'");

    if ($input) {
        echo "<script>alert('Berhasil');location.href='tampil_pembeli.php';</script>";
    }
    else {
        echo "<script>alert('Gagal');location.href='tampil_pembeli.php';</script>";
    }
?>