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

    // SATU event listener untuk search button - menangani desktop dan mobile
    searchBtn.addEventListener("click", function () {
        if (window.innerWidth >= 768) {
            // Mode Desktop
            searchForm.classList.toggle("hidden");
            searchBtn.classList.toggle("hidden");
            if (searchInput.value) {
                searchForm.classList.remove("hidden");
                searchBtn.classList.add("hidden");
            }
            searchInput.focus();
        } else {
            // Mode Mobile
            mobileSearchBar.classList.toggle("-translate-y-full");
            if (mobileSearchInput.value) {
                mobileSearchBar.classList.remove("-translate-y-full");
            }
            mobileSearchInput.focus();
            mobileMenu.classList.add("hidden");
        }
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

    // Close mobile search bar
    closeMobileSearch.addEventListener("click", function (e) {
        e.preventDefault();
        mobileSearchInput.value = '';
        window.location.href = '/product';
    });

    // Show form if input has value on page load - pisahkan berdasarkan ukuran layar
    if (window.innerWidth >= 768) {
        // Desktop: tampilkan form desktop jika ada value
        if (searchInput.value) {
            searchForm.classList.remove("hidden");
            searchBtn.classList.add("hidden");
        }
    } else {
        // Mobile: tampilkan mobile search bar jika ada value
        if (mobileSearchInput.value) {
            mobileSearchBar.classList.remove("-translate-y-full");
        }
    }
});
