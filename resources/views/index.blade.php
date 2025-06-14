<!DOCTYPE html>
<html lang="id">

<head>
    @include('components.head')
    <title>Ring Bun - Home</title>
    <script src="{{ asset('/js/home.js') }}" defer></script>
    <script src="{{ asset('/js/carousel.js') }}" defer></script>
    <script src="{{ asset('/js/homenav.js') }}" defer></script>
</head>

<body class="bg-cream">

    @include('components.nav')

    <!-- Hero Carousel Section -->
    <section class="pt-20 relative overflow-hidden">
        <div class="relative h-[70vh] md:h-[80vh] lg:h-[90vh]">

            <!-- Slide 1 - Featured Product -->
            <div class="carousel-slide absolute inset-0 opacity-100 z-10">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1576618148400-f54bed99fcfd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80"
                        alt="Sweet Buns Collection"
                        class="w-full h-full object-cover">
                    <div class="slide-content absolute inset-0"></div>
                </div>
                <div class="relative z-20 h-full flex items-center">
                    <div class="max-w-7xl mx-auto px-6 w-full">
                        <div class="max-w-2xl slide-enter">
                            <div class="floating-badge inline-flex items-center bg-golden text-white px-4 py-2 rounded-full text-sm font-semibold mb-6">
                                <i class="fas fa-star mr-2"></i>
                                Produk Terlaris
                            </div>
                            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                                Sweet Buns
                                <span class="block text-golden">Premium</span>
                            </h1>
                            <p class="text-xl md:text-2xl text-cream/90 mb-8 leading-relaxed">
                                Nikmati kelembutan roti manis premium dengan berbagai topping dan isian lezat, dipanggang fresh setiap hari
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button class="bg-golden hover:bg-yellow-500 text-white px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 hover:transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-shopping-cart mr-2"></i>
                                    Pesan Sekarang
                                </button>
                                <button class="bg-white/20 hover:bg-white/30 text-white border-2 border-white/30 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 backdrop-blur-sm">
                                    <i class="fas fa-play mr-2"></i>
                                    Lihat Koleksi
                                </button>
                            </div>
                            <div class="flex items-center gap-6 mt-8">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-golden">12</div>
                                    <div class="text-cream/80 text-sm">Varian Rasa</div>
                                </div>
                                <div class="w-px h-12 bg-white/30"></div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-golden">15K</div>
                                    <div class="text-cream/80 text-sm">Mulai Dari</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 - Event Promo -->
            <div class="carousel-slide absolute inset-0 opacity-0 z-0">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1497034825429-c343d7c6a68f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                        alt="Birthday Celebration"
                        class="w-full h-full object-cover">
                    <div class="slide-content absolute inset-0"></div>
                </div>
                <div class="relative z-20 h-full flex items-center">
                    <div class="max-w-7xl mx-auto px-6 w-full">
                        <div class="max-w-2xl">
                            <div class="floating-badge inline-flex items-center bg-red-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-6">
                                <i class="fas fa-birthday-cake mr-2"></i>
                                Event Special
                            </div>
                            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                                Diskon 20%
                                <span class="block text-golden">Ulang Tahun</span>
                            </h1>
                            <p class="text-xl md:text-2xl text-cream/90 mb-8 leading-relaxed">
                                Rayakan ulang tahun ke-5 Ring Bun dengan diskon spesial 20% untuk semua produk setiap hari Sabtu
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button class="bg-golden hover:bg-yellow-500 text-white px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 hover:transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-gift mr-2"></i>
                                    Klaim Diskon
                                </button>
                                <button class="bg-white/20 hover:bg-white/30 text-white border-2 border-white/30 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 backdrop-blur-sm">
                                    <i class="fas fa-calendar mr-2"></i>
                                    Lihat Detail
                                </button>
                            </div>
                            <div class="flex items-center gap-6 mt-8">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-golden">31 Mar</div>
                                    <div class="text-cream/80 text-sm">Tanggal Event</div>
                                </div>
                                <div class="w-px h-12 bg-white/30"></div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-golden">20%</div>
                                    <div class="text-cream/80 text-sm">Diskon OFF</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 - Workshop -->
            <div class="carousel-slide absolute inset-0 opacity-0 z-0">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1576618148400-f54bed99fcfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                        alt="Cupcake Workshop"
                        class="w-full h-full object-cover">
                    <div class="slide-content absolute inset-0"></div>
                </div>
                <div class="relative z-20 h-full flex items-center">
                    <div class="max-w-7xl mx-auto px-6 w-full">
                        <div class="max-w-2xl">
                            <div class="floating-badge inline-flex items-center bg-green-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-6">
                                <i class="fas fa-graduation-cap mr-2"></i>
                                Workshop Gratis
                            </div>
                            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                                Belajar
                                <span class="block text-golden">Membuat Cupcake</span>
                            </h1>
                            <p class="text-xl md:text-2xl text-cream/90 mb-8 leading-relaxed">
                                Bergabunglah dalam workshop pembuatan cupcake bersama tim ahli kami, gratis untuk 20 peserta pertama!
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button class="bg-golden hover:bg-yellow-500 text-white px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 hover:transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Daftar Sekarang
                                </button>
                                <button class="bg-white/20 hover:bg-white/30 text-white border-2 border-white/30 px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 backdrop-blur-sm">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Info Lengkap
                                </button>
                            </div>
                            <div class="flex items-center gap-6 mt-8">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-golden">15 Feb</div>
                                    <div class="text-cream/80 text-sm">Tanggal Workshop</div>
                                </div>
                                <div class="w-px h-12 bg-white/30"></div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-golden">FREE</div>
                                    <div class="text-cream/80 text-sm">Biaya Masuk</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Controls -->
            <button id="prev" class="carousel-control absolute top-1/2 left-6 transform -translate-y-1/2 bg-white/20 p-4 rounded-full hover:bg-golden z-30 transition-all duration-300">
                <i class="fas fa-chevron-left text-white text-xl"></i>
            </button>
            <button id="next" class="carousel-control absolute top-1/2 right-6 transform -translate-y-1/2 bg-white/20 p-4 rounded-full hover:bg-golden z-30 transition-all duration-300">
                <i class="fas fa-chevron-right text-white text-xl"></i>
            </button>

            <!-- Indicators -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-30">
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 active" data-slide="0"></button>
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50" data-slide="1"></button>
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50" data-slide="2"></button>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute top-10 right-10 opacity-20">
                <img src="{{ asset('/images/logo/mark.svg') }}" alt="Ring Bun Logo" class="h-10 mb-2 mx-auto md:mx-0">
            </div>
        </div>
    </section>

    <section id="products" class="py-20 gradient-bg">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-brown mb-4">Kategori Produk</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Pilihan lengkap roti premium dengan berbagai varian rasa yang menggugah selera</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Category Loop -->
                @foreach($categories as $category)
                @php
                $products = $category->products;
                $totalVarian = $products->count();
                $minPrice = $products->min('price');
                $firstProduct = $products->first();
                $image = $firstProduct?->image;
                $stock = $products->sum('stock');
                $created_at = $products->min('created_at');
                @endphp
                <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-lg group">
                    <div class="relative overflow-hidden">
                        <img src="{{ $image ? asset('storage/' . $image) : 'https://placehold.co/300x200/png' }}"
                            alt="{{ $category->name }}"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        @if($stock > 200)
                        <div class="absolute top-4 left-4 bg-golden text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-heart mr-1"></i>Populer
                        </div>
                        @elseif($stock < 50)
                            <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-fire mr-1"></i>Trend
                    </div>
                    @elseif($created_at->diffInDays() <= 7)
                        <div class="absolute top-4 left-4 bg-brown text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                        Baru
                </div>
                @endif
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-brown mb-2">{{ $category->name}}</h3>
                <p class="text-gray-600 mb-4">{{ $category->description ?? 'Deskripsi belum tersedia' }}</p>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-golden font-bold text-lg">{{ $minPrice ? 'Mulai Rp ' . number_format($minPrice, 0, ',', '.') : 'Belum ada harga' }}</span>
                    <span class="text-sm text-gray-500">{{ $totalVarian }} varian</span>
                </div>
                <!-- Updated Button dengan data attributes -->
                <button class="category-product-btn w-full bg-golden text-white py-3 rounded-full font-semibold hover:bg-yellow-500 transition-all duration-300 hover:transform hover:scale-105 shadow-lg"
                    data-category-id="{{ $category->id }}"
                    data-category-name="{{ $category->name }}">
                    <i class="fas fa-eye mr-2"></i>
                    Lihat Produk
                </button>
            </div>
        </div>
        @endforeach
        </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- About Image -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                        alt="Bakery Interior"
                        class="w-full h-96 object-cover rounded-3xl shadow-2xl">
                    <div class="absolute inset-0 bg-golden/20 rounded-3xl"></div>
                </div>

                <!-- About Content -->
                <div>
                    <h2 class="text-4xl font-bold text-brown mb-6">Tentang Ring Bun Bakery</h2>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        Premium, buttery, soft & delicious. Roti yang cocok dinikmati bersama keluarga dan teman di segala suasana. Kami berkomitmen menghadirkan produk berkualitas tinggi dengan cita rasa autentik.
                    </p>

                    <div class="space-y-6">
                        <!-- Feature 1 -->
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-golden rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-bread-slice text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-brown mb-2">Panggang Fresh Setiap Hari</h3>
                                <p class="text-gray-600">Semua produk dipanggang langsung setiap hari untuk menjaga kesegaran, aroma, dan tekstur roti terbaik.</p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-golden rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-list text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-brown mb-2">Variasi Produk Lengkap</h3>
                                <p class="text-gray-600">Beragam pilihan mulai dari Ring Bun, Bagelen, Pastry premium hingga snack box untuk segala selera.</p>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-golden rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-star text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-brown mb-2">Kualitas Terjamin & Harga Bersahabat</h3>
                                <p class="text-gray-600">Rating 4.9 di Google dengan testimoni pelanggan yang mengapresiasi kelembutan dan harga ramah kantong.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Event & Promo Section -->
    <section class="py-20 gradient-bg">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-brown mb-4">Event & Promo Terbaru</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Nikmati berbagai kegiatan dan penawaran spesial yang kami hadirkan untuk Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Event -->
                @foreach($blogs as $blog)
                <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-lg">
                    <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'https://placehold.co/300x200/png' }}"
                        alt="{{ $blog->title }}"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="bg-golden text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $blog->created_at->format('d F Y') }}
                            </div>
                            @if($blog->type === 'promo')
                            <div class="bg-brown text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Promo
                            </div>
                            @elseif($blog->type === 'event')
                            <div class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Event
                            </div>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-brown mb-3">{{ $blog->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                        <a href="{{ route('blog.show', $blog->slug) }}" class="text-golden font-semibold hover:text-yellow-600 transition-colors">
                            @if($blog->type === 'promo')
                            Coba Sekarang <i class="fas fa-arrow-right ml-1"></i>
                            @else
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                            @endif
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    @include('components.cta')

    <!-- Footer Section -->
    @include('components.footer')

    <!-- Scripts -->
    @include('components.script')

</body>

</html>
