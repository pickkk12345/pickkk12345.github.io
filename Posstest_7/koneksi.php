<?php
$host = "localhost";  // atau alamat server database Anda
$user = "root";   // ganti dengan username database Anda
$pass = "";   // ganti dengan password database Anda
$db   = "donasi_palestina";  // ganti dengan nama database Anda

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil";
}

?>