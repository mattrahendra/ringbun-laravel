<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - 404 Not Found</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <!-- Warning Icon -->
        <i class="fas fa-exclamation-triangle text-yellow-400 text-8xl mb-6"></i>
        <!-- Description -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Halaman Tidak Ditemukan (404)</h1>
        <p class="text-lg text-gray-600 mb-6">Maaf, halaman yang Anda cari tidak dapat ditemukan. Silakan kembali ke beranda atau hubungi kami jika Anda memerlukan bantuan.</p>
        <a href="{{ route('home') }}" class="text-yellow-400 font-semibold hover:underline">Kembali ke Beranda</a>
    </div>
</body>

</html>