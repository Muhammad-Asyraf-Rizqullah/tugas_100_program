// Data yang diketahui untuk Kelas 8
const jumlahKelasKelas8 = 13;
const siswaPerKelasKelas8 = 25;

// Fungsi untuk menghitung total siswa Kelas 8
function hitungTotalSiswaKelas8() {
    // Melakukan perhitungan
    const totalSiswaKelas8 = jumlahKelasKelas8 * siswaPerKelasKelas8;

    // Menampilkan hasil di elemen HTML
    const hasilElement = document.getElementById('hasilTotalSiswa');
    hasilElement.textContent = `Total seluruh siswa Kelas 8 adalah: ${totalSiswaKelas8} orang.`;
}