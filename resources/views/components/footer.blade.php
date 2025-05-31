<!-- Footer -->
    <footer class="bg-brown text-white py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <!-- Brand Info -->
                <div class="md:col-span-2">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('/images/logo/logo.svg') }}" alt="Ring Bun Logo" class="h-10 mx-auto md:mx-0">
                    </div>
                    <p class="text-cream/80 mb-6 text-lg leading-relaxed max-w-md">
                        by Arina Kitchen - Homemade Goodness. Premium bakery dengan komitmen menghadirkan roti berkualitas tinggi untuk keluarga Indonesia.
                    </p>
                    <!-- Halal certified -->
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('/images/logo/halal.svg') }}" alt="Halal Logo" class=" h-32 mt-2 mx-auto md:mx-0">
                    </div>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-xl font-bold mb-6">Kontak Kami</h4>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-map-marker-alt text-golden text-lg"></i>
                            <span class="text-cream/90">Jl. Andalas No.7, Kota Padang</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-phone text-golden text-lg"></i>
                            <span class="text-cream/90">+6285161399003</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-envelope text-golden text-lg"></i>
                            <span class="text-cream/90">info@ringbun.com</span>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div>
                    <h4 class="text-xl font-bold mb-6">Ikuti Kami</h4>
                    <div class="space-y-4">
                        <a href="https://www.instagram.com/ringbunbakery/" class="flex items-center gap-3 hover:text-golden transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                            <span>ringbunbakery</span>
                        </a>
                        <a href="https://www.tiktok.com/@ringbun.bakery" class="flex items-center gap-3 hover:text-golden transition-colors">
                            <i class="fab fa-tiktok text-xl"></i>
                            <span>ringbun.bakery</span>
                        </a>
                        <a href="https://api.whatsapp.com/send/?phone=6285161399003&text&type=phone_number&app_absent=0" class="flex items-center gap-3 hover:text-golden transition-colors">
                            <i class="fab fa-whatsapp text-xl"></i>
                            <span>ringbunbakery</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-cream/20 pt-8 text-center">
                <p class="text-cream/70">&copy; {{ date('Y')}} Ring Bun. All rights reserved.</p>
            </div>
        </div>
    </footer>
