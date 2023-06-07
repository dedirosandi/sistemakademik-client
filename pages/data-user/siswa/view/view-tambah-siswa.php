 <div class="page-title mb-3">
     <div class="row">
         <div class="col-12 col-md-6 order-md-1 order-last">
             <a href="?pages=siswa" class="btn btn-success"> Kembali</a>
         </div>
         <div class="col-12 col-md-6 order-md-2 order-first">
             <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa</li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>

 <?php
    include_once "env/page-session-admin.php";
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
             <h5>Tambah Data Siswa</h5>
         </div>
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
                             <div class="col-lg-6">
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Nama Siswa <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="nama" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">NIPD</label>
                                     <?php
                                        $query = mysqli_query($koneksi, "SELECT max(username) as kodeTerbesar FROM tb_user WHERE role='siswa'");
                                        $data = mysqli_fetch_array($query);
                                        $KodeNIPD = $data['kodeTerbesar'];
                                        $urutan = (int) substr($KodeNIPD, 2, 2);
                                        $urutan++;
                                        $date = date("Ymdhis");
                                        $KodeNIPD = $date . sprintf("%02s", $urutan);
                                        ?>
                                     <div class="col-sm-9">
                                         <input type="number" name="nipd" class="form-control form-control-sm" value="<?= $KodeNIPD ?>" readonly>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Password</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="password" class="form-control form-control-sm" value="#<?= $KodeNIPD ?>" readonly>
                                     </div>
                                 </div>

                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Kelas <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <select name="kelas" class="form-select form-select-sm" aria-label="Default select example" required>
                                             <option selected value="">Pilih...</option>
                                             <?php
                                                $no = 1;
                                                $GetKelas = query("SELECT * FROM tb_kelas WHERE status='1'");
                                                foreach ($GetKelas as $kelas) {
                                                ?>
                                                 <option value="<?= $kelas["id"]; ?>"><?= $no++; ?>. <?= $kelas["nama_kelas"]; ?></option>
                                             <?php } ?>
                                         </select>
                                     </div>
                                 </div>

                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Tahun Akademik <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <select name="tahun_akademik" class="form-select form-select-sm" aria-label="Default select example" required>
                                             <option selected value="">Pilih...</option>
                                             <?php
                                                $no = 1;
                                                $GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik");
                                                foreach ($GetTahunAkademik as $tahun_akademik) {
                                                ?>
                                                 <option value="<?= $tahun_akademik["id"]; ?>"><?= $no++; ?>. <?= $tahun_akademik["nama_tahun"]; ?></option>
                                             <?php } ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Kurikulum <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <select name="kurikulum" class="form-select form-select-sm" aria-label="Default select example" required>
                                             <option selected value="">Pilih...</option>
                                             <?php
                                                $no = 1;
                                                $GetKurikulum = query("SELECT * FROM tb_kurikulum");
                                                foreach ($GetKurikulum as $kurikulum) {
                                                ?>
                                                 <option value="<?= $kurikulum["id"]; ?>"><?= $no++; ?>. <?= $kurikulum["nama_kurikulum"]; ?></option>
                                             <?php } ?>
                                         </select>
                                     </div>
                                 </div>

                                 <div class="mb-3 row">

                                     <label class="col-sm-3 col-form-label col-form-label-sm">NISN <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="number" name="nisn" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Tahun Masuk</label>
                                     <div class="col-sm-9">
                                         <?php
                                            $year = date('Y');
                                            ?>
                                         <input type="text" name="tahun_masuk" class="form-control form-control-sm" value="<?= $year ?>" readonly>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Alamat <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="alamat" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">RT/RW</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="rt_rw" class="form-control form-control-sm" value="00/00">
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Kelurahan <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="kelurahan" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Foto</label>
                                     <div class="col-sm-9">
                                         <input name="foto" class="form-control form-control-sm" type="file">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Kecamatan <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="kecamatan" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Kota <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="kota" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Kode Pos <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="number" name="kode_pos" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Status Awal <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <select name="status_awal" class="form-select form-select-sm" aria-label="Default select example" required>
                                             <option selected value="">Pilih...</option>
                                             <option value="Baru">Baru</option>
                                             <option value="Pindahan">Pindahan</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">NIK <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="number" name="nik" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">SKHUN</label>
                                     <div class="col-sm-9">
                                         <input type="number" name="skhun" class="form-control form-control-sm">
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Tempat Lahir <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="tempat_lahir" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Tanggal Lahir <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="date" name="tanggal_lahir" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Jenis Kelamin <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <select name="jenis_kelamin" class="form-select form-select-sm" aria-label="Default select example" required>
                                             <option selected value="">Pilih ...</option>
                                             <option value="Laki Laki">Laki Laki</option>
                                             <option value="Perempuan">Perempuan</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Agama <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <select name="agama" class="form-select form-select-sm" aria-label="Default select example" required>
                                             <option selected value="">Pilih ...</option>
                                             <option value="Islam">Islam</option>
                                             <option value="Kristen">Kristen</option>
                                             <option value="Katolik">Katolik</option>
                                             <option value="Hindu">Hindu</option>
                                             <option value="Budha">Budha</option>
                                             <option value="Kong Hu Chu">Kong Hu Chu</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">No.Tlp <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="no_tlp" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Alamat Email <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="email" name="alamat_email" class="form-control form-control-sm" required>
                                     </div>
                                 </div>

                             </div>
                         </div>
                     </div>
                     <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                         <div class="row mt-4">
                             <div class="col-lg-12">
                                 <div class="mb-3 row bg-warning" style="padding:5px">
                                     <label class="col-sm-3 col-form-label col-form-label-sm fw-bold">Nama Ayah <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="nama_ayah" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Tahun Lahir</label>
                                     <div class="col-sm-9">
                                         <input type="date" name="tahun_lahir_ayah" class="form-control form-control-sm">
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Pendidikan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="pendidikan_terakhir_ayah" class="form-control form-control-sm">
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Pekerjaan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="pekerjaan_ayah" class="form-control form-control-sm">
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Penghasilan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="penghasilan_ayah" class="form-control form-control-sm">
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">No.Tlp <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="no_tlp_ayah" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row bg-warning" style="padding:5px">
                                     <label class="col-sm-3 col-form-label col-form-label-sm fw-bold">Nama Ibu <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="nama_ibu" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Tahun Lahir</label>
                                     <div class="col-sm-9">
                                         <input type="date" name="tahun_lahir_ibu" class="form-control form-control-sm">
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Pendidikan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="pendidikan_terakhir_ibu" class="form-control form-control-sm">
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Pekerjaan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="pekerjaan_ibu" class="form-control form-control-sm">
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">Penghasilan</label>
                                     <div class="col-sm-9">
                                         <input type="text" name="penghasilan_ibu" class="form-control form-control-sm">
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <label class="col-sm-3 col-form-label col-form-label-sm">No.Tlp <small style="color: red;">*</small></label>
                                     <div class="col-sm-9">
                                         <input type="text" name="no_tlp_ibu" class="form-control form-control-sm" required>
                                     </div>
                                 </div>
                                 <div class="mb-3 row">
                                     <div class="col-sm-9">
                                         <button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
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