document.addEventListener("DOMContentLoaded", function () {
    // Tab functionality
    const tabs = document.querySelectorAll(".category-tab");
    const products = document.querySelectorAll(".product-item");

    tabs.forEach((tab) => {
        tab.addEventListener("click", function () {
            tabs.forEach((t) =>
                t.classList.remove("bg-yellow-400", "text-white")
            );
            this.classList.add("bg-yellow-400", "text-white");
            const category = this.getAttribute("data-category");
            products.forEach((product) => {
                if (category === "all") {
                    product.classList.remove("hidden");
                    return;
                } else {
                    product.classList.add("hidden");

                    if (product.classList.contains(category)) {
                        product.classList.remove("hidden");
                    }
                }
            });
        });
    });

    // Activate "All" tab by default
    document.querySelector('.category-tab[data-category="all"]').click();

    // Modal functionality
    function rebindEventListeners() {
        const newProductItems = document.querySelectorAll(".product-item");
        const newModals = document.querySelectorAll(".modal");
        const newCloseButtons = document.querySelectorAll(".close-modal");

        newProductItems.forEach((item) => {
            item.addEventListener("click", function () {
                const modalId = this.getAttribute("data-modal");
                const modal = document.getElementById(modalId);
                modal.classList.remove("hidden");
            });
        });

        newCloseButtons.forEach((button) => {
            button.addEventListener("click", function () {
                const modal = this.closest(".modal");
                modal.classList.add("hidden");
            });
        });

        newModals.forEach((modal) => {
            modal.addEventListener("click", function (e) {
                if (e.target === modal) {
                    modal.classList.add("hidden");
                }
            });
        });
    }

    rebindEventListeners();

    // Sorting functionality
    const sortDropdown = document.getElementById("sort");
    sortDropdown.addEventListener("change", function () {
        const sortValue = this.value;
        window.location.href = '{{ route("product") }}?sort=' + sortValue;
    });
});
