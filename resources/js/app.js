// Scroll Animation Observer & Hero Slider

document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. SCROLL REVEAL OBSERVER ---
    // Respect prefers-reduced-motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    
    if (!prefersReducedMotion) {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.15
        };

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    obs.unobserve(entry.target); // Stop observing once revealed for performance
                }
            });
        }, observerOptions);

        const revealElements = document.querySelectorAll('.reveal-on-scroll');
        revealElements.forEach(el => observer.observe(el));
    } else {
        // If reduced motion is requested, immediately make all elements visible
        document.querySelectorAll('.reveal-on-scroll').forEach(el => {
            el.classList.add('is-visible');
            el.style.transition = 'none';
            el.style.transform = 'none';
        });
    }

    // --- 2. HERO SLIDER ---
    const sliderHero = document.querySelector('[data-hero-slider]');
    if (sliderHero) {
        const slides = sliderHero.querySelectorAll('.hero-slide');
        const dots = sliderHero.querySelectorAll('.hero-dot');
        const prevBtn = sliderHero.querySelector('.hero-prev');
        const nextBtn = sliderHero.querySelector('.hero-next');
        const counterCurrent = sliderHero.querySelector('.hero-counter-current');
        
        let currentSlide = 0;
        let slideInterval;
        const autoPlayDelay = 6000; // 6 seconds

        const goToSlide = (index) => {
            // Remove active classes
            slides[currentSlide].classList.remove('opacity-100', 'z-10');
            slides[currentSlide].classList.add('opacity-0', 'z-0');
            if (dots.length > 0) dots[currentSlide].classList.remove('bg-figma-red', 'w-8');
            if (dots.length > 0) dots[currentSlide].classList.add('bg-white/50', 'w-2');

            // Update index
            currentSlide = (index + slides.length) % slides.length;

            // Add active classes
            slides[currentSlide].classList.remove('opacity-0', 'z-0');
            slides[currentSlide].classList.add('opacity-100', 'z-10');
            if (dots.length > 0) dots[currentSlide].classList.remove('bg-white/50', 'w-2');
            if (dots.length > 0) dots[currentSlide].classList.add('bg-figma-red', 'w-8');
            
            // Update counter
            if (counterCurrent) {
                counterCurrent.textContent = String(currentSlide + 1).padStart(2, '0');
            }
            
            // Lazy load image if it has data-src
            const img = slides[currentSlide].querySelector('img[data-src]');
            if (img) {
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
            }
        };

        const nextSlide = () => goToSlide(currentSlide + 1);
        const prevSlide = () => goToSlide(currentSlide - 1);

        const startAutoplay = () => {
            if (!prefersReducedMotion) {
                slideInterval = setInterval(nextSlide, autoPlayDelay);
            }
        };

        const stopAutoplay = () => {
            clearInterval(slideInterval);
        };

        // Event Listeners
        if (nextBtn) nextBtn.addEventListener('click', () => { stopAutoplay(); nextSlide(); startAutoplay(); });
        if (prevBtn) prevBtn.addEventListener('click', () => { stopAutoplay(); prevSlide(); startAutoplay(); });
        
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                stopAutoplay();
                goToSlide(index);
                startAutoplay();
            });
        });

        // Pause on hover
        sliderHero.addEventListener('mouseenter', stopAutoplay);
        sliderHero.addEventListener('mouseleave', startAutoplay);
        
        // Pause when tab is not visible
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                stopAutoplay();
            } else {
                startAutoplay();
            }
        });

        // Initialize
        startAutoplay();
    }
});
