function hitungTabung() {
    const jariJariInput = document.getElementById("jariJari");
    const tinggiInput = document.getElementById("tinggi");
    const hasilDiv = document.getElementById("hasil");
  
    const jariJari = parseFloat(jariJariInput.value);
    const tinggi = parseFloat(tinggiInput.value);
  
    if (isNaN(jariJari) || isNaN(tinggi)) {
      hasilDiv.textContent = "Masukkan angka yang valid untuk jari-jari dan tinggi.";
      return;
    }
  
    const luasPermukaan = 2 * Math.PI * jariJari * (jariJari + tinggi);
    const volume = Math.PI * jariJari * jariJari * tinggi;
  
    hasilDiv.innerHTML = `
      Luas Permukaan: ${luasPermukaan.toFixed(2)}<br>
      Volume: ${volume.toFixed(2)}
    `;
  }