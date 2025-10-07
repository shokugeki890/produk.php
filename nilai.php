<?php
$nilai = 91;

switch ($nilai) {
    case ($nilai >90):
        echo "Luar Biasa";
        break;
    case ($nilai > 80):
        echo "Baik";
        break;
    case ($nilai >70):
        echo "Cukup";
        break;
    case ($nilai<=70):
        echo "Kurang";
        break;
    default:
        echo "Gagal";
        break;
}
?>