 <?php
    include_once "env/page-session-admin.php";
    ?>
 <div class="page-title mb-3">
     <div class="row">
         <div class="col-12 col-md-6 order-md-1 order-last">
             <a href="?pages=ruangan" class="btn btn-success"> Kembali</a>
         </div>
         <div class="col-12 col-md-6 order-md-2 order-first">
             <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Tambah Data Ruangan</li>
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
     <?php } ?>

 <?php
    } ?>

 <section class="section">
     <div class="card shadow">
         <div class="card-header">
             <h5>Tambah Data Ruangan</h5>
         </div>
         <div class="card-body">
             <form action="?pages=ruangan&act=proses-tambah-ruangan" method="post">
                 <div class="col-lg-12">
                     <div class="mb-3 row">
                         <?php
                            $query = mysqli_query($koneksi, "SELECT max(kode_ruangan) as kodeTerbesar FROM tb_ruangan");
                            $data = mysqli_fetch_array($query);
                            $KodeRuangan = $data['kodeTerbesar'];
                            $urutan = (int) substr($KodeRuangan, 3, 3);
                            $urutan++;
                            $huruf = "R";
                            $KodeRuangan = $huruf . sprintf("%03s", $urutan);
                            ?>
                         <label class="col-sm-3 col-form-label col-form-label-sm fw-bold">Kode Ruangan</label>
                         <div class="col-sm-9">
                             <input type="text" name="kode_ruangan" class="form-control form-control-sm" value="<?= $KodeRuangan ?>" readonly>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Nama Gedung</label>
                         <div class="col-sm-9">
                             <select name="nama_gedung" class="form-select form-select-sm" aria-label="Default select example">
                                 <option selected value="">Pilih...</option>
                                 <?php
                                    $no = 1;
                                    $GetGedung = query("SELECT * FROM tb_gedung WHERE status='1'");
                                    foreach ($GetGedung as $gedung) {
                                    ?>
                                     <option value="<?= $gedung["id"]; ?>"><?= $gedung["nama_gedung"]; ?></option>
                                 <?php } ?>
                             </select>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Nama Ruangan</label>
                         <div class="col-sm-9">
                             <input type="text" name="nama_ruangan" class="form-control form-control-sm" required>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Kapasitas</label>
                         <div class="col-sm-9">
                             <input type="text" name="kapasitas" class="form-control form-control-sm" required>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <div class="col-sm-9">
                             <button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>

 </section>