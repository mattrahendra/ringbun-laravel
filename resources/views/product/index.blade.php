<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - Produk</title>
    <script src="{{ asset('/js/product/category.js') }}"></script>
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
                            <div class="absolute top-4 right-4 bg-brown text-white px-3 py-1 rounded-full text-sm font-semibold">
                            <!-- <i class="fas fa-star mr-1"></i> -->
                            New
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
    <div id="modal-{{ $product->id }}" class="modal fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center hidden z-50 p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 modal-content">

            <!-- Modal Header -->
            <div class="relative">
                <div class="absolute top-4 right-4 z-10">
                    <button class="close-modal w-10 h-10 bg-white/90 backdrop-blur-sm hover:bg-white text-gray-600 hover:text-gray-800 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>

                <!-- Product Image -->
                <div class="relative overflow-hidden h-64">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/600x400/png' }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

                    <!-- Product Badge -->
                    @if($product->stock > 50)
                    <div class="absolute top-4 left-4 bg-golden text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                        <i class="fas fa-heart mr-1"></i>Popular
                    </div>
                    @elseif($product->created_at->diffInDays() <= 7)
                        <div class="absolute top-4 left-4 bg-brown text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                        <i class="fas fa-star mr-1"></i>Baru
                </div>
                @endif
            </div>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <!-- Product Title & Price -->
            <div class="mb-4">
                <h3 class="text-2xl font-bold text-brown mb-2">{{ $product->name }}</h3>
                <span class="text-2xl font-bold text-golden">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            </div>

            <!-- Product Description -->
            <div class="mb-6">
                <p class="text-gray-600 leading-relaxed">
                    {{ $product->description ?? 'Nikmati kelezatan roti premium dengan cita rasa autentik yang dipanggang fresh setiap hari.' }}
                </p>
            </div>

            <!-- Quantity Selector -->
            <div class="flex items-center justify-between mb-6 p-4 bg-cream/30 rounded-2xl">
                <span class="text-brown font-bold">Jumlah:</span>
                <div class="flex items-center gap-3">
                    <button class="quantity-btn w-10 h-10 bg-golden hover:bg-yellow-500 text-white rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg"
                        onclick="changeQuantity('modal-{{ $product->id }}', -1)">
                        <i class="fas fa-minus text-sm"></i>
                    </button>
                    <span class="quantity-display px-4 py-2 bg-white rounded-full font-bold text-brown text-lg min-w-[3rem] text-center border-2 border-cream shadow-inner">1</span>
                    <button class="quantity-btn w-10 h-10 bg-golden hover:bg-yellow-500 text-white rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg"
                        onclick="changeQuantity('modal-{{ $product->id }}', 1)">
                        <i class="fas fa-plus text-sm"></i>
                    </button>
                </div>
            </div>

            <!-- Action Button -->
            @if($product->status == 'available' && $product->stock > 0)
            <button class="add-to-cart-btn w-full bg-golden hover:bg-yellow-500 text-white px-6 py-3 rounded-full font-bold text-lg transition-all duration-300 hover:transform hover:scale-105 shadow-lg"
                data-product-id="{{ $product->id }}"
                data-product-name="{{ $product->name }}"
                data-product-price="{{ $product->price }}"
                data-product-image="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/600x400/png' }}"
                data-product-category="{{ $product->category->name ?? 'Uncategorized' }}">
                <i class="fas fa-shopping-cart mr-2"></i>
                Tambah ke Keranjang
            </button>
            @else
            <button class="w-full bg-gray-400 text-white px-6 py-3 rounded-full font-bold text-lg cursor-not-allowed opacity-50" disabled>
                <i class="fas fa-times mr-2"></i>
                Stok Habis
            </button>
            @endif
        </div>
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
    <style>
        /* Modal Animation */
        .modal.show .modal-content {
            transform: scale(1);
        }

        /* Floating Animation for Badges */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .modal .floating-badge {
            animation: float 3s ease-in-out infinite;
        }

        /* Quantity Button Hover Effects */
        .quantity-btn:hover {
            box-shadow: 0 8px 25px rgba(255, 193, 7, 0.3);
        }

        /* Enhanced backdrop blur */
        .modal {
            backdrop-filter: blur(10px);
        }

        /* Smooth transitions */
        .modal-content {
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* Custom scrollbar for modal content */
        .modal-content::-webkit-scrollbar {
            width: 6px;
        }

        .modal-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .modal-content::-webkit-scrollbar-thumb {
            background: #ffd700;
            border-radius: 10px;
        }

        .modal-content::-webkit-scrollbar-thumb:hover {
            background: #ffed4e;
        }
    </style>
    <!-- Cart JavaScript -->
    <script>
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
                const existingItemIndex = this.cart.findIndex(item => item.id == productData.id);

                if (existingItemIndex !== -1) {
                    this.cart[existingItemIndex].quantity += quantity;
                } else {
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
                document.querySelectorAll('.product-item').forEach(item => {
                    item.addEventListener('click', (e) => {
                        if (e.target.closest('.add-to-cart-btn')) return;

                        const modalId = item.getAttribute('data-modal');
                        window.showModal(modalId);
                    });
                });

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
                        window.closeModal(modal.id);
                    });
                });

                document.querySelectorAll('.category-tab').forEach(tab => {
                    tab.addEventListener('click', () => {
                        document.querySelectorAll('.category-tab').forEach(t => {
                            t.classList.remove('bg-yellow-400', 'text-white');
                            t.classList.add('text-gray-800');
                        });

                        tab.classList.add('bg-yellow-400', 'text-white');
                        tab.classList.remove('text-gray-800');

                        const category = tab.getAttribute('data-category');
                        this.filterByCategory(category);
                    });
                });

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

        // ✅ Enhanced modal & global interaction
        document.addEventListener('DOMContentLoaded', function() {
            window.showModal = function(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.remove('hidden');
                    setTimeout(() => modal.classList.add('show'), 10);
                    document.body.style.overflow = 'hidden';
                }
            };

            window.closeModal = function(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.remove('show');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }, 300);
                }
            };

            // Outside click to close modal
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) closeModal(this.id);
                });
            });

            // Close modal button
            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', function() {
                    const modal = this.closest('.modal');
                    if (modal) closeModal(modal.id);
                });
            });

            // Global change quantity
            window.changeQuantity = function(modalId, change) {
                const modal = document.getElementById(modalId);
                const quantityDisplay = modal.querySelector('.quantity-display');
                let currentQuantity = parseInt(quantityDisplay.textContent);
                let newQuantity = Math.max(1, Math.min(99, currentQuantity + change));

                quantityDisplay.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    quantityDisplay.textContent = newQuantity;
                    quantityDisplay.style.transform = 'scale(1)';
                }, 150);
            };

            // Button feedback animation
            document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menambahkan...';
                    this.disabled = true;

                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-check mr-2"></i>Berhasil Ditambahkan!';
                        this.classList.remove('bg-golden', 'hover:bg-yellow-500');
                        this.classList.add('bg-green-500');

                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.disabled = false;
                            this.classList.remove('bg-green-500');
                            this.classList.add('bg-golden', 'hover:bg-yellow-500');
                        }, 2000);
                    }, 1000);
                });
            });

            // Inisialisasi cart
            window.productCart = new ProductPageCart();
        });
    </script>
</body>

</html>
