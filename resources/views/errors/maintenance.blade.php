<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - Maintenance</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <!-- Warning Icon -->
        <i class="fas fa-exclamation-triangle text-yellow-400 text-8xl mb-6"></i>
        <!-- Description -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Website Sedang Dalam Perawatan</h1>
        <p class="text-lg text-gray-600 mb-6">Mohon maaf atas ketidaknyamanannya. Kami sedang melakukan perawatan untuk meningkatkan layanan kami. Silakan kembali lagi nanti.</p>
        <a href="{{ route('home') }}" class="text-yellow-400 font-semibold hover:underline">Kembali ke Beranda</a>
    </div>
</body>

</html>