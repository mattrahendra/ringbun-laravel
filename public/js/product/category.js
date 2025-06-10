document.addEventListener("DOMContentLoaded", function () {
    // Tab functionality with client-side filtering
    const tabs = document.querySelectorAll(".category-tab");
    const products = document.querySelectorAll(".product-item");

    tabs.forEach((tab) => {
        tab.addEventListener("click", function () {
            // Update tab appearance
            tabs.forEach((t) =>
                t.classList.remove("bg-yellow-400", "text-white")
            );
            this.classList.add("bg-yellow-400", "text-white");

            // Get selected category
            const category = this.getAttribute("data-category");

            // Filter products client-side
            filterProducts(category);

            // Update URL without page reload (optional)
            updateURL(category);
        });
    });

    // Function to filter products client-side
    function filterProducts(category) {
        products.forEach((product) => {
            if (category === "all") {
                product.classList.remove("hidden");
            } else {
                // Hide all products first
                product.classList.add("hidden");

                // Show products that match the category
                if (product.classList.contains(category) ||
                    product.getAttribute("data-category-id") === category ||
                    product.getAttribute("data-category-slug") === category) {
                    product.classList.remove("hidden");
                }
            }
        });
    }

    // Function to update URL without page reload
    function updateURL(category) {
        const url = new URL(window.location);
        if (category === "all") {
            url.searchParams.delete('category');
        } else {
            url.searchParams.set('category', category);
        }
        // Update URL without reloading page
        history.pushState(null, '', url.toString());
    }

    // Check for category from localStorage (from home navigation)
    function checkSelectedCategory() {
        const selectedCategory = localStorage.getItem('selectedCategory');
        if (selectedCategory) {
            try {
                const categoryData = JSON.parse(selectedCategory);

                // Find and activate the corresponding tab
                const targetTab = document.querySelector(
                    `.category-tab[data-category="${categoryData.id}"], ` +
                    `.category-tab[data-category="${categoryData.slug}"]`
                );

                if (targetTab) {
                    targetTab.click();
                } else {
                    // If specific category tab not found, look for tab with matching text
                    const tabs = document.querySelectorAll('.category-tab');
                    tabs.forEach(tab => {
                        if (tab.textContent.trim().toLowerCase() === categoryData.name.toLowerCase()) {
                            tab.click();
                        }
                    });
                }

                // Clear localStorage after using it
                localStorage.removeItem('selectedCategory');
            } catch (e) {
                console.error('Error parsing selected category:', e);
                // Default to "All" if there's an error
                document.querySelector('.category-tab[data-category="all"]').click();
            }
        } else {
            // Check URL parameters for category
            const urlParams = new URLSearchParams(window.location.search);
            const categoryParam = urlParams.get('category');

            if (categoryParam) {
                const targetTab = document.querySelector(
                    `.category-tab[data-category="${categoryParam}"]`
                );
                if (targetTab) {
                    targetTab.click();
                } else {
                    document.querySelector('.category-tab[data-category="all"]').click();
                }
            } else {
                // Activate "All" tab by default
                document.querySelector('.category-tab[data-category="all"]').click();
            }
        }
    }

    // Initialize category selection
    checkSelectedCategory();

    // Modal functionality
    function rebindEventListeners() {
        const newProductItems = document.querySelectorAll(".product-item");
        const newModals = document.querySelectorAll(".modal");
        const newCloseButtons = document.querySelectorAll(".close-modal");

        newProductItems.forEach((item) => {
            item.addEventListener("click", function () {
                const modalId = this.getAttribute("data-modal");
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.remove("hidden");
                }
            });
        });

        newCloseButtons.forEach((button) => {
            button.addEventListener("click", function () {
                const modal = this.closest(".modal");
                if (modal) {
                    modal.classList.add("hidden");
                }
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

    // Sorting functionality - this can remain server-side or be made client-side
    const sortDropdown = document.getElementById("sort");
    if (sortDropdown) {
        sortDropdown.addEventListener("change", function () {
            const sortValue = this.value;
            const url = new URL(window.location);
            url.searchParams.set('sort', sortValue);
            window.location.href = url.toString();
        });
    }

    // Optional: Client-side sorting function
    function sortProducts(products, sortType) {
        const productArray = Array.from(products);

        switch (sortType) {
            case 'name_asc':
                return productArray.sort((a, b) => {
                    const nameA = a.querySelector('.product-name').textContent.toLowerCase();
                    const nameB = b.querySelector('.product-name').textContent.toLowerCase();
                    return nameA.localeCompare(nameB);
                });
            case 'name_desc':
                return productArray.sort((a, b) => {
                    const nameA = a.querySelector('.product-name').textContent.toLowerCase();
                    const nameB = b.querySelector('.product-name').textContent.toLowerCase();
                    return nameB.localeCompare(nameA);
                });
            case 'price_asc':
                return productArray.sort((a, b) => {
                    const priceA = parseFloat(a.getAttribute('data-price') || '0');
                    const priceB = parseFloat(b.getAttribute('data-price') || '0');
                    return priceA - priceB;
                });
            case 'price_desc':
                return productArray.sort((a, b) => {
                    const priceA = parseFloat(a.getAttribute('data-price') || '0');
                    const priceB = parseFloat(b.getAttribute('data-price') || '0');
                    return priceB - priceA;
                });
            default:
                return productArray;
        }
    }
});
