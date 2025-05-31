// Toggle Mobile Menu
document.getElementById("mobile-menu-btn").addEventListener("click", () => {
    document.getElementById("mobile-menu").classList.toggle("hidden");
});

// Mobile Menu Toggle
document.addEventListener("DOMContentLoaded", function () {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    });

    // Add scroll effect to navbar
    window.addEventListener("scroll", function () {
        const nav = document.querySelector("nav");
        if (window.scrollY > 100) {
            nav.classList.add("shadow-xl");
            nav.classList.remove("shadow-lg");
        } else {
            nav.classList.remove("shadow-xl");
            nav.classList.add("shadow-lg");
        }
    });

    // Animate elements on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
            }
        });
    }, observerOptions);

    // Observe all cards and sections
    document.querySelectorAll(".card-hover, section > div").forEach((el) => {
        el.style.opacity = "0";
        el.style.transform = "translateY(20px)";
        el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
        observer.observe(el);
    });

    // Add hover effects to buttons
    document.querySelectorAll(".btn-primary").forEach((btn) => {
        btn.addEventListener("mouseenter", function () {
            this.style.transform = "translateY(-2px) scale(1.02)";
        });
        btn.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0) scale(1)";
        });
    });

    // Counter animation for stats
    function animateCounters() {
        const counters = document.querySelectorAll("[data-counter]");
        counters.forEach((counter) => {
            const target = parseInt(counter.getAttribute("data-counter"));
            const increment = target / 100;
            let current = 0;

            const updateCounter = () => {
                if (current < target) {
                    current += increment;
                    counter.textContent =
                        Math.ceil(current) +
                        (counter.textContent.includes("+") ? "+" : "");
                    setTimeout(updateCounter, 20);
                } else {
                    counter.textContent =
                        target + (counter.textContent.includes("+") ? "+" : "");
                }
            };

            updateCounter();
        });
    }

    // Trigger counter animation when stats section is visible
    const statsSection = document.querySelector(
        ".grid.grid-cols-2.md\\:grid-cols-4"
    );
    if (statsSection) {
        const statsObserver = new IntersectionObserver(function (entries) {
            if (entries[0].isIntersecting) {
                animateCounters();
                statsObserver.disconnect();
            }
        });
        statsObserver.observe(statsSection);
    }
});
