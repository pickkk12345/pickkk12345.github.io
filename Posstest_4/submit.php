<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Data yang Anda Masukkan:</h2>";
    
    // Menampilkan data pribadi
    echo "<p>Nama Depan: " . htmlspecialchars($_POST['nama_depan']) . "</p>";
    echo "<p>Nama Belakang: " . htmlspecialchars($_POST['nama_belakang']) . "</p>";
    echo "<p>Jenis Kelamin: " . htmlspecialchars($_POST['jenis_kelamin']) . "</p>";
    echo "<p>Tempat Lahir: " . htmlspecialchars($_POST['tempat_lahir']) . "</p>";
    echo "<p>Tanggal Lahir: " . htmlspecialchars($_POST['tanggal_lahir']) . "</p>";
    echo "<p>Alamat Lengkap: " . nl2br(htmlspecialchars($_POST['alamat'])) . "</p>";
    echo "<p>Nomor Telepon: " . htmlspecialchars($_POST['no_hp']) . "</p>";
    echo "<p>Usia: " . htmlspecialchars($_POST['usia']) . "</p>";

    // Menampilkan file yang diupload
    if (isset($_FILES['gambar'])) {
        $file_ktp = $_FILES['gambar']['name'];
        echo "<p>Fotokopi KTP: " . htmlspecialchars($file_ktp) . "</p>";
    }

    if (isset($_FILES['gambar2'])) {
        $file_ijazah = $_FILES['gambar2']['name'];
        echo "<p>Fotokopi Ijazah SMA: " . htmlspecialchars($file_ijazah) . "</p>";
    }

    // Menampilkan data pengiriman dana
    echo "<div class='section-divider'><span>Data Pengiriman Dana</span></div>";
    echo "<p>Nama Bank: " . htmlspecialchars($_POST['nama_bank']) . "</p>";
    echo "<p>No Bank: " . htmlspecialchars($_POST['no_bank']) . "</p>";
    
    echo "<p>Pesan atau Doa untuk Sumbangan: " . nl2br(htmlspecialchars($_POST['pesan'])) . "</p>";
    
    echo "<p>Jumlah Donasi: Rp " . htmlspecialchars($_POST['job-select']) . "</p>";
}
?>
    