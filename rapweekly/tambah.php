<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nim   = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $wa    = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

    $sql = "INSERT INTO mahasiswa (nama, nim, prodi, email, no_hp)
            VALUES ('$nama', '$nim', '$prodi', '$email', '$wa')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: Mahasiswa.php?pesan=sukses");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; }
        h1 { text-align: center; }
        table.nav { margin: 0 auto 20px auto; border-collapse: collapse; }
        table.nav td { border: 1px solid #333; padding: 8px 14px; }
        table.nav a { text-decoration: none; color: #06c; }
        form { max-width: 450px; margin: 0 auto; background: #f5f5f5; padding: 20px; border-radius: 6px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 8px 16px; background: #2d7dfd; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>SELAMAT DATANG</h1>

    <table border="1" align="center" cellspacing="0" class="nav">
        <tr>
            <td><a href="index.php">home</a></td>
            <td><a href="indeks.php">main</a></td>
            <td><a href="Profil.php">profile</a></td>
            <td><a href="kisah.php">cerita</a></td>
            <td><a href="Mahasiswa.php">Data Mahasiswa</a></td>
            <td><a href="tambah.php">Form Mahasiswa</a></td>
        </tr>
    </table>

    <h2 style="text-align:center;">Tambah Data Mahasiswa</h2>

    <form action="tambah.php" method="POST">
        <label>Nama</label>
        <input type="text" name="nama" value="" required>

        <label>NIM</label>
        <input type="text" name="nim" value="" required>

        <label>Program Studi</label>
        <input type="text" name="prodi" value="" required>

        <label>Email</label>
        <input type="email" name="email" value="" required>

        <label>Nomor Whatsapp</label>
        <input type="text" name="no_hp" value="" required>

        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>