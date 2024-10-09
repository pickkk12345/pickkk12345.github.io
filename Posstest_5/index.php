<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DONASI PALESTINA</title>
    <link rel="stylesheet" href="formulir.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="form-container">
        <center><img src="logopales.png" alt=""></center>
        <h1>Formulir Sumbangan Untuk Palestina</h1>
        
        <p><strong><i>Harap lengkapi formulir di bawah ini untuk Mendonasi.</i></strong></p>
        <form id="donasiForm" enctype="multipart/form-data">
            <input type="hidden" id="donasiId" name="donasiId">
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
                <label for="jumlah_donasi">Jumlah Donasi (Rp):</label>
                <input type="number" name="jumlah_donasi" id="jumlah_donasi" required>
            </div>
            <center>
                <button type="submit" class="btn-submit" id="submitBtn">Kirim</button>
                <button type="button" class="btn-update" id="updateBtn" style="display:none;">Update</button>
                <button type="button" class="btn-delete" id="deleteBtn" style="display:none;">Hapus</button>
                <button type="button" class="btn-clear" id="clearBtn">Bersihkan Form</button>
                <button><a href="index.html" class="btn-kembali">Kembali ke Beranda</a></button>   
            </center>
        </form>
        
        <div id="response"></div>

        <div id="donasiList">
            <h2>Daftar Donasi</h2>
            <ul id="donasiItems"></ul>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let donasi = [];

            // Create and Update
            $("#donasiForm").on("submit", function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let donasiData = {};
                for (let [key, value] of formData.entries()) {
                    donasiData[key] = value;
                }

                if ($("#donasiId").val()) {
                    // Update
                    let index = donasi.findIndex(item => item.donasiId == $("#donasiId").val());
                    donasi[index] = donasiData;
                } else {
                    // Create
                    donasiData.donasiId = Date.now();
                    donasi.push(donasiData);
                }

                updateDonasiList();
                clearForm();
            });

            // Read
            function updateDonasiList() {
                $("#donasiItems").empty();
                $.each(donasi, function(i, item) {
                    $("#donasiItems").append(`<li>
                        ${item.nama_depan} ${item.nama_belakang} - Rp ${item.jumlah_donasi}
                        <button onclick="editDonasi(${item.donasiId})">Edit</button>
                    </li>`);
                });
            }

            // Delete
            $("#deleteBtn").on("click", function() {
                let id = $("#donasiId").val();
                donasi = donasi.filter(item => item.donasiId != id);
                updateDonasiList();
                clearForm();
            });

            // Clear Form
            function clearForm() {
                $("#donasiForm")[0].reset();
                $("#donasiId").val("");
                $("#submitBtn").show();
                $("#updateBtn, #deleteBtn").hide();
            }

            $("#clearBtn").on("click", clearForm);

            // Edit (populate form for update)
            window.editDonasi = function(id) {
                let item = donasi.find(item => item.donasiId == id);
                if (item) {
                    $.each(item, function(key, value) {
                        let $el = $(`#${key}`);
                        if ($el.length) {
                            if ($el.attr('type') === 'file') {
                                // Skip file inputs
                            } else {
                                $el.val(value);
                            }
                        }
                    });
                    $("#submitBtn").hide();
                    $("#updateBtn, #deleteBtn").show();
                }
            };

            // Update button click handler
            $("#updateBtn").on("click", function() {
                $("#donasiForm").submit();
            });
        });
    </script>
</body>
<footer>
    <hr>
    <p>
        Taufiqurrahman Al Baihaqi (2309106114)
    </p>
</footer>
</html>