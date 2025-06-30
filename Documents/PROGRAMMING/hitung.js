function cek() {
    let angka = parseInt(document.getElementById("angka").value);
    document.getElementById("hasil").textContent = angka % 2 === 0 ? "Genap" : "Ganjil";
  }