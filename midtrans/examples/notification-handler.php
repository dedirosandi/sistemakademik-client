<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for sample HTTP notifications: proses-notification-handler-pembayaran-siswa.php
// https://docs.midtrans.com/en/after-payment/http-notification?id=sample-of-different-payment-channels

namespace Midtrans;

require_once dirname(__FILE__) . '../../../midtrans/Midtrans.php';


Config::$isProduction = false;
// Config::$serverKey = '<Server Key>';
Config::$serverKey = 'SB-Mid-server-tcXDZlvYZ7pfEq15N6GpUwpG';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

try {
    $notif = new Notification();
} catch (\Exception $e) {
    exit($e->getMessage());
}

$notif = $notif->getResponse();
$transaction = $notif->transaction_status;
$transaction_id = $notif->transaction_id;

// var_dump($transaction_id);
// die;

$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;


require_once dirname(__FILE__) . '../../../env/connection.php';

if ($transaction == 'settlement') {
    // mysqli_query($koneksi, "update tb_transaksi_pembayaran set transaction_status='3' , transaction_id='$transaction_id' where order_id='$order_id'");
    mysqli_query($koneksi, "UPDATE tb_transaksi_pembayaran SET transaction_status='3', transaction_id='$transaction_id', metode_pembayaran='$type' WHERE order_id = '$order_id'");
} else if ($transaction == 'pending') {
    mysqli_query($koneksi, "update tb_transaksi_pembayaran set transaction_status='2', transaction_id='$transaction_id', metode_pembayaran='$type' where order_id='$order_id'");
} else if ($transaction == 'deny') {
    mysqli_query($koneksi, "update tb_transaksi_pembayaran set transaction_status='1', transaction_id='$transaction_id' where order_id='$order_id'");
} else if ($transaction == 'expire') {
    mysqli_query($koneksi, "update tb_transaksi_pembayaran set transaction_status='1', transaction_id='$transaction_id' where order_id='$order_id'");
} else if ($transaction == 'cancel') {
    mysqli_query($koneksi, "update tb_transaksi_pembayaran set transaction_status='1', transaction_id='$transaction_id' where order_id='$order_id'");
}

function printExampleWarningMessage()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo 'Notification-handler are not meant to be opened via browser / GET HTTP method. It is used to handle Midtrans HTTP POST notification / webhook.';
    }
    if (strpos(Config::$serverKey, 'your ') != false) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<Server Key>\';');
        die();
    }
}
