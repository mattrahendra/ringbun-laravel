<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<!-- Custom CSS -->
<link rel="icon" href="{{ asset('/images/logo/mark.svg') }}" type="image/svg+xml">
<link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
<script src="{{ asset('/js/home.js') }}" defer></script>
<script src="{{ asset('/js/carousel.js') }}" defer></script>
<script src="{{ asset('/js/search.js') }}" defer></script>
<script src="{{ asset('/js/blog/blog.js') }}" defer></script>
<script src="{{ asset('/js/product/category.js') }}"></script>
<script src="{{ asset('/js/b2b/b2b.js') }}"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'golden': '#fcbd08',
                    'cream': '#fefefe',
                    'brown': '#6d3c2b'
                },
                fontFamily: {
                    'Nourd': ['Nourd', 'sans-serif'],
                }
            }
        }
    }
</script>
