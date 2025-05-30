<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - {{ $blog->title }}</title>
</head>

<body class="bg-white">
    @include('components.nav')

    <!-- Blog Detail Section -->
    <section class="pt-24 pb-12 px-6 bg-gray-50">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $blog->title }}</h1>
            <p class="text-gray-500 text-sm mb-6">Published: {{ $blog->published_at->format('d M Y') }}</p>
            @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-96 object-cover rounded-lg mb-6">
            @endif
            <div class="prose prose-lg text-gray-700">
                {!! $blog->content !!}
            </div>
            <a href="{{ route('blog') }}" class="inline-block mt-6 text-yellow-400 hover:text-yellow-500 font-semibold">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Blog
            </a>
        </div>
    </section>

    <!-- Footer Section -->
    @include('components.footer')
</body>

</html>