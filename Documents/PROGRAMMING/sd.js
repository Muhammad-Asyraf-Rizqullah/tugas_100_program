// Fungsi untuk menghitung total siswa
function hitungTotalSiswa() {
    const inputIds = ['kelas1', 'kelas2', 'kelas3', 'kelas4', 'kelas5', 'kelas6'];
    let totalSiswa = 0;
    let hasError = false;
    const errorMessageElement = document.getElementById('errorMessage');

    errorMessageElement.textContent = ''; // Hapus pesan error sebelumnya

    inputIds.forEach(id => {
        const inputElement = document.getElementById(id);
        let value = parseInt(inputElement.value);

        // Validasi input: pastikan angka dan tidak negatif
        if (isNaN(value) || value < 0) {
            errorMessageElement.textContent = 'Pastikan semua input diisi dengan angka positif yang valid.';
            inputElement.classList.add('input-error'); // Tambahkan kelas error untuk styling
            hasError = true;
        } else {
            inputElement.classList.remove('input-error'); // Hapus kelas error jika valid
            totalSiswa += value;
        }
    });

    const totalNumberSpan = document.querySelector('#hasilTotal .total-number');
    if (!hasError) {
        totalNumberSpan.textContent = totalSiswa;
        document.getElementById('hasilTotal').classList.add('show-result'); // Tampilkan kotak hasil dengan animasi
    } else {
        totalNumberSpan.textContent = '0';
        document.getElementById('hasilTotal').classList.remove('show-result'); // Sembunyikan/reset kotak hasil
    }
}

// Menambahkan event listener ke tombol setelah DOM siap
document.addEventListener('DOMContentLoaded', () => {
    const tombolHitung = document.getElementById('hitungButton');
    tombolHitung.addEventListener('click', hitungTotalSiswa);

    // Menambahkan event listener untuk input agar error hilang saat diketik ulang
    const inputElements = document.querySelectorAll('.input-group input[type="number"]');
    inputElements.forEach(input => {
        input.addEventListener('input', () => {
            input.classList.remove('input-error');
            // Jika semua input sudah valid, hapus pesan error
            const allInputsValid = Array.from(inputElements).every(input => {
                const val = parseInt(input.value);
                return !isNaN(val) && val >= 0;
            });
            if (allInputsValid) {
                document.getElementById('errorMessage').textContent = '';
            }
        });
    });
});