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

        // Redirect ke halaman produk dengan slug kategori
        window.location.href = `/product/category/${categorySlug}`;
    }

    // Event listener untuk semua tombol "Lihat Produk" di section kategori
    document.querySelectorAll(".category-product-btn").forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            // Ambil data kategori dari tombol
            const categoryId = this.getAttribute("data-category-id");
            const categoryName = this.getAttribute("data-category-name");

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

    // Alternative: Direct link navigation (jika ingin menggunakan link biasa)
    function setupDirectLinks() {
        document.querySelectorAll(".category-direct-link").forEach((link) => {
            const categoryName = link.getAttribute("data-category-name");
            const categorySlug = categoryName
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, "")
                .replace(/\s+/g, "-")
                .replace(/-+/g, "-")
                .trim();

            link.href = `/produk/kategori/${categorySlug}`;
        });
    }

    // Setup direct links if they exist
    setupDirectLinks();

    // Smooth scroll ke section produk jika ada hash #products
    if (window.location.hash === "#products") {
        setTimeout(() => {
            document.getElementById("products").scrollIntoView({
                behavior: "smooth",
            });
        }, 100);
    }
});
