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
                product.classList.add("hidden");
            });
            document.querySelectorAll(`.${category}`).forEach((product) => {
                product.classList.remove("hidden");
            });
        });
    });

    // Activate first tab by default
    tabs[0].click();

    // Modal functionality
    const productItems = document.querySelectorAll(".product-item");
    const modals = document.querySelectorAll(".modal");
    const closeButtons = document.querySelectorAll(".close-modal");

    productItems.forEach((item) => {
        item.addEventListener("click", function () {
            const modalId = this.getAttribute("data-modal");
            const modal = document.getElementById(modalId);
            modal.classList.remove("hidden");
        });
    });

    closeButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const modal = this.closest(".modal");
            modal.classList.add("hidden");
        });
    });

    modals.forEach((modal) => {
        modal.addEventListener("click", function (e) {
            if (e.target === modal) {
                modal.classList.add("hidden");
            }
        });
    });
});

// Sorting functionality
const sortDropdown = document.getElementById("sort");
sortDropdown.addEventListener("change", function () {
    const sortValue = this.value;
    window.location.href = '{{ route("product") }}?sort=' + sortValue;
});
