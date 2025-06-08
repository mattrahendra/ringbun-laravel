function shareOnFacebook() {
    const url = encodeURIComponent(window.blogData.url);
    const title = encodeURIComponent(window.blogData.title);
    window.open(
        `https://www.facebook.com/sharer/sharer.php?u=${url}&t=${title}`,
        '_blank',
        'width=600,height=400'
    );
}

function shareOnTwitter() {
    const url = encodeURIComponent(window.blogData.url);
    const title = encodeURIComponent(window.blogData.title);
    window.open(
        `https://twitter.com/intent/tweet?url=${url}&text=${title}`,
        '_blank',
        'width=600,height=400'
    );
}

function shareOnWhatsApp() {
    const url = encodeURIComponent(window.blogData.url);
    const title = encodeURIComponent(window.blogData.title);
    const text = `${title} ${url}`; // Sesuaikan format teks
    window.open(`https://wa.me/?text=${text}`, '_blank');
}

function copyLink() {
    navigator.clipboard
        .writeText(window.blogData.url)
        .then(function () {
            const toast = document.createElement('div');
            toast.className =
                'fixed top-4 right-4 bg-golden text-white px-6 py-3 rounded-full font-bold z-50 slide-enter';
            toast.innerHTML = '<i class="fas fa-check mr-2"></i>Link berhasil disalin!';
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        })
        .catch(function () {
            alert('Gagal menyalin link');
        });
}

// Add smooth scrolling and animation effects
document.addEventListener('DOMContentLoaded', function () {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px',
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('slide-enter');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.card-hover, article').forEach(function (el) {
        observer.observe(el);
    });
});
