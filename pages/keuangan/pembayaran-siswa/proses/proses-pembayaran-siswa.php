<?php
// require_once "../../../../env/connection.php";
$query = mysqli_query($koneksi, "SELECT max(order_id) as kodeTerbesar FROM tb_transaksi_pembayaran");
$data = mysqli_fetch_array($query);
$KodeTRx = $data['kodeTerbesar'];
$urutan = (int) substr($KodeTRx, 2, 2);
$urutan++;
$date = date("Ymdhis");
$KodeTRx = $date . sprintf("%02s", $urutan);
$id_pembayaran = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["id_pembayaran"]));
$nama_user = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_user"]));
$nama_pembayaran = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_pembayaran"]));
$nominal_pembayaran = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nominal_pembayaran"]));
$transaction_status = "1";

$insert = mysqli_query($koneksi, "INSERT INTO tb_transaksi_pembayaran VALUES ('','$KodeTRx','$id_pembayaran','$nama_user','$nama_pembayaran','$nominal_pembayaran','$transaction_status','','',now())");

if ($insert) {
	echo "  <script>
    		    document.location.href='/?pages=pembayaran&act=detail-pembayaran-siswa&order_id=$KodeTRx&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=pembayaran&pesan=gagal';
    	    	</script>";
}
