 <?php
    include_once "env/page-session-admin.php";
    ?>
 <div class="page-title mb-3">
     <div class="row">
         <div class="col-12 col-md-6 order-md-1 order-last">
             <a href="?pages=kurikulum" class="btn btn-success"> Kembali</a>
         </div>
         <div class="col-12 col-md-6 order-md-2 order-first">
             <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Tambah Data Kurikulum</li>
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
             <h5>Tambah Data Kurikulum</h5>
         </div>
         <div class="card-body">
             <form action="?pages=kurikulum&act=proses-tambah-kurikulum" method="post">
                 <div class="col-lg-12">
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Nama Kurikulum</label>
                         <div class="col-sm-9">
                             <input type="text" name="nama_kurikulum" class="form-control form-control-sm" required>
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