<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - About Us</title>
    <meta name="description" content="Ketahui lebih lanjut tentang Ring Bun Bakery, sejarah, visi, misi, tim kami, dan lokasi toko kami.">
    <meta name="keywords" content="Tentang Kami, Ring Bun Bakery, Sejarah, Visi, Misi, Tim, Lokasi Toko">
</head>

<body class="bg-cream">
    @include('components.nav')

    <!-- Hero Section -->
    <section class="pt-32 pb-16 px-6 hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 text-shadow slide-enter">Tentang Kami</h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-shadow slide-enter">
                    Perjalanan Ring Bun dalam menghadirkan kelezatan dan kebahagiaan melalui setiap gigitan roti berkualitas
                </p>
                <div class="w-24 h-1 bg-white mx-auto rounded-full slide-enter"></div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full floating-badge"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 bg-white/10 rounded-full floating-badge" style="animation-delay: 1s;"></div>
    </section>

    <!-- Story Section -->
    <section class="py-20 px-6 bg-cream">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden card-hover">
                        <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2072&q=80"
                            alt="Ring Bun Bakery Interior"
                            class="w-full h-80 object-cover">
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-golden rounded-full flex items-center justify-center">
                                    <i class="fas fa-birthday-cake text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-brown">Didirikan 2020</h3>
                                    <p class="text-gray-600 text-sm">Dengan cinta dan dedikasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <h2 class="text-4xl font-bold text-brown mb-6">Cerita Kami</h2>
                    <div class="space-y-6 text-lg text-gray-700 leading-relaxed">
                        <p>
                            Ring Bun Bakery lahir dari <span class="font-semibold text-golden">passion</span> untuk menghadirkan roti berkualitas tinggi yang dibuat dengan penuh cinta dan dedikasi. Sejak 2020, kami memulai perjalanan dari sebuah toko kecil dengan tekad besar.
                        </p>
                        <p>
                            Kini, Ring Bun telah berkembang menjadi salah satu bakery favorit di Padang, dikenal dengan inovasi rasa dan kualitas yang tak pernah berkompromi. Setiap hari, kami berkomitmen menghadirkan <span class="font-semibold text-golden">kesegaran</span> dan <span class="font-semibold text-golden">kelezatan</span> untuk keluarga Indonesia.
                        </p>
                        <div class="flex items-center gap-4 pt-4">
                            <div class="flex -space-x-2">
                                <div class="w-10 h-10 bg-golden rounded-full border-2 border-white"></div>
                                <div class="w-10 h-10 bg-brown rounded-full border-2 border-white"></div>
                                <div class="w-10 h-10 bg-golden rounded-full border-2 border-white"></div>
                            </div>
                            <span class="text-sm text-gray-600 font-medium">1000+ Pelanggan Setia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Section -->
    <section class="py-20 px-6 bg-gradient-to-br from-cream to-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-brown mb-4">Visi & Misi Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Landasan kuat yang mengarahkan setiap langkah kami dalam menghadirkan yang terbaik
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Vision Card -->
                <div class="bg-white rounded-3xl p-8 shadow-2xl card-hover border-t-4 border-golden">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-golden rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-eye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-brown">VISI</h3>
                    </div>
                    <p class="text-lg text-gray-700 leading-relaxed text-center">
                        Menjadi bakery terdepan yang dikenal dengan <span class="font-semibold text-golden">inovasi rasa</span> dan <span class="font-semibold text-golden">kualitas terbaik</span>, serta memberikan kebahagiaan melalui setiap gigitan roti kami.
                    </p>
                    <div class="mt-6 flex justify-center">
                        <div class="flex items-center gap-2 text-golden">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="bg-white rounded-3xl p-8 shadow-2xl card-hover border-t-4 border-brown">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-brown rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-bullseye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-brown">MISI</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-golden rounded-full flex items-center justify-center mt-1">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <p class="text-lg text-gray-700">Menyediakan roti segar dengan bahan-bahan berkualitas premium</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-golden rounded-full flex items-center justify-center mt-1">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <p class="text-lg text-gray-700">Memberikan pelayanan terbaik dan pengalaman berkesan</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-golden rounded-full flex items-center justify-center mt-1">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <p class="text-lg text-gray-700">Berinovasi dengan rasa baru untuk memanjakan lidah Anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 px-6 bg-cream">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-brown mb-4">Tim Hebat Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Orang-orang berdedikasi yang menghadirkan kelezatan setiap harinya
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-3xl p-8 shadow-2xl card-hover text-center">
                    <div class="relative mb-6">
                        <div class="w-32 h-32 bg-gradient-to-br from-golden to-yellow-400 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                alt="Budi Santoso"
                                class="w-28 h-28 rounded-full object-cover border-4 border-white">
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-golden text-white px-3 py-1 rounded-full text-xs font-bold">
                            FOUNDER
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-brown mb-2">Budi Santoso</h3>
                    <p class="text-gray-600 mb-4">Pendiri & Kepala Baker</p>
                    <div class="flex justify-center space-x-2">
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white rounded-3xl p-8 shadow-2xl card-hover text-center">
                    <div class="relative mb-6">
                        <div class="w-32 h-32 bg-gradient-to-br from-brown to-amber-800 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <img src="https://images.unsplash.com/photo-1494790108755-2616c9d6c8bc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                alt="Ayu Lestari"
                                class="w-28 h-28 rounded-full object-cover border-4 border-white">
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-brown text-white px-3 py-1 rounded-full text-xs font-bold">
                            MANAGER
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-brown mb-2">Ayu Lestari</h3>
                    <p class="text-gray-600 mb-4">Manajer Operasional</p>
                    <div class="flex justify-center space-x-2">
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white rounded-3xl p-8 shadow-2xl card-hover text-center">
                    <div class="relative mb-6">
                        <div class="w-32 h-32 bg-gradient-to-br from-golden to-yellow-400 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                alt="Rina Amelia"
                                class="w-28 h-28 rounded-full object-cover border-4 border-white">
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-golden text-white px-3 py-1 rounded-full text-xs font-bold">
                            MARKETING
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-brown mb-2">Rina Amelia</h3>
                    <p class="text-gray-600 mb-4">Kepala Pemasaran</p>
                    <div class="flex justify-center space-x-2">
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                        <i class="fas fa-star text-golden"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section class="py-20 px-6 bg-gradient-to-br from-white to-cream">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-brown mb-4">Kunjungi Toko Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Dua lokasi strategis untuk melayani Anda dengan pengalaman terbaik
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Main Store -->
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover">
                    <div class="bg-gradient-to-r from-golden to-yellow-400 p-6 text-white">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-store text-lg"></i>
                            </div>
                            <span class="bg-white/20 px-3 py-1 rounded-full text-sm font-bold">TOKO UTAMA</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">RING BUN Bakery and Coffee Shop</h3>
                    </div>
                    <div class="p-6">
                        <div class="flex items-start gap-3 mb-4">
                            <i class="fas fa-map-marker-alt text-golden text-xl mt-1"></i>
                            <p class="text-gray-700 text-lg">
                                Jl. Andalas No.7, RW.04, Sawahan Tim., Kec. Padang Tim., Kota Padang, Sumatera Barat 25171
                            </p>
                        </div>
                        <div class="mb-6">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.27801654929!2d100.37454107501273!3d-0.9429419990479425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4bb5e347e1689%3A0xb8f8736ed5fd2434!2sRING%20BUN%20Bakery%20and%20Coffee%20Shop!5e0!3m2!1sid!2sid!4v1748518440398!5m2!1sid!2sid"
                                width="100%" height="250" style="border:0; border-radius: 12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 text-green-600">
                                <i class="fas fa-clock"></i>
                                <span class="font-medium">Buka Setiap Hari</span>
                            </div>
                            <button class="bg-golden text-white px-4 py-2 rounded-full btn-primary font-bold">
                                <i class="fas fa-directions mr-2"></i>Petunjuk Arah
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Second Store -->
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover">
                    <div class="bg-gradient-to-r from-brown to-amber-800 p-6 text-white">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-shopping-cart text-lg"></i>
                            </div>
                            <span class="bg-white/20 px-3 py-1 rounded-full text-sm font-bold">CABANG</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Ring Bun Bakery Transmart</h3>
                    </div>
                    <div class="p-6">
                        <div class="flex items-start gap-3 mb-4">
                            <i class="fas fa-map-marker-alt text-brown text-xl mt-1"></i>
                            <p class="text-gray-700 text-lg">
                                Jl. Khatib Sulaiman No.85, Ulak Karang Sel., Kec. Padang Utara, Kota Padang, Sumatera Barat 25137
                            </p>
                        </div>
                        <div class="mb-6">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3131113092263!2d100.35140307501268!3d-0.9118033990793748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b963dca53fbd%3A0x3e7fe6bc995d5ebc!2sRing%20Bun%20Bakery%20Transmart%20Padang!5e0!3m2!1sid!2sid!4v1748518550656!5m2!1sid!2sid"
                                width="100%" height="250" style="border:0; border-radius: 12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 text-green-600">
                                <i class="fas fa-clock"></i>
                                <span class="font-medium">Buka Setiap Hari</span>
                            </div>
                            <button class="bg-brown text-white px-4 py-2 rounded-full btn-primary font-bold">
                                <i class="fas fa-directions mr-2"></i>Petunjuk Arah
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    @include('components.cta')

    @include('components.footer')

    <!-- Scripts -->
    @include('components.script')
</body>

</html>
