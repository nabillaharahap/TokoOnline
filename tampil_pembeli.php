<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data pembeli</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
    <?php
        include "header_admin.php";
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>DATA PEMBELI</h1>
                <form method="POST" action="tampil_pembeli.php" class="d-flex">
                    <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID pembeli</th>
                    <th scope="col">NAMA pembeli</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">GENDER</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">KOTA</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "koneksi_admin.php";
                    if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query_pembeli = mysqli_query($conn, "select * from pembeli s join kota k on s.id_kota = k.id_kota where s.id_pembeli = '$cari' or s.nama_pembeli like '%$cari%' or s.alamat like '%$cari%' or s.username like '%$cari%'");
                    }
                    else{
                        $query_pembeli = mysqli_query($conn, "select * from pembeli s join kota k on s.id_kota = k.id_kota");
                    }
                    while($data_pembeli = mysqli_fetch_array($query_pembeli)){
                ?>
                    <tr>
                        <td><?=$data_pembeli['id_pembeli']?></td>
                        <td><?=$data_pembeli['nama_pembeli']?></td>
                        <td><?=$data_pembeli['tanggal_lahir']?></td>
                        <td><?=$data_pembeli['gender']?></td>
                        <td><?=$data_pembeli['alamat']?></td>
                        <td><?=$data_pembeli['nama_kota']?></td>
                        <td><?=$data_pembeli['username']?></td>
                        <td>
                            <a href="ubah_pembeli.php?id_pembeli=<?=$data_pembeli['id_pembeli']?>" class="btn btn-success">Edit</a>
                            <a href="hapus_pembeli.php?id_pembeli=<?=$data_pembeli['id_pembeli']?>" class="btn btn-danger"
                            onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <a href="tambah_pembeli.php" type="button" class="btn btn-primary">Tambah pembeli</a>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>