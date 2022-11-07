<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah pembeli</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <?php
        include "header_admin.php";
        include "koneksi_admin.php";
        $query_pembeli = mysqli_query($conn, "select * from pembeli where id_pembeli='".$_GET['id_pembeli']."'");
        $data_pembeli = mysqli_fetch_array($query_pembeli);
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <h1 class="card-header">Ubah pembeli</h1>
            <div class="card-body">
                <form method="POST" action="proses_ubah_pembeli.php">
                    <input type="hidden" name="id_pembeli" value="<?=$data_pembeli['id_pembeli']?>">
                    <div class="mb-3">
                        <label for="nama_pembeli" class="form-label">Nama pembeli</label>
                        <input type="text" class="form-control" name="nama_pembeli" value="<?=$data_pembeli['nama_pembeli']?>" placeholder="Masukkan Nama pembeli" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?=$data_pembeli['tanggal_lahir']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <?php
                            $arr_gender=array('L'=>'Laki-laki','P'=>'Perempuan');
                        ?>
                        <select name="gender" class="form-select">
                            <option></option>
                            <?php foreach ($arr_gender as $key_gender => $val_gender):
                                if($key_gender==$data_pembeli['gender']){
                                    $selek="selected";
                                } else {
                                    $selek="";
                                }?>
                                <option value="<?=$key_gender?>"<?=$selek?>><?=$val_gender?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" row="3" required><?=$data_pembeli['alamat']?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">kota</label>
                        <select name="id_kota" class="form-select" required>
                            <option></option>
                            <?php
                                include "koneksi_admin.php";
                                $query_kota = mysqli_query($conn, "select * from kota");
                                while($data_kota = mysqli_fetch_array($query_kota)){
                                    if($data_kota['id_kota']==$data_pembeli['id_kota']){
                                        $selek="selected";
                                    } else {
                                        $selek="";
                                    }
                                    echo '<option value="'.$data_kota['id_kota'].'" '.$selek.' >'.$data_kota['nama_kota'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?=$data_pembeli['nama_pembeli']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="" required>
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