
<!DOCTYPE html>
<html lang="id">

<head>
    @include('components.head')
    <title>Ring Bun - Keranjang Belanja</title>
</head>

<body class="bg-cream">

    @include('components.nav')

    <!-- Main Cart Section -->
    <section class="pt-24 pb-20 gradient-bg min-h-screen">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Page Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-brown mb-4">Keranjang Belanja</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Tinjau produk pilihan Anda sebelum melanjutkan ke checkout</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                        <!-- Cart Header -->
                        <div class="bg-gradient-to-r from-golden to-yellow-500 p-6">
                            <h2 class="text-2xl font-bold text-white flex items-center">
                                <i class="fas fa-shopping-cart mr-3"></i>
                                Item Belanja (<span id="total-items">0</span>)
                            </h2>
                        </div>

                        <!-- Cart Items List -->
                        <div id="cart-items-container" class="p-6">
                            <!-- Empty Cart State -->
                            <div id="empty-cart" class="text-center py-12">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-shopping-cart text-4xl text-gray-400"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-600 mb-4">Keranjang Belanja Kosong</h3>
                                <p class="text-gray-500 mb-8">Yuk, tambahkan produk favorit Anda ke keranjang!</p>
                                <a href="{{ route('product') }}" class="inline-block bg-golden hover:bg-yellow-500 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 hover:transform hover:scale-105">
                                    <i class="fas fa-shopping-bag mr-2"></i>
                                    Mulai Belanja
                                </a>
                            </div>

                            <!-- Cart Items Will Be Populated Here -->
                            <div id="cart-items-list" class="space-y-4 hidden">
                                <!-- Cart item template will be added via JavaScript -->
                            </div>
                        </div>
                    </div>

                    <!-- Recommended Products -->
                    <div class="mt-8 bg-white rounded-3xl shadow-lg overflow-hidden">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-brown mb-6 flex items-center">
                                <i class="fas fa-star mr-3 text-golden"></i>
                                Rekomendasi Untuk Anda
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Recommended Item 1 -->
                                <div class="card-hover border border-gray-100 rounded-2xl p-4 group">
                                    <div class="flex gap-4">
                                        <img src="https://images.unsplash.com/photo-1549340418-33643752985e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                             alt="Chocolate Bun"
                                             class="w-20 h-20 object-cover rounded-xl group-hover:scale-110 transition-transform duration-300">
                                        <div class="flex-1">
                                            <h4 class="font-bold text-brown mb-1">Chocolate Sweet Bun</h4>
                                            <p class="text-sm text-gray-600 mb-2">Roti manis dengan isian cokelat premium</p>
                                            <p class="text-golden font-bold">Rp 18.000</p>
                                        </div>
                                    </div>
                                    <button class="w-full mt-3 bg-golden/10 hover:bg-golden text-golden hover:text-white py-2 rounded-lg font-semibold transition-all duration-300" onclick="addRecommendedToCart(1, 'Chocolate Sweet Bun', 18000, 'https://images.unsplash.com/photo-1549340418-33643752985e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80', 'Sweet Buns')">
                                        <i class="fas fa-plus mr-1"></i>
                                        Tambah
                                    </button>
                                </div>

                                <!-- Recommended Item 2 -->
                                <div class="card-hover border border-gray-100 rounded-2xl p-4 group">
                                    <div class="flex gap-4">
                                        <img src="https://images.unsplash.com/photo-1586444248902-2f64eddc13df?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                             alt="Beef Bun"
                                             class="w-20 h-20 object-cover rounded-xl group-hover:scale-110 transition-transform duration-300">
                                        <div class="flex-1">
                                            <h4 class="font-bold text-brown mb-1">Beef Savory Bun</h4>
                                            <p class="text-sm text-gray-600 mb-2">Roti gurih dengan isian daging sapi</p>
                                            <p class="text-golden font-bold">Rp 22.000</p>
                                        </div>
                                    </div>
                                    <button class="w-full mt-3 bg-golden/10 hover:bg-golden text-golden hover:text-white py-2 rounded-lg font-semibold transition-all duration-300" onclick="addRecommendedToCart(2, 'Beef Savory Bun', 22000, 'https://images.unsplash.com/photo-1586444248902-2f64eddc13df?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80', 'Savory Buns')">
                                        <i class="fas fa-plus mr-1"></i>
                                        Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden sticky top-24">
                        <!-- Summary Header -->
                        <div class="bg-brown p-6">
                            <h3 class="text-2xl font-bold text-white flex items-center">
                                <i class="fas fa-receipt mr-3"></i>
                                Ringkasan Pesanan
                            </h3>
                        </div>

                        <!-- Summary Content -->
                        <div class="p-6 space-y-4">
                            <!-- Subtotal -->
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold">Rp <span id="subtotal">0</span></span>
                            </div>

                            <!-- Tax -->
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">PPN (11%)</span>
                                <span class="font-semibold">Rp <span id="tax">0</span></span>
                            </div>

                            <!-- Delivery Fee -->
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Biaya Pengiriman</span>
                                <span class="font-semibold text-green-600">GRATIS</span>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-brown">Total</span>
                                    <span class="text-2xl font-bold text-golden">Rp <span id="total">0</span></span>
                                </div>
                            </div>

                            <!-- Promo Code -->
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex gap-2">
                                    <input id="promo-input" type="text"
                                           placeholder="Kode promo"
                                           class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-golden focus:border-transparent">
                                    <button id="apply-promo-btn" class="bg-golden hover:bg-yellow-500 text-white px-4 py-2 rounded-lg font-semibold transition-colors">
                                        Apply
                                    </button>
                                </div>
                                <div id="promo-message" class="mt-2 text-sm hidden"></div>
                            </div>

                            <!-- Checkout Button -->
                            <button id="checkout-btn"
                                    class="w-full bg-golden hover:bg-yellow-500 text-white py-4 rounded-full font-bold text-lg transition-all duration-300 hover:transform hover:scale-105 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                                    disabled>
                                <i class="fas fa-credit-card mr-2"></i>
                                Lanjut ke Pembayaran
                            </button>

                            <!-- Continue Shopping -->
                            <a href="{{ route('product') }}"
                               class="block w-full text-center border-2 border-golden text-golden hover:bg-golden hover:text-white py-3 rounded-full font-semibold transition-all duration-300">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Lanjut Belanja
                            </a>
                        </div>

                        <!-- Security Badge -->
                        <div class="bg-gray-50 p-4 text-center">
                            <div class="flex items-center justify-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-shield-alt text-green-500"></i>
                                <span>Transaksi aman & terpercaya</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Notification -->
    <div id="success-notification" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center gap-2">
            <i class="fas fa-check-circle"></i>
            <span id="notification-message">Produk berhasil ditambahkan ke keranjang!</span>
        </div>
    </div>

    <!-- Footer Section -->
    @include('components.footer')

    <!-- Cart JavaScript -->
    <script>
        // Cart functionality
        class CartManager {
            constructor() {
                this.cart = this.getCart();
                this.initializeCart();
                this.updateCartDisplay();
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

            initializeCart() {
                // Sample data for demonstration
                if (this.cart.length === 0) {
                    this.cart = [
                        {
                            id: 1,
                            name: 'Sweet Chocolate Bun',
                            price: 18000,
                            quantity: 2,
                            image: 'https://images.unsplash.com/photo-1549340418-33643752985e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                            category: 'Sweet Buns'
                        },
                        {
                            id: 2,
                            name: 'Beef Savory Bun',
                            price: 22000,
                            quantity: 1,
                            image: 'https://images.unsplash.com/photo-1586444248902-2f64eddc13df?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                            category: 'Savory Buns'
                        }
                    ];
                    this.saveCart();
                }
            }

            updateCartDisplay() {
                const container = document.getElementById('cart-items-container');
                const emptyCart = document.getElementById('empty-cart');
                const itemsList = document.getElementById('cart-items-list');
                const totalItems = document.getElementById('total-items');
                const checkoutBtn = document.getElementById('checkout-btn');

                if (this.cart.length === 0) {
                    emptyCart.classList.remove('hidden');
                    itemsList.classList.add('hidden');
                    checkoutBtn.disabled = true;
                } else {
                    emptyCart.classList.add('hidden');
                    itemsList.classList.remove('hidden');
                    checkoutBtn.disabled = false;
                    this.renderCartItems();
                }

                totalItems.textContent = this.cart.length;
                this.updateSummary();
            }

            renderCartItems() {
                const itemsList = document.getElementById('cart-items-list');
                itemsList.innerHTML = '';

                this.cart.forEach((item, index) => {
                    const itemElement = document.createElement('div');
                    itemElement.className = 'cart-item border border-gray-100 rounded-2xl p-4 hover:shadow-md transition-shadow duration-300';
                    itemElement.innerHTML = `
                        <div class="flex gap-4">
                            <img src="${item.image}" alt="${item.name}" class="w-20 h-20 object-cover rounded-xl">
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h4 class="font-bold text-brown">${item.name}</h4>
                                        <p class="text-sm text-gray-600">${item.category}</p>
                                    </div>
                                    <button onclick="cartManager.removeItem(${index})" class="text-red-500 hover:text-red-700 transition-colors">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <button onclick="cartManager.updateQuantity(${index}, ${item.quantity - 1})" class="w-8 h-8 bg-gray-100 hover:bg-golden hover:text-white rounded-full flex items-center justify-center transition-colors">
                                            <i class="fas fa-minus text-xs"></i>
                                        </button>
                                        <span class="px-3 py-1 bg-gray-50 rounded-lg font-semibold min-w-[3rem] text-center">${item.quantity}</span>
                                        <button onclick="cartManager.updateQuantity(${index}, ${item.quantity + 1})" class="w-8 h-8 bg-gray-100 hover:bg-golden hover:text-white rounded-full flex items-center justify-center transition-colors">
                                            <i class="fas fa-plus text-xs"></i>
                                        </button>
                                    </div>
                                    <p class="text-golden font-bold">Rp ${this.formatNumber(item.price * item.quantity)}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    itemsList.appendChild(itemElement);
                });
            }

            updateQuantity(index, newQuantity) {
                if (newQuantity <= 0) {
                    this.removeItem(index);
                } else {
                    this.cart[index].quantity = newQuantity;
                    this.saveCart();
                    this.updateCartDisplay();
                }
            }

            removeItem(index) {
                this.cart.splice(index, 1);
                this.saveCart();
                this.updateCartDisplay();
            }

            updateSummary() {
                const subtotal = this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                const tax = Math.round(subtotal * 0.11);
                const total = subtotal + tax;

                document.getElementById('subtotal').textContent = this.formatNumber(subtotal);
                document.getElementById('tax').textContent = this.formatNumber(tax);
                document.getElementById('total').textContent = this.formatNumber(total);
            }

            updateNavCartCount() {
                const cartCount = document.querySelector('nav .fa-shopping-cart + span');
                if (cartCount) {
                    cartCount.textContent = this.cart.length;
                }
            }

            formatNumber(number) {
                return number.toLocaleString('id-ID');
            }
        }

        // Initialize cart when page loads
        let cartManager;
        document.addEventListener('DOMContentLoaded', function() {
            cartManager = new CartManager();
        });
    </script>

    <!-- Include other scripts -->
    @include('components.script')

</body>

</html>
