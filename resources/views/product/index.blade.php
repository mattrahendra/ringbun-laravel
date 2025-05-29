<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    <title>Ring Bun - Product</title>
</head>

<body>

    @include('components.nav')

    <section class="pt-24 px-6">
        <h1>Product Page</h1>
        <p>This is the product page content.</p>

        <!-- Add your product details here -->
        <div class="product-details">
            <h2>Product Name</h2>
            <p>Description of the product.</p>
            <p>Price: $XX.XX</p>
            <button class="add-to-cart">Add to Cart</button>
        </div>
    </section>

    <!-- Add your scripts here -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
    <script>
        // Example script for adding to cart functionality
        document.querySelector('.add-to-cart').addEventListener('click', function() {
            alert('Product added to cart!');
        });
    </script>

    <!-- Footer Section -->
    @include('components.footer')

    <!-- Scripts -->
    @include('components.script')
</body>

</html>
