<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "puskesmas");

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
echo "Koneksi ke database BERHASIL!";
?>
