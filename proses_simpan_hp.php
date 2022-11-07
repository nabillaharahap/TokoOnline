<?php
if($_POST){
	$jenis_hp=$_POST['jenis_hp'];
	$merk_hp=$_POST['merk_hp'];
	$harga_hp=$_POST['harga_hp'];
	$file_tmp=$_FILES['foto']['tmp_name'];
	$file_name=$_FILES['foto']['name'];
	$upload=move_uploaded_file($file_tmp,'../foto/'.$file_name);
	if($upload){
		include"koneksi_admin.php";
		$simpan=mysqli_query($conn,"insert into hp value('','$jenis_hp','$merk_hp','$harga_hp','$file_name')");
		
		if($simpan){echo'<script>alert("sukses");location.href="tambah_hp.php"</script>';}
	    else {echo'<script>alert("gagal");location.href="tambah_hp.php"</script>';}
	}else {
		echo '<script>alert("gagal upload");location.href="tambah_hp.php"</script>';}
    }
?>