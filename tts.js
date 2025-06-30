function speakText() {
    let text = document.getElementById("textInput").value;
    let speech = new SpeechSynthesisUtterance(text);
    window.speechSynthesis.speak(speech);
}