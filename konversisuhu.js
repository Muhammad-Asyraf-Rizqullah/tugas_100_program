function konversi() {
    let c = parseFloat(document.getElementById("c").value);
    let f = (c * 9/5) + 32;
    document.getElementById("hasil").textContent = "Fahrenheit: " + f;
  }