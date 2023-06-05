<?php
// koneksi
include "../../../../env/connection.php";

$lama = 1; // lama data yang tersimpan di database dan akan otomatis terhapus setelah 1 hari

// proses untuk melakukan penghapusan data

$query = "DELETE FROM tb_transaksi_pembayaran
          WHERE transaction_status='1' AND DATEDIFF(CURDATE(), tanggal) > $lama";
$hasil = mysqli_query($koneksi, $query);
