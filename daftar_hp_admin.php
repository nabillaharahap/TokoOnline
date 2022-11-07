<?php
include "header_admin.php";
if($_SESSION['role']=='admin'){
}
?>
<h3>Daftar Hp</h3>
<a href="tambah_hp.php" class="btn btn-primary">Tambah Hp</a>
<table class="table table-hover table-striped">
<thead>
 <tr>
   <th>NO</th><th>TYPE</th><th>MERK</th>
   <th>HARGA</th><th>FOTO</th>
   <th>AKSI</th>
 </tr>
</thead>
<tbody>
<?php
include "koneksi_admin.php";

$qry_hp=mysqli_query($conn,"select * from hp");

$no=0;
while($data_hp=mysqli_fetch_array($qry_hp)){
$no++;?>
<tr>
<td>
    <?=$no?></td><td><?=$data_hp['jenis_hp']?></td>
<td>
    <?=$data_hp['merk_hp']?></td>
<td>
    <?=$data_hp['harga_hp']?></td>
<td>
   <img src="../foto/<?=$data_hp['foto']?>" alt="" width="100"></td>
<td>
    <a href="ubah_hp.php?id_hp=<?=$data_hp['id_hp']
?>"class="btn btn-success">Ubah</a> 
 <a href="hapus_hp.php?id_hp=<?=$data_hp['id_hp']?>"onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

</tr>
<?php
}
?>
</tbody>
</table>