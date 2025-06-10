<!DOCTYPE html>
<html lang="id">

<head>
    @include('components.head')
    <title>Ring Bun - Keranjang Belanja</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('/js/product/cart-manager.js') }}"></script>
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

                    <!-- Recommended Products - Updated Section -->
                    <div class="mt-8 bg-white rounded-3xl shadow-lg overflow-hidden">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-brown mb-6 flex items-center">
                                <i class="fas fa-star mr-3 text-golden"></i>
                                Rekomendasi Untuk Anda
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @forelse($products as $product)
                                <div class="card-hover border border-gray-100 rounded-2xl p-4 group">
                                    <div class="flex gap-4">
                                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}"
                                            alt="{{ $product->name }}"
                                            class="w-20 h-20 object-cover rounded-xl group-hover:scale-110 transition-transform duration-300">
                                        <div class="flex-1">
                                            <h4 class="font-bold text-brown mb-1">{{ $product->name }}</h4>
                                            <p class="text-sm text-gray-600 mb-2">{{$product->category->name}}</p>
                                            <p class="text-golden font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <button class="w-full mt-3 bg-golden/10 hover:bg-golden text-golden hover:text-white py-2 rounded-lg font-semibold transition-all duration-300"
                                        onclick="addRecommendedToCart(
                                            {{ $product->id }},
                                            '{{ addslashes($product->name) }}',
                                            {{ $product->price }},
                                            '{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}',
                                            '{{ addslashes($product->category->name ?? 'Product') }}'
                                        )">
                                        <i class="fas fa-plus mr-1"></i>
                                        Tambah
                                    </button>
                                </div>
                                @empty
                                <div class="col-span-2 text-center py-8">
                                    <p class="text-gray-500">Tidak ada produk rekomendasi tersedia</p>
                                </div>
                                @endforelse
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
    <div id="success-notification" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-[calc(100%+2rem)] transition-transform duration-300 z-50">
        <div class="flex items-center gap-2">
            <i class="fas fa-check-circle"></i>
            <span id="notification-message">Produk berhasil ditambahkan ke keranjang!</span>
        </div>
    </div>

    <!-- Checkout Modal - Tambahkan sebelum closing body tag -->
    <div id="checkout-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full mx-4 max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-golden to-yellow-500 p-6 rounded-t-3xl">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold text-white">Checkout</h3>
                    <button id="close-modal" class="text-white hover:text-gray-200 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Content -->
            <div class="p-6">
                <form id="checkout-form" class="space-y-4">
                    <!-- Customer Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                        <input type="text" id="customer-name" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-golden focus:border-transparent"
                            placeholder="Masukkan nama lengkap">
                    </div>

                    <!-- Customer Phone -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp *</label>
                        <input type="tel" id="customer-phone" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-golden focus:border-transparent"
                            placeholder="08xxxxxxxxxx">
                    </div>

                    <!-- Customer Address -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap *</label>
                        <textarea id="customer-address" required rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-golden focus:border-transparent resize-none"
                            placeholder="Masukkan alamat lengkap untuk pengiriman"></textarea>
                    </div>

                    <!-- Order Summary in Modal -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="font-semibold text-gray-700 mb-2">Ringkasan Pesanan</h4>
                        <div class="space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span>Rp <span id="modal-subtotal">0</span></span>
                            </div>
                            <div class="flex justify-between">
                                <span>PPN (11%)</span>
                                <span>Rp <span id="modal-tax">0</span></span>
                            </div>
                            <div id="modal-discount-row" class="flex justify-between text-green-600 hidden">
                                <span>Diskon</span>
                                <span>-Rp <span id="modal-discount">0</span></span>
                            </div>
                            <div class="border-t pt-1 flex justify-between font-bold">
                                <span>Total</span>
                                <span class="text-golden">Rp <span id="modal-total">0</span></span>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" id="submit-checkout"
                        class="w-full bg-golden hover:bg-yellow-500 text-white py-4 rounded-full font-bold text-lg transition-all duration-300 hover:transform hover:scale-105 shadow-lg">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Kirim Pesanan via WhatsApp
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    @include('components.footer')

    <!-- Cart JavaScript -->
    <script>
        class CartManager {
            constructor() {
                this.cart = this.getCart();
                this.discount = 0;
                this.discountCode = '';
                this.updateCartDisplay();
                this.updateNavCartCount();
                this.initializePromoCode();
                this.initializeCheckout(); // Panggilan ke fungsi checkout
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
                this.updateCartDisplay();
                this.showSuccessNotification('Produk berhasil ditambahkan ke keranjang!');
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
                this.showSuccessNotification('Produk berhasil dihapus dari keranjang!');
            }

            updateSummary() {
                const subtotal = this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                const tax = Math.round(subtotal * 0.11);
                const discountAmount = Math.round(subtotal * this.discount);
                const total = subtotal + tax - discountAmount;

                document.getElementById('subtotal').textContent = this.formatNumber(subtotal);
                document.getElementById('tax').textContent = this.formatNumber(tax);
                document.getElementById('total').textContent = this.formatNumber(total);
            }

            initializePromoCode() {
                const promoInput = document.getElementById('promo-input');
                const applyBtn = document.getElementById('apply-promo-btn');
                const promoMessage = document.getElementById('promo-message');

                applyBtn.addEventListener('click', () => {
                    const code = promoInput.value.trim().toUpperCase();
                    this.applyPromoCode(code, promoMessage);
                });

                promoInput.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter') {
                        const code = promoInput.value.trim().toUpperCase();
                        this.applyPromoCode(code, promoMessage);
                    }
                });
            }

            applyPromoCode(code, messageElement) {
                const promoCodes = {
                    'WELCOME10': {
                        discount: 0.10,
                        description: 'Diskon 10% untuk pelanggan baru'
                    },
                    'SAVE20': {
                        discount: 0.20,
                        description: 'Diskon 20% pembelian minimal Rp 100.000'
                    },
                    'RINGBUN15': {
                        discount: 0.15,
                        description: 'Diskon 15% khusus member'
                    }
                };

                if (promoCodes[code]) {
                    const subtotal = this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                    if (code === 'SAVE20' && subtotal < 100000) {
                        this.showPromoMessage(messageElement, 'Minimal pembelian Rp 100.000 untuk kode ini', 'error');
                        return;
                    }

                    this.discount = promoCodes[code].discount;
                    this.discountCode = code;
                    this.updateSummary();
                    this.showPromoMessage(messageElement, `Kode promo berhasil diterapkan! ${promoCodes[code].description}`, 'success');
                } else if (code === '') {
                    this.showPromoMessage(messageElement, 'Silakan masukkan kode promo', 'error');
                } else {
                    this.showPromoMessage(messageElement, 'Kode promo tidak valid', 'error');
                }
            }

            showPromoMessage(element, message, type) {
                element.textContent = message;
                element.classList.remove('hidden', 'text-green-600', 'text-red-600');
                element.classList.add(type === 'success' ? 'text-green-600' : 'text-red-600');

                setTimeout(() => {
                    element.classList.add('hidden');
                }, 5000);
            }

            showSuccessNotification(message) {
                const notification = document.getElementById('success-notification');
                const messageSpan = document.getElementById('notification-message');
                messageSpan.textContent = message;

                notification.classList.remove('translate-x-[calc(100%+2rem)]');
                notification.classList.remove('translate-x-0');

                setTimeout(() => {
                    notification.classList.add('translate-x-[calc(100%+2rem)]');
                }, 3000);
            }

            showErrorNotification(message) {
                const notification = document.getElementById('success-notification');
                const messageSpan = document.getElementById('notification-message');

                notification.className = notification.className.replace('bg-green-500', 'bg-red-500');
                messageSpan.textContent = message;
                notification.classList.remove('translate-x-full');

                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => {
                        notification.className = notification.className.replace('bg-red-500', 'bg-green-500');
                    }, 300);
                }, 4000);
            }

            updateNavCartCount() {
                const cartCount = document.querySelector('nav .fa-shopping-cart + span');
                if (cartCount) {
                    const totalItems = this.cart.reduce((sum, item) => sum + item.quantity, 0);
                    cartCount.textContent = totalItems;
                }
            }

            initializeCheckout() {
                const checkoutBtn = document.getElementById('checkout-btn');
                const checkoutModal = document.getElementById('checkout-modal');
                const closeModal = document.getElementById('close-modal');
                const checkoutForm = document.getElementById('checkout-form');

                checkoutBtn.addEventListener('click', () => {
                    if (this.cart.length > 0) {
                        this.showCheckoutModal();
                    }
                });

                closeModal.addEventListener('click', () => {
                    this.hideCheckoutModal();
                });

                checkoutModal.addEventListener('click', (e) => {
                    if (e.target === checkoutModal) {
                        this.hideCheckoutModal();
                    }
                });

                checkoutForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.processCheckout();
                });
            }

            showCheckoutModal() {
                const modal = document.getElementById('checkout-modal');
                const subtotal = this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                const tax = Math.round(subtotal * 0.11);
                const discountAmount = Math.round(subtotal * this.discount);
                const total = subtotal + tax - discountAmount;

                document.getElementById('modal-subtotal').textContent = this.formatNumber(subtotal);
                document.getElementById('modal-tax').textContent = this.formatNumber(tax);
                document.getElementById('modal-total').textContent = this.formatNumber(total);

                const discountRow = document.getElementById('modal-discount-row');
                if (this.discount > 0) {
                    document.getElementById('modal-discount').textContent = this.formatNumber(discountAmount);
                    discountRow.classList.remove('hidden');
                } else {
                    discountRow.classList.add('hidden');
                }

                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            hideCheckoutModal() {
                const modal = document.getElementById('checkout-modal');
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            async processCheckout() {
                const submitBtn = document.getElementById('submit-checkout');
                const originalText = submitBtn.innerHTML;

                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
                submitBtn.disabled = true;

                try {
                    const customerName = document.getElementById('customer-name').value;
                    const customerPhone = document.getElementById('customer-phone').value;
                    const customerAddress = document.getElementById('customer-address').value;

                    const subtotal = this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                    const tax = Math.round(subtotal * 0.11);
                    const discountAmount = Math.round(subtotal * this.discount);
                    const total = subtotal + tax - discountAmount;

                    const checkoutData = {
                        customer_name: customerName,
                        customer_phone: customerPhone,
                        customer_address: customerAddress,
                        cart_items: this.cart,
                        subtotal: subtotal,
                        tax: tax,
                        discount: discountAmount,
                        total: total,
                        promo_code: this.discountCode,
                        _token: document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    };

                    const response = await fetch('/checkout', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': checkoutData._token
                        },
                        body: JSON.stringify(checkoutData)
                    });

                    const result = await response.json();

                    if (result.success) {
                        this.clearCart();
                        this.hideCheckoutModal();
                        this.showSuccessNotification('Pesanan berhasil dibuat! Mengarahkan ke WhatsApp...');
                        setTimeout(() => {
                            window.open(result.whatsapp_url, '_blank');
                        }, 1500);
                    } else {
                        throw new Error(result.message || 'Terjadi kesalahan saat memproses pesanan');
                    }

                } catch (error) {
                    console.error('Checkout error:', error);
                    this.showErrorNotification(error.message || 'Terjadi kesalahan saat memproses pesanan');
                } finally {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }
            }

            clearCart() {
                this.cart = [];
                this.discount = 0;
                this.discountCode = '';
                this.saveCart();
                this.updateCartDisplay();
                document.getElementById('promo-input').value = '';
            }

            formatNumber(number) {
                return number.toLocaleString('id-ID');
            }
        }

        // Fungsi untuk tambah produk dari rekomendasi
        function addRecommendedToCart(id, name, price, image, category = 'Product') {
            // Validasi parameter
            if (!id || !name || !price) {
                console.error('Parameter tidak lengkap untuk addRecommendedToCart');
                cartManager.showErrorNotification('Terjadi kesalahan saat menambahkan produk');
                return;
            }

            const productData = {
                id: parseInt(id),
                name: name.toString(),
                price: parseInt(price),
                image: image || 'https://via.placeholder.com/150',
                category: category.toString()
            };

            // Pastikan cartManager sudah diinisialisasi
            if (typeof cartManager !== 'undefined' && cartManager) {
                cartManager.addToCart(productData, 1);
            } else {
                console.error('CartManager belum diinisialisasi');
            }
        }

        // Inisialisasi saat halaman dimuat
        let cartManager;
        document.addEventListener('DOMContentLoaded', function() {
            cartManager = new CartManager();
        });
    </script>

    <!-- Include other scripts -->
    @include('components.script')

</body>

</html>
