<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DONASI PALESTINA</title>
    <link rel="stylesheet" href="formulir.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="form-container">
        <center><img src="logopales.png" alt=""></center>
        <h1>Formulir Sumbangan Untuk Palestina</h1>
        
        <p><strong><i>Harap lengkapi formulir di bawah ini untuk Mendonasi.</i></strong></p>
        <form id="lamaranForm" onsubmit="return submitForm(event)" enctype="multipart/form-data">
            <div class="section-divider"><span>1. Data Pribadi</span></div>
            <div class="form-row">
                <div class="form-group">
                    <label for="nama_depan">Nama Depan</label>
                    <input type="text" name="nama_depan" id="nama_depan" required>
                </div>
                <div class="form-group">
                    <label for="nama_belakang">Nama Belakang</label>
                    <input type="text" name="nama_belakang" id="nama_belakang">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" required></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="no_hp">Nomor Telepon</label>
                    <input type="text" name="no_hp" id="no_hp" required>
                </div>
                <div class="form-group">
                    <label for="usia">Usia</label>
                    <input type="number" name="usia" id="usia" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="gambar">Unggah Fotokopi KTP</label>
                    <input type="file" id="gambar" name="gambar" required>
                </div>
                <div class="form-group">
                    <label for="gambar2">Unggah Fotokopi Ijazah SMA</label>
                    <input type="file" id="gambar2" name="gambar2" required>
                </div>
            </div>

            <div class="section-divider"><span>2. Data Pengiriman Dana</span></div>
            <div class="form-row">
                <div class="form-group">
                    <label for="nama_bank">Nama Bank</label>
                    <input type="text" name="nama_bank" id="nama_bank" required>
                </div>
                <div class="form-group">
                    <label for="no_bank">No Bank</label>
                    <input type="text" name="no_bank" id="no_bank" required>
                </div>
            </div>
            <div class="form-group">
                <label for="pesan">Pesan atau Doa untuk Sumbangan</label>
                <textarea name="pesan" id="pesan"></textarea>
            </div>
            <div class="form-group">
                <label for="job-select">Jumlah Donasi (Rp):</label>
                <input type="number" name="job-select" id="job-select" required>
            </div>
            <center>
                <button type="submit" class="btn-submit">Kirim</button>
                <button><a href="index.html" class="btn-kembali">Kembali ke Beranda</a></button>   
            </center>
        </form>
        
        <div id="response"></div>
    </div>

    <script>
        function submitForm(event) {
            event.preventDefault(); // Mencegah pengiriman formulir biasa
            var formData = new FormData(document.getElementById('lamaranForm'));

            fetch('submit.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('response').innerHTML = data; // Menampilkan data yang dikirim
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
<footer>
    <hr>
    <p>
        Taufiqurrahman Al Baihaqi (2309106114)
    </p>
</footer>
</html>
