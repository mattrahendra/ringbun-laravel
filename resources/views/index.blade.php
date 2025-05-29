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

    <!-- About -->

    

    <!-- Footer Section -->
    @include('components.footer')

    <!-- Scripts -->
    @include('components.script')

</body>

</html>
