<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];
$id_user = $_GET["id_user"];
$nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama"]));
$tempat_lahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tempat_lahir"]));
$tanggal_lahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tanggal_lahir"]));
$jenis_kelamin = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jenis_kelamin"]));
$agama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["agama"]));
$no_hp = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["no_hp"]));
$no_tlp = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["no_tlp"]));
$alamat_email = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["alamat_email"]));
$rt_rw = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["rt_rw"]));
$kelurahan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kelurahan"]));
$kecamatan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kecamatan"]));
$kota = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kota"]));
$kode_pos = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kode_pos"]));
$bidang_studi = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["bidang_studi"]));
$status_nikah = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["status_nikah"]));
$nik = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nik"]));
$kewarganegaraan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kewarganegaraan"]));
$npwp = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["npwp"]));

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$oldData = query("SELECT * FROM tb_info_guru WHERE id='$id'");
$oldImg = $oldData[0]["foto"];

if ($filename == "") {
    $update = mysqli_query($koneksi, "UPDATE tb_user SET nama = '$nama' WHERE id = '$id_user'");
    $update = mysqli_query($koneksi, "UPDATE tb_info_guru SET tempat_lahir = '$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', agama='$agama', no_hp='$no_hp', alamat_email='$alamat_email', rt_rw='$rt_rw', kelurahan='$kelurahan', kecamatan='$kecamatan', kota='$kota', kode_pos='$kode_pos', bidang_studi='$bidang_studi', status_nikah='$status_nikah', nik='$nik', kewarganegaraan='$kewarganegaraan', npwp='$npwp', timestamp='now()' WHERE id = '$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=guru&act=detail-guru&id=$id&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=guru&act=edit-guru&id=$id';
    	    	</script>";
    }
    return false;
} else {
    if (!in_array($ext, $ekstensi)) {
        echo "  <script>
    		    document.location.href='/?pages=guru&act=detail-guru&id=$id&pesan=format-salah';
    	    	</script>";
    }
    $foto = $rand . '_' . $filename;
    unlink("assets/foto/foto-guru/" . $oldImg);
    move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/foto/foto-guru/' . $rand . '_' . $filename);
    $update = mysqli_query($koneksi, "UPDATE tb_user SET nama = '$nama' WHERE id = '$id_user'");
    $update = mysqli_query($koneksi, "UPDATE tb_info_guru SET tempat_lahir = '$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', agama='$agama', no_hp='$no_hp', alamat_email='$alamat_email', rt_rw='$rt_rw', kelurahan='$kelurahan', kecamatan='$kecamatan', kota='$kota', kode_pos='$kode_pos', bidang_studi='$bidang_studi', status_nikah='$status_nikah', nik='$nik', kewarganegaraan='$kewarganegaraan', npwp='$npwp', foto='$foto', timestamp='now()' WHERE id = '$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=guru&act=detail-guru&id=$id&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=guru&act=edit-guru&id=$id';
    	    	</script>";
    }
    return false;
}
