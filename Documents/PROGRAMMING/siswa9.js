// Data yang diketahui untuk Kelas 9
const jumlahKelasKelas9 = 9;
const siswaPerKelasKelas9 = 30;

// Fungsi untuk menghitung total siswa Kelas 9
function hitungTotalSiswaKelas9() {
    // Melakukan perhitungan
    const totalSiswaKelas9 = jumlahKelasKelas9 * siswaPerKelasKelas9;

    // Menampilkan hasil di elemen HTML
    const hasilElement = document.getElementById('hasilTotalSiswa');
    hasilElement.textContent = `Total seluruh siswa Kelas 9 adalah: ${totalSiswaKelas9} orang.`;
}