function countWords() {
    const text = document.getElementById("textInput").value.trim();
    const words = text.split(/\s+/).filter(word => word.length > 0);
    document.getElementById("wordCount").textContent = words.length;
}