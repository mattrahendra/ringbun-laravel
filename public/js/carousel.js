document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".carousel-slide");
    const indicators = document.querySelectorAll(".carousel-indicator");
    const prevBtn = document.getElementById("prev");
    const nextBtn = document.getElementById("next");
    let currentSlide = 0;
    let autoSlideInterval;

    function showSlide(index) {
        // Hide all slides
        slides.forEach((slide, i) => {
            slide.classList.remove("opacity-100", "z-10");
            slide.classList.add("opacity-0", "z-0");
        });

        // Show current slide
        slides[index].classList.remove("opacity-0", "z-0");
        slides[index].classList.add("opacity-100", "z-10");

        // Update indicators
        indicators.forEach((indicator, i) => {
            indicator.classList.toggle("active", i === index);
        });

        // Trigger slide animation
        const slideContent = slides[index].querySelector(".max-w-2xl");
        if (slideContent) {
            slideContent.classList.remove("slide-enter");
            setTimeout(() => {
                slideContent.classList.add("slide-enter");
            }, 50);
        }
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 6000);
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    // Event listeners
    nextBtn.addEventListener("click", () => {
        nextSlide();
        stopAutoSlide();
        setTimeout(startAutoSlide, 8000); // Restart auto-slide after 8 seconds
    });

    prevBtn.addEventListener("click", () => {
        prevSlide();
        stopAutoSlide();
        setTimeout(startAutoSlide, 8000);
    });

    // Indicator clicks
    indicators.forEach((indicator, index) => {
        indicator.addEventListener("click", () => {
            if (index !== currentSlide) {
                currentSlide = index;
                showSlide(currentSlide);
                stopAutoSlide();
                setTimeout(startAutoSlide, 8000);
            }
        });
    });

    // Pause auto-slide on hover
    const carouselSection = document.querySelector("section");
    carouselSection.addEventListener("mouseenter", stopAutoSlide);
    carouselSection.addEventListener("mouseleave", startAutoSlide);

    // Keyboard navigation
    document.addEventListener("keydown", (e) => {
        if (e.key === "ArrowLeft") {
            prevSlide();
            stopAutoSlide();
            setTimeout(startAutoSlide, 8000);
        } else if (e.key === "ArrowRight") {
            nextSlide();
            stopAutoSlide();
            setTimeout(startAutoSlide, 8000);
        }
    });

    // Initialize
    showSlide(0);
    startAutoSlide();

    // Touch/Swipe support for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    carouselSection.addEventListener("touchstart", (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });

    carouselSection.addEventListener("touchend", (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
            stopAutoSlide();
            setTimeout(startAutoSlide, 8000);
        }
    }
});
