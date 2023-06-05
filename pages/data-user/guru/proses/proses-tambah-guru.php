<?php
// require_once "../../../../env/connection.php";
$nip = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nip"]));
$password = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["password"]));
$nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama"]));
$tempat_lahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tempat_lahir"]));
$tanggal_lahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tanggal_lahir"]));
$jenis_kelamin = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jenis_kelamin"]));
$agama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["agama"]));
$no_hp = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["no_hp"]));
$alamat_email = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["alamat_email"]));
$rt_rw = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["rt_rw"]));
$desa = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["desa"]));
$kelurahan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kelurahan"]));
$kecamatan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kecamatan"]));
$kota = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kota"]));
$kode_pos = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kode_pos"]));
$bidang_studi = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["bidang_studi"]));
$status_nikah = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["status_nikah"]));
$nik = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nik"]));
$kewarganegaraan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kewarganegaraan"]));
$npwp = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["npwp"]));
$password = password_hash($password, PASSWORD_DEFAULT);

$Cek = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE username = '$nip'");
if (mysqli_fetch_assoc($Cek)) {
	echo "  <script>
    		    document.location.href='/?pages=guru&pesan=coba-lagi';
    	    	</script>";
	return false;
}

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif', 'svg');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


$query = mysqli_query($koneksi, "SELECT max(id) as kodeTerbesar FROM tb_user");
$data = mysqli_fetch_array($query);
$userid = $data['kodeTerbesar'];
$urutan = (int) substr($userid, 3, 3);
$urutan++;
$huruf = "G";
$userid = $huruf . sprintf("%03s", $urutan);

if ($filename == "") {
	$insert = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('$userid','$nama','$nip','$password','guru','1')");
	$insert = mysqli_query($koneksi, "INSERT INTO tb_info_guru VALUES ('','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$no_hp','$alamat_email','$rt_rw','$desa','$kelurahan','$kecamatan','$kota','$kode_pos','$bidang_studi','$status_nikah','$nik','$kewarganegaraan','$npwp','',now(),'$userid')");

	if ($insert) {
		echo "  <script>
    		    document.location.href='/?pages=guru&pesan=berhasil';
    	    	</script>";
	} else {
		echo "  <script>
    		    document.location.href='/?pages=guru&act=tambah-guru';
    	    	</script>";
	}
} else {
	if (!in_array($ext, $ekstensi)) {

		header("location:/?pages=guru&pesan=format-salah");
	}
	$foto = $rand . '_' . $filename;
	move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/foto/foto-guru/' . $rand . '_' . $filename);
	$insert = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('$userid','$nama','$nip','$password','guru','1')");
	$insert = mysqli_query($koneksi, "INSERT INTO tb_info_guru VALUES ('','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$no_hp','$alamat_email','$rt_rw','$desa','$kelurahan','$kecamatan','$kota','$kode_pos','$bidang_studi','$status_nikah','$nik','$kewarganegaraan','$npwp','$foto',now(),'$userid')");

	if ($insert) {
		echo "  <script>
    		    document.location.href='/?pages=guru&pesan=berhasil';
    	    	</script>";
	} else {
		echo "  <script>
    		    document.location.href='/?pages=guru&act=tambah-guru';
    	    	</script>";
	}
}
