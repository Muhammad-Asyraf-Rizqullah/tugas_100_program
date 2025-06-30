function calculateAge() {
    let year = document.getElementById("year").value;
    let age = new Date().getFullYear() - year;
    document.getElementById("age").innerText = "Umur Anda: " + age + " tahun";
}