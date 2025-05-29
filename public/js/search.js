// Toggle Search Bar
document.getElementById("search-btn").addEventListener("click", () => {
    document.getElementById("search-bar").classList.remove("hidden");
    document.getElementById("mobile-menu").classList.add("hidden"); // Hide mobile menu if open
});

// Close Search Bar
document.getElementById("close-search").addEventListener("click", () => {
    document.getElementById("search-bar").classList.add("hidden");
});