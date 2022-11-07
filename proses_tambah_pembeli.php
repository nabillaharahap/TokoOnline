<?php
    $nama_pembeli = $_POST["nama_pembeli"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_kota = $_POST['id_kota'];
    
    include "koneksi_admin.php";
    $input = mysqli_query($conn, "INSERT INTO pembeli 
    (nama_pembeli, tanggal_lahir, gender, alamat, username, password, id_kota) VALUES 
    ('".$nama_pembeli."', '".$tanggal_lahir."','".$gender."','".$alamat."','".$username."','".md5($password)."','".$id_kota."')");

    if ($input) {
        echo "<script>alert('Berhasil');location.href='tampil_pembeli.php';</script>";
    }
    else {
         echo "<script>alert('Gagal');location.href='tampil_pembeli.php';</script>";
    }
?>