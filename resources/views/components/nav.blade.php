<!-- Navigation Bar -->
<nav class="fixed top-0 left-0 w-full z-50 bg-white px-6 py-4 flex justify-between items-center shadow-md">
    <!-- Logo + Menu Links -->
    <div class="flex items-center space-x-8">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') }} text-xl font-bold text-yellow-400 flex items-center">
            <img src="/images/logo/logo.svg" alt="Ring Bun Logo" class="h-10 mr-2 inline-block">
        </a>
        <!-- Menu Links -->
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'border-b-2 border-yellow-400 text-yellow-400' : 'text-gray-800 hover:text-yellow-300' }}">Home</a>
            <a href="{{ route('product') }}" class="{{ request()->routeIs('product') ? 'border-b-2 border-yellow-400 text-yellow-400' : 'text-gray-800 hover:text-yellow-300' }}">Product</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'border-b-2 border-yellow-400 text-yellow-400' : 'text-gray-800 hover:text-yellow-300' }}">About</a>
            <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') ? 'border-b-2 border-yellow-400 text-yellow-400' : 'text-gray-800 hover:text-yellow-300' }}">Blog</a>
            <a href="{{ route('b2b') }}" class="{{ request()->routeIs('b2b') ? 'border-b-2 border-yellow-400 text-yellow-400' : 'text-gray-800 hover:text-yellow-300' }}">B2B</a>
        </div>
    </div>

    <!-- Icons -->
    <div class="flex space-x-4 items-center pr-2">
        <!-- Search Button (Default State) -->
        <button class="text-gray-800 hover:text-yellow-300 text-xl transition-all duration-300" id="search-btn">
            <i class="fas fa-search"></i>
        </button>

        <!-- Search Form (Hidden by default) -->
        <div class="hidden items-center bg-gray-50 rounded-lg px-3 py-2 transition-all duration-300" id="search-form">
            <input
                type="text"
                placeholder="Search..."
                class="bg-transparent border-none outline-none text-gray-800 placeholder-gray-500 text-sm w-48 lg:w-64"
                id="search-input"
            >
            <button class="text-gray-600 hover:text-yellow-400 ml-2 transition-colors" id="search-submit">
                <i class="fas fa-search text-sm"></i>
            </button>
            <button class="text-gray-600 hover:text-red-500 ml-2 transition-colors" id="close-search">
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Shopping Cart -->
        <button class="text-gray-800 hover:text-yellow-300 relative text-xl">
            <i class="fas fa-shopping-cart"></i>
            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">15</span>
        </button>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button class="text-gray-800 hover:text-yellow-300 text-2xl" id="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Search Bar (for mobile devices) -->
<div class="md:hidden fixed top-16 left-0 w-full bg-white z-40 px-6 py-3 shadow-md transform -translate-y-full transition-transform duration-300 ease-in-out" id="mobile-search-bar">
    <div class="flex items-center bg-gray-50 rounded-lg px-3 py-2">
        <input
            type="text"
            placeholder="Search products..."
            class="bg-transparent border-none outline-none text-gray-800 placeholder-gray-500 flex-1"
            id="mobile-search-input"
        >
        <button class="text-gray-600 hover:text-yellow-400 ml-2 transition-colors" id="mobile-search-submit">
            <i class="fas fa-search"></i>
        </button>
        <button class="text-gray-600 hover:text-red-500 ml-2 transition-colors" id="close-mobile-search">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

<!-- Mobile Menu -->
<div class="md:hidden bg-white text-gray-800 p-4 space-y-2 hidden absolute top-16 left-0 w-full z-40" id="mobile-menu">
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') }} block hover:text-yellow-300">Home</a>
    <a href="{{ route('product') }}" class="{{ request()->routeIs('product') }} block hover:text-yellow-300">Product</a>
    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') }} block hover:text-yellow-300">About</a>
    <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') }} block hover:text-yellow-300">Blog</a>
    <a href="{{ route('b2b') }}" class="{{ request()->routeIs('b2b') }} block hover:text-yellow-300">B2B</a>
</div>
