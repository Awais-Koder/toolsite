// Reveal Engine — IntersectionObserver scroll animations
document.addEventListener('DOMContentLoaded', () => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!prefersReducedMotion) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const delay = parseInt(el.dataset.revealDelay || '0', 10);
                    const duration = parseInt(el.dataset.revealDuration || '600', 10);

                    if (delay > 0) {
                        el.style.transitionDelay = `${delay}ms`;
                    }
                    if (duration !== 600) {
                        el.style.transitionDuration = `${duration}ms`;
                    }

                    el.classList.add('revealed');
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('[data-reveal]').forEach(el => {
            const type = el.dataset.reveal || 'fade-up';
            el.classList.add('reveal-base', `reveal-${type}`);
            observer.observe(el);
        });
    } else {
        // Immediately reveal everything for reduced-motion users
        document.querySelectorAll('[data-reveal]').forEach(el => el.classList.add('revealed'));
    }
});

// Header scroll behavior
(function () {
    const header = document.querySelector('header[data-header]');
    if (!header) return;

    const onScroll = () => {
        if (window.scrollY > 10) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
})();

// Back-to-top button visibility
(function () {
    const btn = document.querySelector('[data-back-to-top]');
    if (!btn) return;

    const onScroll = () => {
        if (window.scrollY > 400) {
            btn.classList.add('is-visible');
        } else {
            btn.classList.remove('is-visible');
        }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
})();

// Count-up animation engine
(function () {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const easeOutQuart = (t) => 1 - Math.pow(1 - t, 4);

    const animateCounter = (el) => {
        const target = parseInt(el.dataset.countUp || '0', 10);
        const prefix = el.dataset.prefix || '';
        const suffix = el.dataset.suffix || '';
        const duration = parseInt(el.dataset.countDuration || '1500', 10);

        let startTime = null;

        const step = (timestamp) => {
            if (!startTime) startTime = timestamp;
            const progress = Math.min((timestamp - startTime) / duration, 1);
            const eased = easeOutQuart(progress);
            const current = Math.floor(eased * target);
            el.textContent = prefix + current.toLocaleString() + suffix;

            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                el.textContent = prefix + target.toLocaleString() + suffix;
            }
        };

        requestAnimationFrame(step);
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                if (!el.dataset.counted) {
                    el.dataset.counted = 'true';
                    animateCounter(el);
                }
                observer.unobserve(el);
            }
        });
    }, { threshold: 0.3 });

    document.querySelectorAll('[data-count-up]').forEach(el => observer.observe(el));
})();

// Mobile drawer body scroll lock helper
window.toggleBodyScroll = function (lock) {
    if (lock) {
        document.body.style.overflow = 'hidden';
        document.body.style.paddingRight = `${window.innerWidth - document.documentElement.clientWidth}px`;
    } else {
        document.body.style.overflow = '';
        document.body.style.paddingRight = '';
    }
};
