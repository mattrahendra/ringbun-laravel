<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - About Us</title>
    <meta name="description" content="Ketahui lebih lanjut tentang Ring Bun Bakery, sejarah, visi, misi, tim kami, dan lokasi toko kami.">
    <meta name="keywords" content="Tentang Kami, Ring Bun Bakery, Sejarah, Visi, Misi, Tim, Lokasi Toko">
</head>

<body class="bg-white">
    @include('components.nav')

    <!-- About Us Section -->
    <section class="pt-24 pb-12 px-6 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Tentang Kami</h1>
            <p class="text-lg text-gray-600 mb-12 text-center">Ketahui lebih lanjut tentang perjalanan Ring Bun Bakery dan bagaimana kami menghadirkan kelezatan untuk Anda.</p>

            <!-- Sejarah -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Sejarah Kami</h2>
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <img src="https://placehold.co/500x300/png" alt="Sejarah Ring Bun" class="w-full md:w-1/2 h-64 object-cover rounded-lg">
                    <p class="text-gray-600 text-lg">
                        Ring Bun Bakery didirikan pada tahun 2020 dengan misi untuk menghadirkan roti berkualitas tinggi yang dibuat dengan cinta. Berawal dari sebuah toko kecil di Jakarta, kami kini telah berkembang menjadi salah satu bakery favorit di kota ini, dikenal dengan roti manis dan gurih yang selalu segar setiap hari.
                    </p>
                </div>
            </div>

            <!-- Visi Misi -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Visi & Misi</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Visi</h3>
                        <p class="text-gray-600 text-lg">
                            Menjadi bakery terdepan yang dikenal dengan inovasi rasa dan kualitas terbaik, serta memberikan kebahagiaan melalui setiap gigitan roti kami.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Misi</h3>
                        <p class="text-gray-600 text-lg">
                            - Menyediakan roti segar dengan bahan-bahan berkualitas.<br>
                            - Memberikan pelayanan terbaik untuk pelanggan.<br>
                            - Berinovasi dengan rasa baru untuk memanjakan lidah Anda.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tim -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Tim Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <img src="https://placehold.co/200x200/png" alt="Team Member 1" class="w-32 h-32 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Budi Santoso</h3>
                        <p class="text-gray-600">Pendiri & Kepala Baker</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <img src="https://placehold.co/200x200/png" alt="Team Member 2" class="w-32 h-32 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Ayu Lestari</h3>
                        <p class="text-gray-600">Manajer Operasional</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <img src="https://placehold.co/200x200/png" alt="Team Member 3" class="w-32 h-32 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Rina Amelia</h3>
                        <p class="text-gray-600">Kepala Pemasaran</p>
                    </div>
                </div>
            </div>

            <!-- Lokasi -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Lokasi Toko Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Toko Utama -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">RING BUN Bakery and Coffee Shop</h3>
                        <p class="text-gray-600 text-lg mb-4">
                            Jl. Andalas No.7, RW.04, Sawahan Tim., Kec. Padang Tim., Kota Padang, Sumatera Barat 25171
                        </p>
                        <div class="w-full h-64">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.27801654929!2d100.37454107501273!3d-0.9429419990479425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4bb5e347e1689%3A0xb8f8736ed5fd2434!2sRING%20BUN%20Bakery%20and%20Coffee%20Shop!5e0!3m2!1sid!2sid!4v1748518440398!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <!-- Toko Kedua -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Ring Bun Bakery Transmart Padang</h3>
                        <p class="text-gray-600 text-lg mb-4">
                            Jl. Khatib Sulaiman No.85, Ulak Karang Sel., Kec. Padang Utara, Kota Padang, Sumatera Barat 25137
                        </p>
                        <div class="w-full h-64">
                            <!-- Ganti dengan iframe dari Google Maps untuk Toko Kedua -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3131113092263!2d100.35140307501268!3d-0.9118033990793748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b963dca53fbd%3A0x3e7fe6bc995d5ebc!2sRing%20Bun%20Bakery%20Transmart%20Padang!5e0!3m2!1sid!2sid!4v1748518550656!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
</body>

</html>