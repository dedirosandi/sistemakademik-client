 <?php
    include_once "env/page-session-admin.php";
    ?>
 <div class="page-title mb-3">
     <div class="row">
         <div class="col-12 col-md-6 order-md-1 order-last">
             <a href="?pages=update" class="btn btn-success"> Kembali</a>
         </div>
         <div class="col-12 col-md-6 order-md-2 order-first">
             <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Update</li>
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
             <h5>Update Terbaru</h5>
         </div>
         <div class="card-body">
             <form action="?pages=update&act=proses-update-terbaru" method="post">
                 <div class="col-lg-12">
                     <textarea name="isi_pesan" id="default" cols="30" rows="10"></textarea>

                 </div>
                 <div class="mb-3 mt-4">
                     <div class="col-sm-9">
                         <button type="submit" name="submit" class="btn btn-success">Push</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>

 </section>