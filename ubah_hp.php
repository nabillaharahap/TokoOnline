<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah hp</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <?php
        include "header_admin.php";
        include "koneksi_admin.php";
        $query_hp = mysqli_query($conn, "select * from hp where id_hp='".$_GET['id_hp']."'");
        $data_hp = mysqli_fetch_array($query_hp);
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <h1 class="card-header">Ubah hp</h1>
            <div class="card-body">
                <form method="POST" action="proses_ubah_hp.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_hp" value="<?=$data_hp['id_hp']?>">
                    <div class="mb-3">
                        <label for="nama_hp" class="form-label">type</label>
                        <input type="text" class="form-control" name="jenis_hp" value="<?=$data_hp['jenis_hp']?>" placeholder="Masukkan Judul hp" required>
                    </div>
                    <div class="mb-3">
                        <label for="merk_hp" class="form-label">merk</label>
                        <input type="text" class="form-control" name="merk_hp" value="<?=$data_hp['merk_hp']?>" placeholder="Masukkan Pengarang" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">harga</label>
                        <textarea class="form-control" name="harga_hp" row="3" placeholder="harga_hp" required><?=$data_hp['harga_hp']?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <img src="../foto<?=$data_hp['foto']?>" width="100"/></br>
                        <input type="file" class="form-control" name="foto" value="<?=$data_hp['foto']?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>