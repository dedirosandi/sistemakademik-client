  <?php
    include_once "env/page-session-admin.php";
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
                      <li class="breadcrumb-item active" aria-current="page">Tambah Data Guru</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <section class="section">
      <div class="card shadow">
          <div class="card-header">
              <h5>Tambah Data Guru</h5>
          </div>
          <div class="card-body">
              <form action="?pages=guru&act=proses-tambah-guru" enctype="multipart/form-data" method="post">
                  <div class="row mt-4">
                      <div class="col-lg-6">
                          <div class="mb-3 row">
                              <?php
                                $query = mysqli_query($koneksi, "SELECT max(username) as kodeTerbesar FROM tb_user WHERE role='guru'");
                                $data = mysqli_fetch_array($query);
                                $KodeNIP = $data['kodeTerbesar'];
                                $urutan = (int) substr($KodeNIP, 2, 2);
                                $urutan++;
                                $date = date('Ymdhis');
                                $KodeNIP = $date . sprintf("%02s", $urutan);
                                ?>
                              <label class="col-sm-3 col-form-label col-form-label-sm">NIP</label>
                              <div class="col-sm-9">
                                  <input type="text" name="nip" class="form-control form-control-sm" value="<?= $KodeNIP ?>" readonly>
                              </div>
                          </div>
                          <div class="mb-3 row">

                              <label class="col-sm-3 col-form-label col-form-label-sm">Password <small style="color: red;">*</small></label>
                              <div class="col-sm-9">
                                  <input type="text" name="password" class="form-control form-control-sm" value="#<?= $KodeNIP ?>" required>
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Nama Lengkap <small style="color: red;">*</small></label>
                              <div class="col-sm-9">
                                  <input type="text" name="nama" class="form-control form-control-sm" required>
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Tempat Lahir</label>
                              <div class="col-sm-9">
                                  <input type="text" name="tempat_lahir" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Tanggal Lahir</label>
                              <div class="col-sm-9">
                                  <input type="date" name="tanggal_lahir" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Jenis Kelamin</label>
                              <div class="col-sm-9">
                                  <select name="jenis_kelamin" class="form-select form-select-sm" aria-label="Default select example">
                                      <option selected value="">Pilih ...</option>
                                      <option value="Laki Laki">Laki Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                              </div>
                          </div>

                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Agama</label>
                              <div class="col-sm-9">
                                  <select name="agama" class="form-select form-select-sm" aria-label="Default select example">
                                      <option selected value="">Pilih ...</option>
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
                                  <input type="number" name="no_hp" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Alamat Email</label>
                              <div class="col-sm-9">
                                  <input type="text" name="alamat_email" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">RT/RW</label>
                              <div class="col-sm-9">
                                  <input type="text" name="rt_rw" class="form-control form-control-sm" value="00/00">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Desa</label>
                              <div class="col-sm-9">
                                  <input type="text" name="desa" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Kelurahan</label>
                              <div class="col-sm-9">
                                  <input type="text" name="kelurahan" class="form-control form-control-sm">
                              </div>
                          </div>

                      </div>
                      <div class="col-lg-6">
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Kecamatan</label>
                              <div class="col-sm-9">
                                  <input type="text" name="kecamatan" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Kota</label>
                              <div class="col-sm-9">
                                  <input type="text" name="kota" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Kode Pos</label>
                              <div class="col-sm-9">
                                  <input type="text" name="kode_pos" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Bidang Studi</label>
                              <div class="col-sm-9">
                                  <input type="text" name="bidang_studi" class="form-control form-control-sm">
                              </div>
                          </div>

                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Status Pernikahan</label>
                              <div class="col-sm-9">
                                  <select name="status_nikah" class="form-select form-select-sm" aria-label="Default select example">
                                      <option selected value="">Pilih ...</option>
                                      <option value="Sudah">Sudah</option>
                                      <option value="Belum">Belum</option>
                                  </select>
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">NIK</label>
                              <div class="col-sm-9">
                                  <input type="text" name="nik" class="form-control form-control-sm" required>
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Kewarganegaraan</label>
                              <div class="col-sm-9">
                                  <input type="text" name="kewarganegaraan" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">NPWP</label>
                              <div class="col-sm-9">
                                  <input type="text" name="npwp" class="form-control form-control-sm">
                              </div>
                          </div>
                          <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label col-form-label-sm">Foto</label>
                              <div class="col-sm-9">
                                  <input name="foto" class="form-control form-control-sm" type="file">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <div class="col-sm-9">
                          <button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>

  </section>