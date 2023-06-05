<?php
session_start();
$nama_file = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_file"]));
$id_siswa = $_POST["id_siswa"];
$session_id = $_SESSION["id"];

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif', 'svg');
$filename = $_FILES['file_dokumen']['name'];
$ukuran = $_FILES['file_dokumen']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$foto = $rand . '_' . $filename;
move_uploaded_file($_FILES['file_dokumen']['tmp_name'], 'files/dokumen/' . $rand . '_' . $filename);
$insert = mysqli_query($koneksi, "INSERT INTO tb_dokumen VALUES ('', '$nama_file', '$foto', '$session_id', NOW())");
if ($insert) {
	echo "  <script>
    		    document.location.href='/?pages=dokumen';
    	    </script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=dokumen';
    	    </script>";
}

// if ($id_siswa > 1) {

// 	for ($i = 0; $i < $id_siswa; $i++) {
// 		$nama_dokumen[$i] = htmlspecialchars(mysqli_real_escape_string($koneksi, $nama_dokumen[$i]));
// 		$id_siswa[$i] = $id_siswa[$i];
// 		$insert = mysqli_query($koneksi, "INSERT INTO tb_dokumen VALUES ('', '$nama_dokumen', '$ext', '$session_id', '$id_siswa[$i]'), NOW()");
// 	}

// 	if ($insert) {
// 		echo "  <script>
//     		    document.location.href='/?pages=kelas&act=tampil-kelas&id_tahun_akademik=$tahun_akademik&pesan=berhasil';
//     	    	</script>";
// 	} else {
// 		echo "  <script>
//     		    document.location.href='/?pages=kelas&act=tampil-kelas&id_tahun_akademik=$tahun_akademik&pesan=gagal';
//     	    	</script>";
// 	}
// } else {
// 	$insert = mysqli_query($koneksi, "INSERT INTO tb_dokumen VALUES ('', '$nama_dokumen', '$ext', '$session_id', '$id_siswa'), NOW()");
// 	if ($insert) {
// 		echo "  <script>
//     		    document.location.href='/?pages=kelas&act=tampil-kelas&id_tahun_akademik=$tahun_akademik&pesan=berhasil';
//     	    	</script>";
// 	} else {
// 		echo "  <script>
//     		    document.location.href='/?pages=kelas&act=tampil-kelas&id_tahun_akademik=$tahun_akademik&pesan=gagal';
//     	    	</script>";
// 	}
// }
