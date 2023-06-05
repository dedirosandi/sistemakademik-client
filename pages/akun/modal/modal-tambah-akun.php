 <div class="modal fade" id="TambahAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
         <div class="modal-content">
             <div class="modal-body">
                 <form autocomplete="off" action="pages/akun/proses/proses-tambah-akun.php" method="post">
                     <div class="form-group">
                         <label for="basicInput">Nama</label>
                         <input type="text" name="nama" class="form-control" id="basicInput" required>
                     </div>
                     <div class="form-group">
                         <label for="basicInput">Email</label>
                         <input type="email" name="email" class="form-control" id="basicInput" required>
                     </div>
                     <div class="form-group">
                         <label for="basicInput">Password</label>
                         <input type="password" name="password" class="form-control" id="basicInput" required>
                     </div>
                     <div class="input-group mb-3">
                         <label class="input-group-text" for="inputGroupSelect01">Role</label>
                         <select name="role" class="form-select" id="inputGroupSelect01" required>
                             <option selected>Choose...</option>
                             <?php
                                $GetRole = query("SELECT * FROM tb_role");
                                foreach ($GetRole as $role) {
                                ?>
                                 <option value="<?= $role["id"]; ?>"><?= $role["nama_role"]; ?></option>
                             <?php } ?>
                         </select>
                     </div>
                     <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                         <i class="bx bx-x d-block d-sm-none"></i>
                         <span class="d-none d-sm-block">Batal</span>
                     </button>
                     <button type="submit" name="submit" class="btn btn-primary ml-1">
                         <i class="bx bx-check d-block d-sm-none"></i>
                         <span class="d-none d-sm-block">Tambah</span>
                     </button>

                 </form>
             </div>
         </div>
     </div>
 </div>