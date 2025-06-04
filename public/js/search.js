document.addEventListener("DOMContentLoaded", function () {
    const elements = {
        searchBtn: document.getElementById("search-btn"),
        searchForm: document.getElementById("search-form"),
        searchInput: document.getElementById("search-input"),
        closeSearch: document.getElementById("close-search"),
        mobileMenuBtn: document.getElementById("mobile-menu-btn"),
        mobileMenu: document.getElementById("mobile-menu"),
    };

    // Track apakah form sedang terbuka
    let isFormOpen = false;

    // Fungsi untuk toggle search form
    function toggleSearchForm(showForm) {
        elements.searchForm.classList.toggle("hidden", !showForm);
        elements.searchBtn.classList.toggle("hidden", showForm);
        isFormOpen = showForm;
        if (showForm) elements.searchInput.focus();
    }

    // Cek apakah ada parameter 'q' di URL
    const urlParams = new URLSearchParams(window.location.search);
    const hasQuery = urlParams.has('q') && urlParams.get('q').trim() !== "";

    // State awal berdasarkan parameter 'q'
    if (elements.searchForm && elements.searchBtn) {
        if (hasQuery) {
            toggleSearchForm(true);
        } else {
            toggleSearchForm(false);
        }
    }

    // Klik tombol search
    if (elements.searchBtn) {
        elements.searchBtn.addEventListener("click", () => {
            toggleSearchForm(true);
        });
    }

    // Tutup form
    if (elements.closeSearch) {
        elements.closeSearch.addEventListener("click", (e) => {
            e.preventDefault();
            elements.searchInput.value = "";
            toggleSearchForm(false);
            elements.searchBtn.focus();
            // Refresh hanya jika ada parameter 'q' di URL
            if (hasQuery) {
                const url = new URL(window.location);
                url.searchParams.delete('q');
                window.location.assign(url);
            }
        });
    }

    // Toggle mobile menu
    if (elements.mobileMenuBtn) {
        elements.mobileMenuBtn.addEventListener("click", () => {
            elements.mobileMenu.classList.toggle("hidden");
        });
    }

    // Track apakah input sedang fokus
    let isInputFocused = false;
    if (elements.searchInput) {
        elements.searchInput.addEventListener("focus", () => {
            isInputFocused = true;
        });
        elements.searchInput.addEventListener("blur", () => {
            isInputFocused = false;
        });
    }

    // Handle resize dengan debounce
    function debounce(fn, ms) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => fn.apply(this, args), ms);
        };
    }

    window.addEventListener("resize", debounce(() => {
        // Jangan ubah state form jika input sedang fokus (keyboard muncul)
        if (isInputFocused) {
            return;
        }
        // Hanya ubah state form jika benar-benar diperlukan
        if (hasQuery && elements.searchInput.value.trim() !== "") {
            toggleSearchForm(true);
        } else if (!isFormOpen) {
            toggleSearchForm(false);
        }
    }, 100));

    // Validasi form agar tidak submit kosong
    if (elements.searchForm) {
        elements.searchForm.addEventListener("submit", (e) => {
            if (elements.searchInput.value.trim() === "") {
                e.preventDefault();
                elements.searchInput.focus();
            }
        });
    }
});