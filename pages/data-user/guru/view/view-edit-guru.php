  <?php
    include_once "env/page-session-admin.php";
    $id = $_GET["id"];
    $GetInfoGuru = query("SELECT * FROM tb_info_guru WHERE id = '$id'")[0];
    $id_user = $GetInfoGuru["id_user"];
    $GetUser = query("SELECT * FROM tb_user WHERE id = '$id_user'")[0];

    // var_dump($GetUser);
    // die;
    ?>
  <div class="page-title mb-3">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <a href="?pages=guru&act=detail-guru&id=<?= $id ?>" class="btn btn-success"> Kembali</a>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Data User</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Edit Data Guru</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <section class="section">
      <div class="card shadow">
          <div class="card-header">
              <h5>Edit Data Guru</h5>
          </div>
          <div class="card-body">
              <form action="?pages=guru&act=proses-edit-guru&id=<?= $GetInfoGuru["id"]; ?>&id_user=<?= $GetUser["id"]; ?>" enctype="multipart/form-data" method="post">
                  <div class="row mt-4">
                      <div class="col-lg-6">
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">NIP</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control form-control-sm" value="<?= $GetUser["username"]; ?>" disabled>
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Nama Lengkap </label>
                              <div class="col-sm-9">
                                  <input type="text" name="nama" class="form-control form-control-sm" value="<?= $GetUser["nama"]; ?>" required>
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Tempat Lahir</label>
                              <div class="col-sm-9">
                                  <input type="text" name="tempat_lahir" class="form-control form-control-sm" value="<?= $GetInfoGuru["tempat_lahir"]; ?>">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Tanggal Lahir</label>
                              <div class="col-sm-3">
                                  <input class="form-control form-control-sm" value="<?= $GetInfoGuru["tanggal_lahir"]; ?>" disabled>
                              </div>
                              <div class="col-sm-6">
                                  <input type="date" name="tanggal_lahir" value="<?= $GetInfoGuru["tanggal_lahir"]; ?>" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Jenis Kelamin</label>
                              <div class="col-sm-3">
                                  <input class="form-control form-control-sm" value="<?= $GetInfoGuru["jenis_kelamin"]; ?>" disabled>
                              </div>
                              <div class="col-sm-6">
                                  <select name="jenis_kelamin" class="form-select form-select-sm" aria-label="Default select example">
                                      <option selected value="<?= $GetInfoGuru["jenis_kelamin"]; ?>">Pilih ...</option>
                                      <option value="Laki Laki">Laki Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                              </div>
                          </div>

                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Agama</label>
                              <div class="col-sm-3">
                                  <input class="form-control form-control-sm" value="<?= $GetInfoGuru["agama"]; ?>" disabled>
                              </div>
                              <div class="col-sm-6">
                                  <select name="agama" class="form-select form-select-sm" aria-label="Default select example">
                                      <option selected value="<?= $GetInfoGuru["agama"]; ?>">Pilih ...</option>
                                      <option value="Islam">Islam</option>
                                      <option value="Kristen">Kristen</option>
                                      <option value="Katolik">Katolik</option>
                                      <option value="Hindu">Hindu</option>
                                      <option value="Budha">Budha</option>
                                      <option value="Konghucu">Konghucu</option>
                                  </select>
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">No HP</label>
                              <div class="col-sm-9">
                                  <input type="number" name="no_hp" class="form-control form-control-sm" value="<?= $GetInfoGuru["no_hp"]; ?>">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Alamat Email</label>
                              <div class="col-sm-9">
                                  <input type="text" name="alamat_email" class="form-control form-control-sm" value="<?= $GetInfoGuru["alamat_email"]; ?>">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">RT/RW</label>
                              <div class="col-sm-9">
                                  <input type="text" name="rt_rw" class="form-control form-control-sm" value="<?= $GetInfoGuru["rt_rw"]; ?>">
                              </div>
                          </div>

                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Kelurahan</label>
                              <div class="col-sm-9">
                                  <input type="text" name="kelurahan" class="form-control form-control-sm" value="<?= $GetInfoGuru["kelurahan"]; ?>">
                              </div>
                          </div>

                      </div>
                      <div class="col-lg-6">
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Kecamatan</label>
                              <div class="col-sm-9">
                                  <input type="text" name="kecamatan" class="form-control form-control-sm" value="<?= $GetInfoGuru["kecamatan"]; ?>">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Kota</label>
                              <div class="col-sm-9">
                                  <input type="text" name="kota" class="form-control form-control-sm" value="<?= $GetInfoGuru["kota"]; ?>">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Kode Pos</label>
                              <div class="col-sm-9">
                                  <input type="text" name="kode_pos" class="form-control form-control-sm" value="<?= $GetInfoGuru["kode_pos"]; ?>">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Bidang Studi</label>
                              <div class="col-sm-9">
                                  <input type="text" name="bidang_studi" class="form-control form-control-sm" value="<?= $GetInfoGuru["bidang_studi"]; ?>">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Status Pernikahan</label>
                              <div class="col-sm-3">
                                  <input class="form-control form-control-sm" value="<?= $GetInfoGuru["status_nikah"]; ?>" disabled>
                              </div>
                              <div class="col-sm-6">
                                  <select name="status_nikah" class="form-select form-select-sm" aria-label="Default select example">
                                      <option selected value="<?= $GetInfoGuru["status_nikah"]; ?>">Pilih ...</option>
                                      <option value="Sudah">Sudah</option>
                                      <option value="Belum">Belum</option>
                                  </select>
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">NIK</label>
                              <div class="col-sm-9">
                                  <input type="text" name="nik" class="form-control form-control-sm" value="<?= $GetInfoGuru["nik"]; ?>">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Kewarganegaraan</label>
                              <div class="col-sm-9">
                                  <input type="text" name="kewarganegaraan" class="form-control form-control-sm" value="<?= $GetInfoGuru["kewarganegaraan"]; ?>">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">NPWP</label>
                              <div class="col-sm-9">
                                  <input type="text" name="npwp" class="form-control form-control-sm" value="<?= $GetInfoGuru["npwp"]; ?>">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <div class="col-sm-3">
                                  <?php if (!empty($GetInfoGuru["foto"])) { ?>
                                      <img width="180" src="../../../../assets/foto/foto-guru/<?= $GetInfoGuru["foto"]; ?>" class="img-thumbnail" alt="...">
                                  <?php } else { ?>
                                      <img width="180" src="../../../../assets/images/faces/1.jpg" class="img-thumbnail" alt="...">
                                  <?php } ?>
                              </div>
                              <div class="col-sm-9">
                                  <input name="foto" class="form-control form-control-sm" type="file">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <div class="col-sm-9">
                          <button type="submit" name="submit" class="btn btn-success">Edit Proses</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>

  </section>