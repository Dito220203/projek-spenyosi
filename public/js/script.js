const carousel = document.getElementById('carousel');
        const indicators = document.querySelectorAll('.indicator');

        function scrollToSlide(index) {
            const slideWidth = carousel.clientWidth;
            carousel.scrollTo({ left: index * slideWidth, behavior: 'smooth' });
            updateIndicators(index);
        }

        carousel.addEventListener('scroll', () => {
            const index = Math.round(carousel.scrollLeft / carousel.clientWidth);
            updateIndicators(index);
        });

        function updateIndicators(activeIndex) {
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === activeIndex);
            });
        }
