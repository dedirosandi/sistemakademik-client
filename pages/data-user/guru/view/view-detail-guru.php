 <?php
    include_once "env/page-session-admin.php";
    $id = $_GET["id"];
    $GetInfoGuru = query("SELECT * FROM tb_info_guru WHERE id = '$id'")[0];
    // var_dump($GetInfoGuru);
    // die;
    $id_user = $GetInfoGuru["id_user"];
    $GetUser = query("SELECT * FROM tb_user WHERE id = '$id_user'")[0];


    ?>
 <div class="page-title mb-3">
     <div class="row">
         <div class="col-12 col-md-6 order-md-1 order-last">
             <a href="?pages=guru" class="btn btn-success"> Kembali</a>
         </div>
         <div class="col-12 col-md-6 order-md-2 order-first">
             <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Data User</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Detail Data Guru</li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>
 <section class="section">
     <div class="card shadow">
         <div class="card-body">
             <div class="row mt-4">
                 <div class="col-lg-2">
                     <?php if (!empty($GetInfoGuru["foto"])) { ?>
                         <img width="180" src="../../../../assets/foto/foto-guru/<?= $GetInfoGuru["foto"]; ?>" class="img-thumbnail" alt="...">
                     <?php } else { ?>
                         <img width="180" src="../../../../assets/images/faces/1.jpg" class="img-thumbnail" alt="...">
                     <?php } ?>
                     <a href="?pages=guru&act=edit-guru&id=<?= $GetInfoGuru["id"]; ?>" class="btn btn-block btn-success">Edit Profile</a>

                 </div>
                 <div class="col-lg-5">
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">NIP</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetUser["username"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Nama Lengkap </label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetUser["nama"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Tempat Lahir</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["tempat_lahir"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Tanggal Lahir</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["tanggal_lahir"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Jenis Kelamin</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["jenis_kelamin"]; ?>" disabled>
                         </div>
                     </div>

                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Agama</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["agama"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">No HP</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["no_hp"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Alamat Email</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["alamat_email"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">RT/RW</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["rt_rw"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Kelurahan</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["kelurahan"]; ?>" disabled>
                         </div>
                     </div>

                 </div>
                 <div class="col-lg-5">
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Kecamatan</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["kecamatan"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Kota</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["kota"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Kode Pos</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["kode_pos"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Bidang Studi</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["bidang_studi"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Status Pernikahan</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["status_nikah"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">NIK</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["nik"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">Kewarganegaraan</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["kewarganegaraan"]; ?>" disabled>
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-3 col-form-label col-form-label-sm">NPWP</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control form-control-sm" value="<?= $GetInfoGuru["npwp"]; ?>" disabled>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </section>