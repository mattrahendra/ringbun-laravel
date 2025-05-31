<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - B2B Partnership</title>
    <meta name="description" content="Bergabung dengan Ring Bun sebagai mitra bisnis. Dapatkan penawaran khusus untuk restoran, cafe, dan bisnis kuliner Anda.">
    <meta name="keywords" content="Ring Bun B2B, Partnership, Mitra Bisnis, Supplier Roti, Wholesale Bakery">
</head>

<body class="bg-cream">
    @include('components.nav')

    <!-- Hero Section -->
    <section class="pt-32 pb-16 px-6 hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 text-shadow slide-enter">B2B Partnership</h1>
                <p class="text-xl md:text-2xl mb-8 max-w-4xl mx-auto text-shadow slide-enter">
                    Bergabunglah dengan Ring Bun sebagai mitra bisnis dan nikmati kualitas premium untuk bisnis kuliner Anda
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center slide-enter">
                    <a href="#partnership-form"
                        class="bg-white text-brown px-8 py-4 rounded-full font-bold text-lg btn-primary inline-flex items-center justify-center gap-3">
                        <i class="fas fa-handshake"></i>
                        Daftar Mitra
                    </a>
                    <a href="#benefits"
                        class="border-2 border-white text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-brown transition-all duration-300 inline-flex items-center justify-center gap-3">
                        <i class="fas fa-star"></i>
                        Lihat Keuntungan
                    </a>
                </div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full floating-badge"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 bg-white/10 rounded-full floating-badge" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-12 h-12 bg-white/5 rounded-full floating-badge" style="animation-delay: 2s;"></div>
    </section>

    <!-- Partnership Types Section -->
    <section class="py-20 px-6 bg-gradient-to-br from-cream to-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-brown mb-4">Jenis Kemitraan</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Pilih jenis kemitraan yang sesuai dengan kebutuhan bisnis Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Restaurant & Cafe -->
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                            alt="Restaurant Partnership"
                            class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-golden text-white px-4 py-2 rounded-full text-sm font-bold floating-badge">
                                POPULER
                            </span>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="w-12 h-12 bg-golden rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-utensils text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-brown mb-4">Restaurant & Cafe</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Solusi sempurna untuk restoran dan cafe yang membutuhkan supply roti berkualitas tinggi secara konsisten.
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-gray-600">
                                <i class="fas fa-check text-golden text-sm"></i>
                                <span>Minimum order 50 pcs</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-600">
                                <i class="fas fa-check text-golden text-sm"></i>
                                <span>Diskon hingga 25%</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-600">
                                <i class="fas fa-check text-golden text-sm"></i>
                                <span>Pengiriman terjadwal</span>
                            </li>
                        </ul>
                        <button class="w-full bg-golden text-white py-3 rounded-full font-bold btn-primary">
                            Pilih Paket Ini
                        </button>
                    </div>
                </div>

                <!-- Hotel & Catering -->
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1566417713940-fe7c737a9ef2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                            alt="Hotel Partnership"
                            class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-brown text-white px-4 py-2 rounded-full text-sm font-bold">
                                PREMIUM
                            </span>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="w-12 h-12 bg-brown rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-building text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-brown mb-4">Hotel & Catering</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Layanan khusus untuk hotel dan layanan catering dengan volume besar dan kualitas premium.
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-gray-600">
                                <i class="fas fa-check text-golden text-sm"></i>
                                <span>Minimum order 200 pcs</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-600">
                                <i class="fas fa-check text-golden text-sm"></i>
                                <span>Diskon hingga 35%</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-600">
                                <i class="fas fa-check text-golden text-sm"></i>
                                <span>Account manager khusus</span>
                            </li>
                        </ul>
                        <button class="w-full bg-brown text-white py-3 rounded-full font-bold btn-primary">
                            Pilih Paket Ini
                        </button>
                    </div>
                </div>

                <!-- Retail & Distributor -->
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                            alt="Retail Partnership"
                            class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-green-600 text-white px-4 py-2 rounded-full text-sm font-bold">
                                WHOLESALE
                            </span>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-store text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-brown mb-4">Retail & Distributor</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Program khusus untuk toko retail dan distributor yang ingin menjual produk Ring Bun.
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-gray-600">
                                <i class="fas fa-check text-golden text-sm"></i>
                                <span>Minimum order 500 pcs</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-600">
                                <i class="fas fa-check text-golden text-sm"></i>
                                <span>Diskon hingga 40%</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-600">
                                <i class="fas fa-check text-golden text-sm"></i>
                                <span>Support marketing</span>
                            </li>
                        </ul>
                        <button class="w-full bg-green-600 text-white py-3 rounded-full font-bold btn-primary">
                            Pilih Paket Ini
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-20 px-6 bg-cream">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-brown mb-4">Keuntungan Bermitra</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Dapatkan berbagai keuntungan eksklusif sebagai mitra bisnis Ring Bun
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-xl card-hover text-center">
                    <div class="w-16 h-16 bg-golden rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-percentage text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-brown mb-4">Harga Kompetitif</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Dapatkan harga khusus dengan diskon hingga 40% untuk pembelian dalam jumlah besar.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl card-hover text-center">
                    <div class="w-16 h-16 bg-brown rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-truck text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-brown mb-4">Pengiriman Gratis</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Nikmati layanan pengiriman gratis untuk area Padang dan sekitarnya dengan minimum order.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl card-hover text-center">
                    <div class="w-16 h-16 bg-golden rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-brown mb-4">Produksi Fresh</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Semua produk dibuat fresh setiap hari untuk menjamin kualitas dan kesegaran optimal.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl card-hover text-center">
                    <div class="w-16 h-16 bg-brown rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-user-tie text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-brown mb-4">Account Manager</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Dapatkan dedicated account manager untuk membantu kebutuhan bisnis Anda.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl card-hover text-center">
                    <div class="w-16 h-16 bg-golden rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-brown mb-4">Support Marketing</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Dapatkan dukungan material marketing dan promosi untuk meningkatkan penjualan.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl card-hover text-center">
                    <div class="w-16 h-16 bg-brown rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-certificate text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-brown mb-4">Sertifikat Halal</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Semua produk bersertifikat halal dan aman untuk dikonsumsi oleh semua kalangan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Stories Section -->
    <section class="py-20 px-6 bg-gradient-to-br from-cream to-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-brown mb-4">Kisah Sukses Mitra</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Dengarkan testimoni dari mitra-mitra Ring Bun yang telah merasakan manfaatnya
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-3xl p-8 shadow-2xl card-hover">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                            alt="Partner"
                            class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="text-lg font-bold text-brown">Budi Santoso</h4>
                            <p class="text-gray-600">Owner Cafe Hangout</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <div class="flex text-golden">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed italic">
                        "Sejak bermitra dengan Ring Bun, customer satisfaction di cafe saya meningkat drastis.
                        Kualitas roti yang konsisten dan harga yang kompetitif membantu bisnis saya berkembang pesat."
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-2xl card-hover">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616c668-4a31?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                            alt="Partner"
                            class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="text-lg font-bold text-brown">Sari Dewi</h4>
                            <p class="text-gray-600">Manager Hotel Padang Plaza</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <div class="flex text-golden">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed italic">
                        "Ring Bun sangat reliable sebagai supplier untuk hotel kami. Pengiriman tepat waktu,
                        kualitas terjaga, dan pelayanan yang sangat memuaskan. Highly recommended!"
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Form Section -->
    <section id="partnership-form" class="py-20 px-6 bg-cream">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-brown mb-4">Daftar Sebagai Mitra</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Isi formulir di bawah ini dan tim kami akan menghubungi Anda dalam 1x24 jam
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="p-8 md:p-12">
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-brown font-bold mb-2">Nama Lengkap *</label>
                                <input type="text" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-golden focus:outline-none transition-colors">
                            </div>
                            <div>
                                <label class="block text-brown font-bold mb-2">Email *</label>
                                <input type="email" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-golden focus:outline-none transition-colors">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-brown font-bold mb-2">Nomor WhatsApp *</label>
                                <input type="tel" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-golden focus:outline-none transition-colors">
                            </div>
                            <div>
                                <label class="block text-brown font-bold mb-2">Jenis Bisnis *</label>
                                <select required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-golden focus:outline-none transition-colors">
                                    <option value="">Pilih jenis bisnis</option>
                                    <option value="restaurant">Restaurant</option>
                                    <option value="cafe">Cafe</option>
                                    <option value="hotel">Hotel</option>
                                    <option value="catering">Catering</option>
                                    <option value="retail">Retail/Toko</option>
                                    <option value="distributor">Distributor</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-brown font-bold mb-2">Nama Bisnis *</label>
                            <input type="text" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-golden focus:outline-none transition-colors">
                        </div>

                        <div>
                            <label class="block text-brown font-bold mb-2">Alamat Bisnis *</label>
                            <textarea required rows="3"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-golden focus:outline-none transition-colors resize-none"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-brown font-bold mb-2">Estimasi Order per Bulan</label>
                                <select class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-golden focus:outline-none transition-colors">
                                    <option value="">Pilih estimasi</option>
                                    <option value="50-100">50-100 pcs</option>
                                    <option value="100-200">100-200 pcs</option>
                                    <option value="200-500">200-500 pcs</option>
                                    <option value="500-1000">500-1000 pcs</option>
                                    <option value="1000+">1000+ pcs</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-brown font-bold mb-2">Produk yang Diminati</label>
                                <select class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-golden focus:outline-none transition-colors">
                                    <option value="">Pilih produk</option>
                                    <option value="all">Semua Produk</option>
                                    <option value="roti-manis">Roti Manis</option>
                                    <option value="roti-tawar">Roti Tawar</option>
                                    <option value="pastry">Pastry</option>
                                    <option value="cake">Cake</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-brown font-bold mb-2">Pesan Tambahan</label>
                            <textarea rows="4" placeholder="Ceritakan tentang bisnis Anda dan ekspektasi kemitraan..."
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-golden focus:outline-none transition-colors resize-none"></textarea>
                        </div>

                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="terms" required class="w-5 h-5 text-golden">
                            <label for="terms" class="text-gray-600">
                                Saya setuju dengan <a href="#" class="text-golden font-bold hover:underline">syarat dan ketentuan</a> yang berlaku
                            </label>
                        </div>

                        <div class="text-center pt-4">
                            <button type="submit"
                                class="bg-golden text-white px-12 py-4 rounded-full font-bold text-lg btn-primary inline-flex items-center gap-3">
                                <i class="fas fa-paper-plane"></i>
                                Kirim Permohonan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="bg-gradient-to-r from-golden to-brown p-8">
                    <div class="text-center text-white">
                        <h3 class="text-2xl font-bold mb-4">Butuh Informasi Lebih Lanjut?</h3>
                        <p class="mb-6">Tim B2B kami siap membantu Anda</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="https://api.whatsapp.com/send/?phone=6285161399003&text=Halo,%20saya%20tertarik%20dengan%20program%20B2B%20Ring%20Bun"
                                class="bg-white text-brown px-6 py-3 rounded-full font-bold inline-flex items-center justify-center gap-3 hover:bg-cream transition-colors">
                                <i class="fab fa-whatsapp text-green-500"></i>
                                WhatsApp B2B
                            </a>
                            <a href="tel:+6285161399003"
                                class="border-2 border-white text-white px-6 py-3 rounded-full font-bold hover:bg-white hover:text-brown transition-all duration-300 inline-flex items-center justify-center gap-3">
                                <i class="fas fa-phone"></i>
                                Call Center
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NewsLetter Section -->
    @include('components.news')

    @include('components.footer')
</body>

</html>
