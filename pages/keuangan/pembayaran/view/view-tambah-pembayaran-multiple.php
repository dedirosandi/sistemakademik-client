<?php
include_once "env/page-session-admin.php";
?>
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="?pages=pembayaran" class="btn btn-success"> Kembali</a>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Pembayaran</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pembayaran Multiple</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<?php
if (isset($_GET["pesan"])) { ?>
    <?php if ($_GET["pesan"] == "gagal") { ?>
        <div class="alert alert-danger" role="alert">
            Proses gagal...
        </div>
    <?php } else if ($_GET["pesan"] == "berhasil") { ?>
        <div class="alert alert-success" role="alert">
            Proses berhasil...
        </div>
    <?php } ?>

<?php
} ?>

<section class="section">
    <div class="card shadow">
        <div class="card-header">
            <h5>Tambah Pembayaran Multiple</h5>
        </div>
        <div class="card-body">
            <form action="?pages=pembayaran&act=proses-tambah-pembayaran" method="post">
                <div class="col-lg-12">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Tahun Akademik</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control form-control-sm" name="tahun_akademik" id="tahun_akademik">
                                <option value="">Pilih</option>
                                <?php
                                $no = 1;
                                $GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik");
                                foreach ($GetTahunAkademik as $tahun_akademik) {
                                ?>
                                    <option value="<?= $tahun_akademik["id"] ?>"><?= $tahun_akademik["nama_tahun"] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="add-after-more">
                        <div class="grouping-add">
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label col-form-label-sm">Pembayaran</label>
                                <div class="col-3">
                                    <input type="text" name="nama_pembayaran[]" class="form-control form-control-sm" placeholder="Nama Pembayaran" required>
                                </div>
                                <div class="col-3">
                                    <input type="number" name="nominal[]" class="form-control form-control-sm" placeholder="Nominal Pembayaran" required>
                                </div>
                                <div class="col-2">
                                    <input type="date" name="tanggal_pembayaran[]" class="form-control form-control-sm" required>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-sm btn-success button-add-more"><i class="bi bi-plus-circle-fill"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-9">
                            <button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="data-copy d-none">
                <div class="grouping-add">
                    <div class="mb-3 row">
                        <label class="col-3 col-form-label col-form-label-sm">Pembayaran</label>
                        <div class="col-3">
                            <input type="text" name="nama_pembayaran[]" class="form-control form-control-sm" placeholder="Nama Pembayaran" required>
                        </div>
                        <div class="col-3">
                            <input type="number" name="nominal[]" class="form-control form-control-sm" placeholder="Nominal Pembayaran" required>
                        </div>
                        <div class="col-2">
                            <input type="date" name="tanggal_pembayaran[]" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-1">
                            <button type="button" id="tombol-hapus" class="btn btn-sm btn-danger"><i class="bi bi-x-circle-fill"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        $(".button-add-more").click(function() {
            let copy = $(".data-copy").html();
            $(".add-after-more").after(copy);
        });

        $("body").on("click", "#tombol-hapus", function() {
            $(this).parents(".grouping-add").remove();
        });
    });
</script>
<script>
    function limitMonth() {
        var input = document.getElementById('tanggal_pembayaran');
        var inputValue = input.value;

        // Mendapatkan nilai bulan dari input
        var selectedMonth = new Date(inputValue).getMonth() + 1;

        // Mengubah tampilan input hanya menjadi bulan
        input.value = inputValue.slice(0, 8) + (selectedMonth < 10 ? '0' : '') + selectedMonth;
    }
</script>