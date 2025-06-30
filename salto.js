const hasilDiv = document.getElementById("hasil");

function hitungTotalSalto() {
    const daftarSaltoInput = document.getElementById("daftarSalto").value;
    const daftarSaltoArray = daftarSaltoInput.split(',');
    let totalSalto = 0;
    let jumlahMurid = 0;

    for (const salto of daftarSaltoArray) {
        const jumlah = parseInt(salto.trim());
        if (!isNaN(jumlah)) {
            totalSalto += jumlah;
            jumlahMurid++;
        }
    }

    hasilDiv.textContent = `Total Salto dari ${jumlahMurid} murid: ${totalSalto}`;
}