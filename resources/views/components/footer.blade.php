<footer class="bg-gray-800 text-white py-6 px-6 mt-12">
    <div class="mx-auto text-center md:text-left max-w-7xl">
        <div class="md:flex md:justify-between md:items-start mb-6">
            <!-- Brand Info -->
            <div class="mb-6 md:mb-0">
                <img src="{{ asset('/images/logo/logo.svg') }}" alt="Ring Bun Logo" class="h-10 mb-2 mx-auto md:mx-0">
                <p class="text-sm text-gray-400">by Arina Kitchen - Homemade Goodness</p>
            </div>
            <!-- Halal certified -->
            <div class="mb-6 md:mb-0">
                <img src="{{ asset('/images/logo/halal.svg') }}" alt="Halal Logo" class=" h-32 mt-2 mx-auto md:mx-0">
            </div>
            <!-- Social Media -->
            <div class="mb-6 md:mb-0">
                <h4 class="text-xl font-semibold mb-2">Follow Us</h4>
                <div class="flex flex-col justify-center md:justify-start">
                    <a href="https://www.instagram.com/ringbunbakery/" class="hover:text-yellow-300 flex items-center text-md">
                        <i class="fab fa-instagram text-lg mr-2.5"></i>ringbunbakery
                    </a>
                    <a href="https://www.tiktok.com/@ringbun.bakery" class="hover:text-yellow-300 flex items-center text-md">
                        <i class="fab fa-tiktok text-lg mr-2.5"></i>ringbun.bakery
                    </a>
                    <a href="https://api.whatsapp.com/send/?phone=6285161399003&text&type=phone_number&app_absent=0" class="hover:text-yellow-300 flex items-center text-md">
                        <i class="fab fa-whatsapp text-lg mr-2.5"></i>ringbunbakery
                    </a>
                </div>
            </div>
            <!-- Contact Info -->
            <div>
                <h4 class="text-xl font-semibold mb-2">Contact Us</h4>
                <p class="text-sm text-gray-400">Email: info@ringbun.com</p>
                <p class="text-sm text-gray-400">Phone: +6285161399003</p>
                <p class="text-sm text-gray-400">Jl. Andalas No.7, Kota Padang.</p>
            </div>
        </div>
        <!-- Copyright -->
        <p class="text-xs text-gray-500 text-center mt-4">© {{ date('Y') }} Ring Bun. All rights reserved.</p>
    </div>
</footer>
