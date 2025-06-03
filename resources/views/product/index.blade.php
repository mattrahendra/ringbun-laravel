<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - Produk</title>
</head>

<body class="bg-cream">
    @include('components.nav')

    <!-- Hero Section -->
    <section class="pt-32 pb-16 px-6 hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 text-shadow slide-enter">Produk Kami</h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-shadow slide-enter">
                    Temukan makanan dan minuman kesukaanmu di sini.
                </p>
                <div class="w-24 h-1 bg-white mx-auto rounded-full slide-enter"></div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full floating-badge"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 bg-white/10 rounded-full floating-badge" style="animation-delay: 1s;"></div>
    </section>

    <!-- Products Section -->
    <section class="pt-24 pb-12 px-6 bg-gray-50">
        <div class="max-w-6xl mx-auto">

            @if($query)
            <p class="text-center text-gray-600 mb-8">Hasil pencarian untuk: <span class="font-semibold">{{ $query }}</span></p>
            @endif

            <!-- Category Tabs -->
            <div class="flex justify-center space-x-4 mb-8 overflow-x-auto">
                <button class="category-tab px-4 py-2 rounded-lg font-semibold text-gray-800 hover:bg-yellow-400 hover:text-white active:bg-yellow-400 active:text-white" data-category="all">All</button>
                @foreach($categories as $category)
                <button class="category-tab px-4 py-2 rounded-lg font-semibold text-gray-800 hover:bg-yellow-400 hover:text-white active:bg-yellow-400 active:text-white" data-category="category-{{ $category->id }}">{{ $category->name }}</button>
                @endforeach
            </div>

            <!-- Sorting Dropdown -->
            <div class="flex justify-end mb-6">
                <select id="sort" class="border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <option value="name_asc" {{ $sort == 'name_asc' ? 'selected' : '' }}>Nama (A-Z)</option>
                    <option value="name_desc" {{ $sort == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)</option>
                    <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Harga (Rendah ke Tinggi)</option>
                    <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Harga (Tinggi ke Rendah)</option>
                </select>
            </div>

            <!-- Products Grid -->
            <div id="product-grid" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($products as $product)
                @if(!$query || (str_contains(strtolower($product->name), strtolower($query)) || str_contains(strtolower($product->description ?? ''), strtolower($query))))
                <div class="card-hover bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer group product-item category-{{ $product->category_id }} {{ $product->category_id != $categories->first()->id ? 'hidden' : '' }}" data-modal="modal-{{ $product->id }}">
                    <div class="relative overflow-hidden">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/300x200/png' }}"
                            alt="{{ $product->name }}"
                            class="w-full h-64 object-cover rounded-t-lg group-hover:scale-110 transition-transform duration-500">
                        @if($product->stock > 50)
                        <div class="absolute top-4 right-4 bg-yellow-400 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            <i class="fas fa-heart mr-1"></i>Popular
                        </div>
                        @elseif($product->created_at->diffInDays() <= 7)
                            <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            <i class="fas fa-star mr-1"></i>Baru
                    </div>
                    @endif
                </div>
                <div class="p-4 text-left">
                    <h3 class="text-2xl font-semibold text-brown">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 50) }}</p>
                    <p class="text-yellow-400 font-semibold text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            </div>
            @endif
            @empty
            <p class="text-center text-gray-600 col-span-3">Belum ada produk yang tersedia.</p>
            @endforelse
        </div>
        </div>
    </section>

    <!-- Modal Pop-ups -->
    @foreach($products as $product)
    <div id="modal-{{ $product->id }}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-2xl font-semibold text-gray-800">{{ $product->name }}</h3>
                <button class="close-modal text-gray-600 hover:text-gray-800 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="relative overflow-hidden">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/300x200/png' }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-lg mb-4">
                @if($product->stock > 50)
                <div class="absolute top-4 right-4 bg-yellow-400 text-white px-3 py-1 rounded-full text-sm font-semibold">
                    <i class="fas fa-heart mr-1"></i>Popular
                </div>
                @elseif($product->created_at->diffInDays() <= 7)
                    <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                    <i class="fas fa-star mr-1"></i>Baru
            </div>
            @endif
        </div>
        <p class="text-gray-600 text-lg mb-4">{{ $product->description ?? 'Tidak ada deskripsi.' }}</p>
        <p class="text-yellow-400 font-semibold text-lg mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <p class="text-gray-600 text-lg mb-4">Stok: {{ $product->stock }}</p>
        <p class="text-gray-600 text-lg mb-4">Status: {{ $product->status == 'available' ? 'Tersedia' : 'Tidak Tersedia' }}</p>

        <!-- Quantity Selector -->
        <div class="flex items-center gap-4 mb-4">
            <span class="text-gray-700 font-semibold">Jumlah:</span>
            <div class="flex items-center gap-2">
                <button class="quantity-btn w-8 h-8 bg-gray-200 hover:bg-gray-300 rounded-full flex items-center justify-center" onclick="changeQuantity('modal-{{ $product->id }}', -1)">
                    <i class="fas fa-minus text-xs"></i>
                </button>
                <span class="quantity-display px-3 py-1 bg-gray-100 rounded-lg font-semibold min-w-[3rem] text-center">1</span>
                <button class="quantity-btn w-8 h-8 bg-gray-200 hover:bg-gray-300 rounded-full flex items-center justify-center" onclick="changeQuantity('modal-{{ $product->id }}', 1)">
                    <i class="fas fa-plus text-xs"></i>
                </button>
            </div>
        </div>

        @if($product->status == 'available' && $product->stock > 0)
        <button class="add-to-cart-btn bg-yellow-400 text-white px-6 py-3 rounded-lg hover:bg-yellow-500 font-semibold transition-all duration-300 w-full"
                data-product-id="{{ $product->id }}"
                data-product-name="{{ $product->name }}"
                data-product-price="{{ $product->price }}"
                data-product-image="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/300x200/png' }}"
                data-product-category="{{ $product->category->name ?? 'Uncategorized' }}">
            <i class="fas fa-shopping-cart mr-2"></i>
            Tambah ke Keranjang
        </button>
        @else
        <button class="bg-gray-400 text-white px-6 py-3 rounded-lg font-semibold w-full cursor-not-allowed" disabled>
            <i class="fas fa-times mr-2"></i>
            Stok Habis
        </button>
        @endif
    </div>
    </div>
    @endforeach

    <!-- Success Notification -->
    <div id="success-notification" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center gap-2">
            <i class="fas fa-check-circle"></i>
            <span>Produk berhasil ditambahkan ke keranjang!</span>
        </div>
    </div>

    <!-- CTA Section -->
    @include('components.cta')

    <!-- Footer -->
    @include('components.footer')

    <!-- Cart JavaScript -->
    <script>
        // Cart functionality
        class ProductPageCart {
            constructor() {
                this.cart = this.getCart();
                this.initializeEventListeners();
                this.updateNavCartCount();
            }

            getCart() {
                const cart = localStorage.getItem('cart');
                return cart ? JSON.parse(cart) : [];
            }

            saveCart() {
                localStorage.setItem('cart', JSON.stringify(this.cart));
                this.updateNavCartCount();
            }

            addToCart(productData, quantity = 1) {
                // Check if product already exists in cart
                const existingItemIndex = this.cart.findIndex(item => item.id == productData.id);

                if (existingItemIndex !== -1) {
                    // Update quantity if product exists
                    this.cart[existingItemIndex].quantity += quantity;
                } else {
                    // Add new product to cart
                    this.cart.push({
                        id: parseInt(productData.id),
                        name: productData.name,
                        price: parseInt(productData.price),
                        quantity: quantity,
                        image: productData.image,
                        category: productData.category
                    });
                }

                this.saveCart();
                this.showSuccessNotification();
            }

            showSuccessNotification() {
                const notification = document.getElementById('success-notification');
                notification.classList.remove('translate-x-full');

                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                }, 3000);
            }

            updateNavCartCount() {
                const cartCount = document.querySelector('nav .fa-shopping-cart + span');
                if (cartCount) {
                    const totalItems = this.cart.reduce((sum, item) => sum + item.quantity, 0);
                    cartCount.textContent = totalItems;
                }
            }

            initializeEventListeners() {
                // Modal functionality
                document.querySelectorAll('.product-item').forEach(item => {
                    item.addEventListener('click', (e) => {
                        // Don't open modal if clicking on add to cart button
                        if (e.target.closest('.add-to-cart-btn')) return;

                        const modalId = item.getAttribute('data-modal');
                        const modal = document.getElementById(modalId);
                        if (modal) {
                            modal.classList.remove('hidden');
                            document.body.style.overflow = 'hidden';
                        }
                    });
                });

                // Close modal functionality
                document.querySelectorAll('.close-modal').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const modal = btn.closest('.modal');
                        modal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    });
                });

                // Close modal when clicking outside
                document.querySelectorAll('.modal').forEach(modal => {
                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) {
                            modal.classList.add('hidden');
                            document.body.style.overflow = 'auto';
                        }
                    });
                });

                // Add to cart functionality
                document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();

                        const modal = btn.closest('.modal');
                        const quantity = parseInt(modal.querySelector('.quantity-display').textContent);

                        const productData = {
                            id: btn.getAttribute('data-product-id'),
                            name: btn.getAttribute('data-product-name'),
                            price: btn.getAttribute('data-product-price'),
                            image: btn.getAttribute('data-product-image'),
                            category: btn.getAttribute('data-product-category')
                        };

                        this.addToCart(productData, quantity);

                        // Close modal after adding to cart
                        modal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    });
                });

                // Category tabs functionality
                document.querySelectorAll('.category-tab').forEach(tab => {
                    tab.addEventListener('click', () => {
                        // Remove active class from all tabs
                        document.querySelectorAll('.category-tab').forEach(t => {
                            t.classList.remove('bg-yellow-400', 'text-white');
                            t.classList.add('text-gray-800');
                        });

                        // Add active class to clicked tab
                        tab.classList.add('bg-yellow-400', 'text-white');
                        tab.classList.remove('text-gray-800');

                        const category = tab.getAttribute('data-category');
                        this.filterByCategory(category);
                    });
                });

                // Set first tab as active by default
                const firstTab = document.querySelector('.category-tab');
                if (firstTab) {
                    firstTab.classList.add('bg-yellow-400', 'text-white');
                    firstTab.classList.remove('text-gray-800');
                }
            }

            filterByCategory(category) {
                const products = document.querySelectorAll('.product-item');

                products.forEach(product => {
                    if (category === 'all' || product.classList.contains(category)) {
                        product.classList.remove('hidden');
                    } else {
                        product.classList.add('hidden');
                    }
                });
            }
        }

        // Quantity change function
        function changeQuantity(modalId, change) {
            const modal = document.getElementById(modalId);
            const quantityDisplay = modal.querySelector('.quantity-display');
            let currentQuantity = parseInt(quantityDisplay.textContent);

            currentQuantity += change;
            if (currentQuantity < 1) currentQuantity = 1;
            if (currentQuantity > 99) currentQuantity = 99; // Maximum quantity limit

            quantityDisplay.textContent = currentQuantity;
        }

        // Initialize when page loads
        let productCart;
        document.addEventListener('DOMContentLoaded', function() {
            productCart = new ProductPageCart();
        });
    </script>
</body>

</html>
