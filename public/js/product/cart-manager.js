// cart-manager.js - Shared Cart Management System

class GlobalCartManager {
    constructor() {
        this.cart = this.getCart();
        this.updateNavCartCount();
    }

    getCart() {
        const cart = localStorage.getItem('cart');
        return cart ? JSON.parse(cart) : [];
    }

    saveCart() {
        localStorage.setItem('cart', JSON.stringify(this.cart));
        this.updateNavCartCount();
        this.triggerCartUpdate();
    }

    addToCart(productData, quantity = 1) {
        // Validate product data
        if (!productData || !productData.id || !productData.name || !productData.price) {
            console.error('Invalid product data');
            return false;
        }

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
                image: productData.image || 'https://placehold.co/300x200/png',
                category: productData.category || 'Uncategorized'
            });
        }

        this.saveCart();
        return true;
    }

    removeFromCart(productId) {
        this.cart = this.cart.filter(item => item.id != productId);
        this.saveCart();
    }

    updateQuantity(productId, newQuantity) {
        const itemIndex = this.cart.findIndex(item => item.id == productId);
        if (itemIndex !== -1) {
            if (newQuantity <= 0) {
                this.removeFromCart(productId);
            } else {
                this.cart[itemIndex].quantity = newQuantity;
                this.saveCart();
            }
        }
    }

    getCartTotal() {
        return this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    }

    getCartItemCount() {
        return this.cart.reduce((sum, item) => sum + item.quantity, 0);
    }

    clearCart() {
        this.cart = [];
        this.saveCart();
    }

    updateNavCartCount() {
        const cartCount = document.querySelector('nav .fa-shopping-cart + span');
        if (cartCount) {
            const totalItems = this.getCartItemCount();
            cartCount.textContent = totalItems;

            // Add bounce animation when cart count changes
            cartCount.style.transform = 'scale(1.2)';
            setTimeout(() => {
                cartCount.style.transform = 'scale(1)';
            }, 200);
        }
    }

    triggerCartUpdate() {
        // Dispatch custom event for cart updates
        const event = new CustomEvent('cartUpdated', {
            detail: {
                cart: this.cart,
                total: this.getCartTotal(),
                itemCount: this.getCartItemCount()
            }
        });
        document.dispatchEvent(event);
    }

    formatNumber(number) {
        return number.toLocaleString('id-ID');
    }

    // Show notification utility
    showNotification(message, type = 'success') {
        const notification = document.getElementById('success-notification') || this.createNotification();
        const messageSpan = notification.querySelector('#notification-message') || notification.querySelector('span');

        if (messageSpan) {
            messageSpan.textContent = message;
        }

        // Update notification style based on type
        notification.className = notification.className.replace(/bg-\w+-500/, type === 'success' ? 'bg-green-500' : 'bg-red-500');

        notification.classList.remove('translate-x-full');

        setTimeout(() => {
            notification.classList.add('translate-x-full');
        }, 3000);
    }

    createNotification() {
        const notification = document.createElement('div');
        notification.id = 'success-notification';
        notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50';
        notification.innerHTML = `
            <div class="flex items-center gap-2">
                <i class="fas fa-check-circle"></i>
                <span id="notification-message">Notifikasi</span>
            </div>
        `;
        document.body.appendChild(notification);
        return notification;
    }
}

// Initialize global cart manager
let globalCartManager;
document.addEventListener('DOMContentLoaded', function() {
    globalCartManager = new GlobalCartManager();
});

// Utility functions for easy access
function addToGlobalCart(productData, quantity = 1) {
    if (globalCartManager) {
        const success = globalCartManager.addToCart(productData, quantity);
        if (success) {
            globalCartManager.showNotification('Produk berhasil ditambahkan ke keranjang!');
        }
        return success;
    }
    return false;
}

function removeFromGlobalCart(productId) {
    if (globalCartManager) {
        globalCartManager.removeFromCart(productId);
        globalCartManager.showNotification('Produk berhasil dihapus dari keranjang!');
    }
}

function updateGlobalCartQuantity(productId, quantity) {
    if (globalCartManager) {
        globalCartManager.updateQuantity(productId, quantity);
    }
}

function getGlobalCartData() {
    return globalCartManager ? globalCartManager.cart : [];
}

function getGlobalCartTotal() {
    return globalCartManager ? globalCartManager.getCartTotal() : 0;
}

function clearGlobalCart() {
    if (globalCartManager) {
        globalCartManager.clearCart();
        globalCartManager.showNotification('Keranjang berhasil dikosongkan!');
    }
}
