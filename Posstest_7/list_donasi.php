<?php
include 'koneksi.php';
include 'auth.php';
requireLogin();

// Cek apakah form pencarian di-submit
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query untuk mencari berdasarkan nama_depan
$sql = "SELECT * FROM donasi";
if ($search) {
    $sql .= " WHERE nama_depan LIKE '%" . mysqli_real_escape_string($conn, $search) . "%'";
}
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

        <!-- Form Pencarian -->
        <form method="GET" action="list_donasi.php">
            <input type="text" name="search" placeholder="Cari berdasarkan nama depan" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Cari</button>
        </form>

        <table>
            <tr>
                <th>ID</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Jumlah Donasi</th>
                <th>Aksi</th>
            </tr>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td data-label="ID"><?php echo $row['id']; ?></td>
                        <td data-label="Nama Depan"><?php echo $row['nama_depan']; ?></td>
                        <td data-label="Nama Belakang"><?php echo $row['nama_belakang']; ?></td>
                        <td data-label="Jumlah Donasi">Rp <?php echo number_format($row['jumlah_donasi'], 0, ',', '.'); ?></td>
                        <td data-label="Aksi">
                            <a href="edit_donasi.php?id=<?php echo $row['id']; ?>" class="btn-action btn-edit">Edit</a>
                            <a href="delete_donasi.php?id=<?php echo $row['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Data tidak ditemukan</td>
                </tr>
            <?php endif; ?>
        </table>

        <a href="index.html" class="btn-kembali">Kembali ke Beranda</a>
    </div>
</body>
</html>
