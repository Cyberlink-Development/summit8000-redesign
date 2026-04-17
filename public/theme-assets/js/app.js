document.addEventListener('DOMContentLoaded', function () {

    // =========================
    // Rating
    // =========================
    const ratingInputs = document.querySelectorAll('input[name="rating"]');
    const ratingText = document.getElementById('rating-text');

    const ratings = {
        1: "Poor",
        2: "Fair",
        3: "Good",
        4: "Very Good",
        5: "Excellent"
    };

    if (ratingInputs.length && ratingText) {
        ratingInputs.forEach(input => {
            input.addEventListener('change', () => {
                ratingText.textContent = ratings[input.value];
            });
        });
    }


    // =========================
    // Hero Slider
    // =========================
    const heroElement = document.querySelector('.hero');

    if (heroElement && typeof Swiper !== "undefined") {

        const heroSwiper = new Swiper(heroElement, {
            loop: true,
            speed: 600,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
        });

        const nextBtn = document.getElementById('custom-next');
        const prevBtn = document.getElementById('custom-prev');

        if (nextBtn) {
            nextBtn.addEventListener('click', () => heroSwiper.slideNext());
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => heroSwiper.slidePrev());
        }
    }


    // =========================
    // 3 Grid Slider
    // =========================
    document.querySelectorAll('.sliderContainer').forEach(container => {

        const section = container.closest('section');
        if (!section) return;

        const nextBtn = section.querySelector('.nextBtn');
        const prevBtn = section.querySelector('.prevBtn');

        if (typeof Swiper !== "undefined") {
            new Swiper(container, {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: false,
                speed: 600,
                breakpoints: {
                    640: { slidesPerView: 2, spaceBetween: 16 },
                    768: { slidesPerView: 2, spaceBetween: 24 },
                    1024: { slidesPerView: 3, spaceBetween: 24 },
                    1280: { slidesPerView: 3, spaceBetween: 32 },
                },
                navigation: {
                    nextEl: nextBtn || null,
                    prevEl: prevBtn || null,
                },
            });
        }
    });


    // =========================
    // Show More / Show Less
    // =========================
    const btn = document.getElementById("showMoreBtn");
    const cards = document.querySelectorAll(".extra-card");

    if (btn && cards.length) {

        let expanded = false;

        btn.addEventListener("click", () => {

            expanded = !expanded;

            cards.forEach((card, index) => {

                if (expanded) {
                    card.classList.remove("hidden");

                    requestAnimationFrame(() => {
                        setTimeout(() => {
                            card.classList.remove("opacity-0", "translate-y-6", "scale-95");
                            card.classList.add("opacity-100", "translate-y-0", "scale-100");
                        }, index * 120);
                    });

                } else {

                    card.classList.add("opacity-0", "translate-y-6", "scale-95");
                    card.classList.remove("opacity-100", "translate-y-0", "scale-100");

                    setTimeout(() => card.classList.add("hidden"), 500);
                }
            });

            btn.textContent = expanded ? "Show Less" : "Show More";
        });
    }

});
