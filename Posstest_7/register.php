<?php
include 'koneksi.php';
session_start();

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    
    // Cek apakah username sudah ada
    $check_username = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if(mysqli_num_rows($check_username) > 0) {
        $error = "Username sudah digunakan!";
    } else {
        // Cek apakah email sudah ada
        $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        if(mysqli_num_rows($check_email) > 0) {
            $error = "Email sudah digunakan!";
        } else {
            // Insert user baru
            $sql = "INSERT INTO users (username, password, email, nama_lengkap) 
                    VALUES ('$username', '$password', '$email', '$nama_lengkap')";
            
            if (mysqli_query($conn, $sql)) {
                $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
                header("Location: login.php");
                exit();
            } else {
                $error = "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - DONASI PALESTINA</title>
    <link rel="stylesheet" href="formulir.css">
</head>
<body>
    <div class="form-container">
        <center><img src="logopales.png" alt=""></center>
        <h1>Registrasi Akun</h1>
        
        <?php if(isset($error)): ?>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="register.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" required>
            </div>

            <center>
                <button type="submit" class="btn-submit">Daftar</button>
                <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
                <button><a href="index.html" class="btn-kembali">Kembali ke Beranda</a></button>
            </center>
        </form>
    </div>
</body>
</html>