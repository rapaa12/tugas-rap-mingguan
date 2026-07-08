<?php
// ==== KONFIGURASI DATABASE (default Laragon) ====
$host = "sql103.infinityfree.com";
$user = "if0_42365926";   // default Laragon
$pass = "alahmbohwes1";       // default Laragon kosong
$db   = "if0_42365926_db_mahasiswa";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>