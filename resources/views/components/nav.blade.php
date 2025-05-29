<!-- Navigation Bar -->
<nav class="fixed top-0 left-0 w-full z-50 bg-white px-6 py-4 flex justify-between items-center shadow-md">
    <!-- Logo + Menu Links -->
    <div class="flex items-center space-x-8">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') }} text-xl font-bold text-yellow-400 flex items-center">
            <img src="images/logo/logo.svg" alt="Ring Bun Logo" class="h-10 mr-2 inline-block">
        </a>
        <!-- Menu Links -->
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') }} text-gray-800 hover:text-yellow-300">Home</a>
            <a href="{{ route('product') }}" class="{{ request()->routeIs('product') }} text-gray-800 hover:text-yellow-300">Product</a>
            <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') }} text-gray-800 hover:text-yellow-300">Blog</a>
            <a href="{{ route('b2b') }}" class="{{ request()->routeIs('b2b') }} text-gray-800 hover:text-yellow-300">B2B</a>
        </div>
    </div>

    <!-- Icons -->
    <div class="flex space-x-4 items-center pr-2">
        <button class="text-gray-800 hover:text-yellow-300 text-xl" id="search-btn">
            <i class="fas fa-search"></i>
        </button>
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

<!-- Search Bar -->
<div class="fixed top-0 left-0 w-full h-16 bg-white z-40 flex items-center px-6 shadow-md hidden" id="search-bar">
    <input type="text" placeholder="Search..." class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-300">
    <button class="ml-2 text-gray-800 hover:text-yellow-300" id="close-search">
        <i class="fas fa-times"></i>
    </button>
</div>

<!-- Mobile Menu -->
<div class="md:hidden bg-white text-gray-800 p-4 space-y-2 hidden absolute top-16 left-0 w-full z-40" id="mobile-menu">
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') }} block hover:text-yellow-300">Home</a>
    <a href="{{ route('product') }}" class="{{ request()->routeIs('product') }} block hover:text-yellow-300">Product</a>
    <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') }} block hover:text-yellow-300">Blog</a>
    <a href="{{ route('b2b') }}" class="{{ request()->routeIs('b2b') }} block hover:text-yellow-300">B2B</a>
</div>
