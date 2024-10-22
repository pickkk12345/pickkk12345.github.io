<?php
include 'koneksi.php';
include 'auth.php';
requireLogin(); 

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM donasi WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_depan = mysqli_real_escape_string($conn, $_POST['nama_depan']);
    $nama_belakang = mysqli_real_escape_string($conn, $_POST['nama_belakang']);
    $jumlah_donasi = mysqli_real_escape_string($conn, $_POST['jumlah_donasi']);

    $sql = "UPDATE donasi SET nama_depan='$nama_depan', nama_belakang='$nama_belakang', jumlah_donasi='$jumlah_donasi' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: list_donasi.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donasi</title>
    <link rel="stylesheet" href="formulir.css">
</head>
<body>
    <div class="form-container">
        <h1>Edit Donasi</h1>
        <form action="edit_donasi.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" id="nama_depan" value="<?php echo $row['nama_depan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" name="nama_belakang" id="nama_belakang" value="<?php echo $row['nama_belakang']; ?>">
            </div>
            <div class="form-group">
                <label for="jumlah_donasi">Jumlah Donasi (Rp)</label>
                <input type="number" name="jumlah_donasi" id="jumlah_donasi" value="<?php echo $row['jumlah_donasi']; ?>" required>
            </div>
            <button type="submit" class="btn-submit">Update</button>
            <a href="list_donasi.php" class="btn-kembali">Kembali</a>
        </form>
    </div>
</body>
</html>