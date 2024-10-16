<?php
include 'koneksi.php';

$sql = "SELECT * FROM donasi";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Donasi</title>
    <link rel="stylesheet" href="formulir.css">
</head>
<body>
    <div class="form-container">
        <h1>Daftar Donasi</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jumlah Donasi</th>
                <th>Aksi</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td data-label="ID"><?php echo $row['id']; ?></td>
                <td data-label="Nama"><?php echo $row['nama_depan'] . ' ' . $row['nama_belakang']; ?></td>
                <td data-label="Jumlah Donasi">Rp <?php echo number_format($row['jumlah_donasi'], 0, ',', '.'); ?></td>
                <td data-label="Aksi">
                    <a href="edit_donasi.php?id=<?php echo $row['id']; ?>" class="btn-action btn-edit">Edit</a>
                    <a href="delete_donasi.php?id=<?php echo $row['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <a href="index.html" class="btn-kembali">Kembali ke Beranda</a>
    </div>
</body>
</html>