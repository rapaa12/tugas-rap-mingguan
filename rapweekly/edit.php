<?php
include "koneksi.php";

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    header("Location: Mahasiswa.php");
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: Mahasiswa.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nim   = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $wa    = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

    $sql = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                prodi = '$prodi',
                email = '$email',
                no_hp = '$wa'
            WHERE id = $id";

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
    <title>Edit Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; }
        h1 { text-align: center; }
        table.nav { margin: 0 auto 20px auto; border-collapse: collapse; }
        table.nav td { border: 1px solid #333; padding: 8px 14px; }
        table.nav a { text-decoration: none; color: #06c; }
        form { max-width: 450px; margin: 0 auto; background: #f5f5f5; padding: 20px; border-radius: 6px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { margin-top: 15px; padding: 8px 16px; background: #f0ad4e; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
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
            <td><a href="tambah.php">Tambah Data</a></td>
        </tr>
    </table>

    <h2 style="text-align:center;">Edit Data Mahasiswa</h2>

    <form action="edit.php?id=<?= (int) $id ?>" method="POST">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama'] ?? '') ?>" required>

        <label>NIM</label>
        <input type="text" name="nim" value="<?= htmlspecialchars($data['nim'] ?? '') ?>" required>

        <label>Program Studi</label>
        <input type="text" name="prodi" value="<?= htmlspecialchars($data['prodi'] ?? '') ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>" required>

        <label>Nomor Whatsapp</label>
        <input type="text" name="no_hp" value="<?= htmlspecialchars($data['no_hp'] ?? '') ?>" required>

        <button type="submit" name="simpan">Update</button>
    </form>
</body>
</html>