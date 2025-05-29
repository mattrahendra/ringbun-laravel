// Get elements
const searchBtn = document.getElementById("search-btn");
const searchForm = document.getElementById("search-form");
const searchInput = document.getElementById("search-input");
const searchSubmit = document.getElementById("search-submit");
const closeSearchBtn = document.getElementById("close-search");

// Mobile elements
const mobileMenuBtn = document.getElementById("mobile-menu-btn");
const mobileMenu = document.getElementById("mobile-menu");
const mobileSearchBar = document.getElementById("mobile-search-bar");
const mobileSearchInput = document.getElementById("mobile-search-input");
const mobileSearchSubmit = document.getElementById("mobile-search-submit");
const closeMobileSearchBtn = document.getElementById("close-mobile-search");

// Desktop Search Functionality
searchBtn.addEventListener("click", () => {
    if (window.innerWidth >= 768) {
        // Desktop: Show inline search form
        searchBtn.style.display = "none";
        searchForm.classList.remove("hidden");
        searchForm.classList.add("flex");

        setTimeout(() => {
            searchInput.focus();
        }, 100);
    } else {
        // Mobile: Show mobile search bar
        mobileSearchBar.classList.remove("-translate-y-full");
        mobileSearchBar.classList.add("translate-y-0");

        // Hide mobile menu if open
        mobileMenu.classList.add("hidden");

        setTimeout(() => {
            mobileSearchInput.focus();
        }, 300);
    }
});

// Close desktop search
closeSearchBtn.addEventListener("click", () => {
    searchForm.classList.add("hidden");
    searchForm.classList.remove("flex");
    searchBtn.style.display = "block";
    searchInput.value = "";
});

// Desktop search submission
const handleDesktopSearch = () => {
    const query = searchInput.value.trim();
    if (query) {
        console.log("Desktop search query:", query);
        // Redirect ke halaman search atau lakukan AJAX call
        // window.location.href = "{{ route('search') }}?q=" + encodeURIComponent(query);
        alert(`Searching for: ${query}`); // Ganti dengan logic search yang sebenarnya
    }
};

searchSubmit.addEventListener("click", handleDesktopSearch);
searchInput.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
        handleDesktopSearch();
    }
});

// Close mobile search
closeMobileSearchBtn.addEventListener("click", () => {
    mobileSearchBar.classList.add("-translate-y-full");
    mobileSearchBar.classList.remove("translate-y-0");
    mobileSearchInput.value = "";
});

// Mobile search submission
const handleMobileSearch = () => {
    const query = mobileSearchInput.value.trim();
    if (query) {
        console.log("Mobile search query:", query);
        // Redirect ke halaman search atau lakukan AJAX call
        window.location.href = "{{ route('search') }}?q=" + encodeURIComponent(query);
    }
};

mobileSearchSubmit.addEventListener("click", handleMobileSearch);
mobileSearchInput.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
        handleMobileSearch();
    }
});

// Close search/menu when pressing Escape key
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
        // Close desktop search
        if (!searchForm.classList.contains("hidden")) {
            closeSearchBtn.click();
        }

        // Close mobile search
        if (mobileSearchBar.classList.contains("translate-y-0")) {
            closeMobileSearchBtn.click();
        }

        // Close mobile menu
        if (!mobileMenu.classList.contains("hidden")) {
            mobileMenu.classList.add("hidden");
        }
    }
});

// Handle window resize
window.addEventListener("resize", () => {
    if (window.innerWidth >= 768) {
        // Close mobile elements when switching to desktop
        mobileSearchBar.classList.add("-translate-y-full");
        mobileSearchBar.classList.remove("translate-y-0");
        mobileMenu.classList.add("hidden");
    } else {
        // Close desktop search when switching to mobile
        if (!searchForm.classList.contains("hidden")) {
            closeSearchBtn.click();
        }
    }
});
