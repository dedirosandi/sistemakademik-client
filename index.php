<?php
$pages = $_GET["pages"];
include_once "env/connection.php";
// include_once "env/excel_reader2.php";
include "env/session.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> SMK INFORMATIKA CIPUTAT </title>
	<?php include "layout/style.php" ?>
</head>

<body>
	<div id="app">
		<div id="sidebar" class="active">
			<div class="sidebar-wrapper active">
				<div class="sidebar-header position-relative">
					<div class="d-flex justify-content-between align-items-center">
						<div class="logo">
							<a href="?pages=dashboard">Dashboard</a>
						</div>
						<div class="theme-toggle d-flex gap-2  align-items-center mt-2">
							<div class="form-check form-switch fs-6">
								<input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
								<label class="form-check-label"></label>
							</div>
						</div>
						<div class="sidebar-toggler x">
							<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
						</div>
					</div>
				</div>
				<!-- Sidebar Menu -->
				<?php if ($_SESSION["role"] == "siswa") { ?>
					<?php include "layout/sidebar-menu-siswa.php" ?>
				<?php } else if ($_SESSION["role"] == "admin") { ?>
					<?php include "layout/sidebar-menu-admin.php" ?>
				<?php } ?>

			</div>
		</div>
		<div id="main">
			<header class="mb-3">
				<a href="#" class="burger-btn d-block d-xl-none">
					<i class="bi bi-justify fs-3"></i>
				</a>
			</header>


			<div class="page-content">
				<?php
				$pages = @$_GET['pages'];
				$act = @$_GET['act'];
				$sub = @$_GET['sub'];

				if ($pages == "dashboard") {
					if ($_SESSION["role"] == "admin") {
						include "pages/dashboard/view/view-dashboard-admin.php";
					} elseif ($_SESSION["role"] == "siswa") {
						include "pages/dashboard/view/view-dashboard-siswa.php";
					}
				} else if ($pages == "kurikulum") {
					if ($act == "") {
						include "pages/data-master/kurikulum/view/view-kurikulum.php";
					} else if ($act == "tambah-kurikulum") {
						include "pages/data-master/kurikulum/view/view-tambah-kurikulum.php";
					} else if ($act == "proses-tambah-kurikulum") {
						include "pages/data-master/kurikulum/proses/proses-tambah-kurikulum.php";
					} else if ($act == "status-kurikulum") {
						include "pages/data-master/kurikulum/proses/proses-status-kurikulum.php";
					} else if ($act == "edit-kurikulum") {
						include "pages/data-master/kurikulum/view/view-edit-kurikulum.php";
					} else if ($act == "proses-edit-kurikulum") {
						include "pages/data-master/kurikulum/proses/proses-edit-kurikulum.php";
					} else if ($act == "proses-hapus-kurikulum") {
						include "pages/data-master/kurikulum/proses/proses-hapus-kurikulum.php";
					}
				} else if ($pages == "tahun-akademik") {
					if ($act == "") {
						include "pages/data-master/tahun-akademik/view/view-tahun-akademik.php";
					} else if ($act == "tambah-tahun-akademik") {
						include "pages/data-master/tahun-akademik/view/view-tambah-tahun-akademik.php";
					} else if ($act == "proses-tambah-tahun-akademik") {
						include "pages/data-master/tahun-akademik/proses/proses-tambah-tahun-akademik.php";
					} else if ($act == "status-tahun-akademik") {
						include "pages/data-master/tahun-akademik/proses/proses-status-tahun-akademik.php";
					} else if ($act == "edit-tahun-akademik") {
						include "pages/data-master/tahun-akademik/view/view-edit-tahun-akademik.php";
					} else if ($act == "proses-edit-tahun-akademik") {
						include "pages/data-master/tahun-akademik/proses/proses-edit-tahun-akademik.php";
					} else if ($act == "proses-hapus-tahun-akademik") {
						include "pages/data-master/tahun-akademik/proses/proses-hapus-tahun-akademik.php";
					}
				} else if ($pages == "gedung") {
					if ($act == "") {
						include "pages/data-master/gedung/view/view-gedung.php";
					} else if ($act == "tambah-gedung") {
						include "pages/data-master/gedung/view/view-tambah-gedung.php";
					} else if ($act == "proses-tambah-gedung") {
						include "pages/data-master/gedung/proses/proses-tambah-gedung.php";
					} else if ($act == "status-gedung") {
						include "pages/data-master/gedung/proses/proses-status-gedung.php";
					} else if ($act == "edit-gedung") {
						include "pages/data-master/gedung/view/view-edit-gedung.php";
					} else if ($act == "proses-edit-gedung") {
						include "pages/data-master/gedung/proses/proses-edit-gedung.php";
					} else if ($act == "proses-hapus-gedung") {
						include "pages/data-master/gedung/proses/proses-hapus-gedung.php";
					}
				} else if ($pages == "ruangan") {
					if ($act == "") {
						include "pages/data-master/ruangan/view/view-ruangan.php";
					} else if ($act == "tambah-ruangan") {
						include "pages/data-master/ruangan/view/view-tambah-ruangan.php";
					} else if ($act == "proses-tambah-ruangan") {
						include "pages/data-master/ruangan/proses/proses-tambah-ruangan.php";
					} else if ($act == "status-ruangan") {
						include "pages/data-master/ruangan/proses/proses-status-ruangan.php";
					} else if ($act == "edit-ruangan") {
						include "pages/data-master/ruangan/view/view-edit-ruangan.php";
					} else if ($act == "proses-edit-ruangan") {
						include "pages/data-master/ruangan/proses/proses-edit-ruangan.php";
					} else if ($act == "proses-hapus-ruangan") {
						include "pages/data-master/ruangan/proses/proses-hapus-ruangan.php";
					}
				} else if ($pages == "kelas") {
					if ($act == "") {
						include "pages/data-master/kelas/view/view-kelas.php";
					} else if ($act == "tambah-kelas") {
						include "pages/data-master/kelas/view/view-tambah-kelas.php";
					} else if ($act == "tampil-kelas") {
						include "pages/data-master/kelas/view/view-tampil-kelas.php";
					} else if ($act == "proses-tambah-kelas") {
						include "pages/data-master/kelas/proses/proses-tambah-kelas.php";
					} else if ($act == "status-kelas") {
						include "pages/data-master/kelas/proses/proses-status-kelas.php";
					} else if ($act == "edit-kelas") {
						include "pages/data-master/kelas/view/view-edit-kelas.php";
					} else if ($act == "proses-edit-kelas") {
						include "pages/data-master/kelas/proses/proses-edit-kelas.php";
					} else if ($act == "proses-hapus-kelas") {
						include "pages/data-master/kelas/proses/proses-hapus-kelas.php";
					}
				} else if ($pages == "jurusan") {
					if ($act == "") {
						include "pages/data-master/jurusan/view/view-jurusan.php";
					} else if ($act == "tambah-jurusan") {
						include "pages/data-master/jurusan/view/view-tambah-jurusan.php";
					} else if ($act == "proses-tambah-jurusan") {
						include "pages/data-master/jurusan/proses/proses-tambah-jurusan.php";
					} else if ($act == "status-jurusan") {
						include "pages/data-master/jurusan/proses/proses-status-jurusan.php";
					} else if ($act == "edit-jurusan") {
						include "pages/data-master/jurusan/view/view-edit-jurusan.php";
					} else if ($act == "proses-edit-jurusan") {
						include "pages/data-master/jurusan/proses/proses-edit-jurusan.php";
					} else if ($act == "proses-hapus-jurusan") {
						include "pages/data-master/jurusan/proses/proses-hapus-jurusan.php";
					}
				} else if ($pages == "jadwal-pelajaran") {
					if ($act == "") {
						include "pages/data-akademik/jadwal-pelajaran/view/view-jadwal-pelajaran.php";
					} else if ($act == "tambah-jadwal-pelajaran") {
						include "pages/data-akademik/jadwal-pelajaran/view/view-tambah-jadwal-pelajaran.php";
					} else if ($act == "detail-jadwal-pelajaran") {
						include "pages/data-akademik/jadwal-pelajaran/view/view-detail-jadwal-pelajaran.php";
					} else if ($act == "proses-tambah-jadwal-pelajaran") {
						include "pages/data-akademik/jadwal-pelajaran/proses/proses-tambah-jadwal-pelajaran.php";
					} else if ($act == "status-jadwal-pelajaran") {
						include "pages/data-akademik/jadwal-pelajaran/proses/proses-status-jadwal-pelajaran.php";
					} else if ($act == "edit-jadwal-pelajaran") {
						include "pages/data-akademik/jadwal-pelajaran/view/view-edit-jadwal-pelajaran.php";
					} else if ($act == "proses-edit-jadwal-pelajaran") {
						include "pages/data-akademik/jadwal-pelajaran/proses/proses-edit-jadwal-pelajaran.php";
					} else if ($act == "proses-upload-jadwal-pelajaran") {
						include "pages/data-akademik/jadwal-pelajaran/proses/proses-upload-jadwal-pelajaran.php";
					} else if ($act == "proses-input-guru-pelajaran") {
						include "pages/data-akademik/jadwal-pelajaran/proses/proses-input-guru-pelajaran.php";
					}
				} else if ($pages == "jadwal-pelajaran-2") {
					if ($act == "") {
						include "pages/data-akademik/jadwal-pelajaran-2/view/view-jadwal-pelajaran-2.php";
					} else if ($act == "tambah-jadwal-pelajaran-2") {
						include "pages/data-akademik/jadwal-pelajaran-2/view/view-tambah-jadwal-pelajaran-2.php";
					} else if ($act == "detail-jadwal-pelajaran-2") {
						include "pages/data-akademik/jadwal-pelajaran-2/view/view-detail-jadwal-pelajaran-2.php";
					} else if ($act == "tampil-jadwal-pelajaran-2") {
						include "pages/data-akademik/jadwal-pelajaran-2/view/view-tampil-jadwal-pelajaran-2.php";
					} else if ($act == "proses-tambah-jadwal-pelajaran-2") {
						include "pages/data-akademik/jadwal-pelajaran-2/proses/proses-tambah-jadwal-pelajaran-2.php";
					} else if ($act == "status-jadwal-pelajaran-2") {
						include "pages/data-akademik/jadwal-pelajaran-2/proses/proses-status-jadwal-pelajaran-2.php";
					} else if ($act == "edit-jadwal-pelajaran-2") {
						include "pages/data-akademik/jadwal-pelajaran-2/view/view-edit-jadwal-pelajaran-2.php";
					} else if ($act == "proses-edit-jadwal-pelajaran-2") {
						include "pages/data-akademik/jadwal-pelajaran-2/proses/proses-edit-jadwal-pelajaran-2.php";
					} else if ($act == "proses-hapus-jadwal-pelajaran-2") {
						include "pages/data-akademik/jadwal-pelajaran-2/proses/proses-hapus-jadwal-pelajaran-2.php";
					}
				} else if ($pages == "mata-pelajaran") {
					if ($act == "") {
						include "pages/data-akademik/mata-pelajaran/view/view-mata-pelajaran.php";
					} else if ($act == "tambah-mata-pelajaran") {
						include "pages/data-akademik/mata-pelajaran/view/view-tambah-mata-pelajaran.php";
					} else if ($act == "proses-tambah-mata-pelajaran") {
						include "pages/data-akademik/mata-pelajaran/proses/proses-tambah-mata-pelajaran.php";
					} else if ($act == "status-mata-pelajaran") {
						include "pages/data-akademik/mata-pelajaran/proses/proses-status-mata-pelajaran.php";
					} else if ($act == "edit-mata-pelajaran") {
						include "pages/data-akademik/mata-pelajaran/view/view-edit-mata-pelajaran.php";
					} else if ($act == "detail-mata-pelajaran") {
						include "pages/data-akademik/mata-pelajaran/view/view-detail-mata-pelajaran.php";
					} else if ($act == "proses-edit-mata-pelajaran") {
						include "pages/data-akademik/mata-pelajaran/proses/proses-edit-mata-pelajaran.php";
					} else if ($act == "proses-tambah-guru-pelajaran") {
						include "pages/data-akademik/mata-pelajaran/proses/proses-tambah-guru-pelajaran.php";
					} else if ($act == "proses-hapus-mata-pelajaran") {
						include "pages/data-akademik/mata-pelajaran/proses/proses-hapus-mata-pelajaran.php";
					} else if ($act == "proses-hapus-guru-pelajaran") {
						include "pages/data-akademik/mata-pelajaran/proses/proses-hapus-guru-pelajaran.php";
					}
				} else if ($pages == "pembayaran") {
					if ($_SESSION["role"] == "admin") {
						if ($act == "") {
							include "pages/keuangan/pembayaran/view/view-pembayaran.php";
						} else if ($act == "tambah-pembayaran") {
							include "pages/keuangan/pembayaran/view/view-tambah-pembayaran.php";
						} else if ($act == "tambah-pembayaran-multiple") {
							include "pages/keuangan/pembayaran/view/view-tambah-pembayaran-multiple.php";
						} else if ($act == "tampil-pembayaran") {
							include "pages/keuangan/pembayaran/view/view-tampil-pembayaran.php";
						} else if ($act == "tambah-pembayaran") {
							include "pages/keuangan/pembayaran/view/view-tambah-pembayaran.php";
						} else if ($act == "proses-tambah-pembayaran") {
							include "pages/keuangan/pembayaran/proses/proses-tambah-pembayaran.php";
						} else if ($act == "hapus-pembayaran") {
							include "pages/keuangan/pembayaran/proses/proses-hapus-pembayaran.php";
						}
					} elseif ($_SESSION["role"] == "siswa") {
						if ($act == "") {
							include "pages/keuangan/pembayaran-siswa/view/view-pembayaran-siswa.php";
						} else if ($act == "detail-pembayaran-siswa") {
							include "pages/keuangan/pembayaran-siswa/view/view-detail-pembayaran-siswa.php";
						} else if ($act == "tampil-pembayaran-siswa") {
							include "pages/keuangan/pembayaran-siswa/view/view-tampil-pembayaran-siswa.php";
						} else if ($act == "proses-pembayaran-siswa") {
							include "pages/keuangan/pembayaran-siswa/proses/proses-pembayaran-siswa.php";
						}
					}
				} else if ($pages == "report-pembayaran") {
					if ($act == "") {
						include "pages/report/pembayaran/view/view-report-pembayaran.php";
					} else if ($act == "tambah-guru") {
						include "pages/data-user/guru/view/view-tambah-guru.php";
					} else if ($act == "detail-guru") {
						include "pages/data-user/guru/view/view-detail-guru.php";
					}
				} else if ($pages == "guru") {
					if ($act == "") {
						include "pages/data-user/guru/view/view-guru.php";
					} else if ($act == "tambah-guru") {
						include "pages/data-user/guru/view/view-tambah-guru.php";
					} else if ($act == "detail-guru") {
						include "pages/data-user/guru/view/view-detail-guru.php";
					} else if ($act == "proses-tambah-guru") {
						include "pages/data-user/guru/proses/proses-tambah-guru.php";
					} else if ($act == "status-guru") {
						include "pages/data-user/guru/proses/proses-status-guru.php";
					} else if ($act == "edit-guru") {
						include "pages/data-user/guru/view/view-edit-guru.php";
					} else if ($act == "proses-edit-guru") {
						include "pages/data-user/guru/proses/proses-edit-guru.php";
					}
				} else if ($pages == "siswa") {
					if ($act == "") {
						include "pages/data-user/siswa/view/view-siswa.php";
					} else if ($act == "tambah-siswa") {
						include "pages/data-user/siswa/view/view-tambah-siswa.php";
					} else if ($act == "detail-siswa") {
						include "pages/data-user/siswa/view/view-detail-siswa.php";
					} else if ($act == "tampil-siswa") {
						include "pages/data-user/siswa/view/view-tampil-siswa.php";
					} else if ($act == "proses-tambah-siswa") {
						include "pages/data-user/siswa/proses/proses-tambah-siswa.php";
					} else if ($act == "status-siswa") {
						include "pages/data-user/siswa/proses/proses-status-siswa.php";
					} else if ($act == "edit-siswa") {
						include "pages/data-user/siswa/view/view-edit-siswa.php";
					} else if ($act == "proses-edit-siswa") {
						include "pages/data-user/siswa/proses/proses-edit-siswa.php";
					}
				} else if ($pages == "admin") {
					if ($act == "") {
						include "pages/data-user/admin/view/view-admin.php";
					} else if ($act == "tambah-admin") {
						include "pages/data-user/admin/view/view-tambah-admin.php";
					} else if ($act == "proses-status-admin") {
						include "pages/data-user/admin/prosess/proses-status-admin.php";
					} else if ($act == "proses-tambah-admin") {
						include "pages/data-user/admin/prosess/proses-tambah-admin.php";
					}
				} else if ($pages == "kepala-sekolah") {
					if ($act == "") {
						include "pages/data-user/kepala-sekolah/view/view-kepala-sekolah.php";
					} else if ($act == "tambah-kepala-sekolah") {
						include "pages/data-user/kepala-sekolah/view/view-tambah-kepala-sekolah.php";
					} else if ($act == "edit-kepala-sekolah") {
						include "pages/data-user/kepala-sekolah/view/view-edit-kepala-sekolah.php";
					} else if ($act == "proses-tambah-kepala-sekolah") {
						include "pages/data-user/kepala-sekolah/proses/proses-tambah-kepala-sekolah.php";
					} else if ($act == "proses-edit-kepala-sekolah") {
						include "pages/data-user/kepala-sekolah/proses/proses-edit-kepala-sekolah.php";
					}
				} elseif ($pages == "update") {
					if ($act == "") {
						include "pages/message-dev/view/view-message-dev.php";
					} else if ($act == "update-terbaru") {
						include "pages/message-dev/view/view-tambah-message-dev.php";
					} else if ($act == "proses-update-terbaru") {
						include "pages/message-dev/proses/proses-tambah-message-dev.php";
					}
				} elseif ($pages == "dokumen") {
					if ($act == "") {
						include "pages/dokumen/view/view-dokumen.php";
					} else if ($act == "tambah-dokumen") {
						include "pages/dokumen/view/view-tambah-dokumen.php";
					} else if ($act == "proses-tambah-dokumen") {
						include "pages/dokumen/proses/proses-tambah-dokumen.php";
					} else if ($act == "hapus-dokumen") {
						include "pages/dokumen/proses/proses-hapus-dukumen.php";
					}
				} elseif ($pages == "logout") {
					include "auth/logout.php";
				} elseif ($pages == "") {
					if ($_SESSION["role"] == "admin") {
						include "pages/dashboard/view/view-dashboard-admin.php";
					} elseif ($_SESSION["role"] == "siswa") {
						include "pages/dashboard/view/view-dashboard-siswa.php";
					}
				} else {
					include "pages/error-page/404.php";
				}
				?>



			</div>

		</div>
	</div>
	<!-- Js -->
	<?php include "layout/script.php" ?>


</body>

</html>