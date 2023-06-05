 <div class="sidebar-menu">
 	<ul class="menu">
 		<li class="sidebar-title">Menu</li>

 		<li class="sidebar-item <?php if ($pages == "dashboard") { ?> active <?php } else { ?> <?php } ?>">
 			<a href="?pages=dashboard" class='sidebar-link'>
 				<i class="bi bi-grid-fill"></i>
 				<span>Dashboard</span>
 			</a>
 		</li>

 		<li class="sidebar-item has-sub <?php if ($pages == "kurikulum") { ?> active <?php } else if ($pages == "tahun-akademik") { ?> active<?php } else if ($pages == "gedung") { ?> active<?php } else if ($pages == "ruangan") { ?> active<?php } else if ($pages == "kelas") { ?> active <?php } else if ($pages == "jurusan") { ?> active <?php } else { ?> <?php } ?>">
 			<a href="#" class='sidebar-link'>
 				<i class="bi bi-front"></i>
 				<span>Data Master</span>
 			</a>
 			<ul class="submenu <?php if ($pages == "kurikulum") { ?> active <?php } else if ($pages == "tahun-akademik") { ?> active<?php } else if ($pages == "gedung") { ?> active<?php } else if ($pages == "ruangan") { ?> active<?php } else if ($pages == "kelas") { ?> active <?php } else if ($pages == "jurusan") { ?> active <?php } else { ?> <?php } ?>">
 				<li class="submenu-item <?php if ($pages == "kurikulum") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=kurikulum"><i class="bi bi-chevron-double-right"></i> Kurikulum</a>
 				</li>
 				<!-- <li class="submenu-item ">
                     <a href="?pages=jenis-ptk"><i class="bi bi-chevron-double-right"></i> Jenis PTK</a>
                 </li> -->
 				<li class="submenu-item <?php if ($pages == "tahun-akademik") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=tahun-akademik"><i class="bi bi-chevron-double-right"></i> Tahun Akademik</a>
 				</li>
 				<li class="submenu-item <?php if ($pages == "gedung") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=gedung"><i class="bi bi-chevron-double-right"></i> Gedung</a>
 				</li>
 				<li class="submenu-item <?php if ($pages == "ruangan") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=ruangan"><i class="bi bi-chevron-double-right"></i> Ruangan</a>
 				</li>
 				<li class="submenu-item <?php if ($pages == "kelas") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=kelas"><i class="bi bi-chevron-double-right"></i> Kelas</a>
 				</li>
 				<li class="submenu-item <?php if ($pages == "jurusan") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=jurusan"><i class="bi bi-chevron-double-right"></i> Jurusan</a>
 				</li>

 			</ul>
 		</li>

 		<li class="sidebar-item  has-sub <?php if ($pages == "siswa") { ?> active <?php } else if ($pages == "guru") { ?> active <?php } else if ($pages == "admin") { ?>  active <?php } else if ($pages == "kepala-sekolah") { ?> active <?php } else { ?> <?php } ?>">
 			<a href="#" class='sidebar-link'>
 				<i class="bi bi-person"></i>
 				<span>Data User</span>
 			</a>
 			<ul class="submenu <?php if ($pages == "siswa") { ?> active <?php } else if ($pages == "guru") { ?> active <?php } else if ($pages == "admin") { ?> active <?php } else if ($pages == "kepala-sekolah") { ?> active <?php } else { ?> <?php } ?>">
 				<li class="submenu-item <?php if ($pages == "siswa") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=siswa"><i class="bi bi-chevron-double-right"></i> Siswa</a>
 				</li>
 				<li class="submenu-item <?php if ($pages == "guru") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=guru"><i class="bi bi-chevron-double-right"></i> Guru</a>
 				</li>
 				<li class="submenu-item <?php if ($pages == "admin") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=admin"><i class="bi bi-chevron-double-right"></i> Admin</a>
 				</li>
 				<li class="submenu-item <?php if ($pages == "kepala-sekolah") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=kepala-sekolah"><i class="bi bi-chevron-double-right"></i> Kepala Sekolah</a>
 				</li>
 			</ul>
 		</li>

 		<li class="sidebar-item  has-sub <?php if ($pages == "jadwal-pelajaran-2") { ?> active <?php } else if ($pages == "mata-pelajaran") { ?> active <?php } else { ?> <?php } ?>">
 			<a href="#" class='sidebar-link'>
 				<i class="bi bi-tag-fill"></i>
 				<span>Data Akademik</span>
 			</a>
 			<ul class="submenu <?php if ($pages == "jadwal-pelajaran-2") { ?> active <?php } else if ($pages == "mata-pelajaran") { ?> active <?php } else { ?> <?php } ?>">
 				<!-- <li class="submenu-item">
                     <a href="?pages=jadwal-pelajaran"><i class="bi bi-chevron-double-right"></i> Jadwal Pelajaran</a>
                 </li> -->
 				<li class="submenu-item <?php if ($pages == "jadwal-pelajaran-2") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=jadwal-pelajaran-2"><i class="bi bi-chevron-double-right"></i> Jadwal Pelajaran</a>
 				</li>
 				<li class="submenu-item <?php if ($pages == "mata-pelajaran") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=mata-pelajaran"><i class="bi bi-chevron-double-right"></i> Mata Pelajaran</a>
 				</li>
 			</ul>
 		</li>
 		<li class="sidebar-item  has-sub <?php if ($pages == "nilai-akademik") { ?> active <?php } else { ?> <?php } ?>">
 			<a href="#" class='sidebar-link'>
 				<i class="bi bi-graph-down"></i>
 				<span>Penilaian Siswa</span>
 			</a>
 			<ul class="submenu <?php if ($pages == "nilai-akademik") { ?> active <?php } else { ?> <?php } ?>">
 				<li class="submenu-item <?php if ($pages == "nilai-akademik") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=nilai-akademik"><i class="bi bi-chevron-double-right"></i> Nilai Akademik</a>
 				</li>

 			</ul>
 		</li>

 		<li class="sidebar-item  has-sub <?php if ($pages == "pembayaran") { ?> active <?php } else if ($pages == "report-pembayaran") { ?> active <?php } else { ?> <?php } ?>">
 			<a href="#" class='sidebar-link'>
 				<i class="bi bi-cash"></i>
 				<span>Keuangan</span>
 			</a>
 			<ul class="submenu <?php if ($pages == "pembayaran") { ?> active <?php } else if ($pages == "report-pembayaran") { ?> active <?php } else { ?> <?php } ?>">
 				<li class="submenu-item <?php if ($pages == "pembayaran") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=pembayaran"><i class="bi bi-chevron-double-right"></i>Pembayaran</a>
 				</li>
 				<li class="submenu-item <?php if ($pages == "report-pembayaran") { ?> active <?php } else { ?> <?php } ?>">
 					<a href="?pages=report-pembayaran"><i class="bi bi-chevron-double-right"></i> Report</a>
 				</li>
 			</ul>
 		</li>


 		<li class="sidebar-item <?php if ($pages == "dokumen") { ?> active <?php } else { ?> <?php } ?>">
 			<a href="?pages=dokumen" class='sidebar-link'>
 				<i class="bi bi-file-earmark-medical"></i>
 				<span>Dokumen</span>
 			</a>
 		</li>

 		<li class="sidebar-item">
 			<a href="?pages=logout" class='sidebar-link'>
 				<i class="bi bi-power"></i>
 				<span>Logout</span>
 			</a>
 		</li>
 		<!-- <li class="sidebar-item">
 			<a href="?pages=update" class='sidebar-link'>
 				<i class="bi bi-arrow-up-circle-fill"></i>
 				<span>Update</span>
 			</a>
 		</li> -->
 	</ul>
 </div>

 <!-- <script>
     // Get current page and set current in nav
     $(".menu>li").each(function() {
         var navItem = $(this);
         if (navItem.find("li").attr("submenu-item") == location.pathname) {
             navItem.addClass("active");
         }
     });
 </script> -->