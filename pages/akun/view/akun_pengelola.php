 <section class="section">
     <div class="card shadow">
         <div class="card-header">
             <button data-bs-toggle="modal" data-bs-target="#TambahAkun" class="btn btn-success">Tambah Akun</button>
             <?php include "pages/akun/modal/modal-tambah-akun.php" ?>
         </div>
         <div class="card-body">
             <table class="table table-striped" id="table1">
                 <thead>
                     <tr>
                         <th>Nama</th>
                         <th>Email</th>
                         <th>Role</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        $GetAkun = query("SELECT * FROM tb_user");
                        foreach ($GetAkun as $akun) {
                            $id_role = $akun["role"];
                            $GetRole = query("SELECT * FROM tb_role WHERE id='$id_role'")[0];
                        ?>
                         <tr>
                             <td><?= $akun["nama"]; ?></td>
                             <td><?= $akun["email"]; ?></td>
                             <td><?= $GetRole["nama_role"]; ?></td>
                             <td>
                                 <?php if ($akun["status"] == "1") { ?>
                                     <a href="pages/akun/proses/proses-status.php?id=<?= $akun["id"]; ?>" class="btn btn-sm btn-success">Aktif</a>
                                 <?php } elseif ($akun["status"] == "0") { ?>
                                     <a href="pages/akun/proses/proses-status.php?id=<?= $akun["id"]; ?>" class="btn btn-sm btn-danger">Tidak Aktif</a>
                                 <?php } ?>
                             </td>
                         </tr>
                     <?php } ?>
                 </tbody>
             </table>
         </div>
     </div>

 </section>