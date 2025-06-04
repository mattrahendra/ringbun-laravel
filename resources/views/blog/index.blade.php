<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - Blog</title>
    <meta name="description" content="Baca artikel terbaru dari Ring Bun Bakery tentang tips baking, resep, dan cerita menarik seputar dunia roti dan kue.">
    <meta name="keywords" content="Blog Ring Bun, Tips Baking, Resep Roti, Artikel Bakery, Cerita Ring Bun">
    <script src="{{ asset('/js/blog/blog.js') }}" defer></script>
</head>

<body class="bg-cream">
    @include('components.nav')

    <!-- Hero Section -->
    <section class="pt-32 pb-16 px-6 hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 text-shadow slide-enter">Ring Bun Blog</h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-shadow slide-enter">
                    Temukan tips baking, resep eksklusif, dan cerita menarik dari dapur Ring Bun
                </p>
                <div class="w-24 h-1 bg-white mx-auto rounded-full slide-enter"></div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full floating-badge"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 bg-white/10 rounded-full floating-badge" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-12 h-12 bg-white/5 rounded-full floating-badge" style="animation-delay: 2s;"></div>
    </section>

    <!-- Featured Categories -->
    <section class="py-16 px-6 bg-cream">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-brown mb-4">Kategori Populer</h2>
                <p class="text-lg text-gray-600">Jelajahi topik-topik menarik dari Ring Bun</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-16">
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg card-hover cursor-pointer">
                    <div class="w-12 h-12 bg-golden rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-birthday-cake text-white text-lg"></i>
                    </div>
                    <h3 class="font-bold text-brown text-sm">Tips Baking</h3>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg card-hover cursor-pointer">
                    <div class="w-12 h-12 bg-brown rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-utensils text-white text-lg"></i>
                    </div>
                    <h3 class="font-bold text-brown text-sm">Resep</h3>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg card-hover cursor-pointer">
                    <div class="w-12 h-12 bg-golden rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-heart text-white text-lg"></i>
                    </div>
                    <h3 class="font-bold text-brown text-sm">Lifestyle</h3>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg card-hover cursor-pointer">
                    <div class="w-12 h-12 bg-brown rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-newspaper text-white text-lg"></i>
                    </div>
                    <h3 class="font-bold text-brown text-sm">Berita</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="py-20 px-6 bg-gradient-to-br from-cream to-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-brown mb-4">Artikel Terbaru</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Bacaan menarik seputar dunia bakery dan kuliner yang menginspirasi
                </p>
            </div>

            <!-- Featured Post (if exists) -->
            @if($blogs->isNotEmpty())
            <div class="mb-16">
                @php $featuredBlog = $blogs->first(); @endphp
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <div class="relative">
                            <img src="{{ $featuredBlog->image ? asset('storage/' . $featuredBlog->image) : 'https://images.unsplash.com/photo-1509440159596-0249088772ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80' }}"
                                alt="{{ $featuredBlog->title }}"
                                class="w-full h-80 lg:h-full object-cover">
                            <div class="absolute top-4 left-4">
                                <span class="bg-golden text-white px-4 py-2 rounded-full text-sm font-bold floating-badge">
                                    FEATURED
                                </span>
                            </div>
                        </div>
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="flex items-center gap-2 text-gray-500 text-sm">
                                    <i class="fas fa-calendar-alt text-golden"></i>
                                    <span>{{ $featuredBlog->published_at->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-gray-500 text-sm">
                                    <i class="fas fa-clock text-golden"></i>
                                    <span>5 min read</span>
                                </div>
                            </div>
                            <h3 class="text-3xl font-bold text-brown mb-4 leading-tight">{{ $featuredBlog->title }}</h3>
                            <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                                {{ Str::limit(strip_tags($featuredBlog->content), 150) }}
                            </p>
                            <a href="{{ route('blog.show', $featuredBlog->id) }}"
                                class="inline-flex items-center gap-2 bg-golden text-white px-6 py-3 rounded-full font-bold btn-primary w-fit">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Blog Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($blogs->skip(1) as $blog)
                <article class="bg-white rounded-3xl shadow-xl overflow-hidden card-hover">
                    <div class="relative">
                        <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'https://images.unsplash.com/photo-1486427944299-d1955d23e34d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80' }}"
                            alt="{{ $blog->title }}"
                            class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="absolute bottom-3 left-3">
                            <span class="bg-white/90 text-brown px-3 py-1 rounded-full text-xs font-bold">
                                {{ $blog->published_at->format('M d') }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="w-2 h-2 bg-golden rounded-full"></div>
                            <span class="text-gray-500 text-xs font-medium uppercase tracking-wide">ARTIKEL</span>
                        </div>
                        <h3 class="text-xl font-bold text-brown mb-3 leading-tight line-clamp-2">
                            {{ $blog->title }}
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3">
                            {{ Str::limit(strip_tags($blog->content), 100) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 text-gray-500 text-sm">
                                <i class="fas fa-clock text-golden"></i>
                                <span>3 min read</span>
                            </div>
                            <a href="{{ route('blog.show', $blog->id) }}"
                                class="inline-flex items-center gap-2 text-golden font-bold hover:text-brown transition-colors">
                                Baca
                                <i class="fas fa-arrow-right text-sm"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @empty
                <!-- Empty State -->
                <div class="col-span-full">
                    <div class="bg-white rounded-3xl p-16 text-center shadow-xl">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-newspaper text-4xl text-gray-400"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-brown mb-4">Belum Ada Artikel</h3>
                        <p class="text-gray-600 text-lg mb-8 max-w-md mx-auto">
                            Kami sedang menyiapkan artikel-artikel menarik untuk Anda. Tetap ikuti updates dari Ring Bun!
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('product') }}"
                                class="bg-golden text-white px-6 py-3 rounded-full font-bold btn-primary inline-flex items-center justify-center gap-2">
                                <i class="fas fa-shopping-bag"></i>
                                Lihat Produk
                            </a>
                            <a href="https://www.instagram.com/ringbunbakery/"
                                class="border-2 border-golden text-golden px-6 py-3 rounded-full font-bold hover:bg-golden hover:text-white transition-all duration-300 inline-flex items-center justify-center gap-2">
                                <i class="fab fa-instagram"></i>
                                Follow Instagram
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Load More Button (if needed) -->
            @if($blogs->count() > 6)
            <div class="text-center mt-12">
                <button class="bg-white text-golden border-2 border-golden px-8 py-4 rounded-full font-bold text-lg hover:bg-golden hover:text-white transition-all duration-300 inline-flex items-center gap-3">
                    <i class="fas fa-plus"></i>
                    Muat Lebih Banyak
                </button>
            </div>
            @endif
        </div>
    </section>

    <!-- NewsLetter Section -->
    @include('components.news')

    @include('components.footer')
</body>

</html>
