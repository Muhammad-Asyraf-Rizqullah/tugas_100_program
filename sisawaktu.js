let timer;

function startCountdown() {
    const input = document.getElementById('timeInput').value;
    let timeRemaining = parseInt(input);

    if (isNaN(timeRemaining) || timeRemaining <= 0) {
        alert("Masukkan angka yang valid!");
        return;
    }

    clearInterval(timer);
    document.getElementById('countdown').textContent = timeRemaining;

    timer = setInterval(() => {
        timeRemaining--;
        document.getElementById('countdown').textContent = timeRemaining;

        if (timeRemaining <= 0) {
            clearInterval(timer);
            alert("Waktu habis!");
        }
    }, 1000);
}