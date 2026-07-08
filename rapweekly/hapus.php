<?php
include "koneksi.php";

// Mengambil ID data yang ingin dihapus dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
    // FUNGSI HAPUS: Eksekusi perintah DELETE
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
}

// Setelah selesai menghapus, langsung kembali ke tabel utama
header("Location: Mahasiswa.php?pesan=hapus");
exit;
?>