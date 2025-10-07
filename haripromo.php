<?php
$hari = "Sabtu";

switch ($hari) {
    case "Jumat":
        echo "Diskon 15% untuk semua produk!";
        break;
    case "Sabtu":
    case "Minggu":
        echo "Nikmati promo Beli 1 Gratis 1!";
        break;
    default:
        echo "Belum ada promo hari ini.";
        break;
}
?>