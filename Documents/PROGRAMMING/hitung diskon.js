function hitungDiskon(hargaAwal, persentaseDiskon) {
    if (persentaseDiskon < 0 || persentaseDiskon > 100) {
      return "Persentase diskon tidak valid.";
    }
  
    const jumlahDiskon = (hargaAwal * persentaseDiskon) / 100;
    const hargaAkhir = hargaAwal - jumlahDiskon;
  
    return `Harga awal: Rp${hargaAwal.toLocaleString()}
  Diskon: ${persentaseDiskon}%
  Jumlah diskon: Rp${jumlahDiskon.toLocaleString()}
  Harga setelah diskon: Rp${hargaAkhir.toLocaleString()}`;
  }