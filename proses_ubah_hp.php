<?php
    $id_hp = $_POST["id_hp"];
    $jenis_hp = $_POST["jenis_hp"];
    $merk_hp = $_POST["merk_hp"];
    $harga_hp = $_POST['harga_hp'];
    
    include "koneksi_admin.php";
    if ($_FILES['foto']['tmp_name']) {
        $temp = $_FILES['foto']['tmp_name'];
        $type = $_FILES['foto']['type'];
        $size = $_FILES['foto']['size'];
        $name = rand(0,9999).$_FILES['foto']['name'];
        $folder = "../foto/";

        if ($size < 2048000 and ($type =='image/jpeg' or $type == 'image/png'))
        {
            $query_foto = mysqli_query($conn, "SELECT * FROM hp where id_hp = '".$_POST['id_hp']."'");
            $data_foto = mysqli_fetch_array($query_foto);
            unlink('foto/'.$data_foto['foto']);
            
            move_uploaded_file($temp, $folder . $name);
            $input = mysqli_query($conn, "UPDATE hp SET jenis_hp='".$jenis_hp."', merk_hp='".$merk_hp."',
            harga_hp='".$harga_hp."', foto='".$name."'
            where id_hp='".$id_hp."'");

            if ($input) {
                echo "<script>alert('Berhasil');location.href='tampil_hp.php';</script>";
            }
            else {
                echo "<script>alert('Gagal');location.href='tampil_hp.php';</script>";
            }
        }
    }
    else{
        $input = mysqli_query($conn, "UPDATE hp SET jenis_hp='".$jenis_hp."', 
        merk_hp='".$merk_hp."', harga_hp='".$harga_hp."' where id_hp='".$id_hp."'");

        if ($input) {
            echo "<script>alert('Berhasil');location.href='tampil_hp.php';</script>";
        }
        else {
             echo "<script>alert('Gagal');location.href='tampil_hp.php';</script>";
        }
    }
    
?>