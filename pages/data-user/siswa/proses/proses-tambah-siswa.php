<?php
// require_once "../../../../env/connection.php";
$nipd = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nipd"]));
$password = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["password"]));
$nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama"]));

$nisn = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nisn"]));
$tahun_masuk = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun_masuk"]));
$jurusan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jurusan"]));
$kurikulum = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kurikulum"]));
$tahun_akademik = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun_akademik"]));
$kelas = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kelas"]));
$alamat = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["alamat"]));
$rt_rw = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["rt_rw"]));
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


$password = password_hash($password, PASSWORD_DEFAULT);


$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif', 'svg');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


$query = mysqli_query($koneksi, "SELECT max(id) as kodeTerbesar FROM tb_user WHERE role='siswa'");
$data = mysqli_fetch_array($query);
$userid = $data['kodeTerbesar'];
$urutan = (int) substr($userid, 3, 3);
$urutan++;
$huruf = "S";
$userid = $huruf . sprintf("%03s", $urutan);

if ($filename == "") {
    $insert = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('$userid','$nama','$nipd','$password','siswa','1')");
    $insert = mysqli_query($koneksi, "INSERT INTO tb_data VALUES ('','$userid','$kurikulum','$tahun_akademik','$kelas')");
    $insert = mysqli_query($koneksi, "INSERT INTO tb_info_siswa VALUES ('','$nisn','$tahun_masuk','$alamat','$rt_rw','$kelurahan','$kecamatan','$kota','$kode_pos','$status_awal','$nik','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$no_tlp','$alamat_email','$skhun','$nama_ayah','$tahun_lahir_ayah','$pendidikan_terakhir_ayah','$pekerjaan_ayah','$penghasilan_ayah','$no_tlp_ayah','$nama_ibu','$tahun_lahir_ibu','$pendidikan_terakhir_ibu','$pekerjaan_ibu','$penghasilan_ibu','$no_tlp_ibu','',now(),'$userid')");

    if ($insert) {
        echo "  <script>
    		    document.location.href='/?pages=siswa&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=siswa&act=tambah-siswa&pesan=gagal';
    	    	</script>";
    }
} else {
    if (!in_array($ext, $ekstensi)) {

        header("location:/?pages=guru&pesan=format-salah");
    }
    $foto = $rand . '_' . $filename;
    move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/foto/foto-siswa/' . $rand . '_' . $filename);
    $insert = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('$userid','$nama','$nipd','$password','siswa','1')");
    $insert = mysqli_query($koneksi, "INSERT INTO tb_data VALUES ('','$userid','$kurikulum','$tahun_akademik','$kelas')");
    $insert = mysqli_query($koneksi, "INSERT INTO tb_info_siswa VALUES ('','$nisn','$tahun_masuk','$alamat','$rt_rw','$kelurahan','$kecamatan','$kota','$kode_pos','$status_awal','$nik','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$no_tlp','$alamat_email','$skhun','$nama_ayah','$tahun_lahir_ayah','$pendidikan_terakhir_ayah','$pekerjaan_ayah','$penghasilan_ayah','$no_tlp_ayah','$nama_ibu','$tahun_lahir_ibu','$pendidikan_terakhir_ibu','$pekerjaan_ibu','$penghasilan_ibu','$no_tlp_ibu','$foto',now(),'$userid')");

    if ($insert) {
        echo "  <script>
    		    document.location.href='/?pages=siswa&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=siswa&act=tambah-siswa&pesan=gagal';
    	    	</script>";
    }
}
