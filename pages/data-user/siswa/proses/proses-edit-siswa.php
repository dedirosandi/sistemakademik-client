<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];
$id_user = $_GET["id_user"];
$nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama"]));
$nisn = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nisn"]));
$tahun_masuk = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun_masuk"]));
$alamat = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["alamat"]));
$rt_rw = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["rt_rw"]));
$desa = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["desa"]));
$kelurahan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kelurahan"]));
$kecamatan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kecamatan"]));
$kota = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kota"]));
$kode_pos = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kode_pos"]));
$status_awal = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["status_awal"]));
$nik = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nik"]));
$tempat_lahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tempat_lahir"]));
$tanggal_lahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tanggal_lahir"]));
$jenis_kelamin = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jenis_kelamin"]));
$agama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["agama"]));
$no_tlp = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["no_tlp"]));
$alamat_email = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["alamat_email"]));
$skhun = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["skhun"]));
$nama_ayah = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_ayah"]));
$tahun_lahir_ayah = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun_lahir_ayah"]));
$pendidikan_terakhir_ayah = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["pendidikan_terakhir_ayah"]));
$pekerjaan_ayah = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["pekerjaan_ayah"]));
$penghasilan_ayah = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["penghasilan_ayah"]));
$no_tlp_ayah = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["no_tlp_ayah"]));
$nama_ibu = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_ibu"]));
$tahun_lahir_ibu = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun_lahir_ibu"]));
$pendidikan_terakhir_ibu = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["pendidikan_terakhir_ibu"]));
$pekerjaan_ibu = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["pekerjaan_ibu"]));
$penghasilan_ibu = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["penghasilan_ibu"]));
$no_tlp_ibu = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["no_tlp_ibu"]));

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$oldData = query("SELECT * FROM tb_info_siswa WHERE id='$id'");
$oldImg = $oldData[0]["foto"];

if ($filename == "") {
    $update = mysqli_query($koneksi, "UPDATE tb_user SET nama = '$nama' WHERE id = '$id_user'");
    $update = mysqli_query($koneksi, "UPDATE tb_info_siswa SET nisn = '$nisn', tahun_masuk='$tahun_masuk', alamat = '$alamat', rt_rw = '$rt_rw', desa = '$desa', kelurahan = '$kelurahan', kecamatan = '$kecamatan', kota = '$kota', kode_pos = '$kode_pos', status_awal = '$status_awal', nik = '$nik',  tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', no_tlp = '$no_tlp', alamat_email = '$alamat_email', skhun = '$skhun', nama_ayah = '$nama_ayah', tahun_lahir_ayah = '$tahun_lahir_ayah', pendidikan_terakhir_ayah = '$pendidikan_terakhir_ayah', pekerjaan_ayah = '$pekerjaan_ayah', penghasilan_ayah = '$penghasilan_ayah', no_tlp_ayah = '$no_tlp_ayah', nama_ibu = '$nama_ibu', tahun_lahir_ibu = '$tahun_lahir_ibu', pendidikan_terakhir_ibu = '$pendidikan_terakhir_ibu', pekerjaan_ibu = '$pekerjaan_ibu', penghasilan_ibu = '$penghasilan_ibu', no_tlp_ibu = '$no_tlp_ibu', timestamp='now()' WHERE id = '$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=siswa&act=detail-siswa&id=$id&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=siswa&act=edit-siswa&id=$id';
    	    	</script>";
    }
    return false;
} else {
    if (!in_array($ext, $ekstensi)) {
        echo "  <script>
    		    document.location.href='/?pages=siswa&act=detail-siswa&id=$id&pesan=format-salah';
    	    	</script>";
    }
    $foto = $rand . '_' . $filename;
    unlink("assets/foto/foto-siswa/" . $oldImg);
    move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/foto/foto-siswa/' . $rand . '_' . $filename);
    $update = mysqli_query($koneksi, "UPDATE tb_user SET nama = '$nama' WHERE id = '$id_user'");
    $update = mysqli_query($koneksi, "UPDATE tb_info_siswa SET nisn = '$nisn', tahun_masuk='$tahun_masuk', alamat = '$alamat', rt_rw = '$rt_rw', desa = '$desa', kelurahan = '$kelurahan', kecamatan = '$kecamatan', kota = '$kota', kode_pos = '$kode_pos', status_awal = '$status_awal', nik = '$nik',  tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', no_tlp = '$no_tlp', alamat_email = '$alamat_email', skhun = '$skhun', nama_ayah = '$nama_ayah', tahun_lahir_ayah = '$tahun_lahir_ayah', pendidikan_terakhir_ayah = '$pendidikan_terakhir_ayah', pekerjaan_ayah = '$pekerjaan_ayah', penghasilan_ayah = '$penghasilan_ayah', no_tlp_ayah = '$no_tlp_ayah', nama_ibu = '$nama_ibu', tahun_lahir_ibu = '$tahun_lahir_ibu', pendidikan_terakhir_ibu = '$pendidikan_terakhir_ibu', pekerjaan_ibu = '$pekerjaan_ibu', penghasilan_ibu = '$penghasilan_ibu', no_tlp_ibu = '$no_tlp_ibu', foto='$foto', timestamp='now()' WHERE id = '$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=siswa&act=detail-siswa&id=$id&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=siswa&act=edit-siswa&id=$id';
    	    	</script>";
    }
    return false;
}
