<!DOCTYPE html>
<html lang="id">

<head>
    @include('components.head')
    <title>Ring Bun - Home</title>
</head>

<body class="bg-white">

    @include('components.nav')

    <!-- Hero Carousel Section -->
    <section class="pt-20 relative">
        <div class="overflow-hidden relative h-64 md:h-96">
            <!-- Slides -->
            <div class="carousel-slide duration-700 ease-in-out absolute inset-0 transition-opacity opacity-100 z-10">
                <img src="https://placehold.co/1200x400/png" alt="Promo 1" class="w-full h-full object-cover">
            </div>
            <div class="carousel-slide duration-700 ease-in-out absolute inset-0 transition-opacity opacity-0 z-0">
                <img src="https://placehold.co/1200x400/png" alt="Promo 2" class="w-full h-full object-cover">
            </div>
            <div class="carousel-slide duration-700 ease-in-out absolute inset-0 transition-opacity opacity-0 z-0">
                <img src="https://placehold.co/1200x400/png" alt="Promo 3" class="w-full h-full object-cover">
            </div>

            <!-- Controls -->
            <button id="prev" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white bg-opacity-70 p-2 rounded-full hover:bg-yellow-300 z-20">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="next" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white bg-opacity-70 p-2 rounded-full hover:bg-yellow-300 z-20">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-12 px-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Our Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Category 1 -->
            <div class="flex flex-col items-center">
                <div class="relative bg-gray-100 rounded-lg overflow-hidden shadow-md">
                    <img src="https://placehold.co/300x200/png" alt="Sweet Buns" class="w-full h-48 object-cover transform transition duration-300 hover:scale-110">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        <h3 class="text-lg font-semibold">Sweet Buns</h3>
                    </div>
                </div>
            </div>
            <!-- Category 2 -->
            <div class="flex flex-col items-center">
                <div class="relative bg-gray-100 rounded-lg overflow-hidden shadow-md">
                    <img src="https://placehold.co/300x200/png" alt="Savory Buns" class="w-full h-48 object-cover transform transition duration-300 hover:scale-110">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        <h3 class="text-lg font-semibold">Savory Buns</h3>
                    </div>
                </div>
            </div>
            <!-- Category 3 -->
            <div class="flex flex-col items-center">
                <div class="relative bg-gray-100 rounded-lg overflow-hidden shadow-md">
                    <img src="https://placehold.co/300x200/png" alt="Specialty Buns" class="w-full h-48 object-cover transform transition duration-300 hover:scale-110">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        <h3 class="text-lg font-semibold">Specialty Buns</h3>
                    </div>
                </div>
            </div>
            <!-- Category 4 -->
            <div class="flex flex-col items-center">
                <div class="relative bg-gray-100 rounded-lg overflow-hidden shadow-md">
                    <img src="https://placehold.co/300x200/png" alt="Extra Buns" class="w-full h-48 object-cover transform transition duration-300 hover:scale-110">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2">
                        <h3 class="text-lg font-semibold">Extra Buns</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-12 px-6 bg-gray-50">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">About Ring Bun Bakery & Coffeeshop</h2>
            <p class="text-lg text-gray-600 mb-8">Premium, buttery, soft & delicious. Roti yang cocok dinikmati bersama keluarga dan teman di segala suasana.</p>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-5 rounded-lg shadow-md">
                    <i class="fas fa-bread-slice text-yellow-400 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Panggang Fresh Setiap Hari</h3>
                    <p class="text-gray-600">Semua produk kami dipanggang langsung setiap hari untuk menjaga kesegaran, aroma, dan tekstur roti terbaik bagi pelanggan.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-5 rounded-lg shadow-md">
                    <i class="fas fa-list text-yellow-400 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Variasi Produk Lengkap</h3>
                    <p class="text-gray-600">Kami menawarkan beragam pilihan mulai dari Ring Bun, Bagelen, Pastry premium hingga snack box, cocok untuk segala selera dan acara.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white p-5 rounded-lg shadow-md">
                    <i class="fas fa-star text-yellow-400 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Kualitas Terjamin & Harga Bersahabat</h3>
                    <p class="text-gray-600">Dengan rating 4.7 di Google dan testimoni pelanggan mengapresiasi kelembutan roti, isian melimpah, serta harga yang ramah di kantong.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Event & Promo Section -->
    <section class="py-12 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-center text-2xl font-bold text-gray-800 mb-4">Event & Promo Ringbun Bakery</h2>
            <p class="text-center text-lg text-gray-600 mb-8">Nikmati berbagai kegiatan dan penawaran spesial kami</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Event/Promo 1 -->
                <div class="bg-gray-100 rounded-xl shadow-lg">
                    <img src="https://placehold.co/1000x1000/png" alt="Event 1" class="w-full object-cover rounded-t-lg">
                    <div class="p-6 text-left">
                        <p class="text-sm text-gray-500">31 Maret 2025</p>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Diskon 20% Ulang Tahun Ringbun</h3>
                        <p class="text-gray-600 text-sm mb-4">Dalam rangka ulang tahun Ringbun ke-5, nikmati diskon 20% untuk semua menu roti dan pastry setiap hari Sabtu.</p>
                        <a href="#" class="text-yellow-400 font-semibold hover:underline text-lg">Selengkapnya</a>
                    </div>
                </div>
                <!-- Event/Promo 2 -->
                <div class="bg-gray-100 rounded-xl shadow-lg">
                    <img src="https://placehold.co/1000x1000/png" alt="Event 2" class="w-full object-cover rounded-t-lg">
                    <div class="p-6 text-left">
                        <p class="text-sm text-gray-500">15 Februari 2025</p>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Workshop Cupcake Gratis</h3>
                        <p class="text-gray-600 text-sm mb-4">Bergabunglah dalam workshop pembuatan cupcake bersama tim ahli kami, gratis untuk 20 peserta pertama!</p>
                        <a href="#" class="text-yellow-400 font-semibold hover:underline text-lg">Daftar Sekarang</a>
                    </div>
                </div>
                <!-- Event/Promo 3 -->
                <div class="bg-gray-100 rounded-xl shadow-lg">
                    <img src="https://placehold.co/1000x1000/png" alt="Event 3" class="w-full object-cover rounded-t-lg">
                    <div class="p-6 text-left">
                        <p class="text-sm text-gray-500">05 Januari 2025</p>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Gelato Spesial Musim Panas</h3>
                        <p class="text-gray-600 text-sm mb-4">Cicipi varian gelato baru kami dengan harga khusus: beli 2 gratis 1, hanya di bulan Januari!</p>
                        <a href="#" class="text-yellow-400 font-semibold hover:underline text-lg">Coba Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Footer Section -->
    @include('components.footer')

    <!-- Scripts -->
    @include('components.script')

</body>

</html>
