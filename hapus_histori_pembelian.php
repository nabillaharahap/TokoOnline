<?php
include "header.php";
error_reporting(E_ERROR | E_PARSE);
?>
<h2 align="center" style="margin:30px">Histori Pembelian</h2>
<div align="center">
    <table class="table" style="background:#F8F8F8;width:90%" cellspacing="0">
        <thead style="background:#94B49F; ">
            <tr width="auto">
                <th>NO</th>
                <th>Tanggal Beli</th>
                <th>Nama Produk</th>
                <th>Total</th>
                <th>Status</th>
                <th colspan="8">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi_petugas.php';
            $no = 0;
            $qry_histori = mysqli_query($conn, "select * from transaksi  ORDER BY id_transaksi DESC;");

            while ($dt_histori = mysqli_fetch_array($qry_histori)) {
            ?>

                <tr>
                    <?php
                    $qry_histori1 = mysqli_query($conn, "select * from detail_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk where  id_transaksi='" . $dt_histori['id_transaksi'] . "'");
                    while ($dt_histori1 = mysqli_fetch_array($qry_histori1)) {

                        // //menampilkan status 
                        // if ($dt_histori['status'] == 'Menunggu Barang di Confirm') {
                        //     $button = "<a href='barang_baru.php?id=" . $dt_histori['id_transaksi'] . "' class='btn btn-warning' onclick='return confirm(\"Confirm Produk?\")'>Confirm Produk</a>";
                        // } else if ($dt_histori['status'] == 'Barang Sudah di Confirm') {
                        //     $button = "<a href='barang_dikemas.php?id=" . $dt_histori['id_transaksi'] . "' class='btn btn-warning' onclick='return confirm(\"Produk otw di Kemas\")'>Produk di Kemas</a>";
                        // } else if ($dt_histori['status'] == 'Produk Sedang di Kemas') {
                        //     $button = "<a href='barang_dikirim.php?id=" . $dt_histori['id_transaksi'] . "' class='btn btn-warning' onclick='return confirm(\"Produk berhasil di Kirim\")'>Barang di Kirim</a>";
                        // } else if ($dt_histori['status'] == 'Produk berhasil di Kirim') {
                        //     $button = "<a href='barang_diterima.php?id=" . $dt_histori['id_transaksi'] . "' class='btn btn-warning' onclick='return confirm(\"Produk Sudah di Terima\")'>Barang di Terima</a>";
                        // } else {
                        //     $button = "";
                        // }
                    ?>
                        <td><?= $no++ ?></td>
                        <td><?= $dt_histori['tgl_transaksi'] ?></td>
                        <td><?= $dt_histori1['nama_produk'] ?></td>
                        <td><?= "<span>Rp. </span>" . $dt_histori1['subtotal'] ?></td>
                        <td><?= $dt_histori['status'] ?></td>
                        <td>
                        <form action="proses_ubah_status.php" method="post">
                            <input type="hidden" name="id_transaksi" value="<?= $dt_histori['id_transaksi']?>">
                            <select name="status" onchange='if(this.value != 0) { this.form.submit(); }'>
                                <option value="Pilih Status">Pilih Status</option>
                                <option value="Barang Diconfirm oleh Petugas">Barang baru</option>
                                <option value="Barang Sedang Dikemas">Barang dikemas</option>
                                <option value="Barang Sedang Dikirim">Barang dikirim</option>
                                <option value="Barang Sudah diterima Pelanggan">Barang diterima</option>
                            </select>
                        </form>
                    </td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</div>
<a href="produk.php" class="btn" style="background:#94B49F">Yakin udah puas?</a>


<!-- batas//////// -->