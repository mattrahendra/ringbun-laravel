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
    <div id="modal-{{ $product->id }}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-2xl font-semibold text-gray-800">{{ $product->name }}</h3>
                <button class="close-modal text-gray-600 hover:text-gray-800">
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
        <button class="bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-500">Tambah ke Keranjang</button>
    </div>
    </div>
    @endforeach

    <!-- CTA Section -->
    @include('components.cta')

    <!-- Footer -->
    @include('components.footer')
</body>

</html>
