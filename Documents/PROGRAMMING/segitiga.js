function hitung() {
    let alas = parseFloat(document.getElementById("alas").value);
    let tinggi = parseFloat(document.getElementById("tinggi").value);
    let luas = 0.5 * alas * tinggi;
    document.getElementById("hasil").textContent = "Luas: " + luas;
  }