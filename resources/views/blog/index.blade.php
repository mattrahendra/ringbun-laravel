<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - Blog</title>
</head>

<body class="bg-white">
    @include('components.nav')

    <!-- Blog Section -->
    <section class="pt-24 pb-12 px-6 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Our Blog</h1>

            <!-- Blog Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($blogs as $blog)
                <a href="{{ route('blog.show', $blog->id) }}" class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'https://placehold.co/300x200/png' }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4 text-left">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $blog->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                        <p class="text-gray-500 text-sm">Published: {{ $blog->published_at->format('d M Y') }}</p>
                    </div>
                </a>
                @empty
                <p class="text-center text-gray-600 col-span-3">Belum ada blog yang dipublikasikan.</p>
                @endforelse
            </div>
        </div>
    </section>


    <!-- Footer Section -->
    @include('components.footer')

</body>

</html>