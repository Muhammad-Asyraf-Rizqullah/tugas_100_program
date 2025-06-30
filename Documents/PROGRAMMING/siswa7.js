// Data yang diketahui
const jumlahKelasKelas7 = 15;
const siswaPerKelasKelas7 = 20;

// Fungsi untuk menghitung total siswa Kelas 7
function hitungTotalSiswaKelas7() {
    // Melakukan perhitungan
    const totalSiswaKelas7 = jumlahKelasKelas7 * siswaPerKelasKelas7;

    // Menampilkan hasil di elemen HTML
    const hasilElement = document.getElementById('hasilTotalSiswa');
    hasilElement.textContent = `Total seluruh siswa Kelas 7 adalah: ${totalSiswaKelas7} orang.`;
}