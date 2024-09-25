
const form = document.getElementById('lamaranForm');

document.addEventListener("DOMContentLoaded", function() {
    const formContainer = document.querySelector('.form-container');
    formContainer.style.opacity = 0;
    setTimeout(() => {
        formContainer.style.transition = "opacity 1.5s ease-in-out";
        formContainer.style.opacity = 1;
    }, 100);
});

form.addEventListener('submit', function(event) {
    event.preventDefault();


    const namaDepan = document.getElementById('nama_depan').value;
    const email = document.getElementById('email').value;


    if (namaDepan === '' || email === '') {
        alert('Harap isi Nama Depan dan Email.');
    } else {

        alert('Terima kasih, ' + namaDepan + '! Formulir Anda berhasil dikirim.');
        
    }
});

const submitBtn = document.querySelector('.submit-btn');
submitBtn.addEventListener('mousedown', function() {
    submitBtn.style.transform = "scale(0.95)";
});
submitBtn.addEventListener('mouseup', function() {
    submitBtn.style.transform = "scale(1)";
});
