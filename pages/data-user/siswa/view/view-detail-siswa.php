 <?php
    include_once "env/page-session-admin.php";
    $id = $_GET["id"];
    $GetInfoSiswa = query("SELECT * FROM tb_info_siswa WHERE id = '$id'")[0];
    $id_user = $GetInfoSiswa["id_user"];
    $jurusan = $GetInfoSiswa["jurusan"];

    $GetJurusan = query("SELECT * FROM tb_jurusan WHERE id = '$jurusan'");


    $GetUser = query("SELECT * FROM tb_user WHERE id = '$id_user'")[0];
    $id_kelas = $GetInfoSiswa["kelas"];
    $GetKelas = query("SELECT * FROM tb_kelas WHERE id='$id_kelas'");

    ?>
 <div class="page-title mb-3">
     <div class="row">
         <div class="col-12 col-md-6 order-md-1 order-last">
             <a href="?pages=siswa" class="btn btn-success"> Kembali</a>
         </div>
         <div class="col-12 col-md-6 order-md-2 order-first">
             <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Data Siswa</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Detail Data Siswa</li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>
 <section class="section">
     <div class="card shadow">
         <div class="card-body">
             <form action="?pages=siswa&act=proses-tambah-siswa" enctype="multipart/form-data" method="post">
                 <nav>
                     <div class="nav nav-tabs" id="nav-tab" role="tablist">
                         <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Data Siswa</button>
                         <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Data Orang Tua / Wali</button>
                     </div>
                 </nav>
                 <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                         <div class="row mt-4">
                             <div class="col-lg-2">
                                 <?php if (!empty($GetInfoSiswa["foto"])) { ?>
                                     <img width="180" src="../../../../assets/foto/foto-siswa/<?= $GetInfoSiswa["foto"]; ?>" class="img-thumbnail" alt="...">
                                 <?php } else { ?>
                                     <img width="180" src="../../../../assets/images/faces/1.jpg" class="img-thumbnail" alt="...">
                                 <?php } ?>
                                 <a href="?pages=siswa&act=edit-siswa&id=<?= $GetUser["id"]; ?>" class="btn btn-block btn-success">Edit Profile</a>

                             </div>
                             <div class="col-lg-5">
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Nama Siswa</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="nama" class="form-control form-control-sm" value="<?= $GetUser["nama"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">NIPD</label>
                                     <div class="col-sm-9">
                                         <input type="number" name="nipd" class="form-control form-control-sm" value="<?= $GetUser["username"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">

                                     <label class="col-sm-3 col-form-label col-form-label-sm">NISN</label>
                                     <div class="col-sm-9">
                                         <input type="number" name="nisn" class="form-control form-control-sm" value="<?= $GetInfoSiswa["nisn"]; ?>" disabled>
                                     </div>
                                 </div>


                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Tahun Masuk</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="angkatan" class="form-control form-control-sm" value="<?= $GetInfoSiswa["tahun_masuk"]; ?>" disabled>
                                     </div>
                                 </div>

                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Alamat</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="alamat" class="form-control form-control-sm" value="<?= $GetInfoSiswa["alamat"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">RT/RW</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="rt_rw" class="form-control form-control-sm" value="<?= $GetInfoSiswa["rt_rw"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Kelurahan </label>
                                     <div class="col-sm-9">
                                         <input type="text" name="kelurahan" class="form-control form-control-sm" value="<?= $GetInfoSiswa["kelurahan"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Kecamatan </label>
                                     <div class="col-sm-9">
                                         <input type="text" name="kecamatan" class="form-control form-control-sm" value="<?= $GetInfoSiswa["kelurahan"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Kota </label>
                                     <div class="col-sm-9">
                                         <input type="text" name="kota" class="form-control form-control-sm" value="<?= $GetInfoSiswa["kota"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Kode Pos </label>
                                     <div class="col-sm-9">
                                         <input type="text" name="kode_pos" class="form-control form-control-sm" value="<?= $GetInfoSiswa["kode_pos"]; ?>" disabled>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-5">

                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Status Awal </label>
                                     <div class="col-sm-9">
                                         <input type="text" name="kode_pos" class="form-control form-control-sm" value="<?= $GetInfoSiswa["status_awal"]; ?>" disabled>
                                     </div>
                                 </div>

                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">NIK </label>
                                     <div class="col-sm-9">
                                         <input type="number" name="nik" class="form-control form-control-sm" value="<?= $GetInfoSiswa["nik"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">SKHUN</label>
                                     <div class="col-sm-9">
                                         <input type="number" name="skhun" class="form-control form-control-sm" value="<?= $GetInfoSiswa["skhun"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Tempat Lahir </label>
                                     <div class="col-sm-9">
                                         <input type="text" name="tempat_lahir" class="form-control form-control-sm" value="<?= $GetInfoSiswa["tempat_lahir"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Tanggal Lahir</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="tanggal_lahir" class="form-control form-control-sm" value="<?= $GetInfoSiswa["tanggal_lahir"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Jenis Kelamin</label>
                                     <div class="col-sm-9">
                                         <input type="text" class="form-control form-control-sm" value="<?= $GetInfoSiswa["jenis_kelamin"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Agama</label>
                                     <div class="col-sm-9">
                                         <input type="text" class="form-control form-control-sm" value="<?= $GetInfoSiswa["agama"]; ?>" disabled>
                                     </div>
                                 </div>

                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">No.Tlp</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="no_tlp" class="form-control form-control-sm" value="<?= $GetInfoSiswa["no_tlp"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Alamat Email</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="alamat_email" class="form-control form-control-sm" value="<?= $GetInfoSiswa["alamat_email"]; ?>" disabled>
                                     </div>
                                 </div>

                             </div>
                         </div>
                     </div>
                     <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                         <div class="row mt-4">
                             <div class="col-lg-12">
                                 <div class="mb-3 row bg-warning" style="padding:5px">
                                     <label class="col-sm-3 col-form-label col-form-label-sm fw-bold text-white">Nama Ayah</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="nama_ayah" class="form-control form-control-sm" value="<?= $GetInfoSiswa["nama_ayah"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Tahun Lahir</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="tahun_lahir_ayah" class="form-control form-control-sm" value="<?= $GetInfoSiswa["tahun_lahir_ayah"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Pendidikan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="pendidikan_terakhir_ayah" class="form-control form-control-sm" value="<?= $GetInfoSiswa["pendidikan_terakhir_ayah"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Pekerjaan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="pekerjaan_ayah" class="form-control form-control-sm" value="<?= $GetInfoSiswa["pekerjaan_ayah"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Penghasilan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="penghasilan_ayah" class="form-control form-control-sm" value="<?= $GetInfoSiswa["penghasilan_ayah"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">No.Tlp</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="no_tlp_ayah" class="form-control form-control-sm" value="<?= $GetInfoSiswa["no_tlp_ayah"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row bg-warning" style="padding:5px">
                                     <label class="col-sm-3 col-form-label col-form-label-sm fw-bold fw-bold text-white">Nama Ibu </label>
                                     <div class="col-sm-9">
                                         <input type="text" name="nama_ibu" class="form-control form-control-sm" value="<?= $GetInfoSiswa["nama_ibu"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Tahun Lahir</label>
                                     <div class="col-sm-9">
                                         <input type="date" name="tahun_lahir_ibu" class="form-control form-control-sm" value="<?= $GetInfoSiswa["tahun_lahir_ibu"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Pendidikan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="pendidikan_terakhir_ibu" class="form-control form-control-sm" value="<?= $GetInfoSiswa["pendidikan_terakhir_ibu"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Pekerjaan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="pekerjaan_ibu" class="form-control form-control-sm" value="<?= $GetInfoSiswa["pekerjaan_ibu"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Penghasilan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="penghasilan_ibu" class="form-control form-control-sm" value="<?= $GetInfoSiswa["penghasilan_ibu"]; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">No.Tlp</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="no_tlp_ibu" class="form-control form-control-sm" value="<?= $GetInfoSiswa["no_tlp_ibu"]; ?>" disabled>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>

 </section>