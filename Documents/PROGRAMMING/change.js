document.getElementById("colorButton").addEventListener("click", function() {
    const colors = ["red", "blue", "green", "yellow", "purple", "orange", "pink", "cyan"];
    document.body.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
});