<?php
        include "header_admin.php";
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <h2 class="card-header">Tambah HP</h2>
            <div class="card-body">
                <form method="POST" action="proses_simpan_hp.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="jenis_hp" class="form-label">Jenis Hp</label>
                        <input type="text" class="form-control" name="jenis_hp" placeholder="Masukkan Jenis Hp" required>
                    </div>
                    <div class="mb-3">
                        <label for="merk_hp" class="form-label">Merk</label>
                        <input type="text" class="form-control" name="merk_hp" placeholder="Masukkan Merk" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_hp" class="form-label">Harga</label>
                        <textarea class="form-control" name="harga_hp" row="3" placeholder="Masukkan Harga" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>