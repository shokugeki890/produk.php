<?php
$user = "user"; 
if ($user == "admin") {
    include "admin.php";
} elseif ($user == "user") {
    include "user.php";
} else {
    echo "Halaman tidak ditemukan.";
}