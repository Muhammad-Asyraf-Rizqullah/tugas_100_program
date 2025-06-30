// Fungsi untuk menghitung total siswa
function hitungTotalSiswa() {
    // Mengambil nilai dari input
    // Menggunakan parseInt untuk memastikan nilai yang diambil adalah angka
    const siswaKelas10 = parseInt(document.getElementById('kelas10').value);
    const siswaKelas11 = parseInt(document.getElementById('kelas11').value);
    const siswaKelas12 = parseInt(document.getElementById('kelas12').value);

    // Menjumlahkan seluruh siswa
    const totalSiswa = siswaKelas10 + siswaKelas11 + siswaKelas12;

    // Menampilkan hasil ke elemen dengan id 'hasilTotal'
    document.getElementById('hasilTotal').innerText = `Total Siswa Keseluruhan: ${totalSiswa}`;
}

// Menambahkan event listener ke tombol setelah DOM siap
document.addEventListener('DOMContentLoaded', () => {
    // Mengambil referensi tombol
    const tombolHitung = document.getElementById('hitungButton');

    // Menambahkan event listener 'click' ke tombol
    tombolHitung.addEventListener('click', hitungTotalSiswa);
});