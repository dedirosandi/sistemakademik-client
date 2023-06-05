 <section class="section">
     <div class="card">
         <div class="card-header">
             <button class="btn btn-success">Tambah Role</button>
         </div>
         <div class="card-body">
             <table class="table table-striped" id="table1">
                 <thead>
                     <tr>
                         <th>Role</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>Guru</td>
                         <td>
                             <?php if ($akun_pengelola["status"] == "1") { ?>
                                 <a href="pages/portfolio/process/status-hide.php?id=<?= $portfolio["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-eye"></i></a>
                             <?php } elseif ($akun_pengelola["status"] == "0") { ?>
                                 <a href="pages/portfolio/process/status-show.php?id=<?= $portfolio["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-eye-slash"></i></a>
                             <?php } ?>
                         </td>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div>

 </section>