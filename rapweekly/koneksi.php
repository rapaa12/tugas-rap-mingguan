<?php
// ==== KONFIGURASI DATABASE (default Laragon) ====
$host = "localhost";
$user = "root";   // default Laragon
$pass = "";       // default Laragon kosong
$db   = "db_mahasiswa";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>