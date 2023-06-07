 <div class="sidebar-menu">
     <ul class="menu">
         <li class="sidebar-title">Menu</li>

         <li class="sidebar-item <?php if ($pages == "dashboard") { ?> active <?php } else { ?> <?php } ?>">
             <a href="?pages=dashboard" class='sidebar-link'>
                 <i class="bi bi-grid-fill"></i>
                 <span>Dashboard</span>
             </a>
         </li>
         <li class="sidebar-item <?php if ($pages == "rangkuman-nilai") { ?> active <?php } else { ?> <?php } ?>">
             <a href="?pages=rangkuman-nilai" class='sidebar-link'>
                 <i class="bi bi-graph-up-arrow"></i>
                 <span>Rangkuman Nilai</span>
             </a>
         </li>
         <li class="sidebar-item <?php if ($pages == "jadwal-pelajaran-siswa") { ?> active <?php } else { ?> <?php } ?>">
             <a href="?pages=jadwal-pelajaran-siswa" class='sidebar-link'>
                 <i class="bi bi-calendar2-week-fill"></i>
                 <span>Jadwal Pelajaran</span>
             </a>
         </li>
         <li class="sidebar-item <?php if ($pages == "kartu-ujian") { ?> active <?php } else { ?> <?php } ?>">
             <a href="?pages=kartu-ujian" class='sidebar-link'>
                 <i class="bi bi-card-text"></i>
                 <span>Kartu Ujian</span>
             </a>
         </li>
         <li class="sidebar-item <?php if ($pages == "dokumen-surat") { ?> active <?php } else { ?> <?php } ?>">
             <a href="?pages=dokumen-surat" class='sidebar-link'>
                 <i class="bi bi-file-pdf-fill"></i>
                 <span>Dokumen Surat</span>
             </a>
         </li>
         <li class="sidebar-item <?php if ($pages == "pembayaran") { ?> active <?php } else { ?> <?php } ?>">
             <a href="?pages=pembayaran" class='sidebar-link'>
                 <i class="bi bi-cash-stack"></i>
                 <span>Pembayaran</span>
             </a>
         </li>
         <li class="sidebar-item">
             <a href="?pages=logout" class='sidebar-link'>
                 <i class="bi bi-power"></i>
                 <span>Logout</span>
             </a>
         </li>
     </ul>
 </div>