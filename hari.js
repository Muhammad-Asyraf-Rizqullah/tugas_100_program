function findDay() {
    const dateValue = document.getElementById("dateInput").value;
    if (!dateValue) {
        alert("Masukkan tanggal yang valid!");
        return;
    }

    const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    const date = new Date(dateValue);
    document.getElementById("dayResult").textContent = days[date.getDay()];
}