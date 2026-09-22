
<button id="scroll-to-top"
        type="button"
        aria-label="Kembali ke atas halaman"
        title="Kembali ke atas"
        class="fixed z-50 bottom-[76px] sm:bottom-20 lg:bottom-8 right-4 sm:right-6 lg:right-8 flex items-center justify-center w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-gradient-to-tr from-red-600 to-rose-600 hover:from-slate-900 hover:to-zinc-900 text-white shadow-lg shadow-red-600/30 hover:shadow-xl hover:shadow-slate-900/30 border border-white/20 transition-all duration-300 ease-out opacity-0 translate-y-6 scale-90 pointer-events-none group focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
    
    
    <span class="absolute inset-0 rounded-2xl bg-red-500 opacity-0 group-hover:animate-ping group-hover:opacity-20 pointer-events-none transition-opacity duration-300"></span>

    
    <svg class="w-5 h-5 sm:w-6 sm:h-6 transform transition-transform duration-300 group-hover:-translate-y-1" 
         fill="none" 
         stroke="currentColor" 
         viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const scrollBtn = document.getElementById('scroll-to-top');
        const heroSection = document.getElementById('hero-slider');
        if (!scrollBtn) return;

        let ticking = false;

        const updateScrollBtnVisibility = () => {
            // Check position: appear once scrolled past hero slider
            const heroHeight = heroSection ? (heroSection.offsetTop + heroSection.offsetHeight) : 500;
            const isPastHero = window.scrollY > (heroHeight - 100);

            if (isPastHero) {
                scrollBtn.classList.remove('opacity-0', 'translate-y-6', 'scale-90', 'pointer-events-none');
                scrollBtn.classList.add('opacity-100', 'translate-y-0', 'scale-100', 'pointer-events-auto');
            } else {
                scrollBtn.classList.remove('opacity-100', 'translate-y-0', 'scale-100', 'pointer-events-auto');
                scrollBtn.classList.add('opacity-0', 'translate-y-6', 'scale-90', 'pointer-events-none');
            }
            ticking = false;
        };

        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(updateScrollBtnVisibility);
                ticking = true;
            }
        }, { passive: true });

        // Initial check in case user refreshed while scrolled down
        updateScrollBtnVisibility();

        // Smooth scroll to top on click
        scrollBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            // Remove focus outline after clicking
            scrollBtn.blur();
        });
    });
</script>
<?php /**PATH /home/Rayy/Project/Github/TBSM WEB/toweb/resources/views/components/frontend/home/scroll-to-top.blade.php ENDPATH**/ ?>