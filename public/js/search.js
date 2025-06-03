document.addEventListener("DOMContentLoaded", function () {
    const searchBtn = document.getElementById("search-btn");
    const searchForm = document.getElementById("search-form");
    const searchInput = document.getElementById("search-input");
    const closeSearch = document.getElementById("close-search");
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    const mobileSearchBar = document.getElementById("mobile-search-bar");
    const mobileSearchInput = document.getElementById("mobile-search-input");
    const closeMobileSearch = document.getElementById("close-mobile-search");

    // Toggle search form on desktop and check if input has value
    searchBtn.addEventListener("click", function () {
        searchForm.classList.toggle("hidden");
        searchBtn.classList.toggle("hidden");
        if (searchInput.value) {
            searchForm.classList.remove("hidden");
            searchBtn.classList.add("hidden");
        }
        searchInput.focus();
    });

    // Close search form on desktop
    closeSearch.addEventListener("click", function (e) {
        e.preventDefault();
        searchInput.value = '';
        window.location.href = '/product';  
    });

    // Toggle mobile menu
    mobileMenuBtn.addEventListener("click", function () {
        mobileMenu.classList.toggle("hidden");
        mobileSearchBar.classList.add("-translate-y-full");
    });

    // Toggle mobile search bar
    searchBtn.addEventListener("click", function () {
        if (window.innerWidth < 768) {
            mobileSearchBar.classList.toggle("-translate-y-full");
            if (mobileSearchInput.value) {
                mobileSearchBar.classList.remove("-translate-y-full");
            }
            mobileSearchInput.focus();
            mobileMenu.classList.add("hidden");
        }
    });

    // Close mobile search bar
    closeMobileSearch.addEventListener("click", function (e) {
        e.preventDefault();
        mobileSearchInput.value = '';
        window.location.href = '/product';
    });

    // Show form if input has value on page load
    if (searchInput.value) {
        searchForm.classList.remove("hidden");
        searchBtn.classList.add("hidden");
    }
    if (mobileSearchInput.value && window.innerWidth < 768) {
        mobileSearchBar.classList.remove("-translate-y-full");
    }
});
