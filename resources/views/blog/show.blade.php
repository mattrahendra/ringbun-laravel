<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>{{ $blog->title }} | Ring Bun</title>
    <meta name="title" content ="{{ $blog->meta_title }}">
    <meta name="description" content="{{ $blog->meta_description }}">
    <meta name="keywords" content="Ring Bun Blog, {{ $blog->meta_keywords }}, Bakery, Artikel">
    <link rel="canonical" href="{{ $blog->canonical_url }}">
    <meta property="og:title" content="{{ $blog->meta_title }}">
    <meta property="og:description" content="{{ $blog->meta_description }}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ $blog->image ? asset('storage/' . $blog->image) : asset('images/default-blog.jpg') }}">
    <meta property="og:url" content="{{ $blog->canonical_url }}">
    <script src="{{ asset('/js/blog/blog.js') }}" defer></script>
    <script>
    window.blogData = {
        title: "{{ addslashes($blog->title) }}",
        url: "{{ url()->current() }}"
    };
</script>
</head>

<body class="bg-cream">
    @include('components.nav')

    <!-- Hero Section -->
    <section class="pt-32 pb-8 px-6 hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-4xl mx-auto relative z-10">
            <div class="text-center text-white mb-8">
                <div class="flex items-center justify-center gap-2 mb-4">
                    <a href="{{ route('blog') }}" class="text-white/80 hover:text-white transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Blog
                    </a>
                    <span class="text-white/60">/</span>
                    <span class="text-white/80">Artikel</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-shadow slide-enter leading-tight">{{ $blog->title }}</h1>
                <div class="flex items-center justify-center gap-6 text-white/90 slide-enter">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-white"></i>
                        <span>{{ $blog->published_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-clock text-white"></i>
                        <span>{{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full floating-badge"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 bg-white/10 rounded-full floating-badge" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-12 h-12 bg-white/5 rounded-full floating-badge" style="animation-delay: 2s;"></div>
    </section>

    <!-- Blog Content Section -->
    <section class="py-16 px-6 bg-gradient-to-br from-cream to-white">
        <div class="max-w-4xl mx-auto">
            <!-- Featured Image -->
            @if($blog->image)
            <div class="mb-12">
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover">
                    <img src="{{ asset('storage/' . $blog->image) }}"
                        alt="{{ $blog->title }}"
                        class="w-full h-96 md:h-[500px] object-cover">
                </div>
            </div>
            @endif

            <!-- Article Content -->
            <article class="bg-white rounded-3xl shadow-2xl overflow-hidden p-8 md:p-12">
                <div class="prose prose-lg max-w-none">
                    <div class="mb-8 pb-6 border-b border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-golden rounded-full flex items-center justify-center">
                                <i class="fas fa-newspaper text-white text-lg"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-golden uppercase tracking-wide mb-1">Ring Bun Blog</p>
                                <p class="text-gray-500 text-sm">Artikel terbaru dari dapur kami</p>
                            </div>
                        </div>
                    </div>

                    <div class="blog-content text-gray-700 leading-relaxed">
                        {!! $blog->content !!}
                    </div>
                </div>

                <!-- Article Footer -->
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-3 h-3 bg-golden rounded-full"></div>
                            <span class="text-gray-500 text-sm">Diterbitkan {{ $blog->published_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-gray-500 text-sm">Bagikan:</span>
                            <button onclick="shareOnFacebook()" class="w-10 h-10 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-all card-hover">
                                <i class="fab fa-facebook-f text-sm"></i>
                            </button>
                            <button onclick="shareOnTwitter()" class="w-10 h-10 bg-blue-400 hover:bg-blue-500 text-white rounded-full flex items-center justify-center transition-all card-hover">
                                <i class="fab fa-twitter text-sm"></i>
                            </button>
                            <button onclick="shareOnWhatsApp()" class="w-10 h-10 bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center transition-all card-hover">
                                <i class="fab fa-whatsapp text-sm"></i>
                            </button>
                            <button onclick="copyLink()" class="w-10 h-10 bg-gray-500 hover:bg-gray-600 text-white rounded-full flex items-center justify-center transition-all card-hover">
                                <i class="fas fa-link text-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Navigation -->
            <div class="mt-12 text-center">
                <a href="{{ route('blog') }}"
                    class="inline-flex items-center gap-3 bg-golden text-white px-8 py-4 rounded-full font-bold text-lg btn-primary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Blog
                </a>
            </div>
        </div>
    </section>

    <!-- Related Articles Section -->
    <section class="py-16 px-6 bg-cream">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-brown mb-4">Artikel Lainnya</h2>
                <p class="text-lg text-gray-600">Baca juga artikel menarik lainnya dari Ring Bun</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($article as $blog)
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
                                <span>{{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read</span>
                            </div>
                            <a href="{{ route('blog.show', $blog->slug) }}"
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
        </div>
    </section>

    <!-- NewsLetter Section -->
    @include('components.news')

    @include('components.footer')
</body>

</html>
