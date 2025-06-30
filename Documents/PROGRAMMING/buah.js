function searchList() {
    const searchText = document.getElementById("search").value.toLowerCase();
    const items = document.querySelectorAll("#list li");

    items.forEach(item => {
        item.style.display = item.textContent.toLowerCase().includes(searchText) ? "block" : "none";
    });
}