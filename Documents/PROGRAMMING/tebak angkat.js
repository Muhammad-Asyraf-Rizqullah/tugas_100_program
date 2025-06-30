let randomNumber = Math.floor(Math.random() * 100) + 1;

function checkGuess() {
    let guess = parseInt(document.getElementById("guessInput").value);
    let result = document.getElementById("result");

    if (guess === randomNumber) {
        result.innerHTML = "Selamat! Kamu menebak dengan benar!";
    } else if (guess > randomNumber) {
        result.innerHTML = "Terlalu besar! Coba lagi.";
    } else {
        result.innerHTML = "Terlalu kecil! Coba lagi.";
    }
}