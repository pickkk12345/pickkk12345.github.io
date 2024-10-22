<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses penyimpanan ke database
    $nama_depan = mysqli_real_escape_string($conn, $_POST['nama_depan']);
    $nama_belakang = mysqli_real_escape_string($conn, $_POST['nama_belakang']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $tempat_lahir = mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
    $tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $usia = mysqli_real_escape_string($conn, $_POST['usia']);
    $nama_bank = mysqli_real_escape_string($conn, $_POST['nama_bank']);
    $no_bank = mysqli_real_escape_string($conn, $_POST['no_bank']);
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);
    $jumlah_donasi = mysqli_real_escape_string($conn, $_POST['jumlah_donasi']);  // Perhatikan perubahan ini

    // Handle file uploads
    $gambar_ktp = '';
    $gambar_ijazah = '';
    
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $tmp_ktp = $_FILES['gambar']['tmp_name'];
        $gambar_ktp = basename($_FILES['gambar']['name']);
        move_uploaded_file($tmp_ktp, "uploads/" . $gambar_ktp);
    }
    
    if (isset($_FILES['gambar2']) && $_FILES['gambar2']['error'] == UPLOAD_ERR_OK) {
        $tmp_ijazah = $_FILES['gambar2']['tmp_name'];
        $gambar_ijazah = basename($_FILES['gambar2']['name']);
        move_uploaded_file($tmp_ijazah, "uploads/" . $gambar_ijazah);
    }

    $sql = "INSERT INTO donasi (nama_depan, nama_belakang, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_hp, usia, gambar_ktp, gambar_ijazah, nama_bank, no_bank, pesan, jumlah_donasi)
            VALUES ('$nama_depan', '$nama_belakang', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_hp', '$usia', '$gambar_ktp', '$gambar_ijazah', '$nama_bank', '$no_bank', '$pesan', '$jumlah_donasi')";

    if (mysqli_query($conn, $sql)) {
        header("Location: list_donasi.php");
        exit();
    } else {
        echo "<h2>Error: Data tidak berhasil disimpan ke database.</h2>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        error_log("Database Error: " . mysqli_error($conn), 0);
    }

    mysqli_close($conn);

    // Menampilkan data yang diinput
    echo "<p>Nama Depan: " . htmlspecialchars($_POST['nama_depan']) . "</p>";
    echo "<p>Nama Belakang: " . htmlspecialchars($_POST['nama_belakang']) . "</p>";
    echo "<p>Jenis Kelamin: " . htmlspecialchars($_POST['jenis_kelamin']) . "</p>";
    echo "<p>Tempat Lahir: " . htmlspecialchars($_POST['tempat_lahir']) . "</p>";
    echo "<p>Tanggal Lahir: " . htmlspecialchars($_POST['tanggal_lahir']) . "</p>";
    echo "<p>Alamat Lengkap: " . nl2br(htmlspecialchars($_POST['alamat'])) . "</p>";
    echo "<p>Nomor Telepon: " . htmlspecialchars($_POST['no_hp']) . "</p>";
    echo "<p>Usia: " . htmlspecialchars($_POST['usia']) . "</p>";

    if ($gambar_ktp) {
        echo "<p>Fotokopi KTP: " . htmlspecialchars($gambar_ktp) . "</p>";
    }
    if ($gambar_ijazah) {
        echo "<p>Fotokopi Ijazah SMA: " . htmlspecialchars($gambar_ijazah) . "</p>";
    }
    
    echo "<div class='section-divider'><span>Data Pengiriman Dana</span></div>";
    echo "<p>Nama Bank: " . htmlspecialchars($_POST['nama_bank']) . "</p>";
    echo "<p>No Bank: " . htmlspecialchars($_POST['no_bank']) . "</p>";
    
    echo "<p>Pesan atau Doa untuk Sumbangan: " . nl2br(htmlspecialchars($_POST['pesan'])) . "</p>";
    
    echo "<p>Jumlah Donasi: Rp " . htmlspecialchars($_POST['jumlah_donasi']) . "</p>";
}
?>