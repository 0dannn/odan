import 'bootstrap/dist/js/bootstrap.bundle';

// Scroll Animation Observer
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                // Optional: Unobserve after animation to improve performance
                // observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with scroll-animate class
    const animateElements = document.querySelectorAll('.scroll-animate');
    animateElements.forEach(el => {
        observer.observe(el);
    });

    // Course Category Filter
    const categoryFilters = document.querySelectorAll('.category-filter');
    const courseCards = document.querySelectorAll('.course-card-wrapper');

    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            // Update active state
            categoryFilters.forEach(f => f.classList.remove('active'));
            this.classList.add('active');

            const category = this.getAttribute('data-category');

            // Filter courses with animation
            courseCards.forEach((card, index) => {
                const cardCategory = card.getAttribute('data-category');
                
                if (category === 'all' || cardCategory === category) {
                    setTimeout(() => {
                        card.classList.remove('hidden');
                        card.style.animation = `fadeInUp 0.6s ease-out ${index * 0.1}s both`;
                    }, 50);
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    });

    // Enrollment Form Submission
    const enrollmentForm = document.getElementById('enrollmentForm');
    if (enrollmentForm) {
        enrollmentForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('.enrollment-submit');
            const submitText = submitBtn.querySelector('.submit-text');
            const submitLoader = submitBtn.querySelector('.submit-loader');
            
            // Show loading state
            submitText.classList.add('d-none');
            submitLoader.classList.remove('d-none');
            submitBtn.disabled = true;
        });
    }

    // Dana Payment Form Submission
    const danaPaymentForm = document.getElementById('danaPaymentForm');
    if (danaPaymentForm) {
        danaPaymentForm.addEventListener('submit', function(e) {
            const payButton = document.getElementById('danaPayButton');
            const buttonContent = payButton.querySelector('.button-content');
            const buttonLoader = payButton.querySelector('.button-loader');
            
            // Show loading state
            buttonContent.classList.add('d-none');
            buttonLoader.classList.remove('d-none');
            payButton.disabled = true;
        });
    }

    // Contact Form Submission
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('.contact-submit');
            const submitText = submitBtn.querySelector('.submit-text');
            const submitLoader = submitBtn.querySelector('.submit-loader');
            
            // Show loading state
            submitText.classList.add('d-none');
            submitLoader.classList.remove('d-none');
            submitBtn.disabled = true;
        });
    }
});
