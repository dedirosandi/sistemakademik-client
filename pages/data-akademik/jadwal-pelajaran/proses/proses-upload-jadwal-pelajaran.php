<?php
include_once "env/excel_reader2.php";
// upload file xls
$id_jadwal_pelajaran = $_GET["id_jadwal_pelajaran"];

$target = basename($_FILES['filejadwal']['name']);
move_uploaded_file($_FILES['filejadwal']['tmp_name'], $target);
// var_dump($target);
// die;
// beri permisi agar file xls dapat di baca
chmod($_FILES['filejadwal']['name'], 0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filejadwal']['name'], false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index = 0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i = 2; $i <= $jumlah_baris; $i++) {

    $query = mysqli_query($koneksi, "SELECT max(kode_mata_pelajaran) as kodeTerbesar FROM tb_mata_pelajaran");
    $Data = mysqli_fetch_array($query);
    $KodeMataPelajaran = $Data['kodeTerbesar'];
    $urutan = (int) substr($KodeMataPelajaran, 3, 3);
    $urutan++;
    $huruf = "MP-";
    $KodeMataPelajaran = $huruf . sprintf("%03s", $urutan);

    // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
    // $kode_mata_pelajaran     = $data->val($i, 1);
    $nama_mata_pelajaran   = $data->val($i, 1);
    $guru_mata_pelarajan  = $data->val($i, 2);
    $hari_mata_pelarajan  = $data->val($i, 3);
    $jam_mata_pelarajan  = $data->val($i, 4);

    if ($KodeMataPelajaran != "" && $nama_mata_pelajaran != "" && $guru_mata_pelarajan != "" && $hari_mata_pelarajan != "" && $jam_mata_pelarajan != "") {
        // input data ke database (table data_pegawai)
        $insert = mysqli_query($koneksi, "INSERT INTO tb_mata_pelajaran values('','$KodeMataPelajaran','$nama_mata_pelajaran','$guru_mata_pelarajan','$hari_mata_pelarajan','$jam_mata_pelarajan','$id_jadwal_pelajaran')");
        $berhasil++;
    }
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filejadwal']['name']);

// alihkan halaman ke index.php
// header("location:index.php?berhasil=$berhasil");
echo "  <script>
    		    document.location.href='/?pages=jadwal-pelajaran&act=detail-jadwal-pelajaran&id=$id_jadwal_pelajaran&pesan=berhasil';
    	    	</script>";
