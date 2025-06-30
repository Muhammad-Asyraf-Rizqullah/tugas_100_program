function hitungTotalKambingArray() {
    const populasiKambing = [];
    let lanjut = true;
  
    while (lanjut) {
      const kategori = prompt("Masukkan kategori kambing (jantan/betina/anakan), atau 'selesai' untuk mengakhiri:");
      if (kategori.toLowerCase() === 'selesai') {
        lanjut = false;
      } else if (['jantan', 'betina', 'anakan'].includes(kategori.toLowerCase())) {
        const jumlah = parseInt(prompt(`Masukkan jumlah kambing ${kategori}:`));
        if (!isNaN(jumlah) && jumlah > 0) {
          for (let i = 0; i < jumlah; i++) {
            populasiKambing.push({ kategori: kategori.toLowerCase() });
          }
        } else {
          console.log("Jumlah tidak valid.");
        }
      } else {
        console.log("Kategori tidak valid.");
      }
    }
  
    const totalKambing = populasiKambing.length;
    const jumlahJantan = populasiKambing.filter(kambing => kambing.kategori === 'jantan').length;
    const jumlahBetina = populasiKambing.filter(kambing => kambing.kategori === 'betina').length;
    const jumlahAnakan = populasiKambing.filter(kambing => kambing.kategori === 'anakan').length;
  
    console.log(`\n--- Total Kambing di Peternakan ---`);
    console.log(`Jumlah Kambing Jantan: ${jumlahJantan}`);
    console.log(`Jumlah Kambing Betina: ${jumlahBetina}`);
    console.log(`Jumlah Anakan Kambing: ${jumlahAnakan}`);
    console.log(`Total Kambing Keseluruhan: ${totalKambing}`);
  }
  
  // Jalankan program
  hitungTotalKambingArray();