<?php
include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0 30px; }
        h1 { text-align: center; }
        table.nav { margin: 0 auto 20px auto; border-collapse: collapse; }
        table.nav td { border: 1px solid #333; padding: 8px 14px; }
        table.nav a { text-decoration: none; color: #06c; }
        table.data { border-collapse: collapse; width: 100%; }
        table.data th, table.data td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        table.data th { background: #e9e9e9; }
        .btn { padding: 5px 12px; text-decoration: none; border-radius: 4px; color: #fff; font-size: 13px; }
        .btn-tambah { background: #2d7dfd; display: inline-block; margin-bottom: 15px; }
        .btn-edit { background: #f0ad4e; margin-right: 5px; }
        .btn-hapus { background: #d9534f; }
        .alert { padding: 10px; background: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 15px; }
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

    <h2>Data Mahasiswa</h2>

    <?php if (isset($_GET['pesan'])): ?>
        <div class="alert">Data berhasil diproses.</div>
    <?php endif; ?>

    <a href="tambah.php" class="btn btn-tambah">+ Tambah Data</a>

    <table class="data">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Email</th>
            <th>Nomor Whatsapp</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; ?>
        <?php while ($data = mysqli_fetch_assoc($query)): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($data['nama']) ?></td>
            <td><?= htmlspecialchars($data['nim']) ?></td>
            <td><?= htmlspecialchars($data['prodi'] ?? '') ?></td>
            <td><?= htmlspecialchars($data['email'] ?? '') ?></td>
            <td><?= htmlspecialchars($data['no_hp'] ?? '') ?></td>
            <td>
                <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $data['id'] ?>"
                   class="btn btn-hapus"
                   onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>