<!-- Navigation Bar -->
<nav class="fixed top-0 left-0 w-full z-50 bg-white px-6 py-4 flex justify-between items-center shadow-md">
    <!-- Logo + Menu Links -->
    <div class="flex items-center space-x-8">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-xl font-bold text-yellow-400 flex items-center">
            <img src="/images/logo/logo.svg" alt="Ring Bun Logo" class="h-10 mr-2 inline-block">
        </a>
        <!-- Menu Links -->
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'border-b-2 border-yellow-400 text-yellow-400' : 'text-gray-800 hover:text-yellow-300' }}">Home</a>
            <a href="{{ route('product') }}" class="{{ request()->routeIs('product', 'product.cart') ? 'border-b-2 border-yellow-400 text-yellow-400' : 'text-gray-800 hover:text-yellow-300' }}">Product</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'border-b-2 border-yellow-400 text-yellow-400' : 'text-gray-800 hover:text-yellow-300' }}">About</a>
            <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog', 'blog.show') ? 'border-b-2 border-yellow-400 text-yellow-400' : 'text-gray-800 hover:text-yellow-300' }}">Blog</a>
            <a href="{{ route('b2b') }}" class="{{ request()->routeIs('b2b') ? 'border-b-2 border-yellow-400 text-yellow-400' : 'text-gray-800 hover:text-yellow-300' }}">B2B</a>
        </div>
    </div>

    <!-- Icons -->
    <div class="flex items-center pr-2 gap-2">
        <!-- Search Button (Default State) -->
        <button class="text-gray-800 hover:text-yellow-300 text-xl transition-colors duration-300 {{ request()->has('q') ? 'hidden' : '' }}" id="search-btn" aria-label="Open search form">
            <i class="fas fa-search"></i>
        </button>

        <!-- Search Form (Visible in all screen sizes) -->
        <form action="{{ route('product')}}" method="GET" class="flex items-center bg-gray-50 rounded-lg px-3 py-2 transition-all duration-300 {{ request()->has('q') ? 'flex' : 'hidden' }}" id="search-form">
            <input
                type="text"
                name='q'
                placeholder="Search..."
                class="bg-transparent border-none outline-none text-gray-800 placeholder-gray-500 text-sm w-32 sm:w-48 lg:w-64"
                id="search-input"
                value="{{ request()->query('q')}}"
            >
            <button type="submit" class="text-gray-600 hover:text-yellow-400 ml-2 transition-colors" id="search-submit" aria-label="Submit search">
                <i class="fas fa-search text-sm"></i>
            </button>
            <button type="button" class="text-gray-600 hover:text-red-500 ml-2 transition-colors" id="close-search" aria-label="Close search form">
                <i class="fas fa-times text-sm"></i>
            </button>
        </form>

        <!-- Shopping Cart -->
        <a href="{{ route('product.cart') }}" class="text-gray-800 hover:text-yellow-300 relative text-xl">
            <i class="fas fa-shopping-cart"></i>
            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
        </a>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button class="text-gray-800 hover:text-yellow-300 text-2xl" id="mobile-menu-btn" aria-label="Toggle mobile menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div class="fixed md:hidden bg-white text-gray-800 p-4 space-y-2 hidden top-16 left-0 w-full z-40 shadow-md" id="mobile-menu">
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-yellow-400 font-semibold' : 'text-gray-800' }} block hover:text-yellow-300 py-2">Home</a>
    <a href="{{ route('product') }}" class="{{ request()->routeIs('product') ? 'text-yellow-400 font-semibold' : 'text-gray-800' }} block hover:text-yellow-300 py-2">Product</a>
    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-yellow-400 font-semibold' : 'text-gray-800' }} block hover:text-yellow-300 py-2">About</a>
    <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') ? 'text-yellow-400 font-semibold' : 'text-gray-800' }} block hover:text-yellow-300 py-2">Blog</a>
    <a href="{{ route('b2b') }}" class="{{ request()->routeIs('b2b') ? 'text-yellow-400 font-semibold' : 'text-gray-800' }} block hover:text-yellow-300 py-2">B2B</a>
</div>