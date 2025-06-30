function hitungTotalSiswaSekolahInteraktif() {
    const errorMessageDiv = document.getElementById('errorMessage');
    errorMessageDiv.textContent = ''; // Bersihkan pesan error sebelumnya
    const hasilDiv = document.getElementById('hasilTotalSiswaSekolah');
    hasilDiv.style.display = 'none'; // Sembunyikan hasil sebelumnya

    // Ambil nilai input untuk Kelas 7
    const kelas7JumlahStr = document.getElementById('kelas7Jumlah').value;
    const kelas7SiswaStr = document.getElementById('kelas7Siswa').value;

    // Ambil nilai input untuk Kelas 8
    const kelas8JumlahStr = document.getElementById('kelas8Jumlah').value;
    const kelas8SiswaStr = document.getElementById('kelas8Siswa').value;

    // Ambil nilai input untuk Kelas 9
    const kelas9JumlahStr = document.getElementById('kelas9Jumlah').value;
    const kelas9SiswaStr = document.getElementById('kelas9Siswa').value;

    // Validasi input: Pastikan semua input tidak kosong dan merupakan angka non-negatif
    if (kelas7JumlahStr === '' || kelas7SiswaStr === '' ||
        kelas8JumlahStr === '' || kelas8SiswaStr === '' ||
        kelas9JumlahStr === '' || kelas9SiswaStr === '') {
        errorMessageDiv.textContent = 'Mohon lengkapi semua kolom input.';
        return; // Hentikan fungsi jika ada input kosong
    }

    const kelas7Jumlah = parseInt(kelas7JumlahStr);
    const kelas7Siswa = parseInt(kelas7SiswaStr);
    const kelas8Jumlah = parseInt(kelas8JumlahStr);
    const kelas8Siswa = parseInt(kelas8SiswaStr);
    const kelas9Jumlah = parseInt(kelas9JumlahStr);
    const kelas9Siswa = parseInt(kelas9SiswaStr);

    // Validasi tambahan: Pastikan input adalah angka valid (bukan NaN) dan non-negatif
    if (isNaN(kelas7Jumlah) || isNaN(kelas7Siswa) || kelas7Jumlah < 0 || kelas7Siswa < 0 ||
        isNaN(kelas8Jumlah) || isNaN(kelas8Siswa) || kelas8Jumlah < 0 || kelas8Siswa < 0 ||
        isNaN(kelas9Jumlah) || isNaN(kelas9Siswa) || kelas9Jumlah < 0 || kelas9Siswa < 0) {
        errorMessageDiv.textContent = 'Mohon masukkan angka yang valid dan tidak negatif untuk semua kolom.';
        return; // Hentikan fungsi jika ada input tidak valid
    }

    // Hitung total siswa per kelas
    const totalSiswaKelas7 = kelas7Jumlah * kelas7Siswa;
    const totalSiswaKelas8 = kelas8Jumlah * kelas8Siswa;
    const totalSiswaKelas9 = kelas9Jumlah * kelas9Siswa;

    // Hitung total seluruh siswa sekolah
    const totalSeluruhSiswa = totalSiswaKelas7 + totalSiswaKelas8 + totalSiswaKelas9;

    // Tampilkan hasil
    hasilDiv.textContent = `Total seluruh siswa di sekolah adalah: ${totalSeluruhSiswa} orang.`;
    hasilDiv.style.display = 'block'; // Tampilkan elemen hasil
}