<table class="table table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kelas</th>
            <th>Aksi</th>

        </tr>
    </thead>
    <tbody id="jadwal">
        <?php
        include_once "../../../../env/connection.php";

        $tahun_akademik = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun_akademik"]));
        // $GetJadwal = query("SELECT * FROM tb_jadwal_pelajaran_2 WHERE kelas='$get_id_kelas'");
        // $get_id_kelas = $GetJadwal["id"];

        $no = 1;
        $GetKelas = query("SELECT * FROM tb_kelas WHERE tahun_akademik='$tahun_akademik'");
        foreach ($GetKelas as $kelas) {

        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $kelas["nama_kelas"]; ?></td>
                <td>
                    <a href="?pages=jadwal-pelajaran-2&act=detail-jadwal-kelas&id=<?= $kelas["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>