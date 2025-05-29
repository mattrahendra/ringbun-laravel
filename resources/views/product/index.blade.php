<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - Produk</title>
</head>

<body class="bg-white">
    @include('components.nav')

    <!-- Products Section -->
    <section class="pt-24 pb-12 px-6 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Our Products</h1>

            <!-- Category Tabs -->
            <div class="flex justify-center space-x-4 mb-8 overflow-x-auto">
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($products as $product)
                <div class="product-item category-{{ $product->category_id }} bg-white p-6 rounded-xl shadow-lg cursor-pointer {{ $product->category_id != $categories->first()->id ? 'hidden' : '' }}" data-modal="modal-{{ $product->id }}">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/300x200/png' }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-t-lg">
                    <div class="p-4 text-left">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-lg mb-4">{{ Str::limit($product->description, 50) }}</p>
                        <p class="text-yellow-400 font-semibold text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
                @endforeach
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
            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/300x200/png' }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-lg mb-4">
            <p class="text-gray-600 text-lg mb-4">{{ $product->description ?? 'Tidak ada deskripsi.' }}</p>
            <p class="text-yellow-400 font-semibold text-lg mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-gray-600 text-lg mb-4">Stok: {{ $product->stock }}</p>
            <p class="text-gray-600 text-lg mb-4">Status: {{ $product->status == 'available' ? 'Tersedia' : 'Tidak Tersedia' }}</p>
            <button class="bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-500">Tambah ke Keranjang</button>
        </div>
    </div>
    @endforeach

    @include('components.footer')
</body>

</html>
