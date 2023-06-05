<?php
$id = $_GET["id"];

$GetJadwalPelajaran = query("SELECT * FROM tb_jadwal_pelajaran_2 WHERE id = '$id'")[0];
$id_kelas = $GetJadwalPelajaran["kelas"];
$id_tahun_akademik = $GetJadwalPelajaran["tahun_akademik"];

$delete = mysqli_query($koneksi, "DELETE FROM tb_jadwal_pelajaran_2 WHERE id = '$id'");

if ($delete) {
    echo "  <script>
    document.location.href='/?pages=jadwal-pelajaran-2&act=tampil-jadwal-pelajaran-2&id_tahun_akademik=$id_tahun_akademik&id_kelas=$id_kelas&pesan=berhasil';
    </script>";
} else {
    echo "  <script>
    document.location.href='/?pages=jadwal-pelajaran-2&act=tampil-jadwal-pelajaran-2&id_tahun_akademik=$id_tahun_akademik&id_kelas=$id_kelas&pesan=gagal';
    </script>";
}
