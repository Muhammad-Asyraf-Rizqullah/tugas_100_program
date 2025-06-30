function hitungKubus() {
    const sisiInput = document.getElementById("sisi");
    const hasilDiv = document.getElementById("hasil");
  
    const sisi = parseFloat(sisiInput.value);
  
    if (isNaN(sisi) || sisi <= 0) {
      hasilDiv.textContent = "Masukkan angka positif yang valid untuk sisi kubus.";
      return;
    }
  
    const luasPermukaan = 6 * sisi * sisi;
    const volume = sisi * sisi * sisi;
  
    hasilDiv.innerHTML = `
      Luas Permukaan: ${luasPermukaan.toFixed(2)}<br>
      Volume: ${volume.toFixed(2)}
    `;
  }