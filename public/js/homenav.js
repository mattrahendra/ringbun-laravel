document.addEventListener("DOMContentLoaded", function () {
    // Fungsi untuk redirect ke halaman produk dengan kategori tertentu
    function redirectToProductWithCategory(categoryId, categoryName) {
        // Convert nama kategori menjadi slug (lowercase, replace spaces with hyphens)
        const categorySlug = categoryName
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, "") // Remove special characters
            .replace(/\s+/g, "-") // Replace spaces with hyphens
            .replace(/-+/g, "-") // Replace multiple hyphens with single
            .trim();

        // Simpan kategori yang dipilih ke localStorage untuk digunakan di halaman produk
        localStorage.setItem(
            "selectedCategory",
            JSON.stringify({
                id: categoryId,
                name: categoryName,
                slug: categorySlug,
            })
        );

        // Redirect ke halaman produk utama dengan parameter kategori (opsional)
        // Bisa juga langsung ke /product tanpa parameter karena filtering akan dilakukan client-side
        window.location.href = `/product?category=${categoryId}`;
    }

    // Event listener untuk semua tombol "Lihat Produk" di section kategori
    document.querySelectorAll(".category-product-btn").forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            // Ambil data kategori dari tombol
            const categoryId = this.getAttribute("data-category-id");
            const categoryName = this.getAttribute("data-category-name");

            // Validasi data
            if (!categoryId || !categoryName) {
                console.error('Category data not found on button');
                return;
            }

            // Tambahkan efek loading pada tombol
            const originalText = this.innerHTML;
            this.innerHTML =
                '<i class="fas fa-spinner fa-spin mr-2"></i>Memuat...';
            this.disabled = true;

            // Delay sedikit untuk efek loading, kemudian redirect
            setTimeout(() => {
                redirectToProductWithCategory(categoryId, categoryName);
            }, 500);
        });
    });

    // Alternative: Direct link navigation untuk link biasa (jika ada)
    function setupDirectLinks() {
        document.querySelectorAll(".category-direct-link").forEach((link) => {
            link.addEventListener("click", function(e) {
                e.preventDefault();

                const categoryId = this.getAttribute("data-category-id");
                const categoryName = this.getAttribute("data-category-name");

                if (categoryId && categoryName) {
                    redirectToProductWithCategory(categoryId, categoryName);
                } else {
                    // Fallback: navigate normally
                    window.location.href = this.href;
                }
            });
        });
    }

    // Setup direct links if they exist
    setupDirectLinks();

    // Fungsi untuk navigasi langsung tanpa efek loading (untuk link biasa)
    function quickRedirectToCategory(categoryId, categoryName) {
        const categorySlug = categoryName
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, "")
            .replace(/\s+/g, "-")
            .replace(/-+/g, "-")
            .trim();

        localStorage.setItem(
            "selectedCategory",
            JSON.stringify({
                id: categoryId,
                name: categoryName,
                slug: categorySlug,
            })
        );

        window.location.href = `/product?category=${categoryId}`;
    }

    // Expose function globally if needed
    window.quickRedirectToCategory = quickRedirectToCategory;

    // Smooth scroll ke section produk jika ada hash #products
    if (window.location.hash === "#products") {
        setTimeout(() => {
            const productsSection = document.getElementById("products");
            if (productsSection) {
                productsSection.scrollIntoView({
                    behavior: "smooth",
                });
            }
        }, 100);
    }

    // Optional: Handle back button to clear localStorage
    window.addEventListener('pageshow', function(event) {
        // Clear selected category if user navigates back to home page
        if (window.location.pathname === '/' || window.location.pathname === '/home') {
            localStorage.removeItem('selectedCategory');
        }
    });
});
