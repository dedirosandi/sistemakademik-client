<?php

namespace Midtrans;

require_once dirname(__FILE__) . '../../../../../midtrans/Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-tcXDZlvYZ7pfEq15N6GpUwpG';
Config::$clientKey = 'SB-Mid-client-dQeH8O3ZtfWLyUgM';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

include "../../../../env/connection.php";
$order_id = $_GET["order_id"];


$query = "SELECT * FROM tb_transaksi_pembayaran WHERE order_id='" . $order_id . "'";
$sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql);
$id_pembayaran = $data['id_pembayaran'];
$GetPembayaran = query("SELECT * FROM tb_pembayaran WHERE id='$id_pembayaran'")[0];
$tahun_akademik = $GetPembayaran['tahun_akademik'];
$kelas = $GetPembayaran['kelas'];

$nominal = $data['nominal_pembayaran'];
$nama_pembayaran = $data['nama_pembayaran'];
$nama_user = $data['nama_user'];

$GetUser = query("SELECT * FROM tb_user WHERE id='$nama_user'")[0];
$GetInfoUser = query("SELECT * FROM tb_info_siswa WHERE id_user='$nama_user'")[0];



$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' =>  $nominal, // no decimal allowed for creditcard
);
// Optional
$item_details = array(
    array(
        'id' => $order_id,
        'price' => $nominal,
        'quantity' => 1,
        'name' => $nama_pembayaran,
    ),
);
// Optional
$customer_details = array(
    'first_name'    => $GetUser["nama"],
    'email'         => $GetInfoUser["alamat_email"],
    'phone'         => $GetInfoUser["no_tlp"],
);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);


$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
} catch (\Exception $e) {
    // echo $e->getMessage();
    echo "  <script>
    		    document.location.href='/?pages=pembayaran&act=tampil-pembayaran-siswa&id_tahun_akademik=$tahun_akademik&id_kelas=$kelas';
    	    	</script>";
}


function printExampleWarningMessage()
{
    if (strpos(Config::$serverKey, 'your ') != false) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<server key>\';');
        die();
    }
}

?>
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="?pages=pembayaran&act=tampil-pembayaran-siswa&id_tahun_akademik=<?= $tahun_akademik ?>&id_kelas=<?= $kelas ?>" class="btn btn-success"> Kembali</a>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Pembayaran</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pembayaran</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card shadow">
        <div class="card-header">
            <span class="badge bg-danger">Proses Pembayaran</span>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No. Transaksi</th>
                        <th>Nama Pembayaran</th>
                        <th>Nominal Pembayaran</th>
                        <th>Tanggal Pembayaran</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $order_id ?></td>
                        <td><?= $data['nama_pembayaran']; ?></td>
                        <td>Rp.<?= number_format($data['nominal_pembayaran'], 0, ',', '.'); ?></td>
                        <td><?= $data['tanggal']; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="card text-white bg-primary" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-white">Total : Rp.<?= number_format($data['nominal_pembayaran'], 0, ',', '.'); ?></h5>

                    <button id="pay-button" class="btn btn-success"> Bayar Sekarang</button>
                    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
                    <script type="text/javascript">
                        document.getElementById('pay-button').onclick = function() {
                            // SnapToken acquired from previous step
                            snap.pay('<?php echo $snap_token ?>');
                        };
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>